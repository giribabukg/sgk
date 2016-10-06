
<div class="row" id="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
            <!-- /.panel-heading -->
			<div class="panel-body">
				
					<div class="dataTable_wrapper">
						<div style="padding-bottom:10px;font-size:21px;font-weight: bold;">Fabric 2</div>
						<a href="javascript:void(0);" class="btn btn-default btn-sm" onclick="update_texture2()" style="margin-bottom: 15px;"><span class="glyphicon glyphicon-ok"></span> Update</a>
						<a href="javascript:void(0);" class="btn btn-default btn-sm" onclick="delRec_FinalNew('<?php echo FOOT_COLOR; ?>')" style="margin-bottom: 15px;margin-left: 10px;"><span class="glyphicon glyphicon-remove"></span> Delete</a>
						<table class="table table-condensed table-striped table-bordered table-hover nowrap" id="dataTables-example">
							<thead>
								<tr style="font-size: 10px;">
									<th><input type="checkbox" class="form-control input-sm" id="checkedAll" name="check_all"></th>
									<th title="Texture Colour">Texture Color</th>
									<th title="Status">Status <font color="red">*</font></th>
									<th title="Season">Season</th>
									<th title="Category">Category</th>
									<th title="Comments">Comments</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$fabricstatusmasterdata_sql = mysqli_query($db, "SELECT a.id, dataname FROM next_master_data_detail a, next_master_header_detail b WHERE a.headerid = b.id AND b.HeaderName = 'Fabric Status'");
							while ($row_wc_md = mysqli_fetch_array($fabricstatusmasterdata_sql, MYSQLI_ASSOC))
							{
								$status_array[$row_wc_md['id']]=$row_wc_md['dataname'];
							}
							$counter = 0;
							$query1 = "SELECT * FROM next_main_upload_temp WHERE total_error_count>0 AND foot_color_error=1 GROUP BY foot_colour";
							$query1 = mysqli_query($db, $query1);
							while ($row_texture1 = mysqli_fetch_array($query1, MYSQLI_ASSOC))
							{
								$counter++;
								$temp_id = $row_texture1["id"];
								$foot_colour = $row_texture1["foot_colour"];
								$phaseid = $row_texture1["phaseid"];
								$qry = "SELECT b.DataName as season, c.DataName as cat FROM next_main_phase_table a, next_master_data_detail b,next_master_data_detail c WHERE PhaseId='$phaseid' AND a.SeasonId=b.id AND a.categoryId=c.id";
								$qry = mysqli_query($db, $qry);
								$result_set = mysqli_fetch_array($qry, MYSQLI_ASSOC);
								$season = $result_set['season'];
								$cat = $result_set['cat'];
								//$send_val = $item_number."$$$$$".$item_fabric."$$$$$".$item_fabric_color."$$$$$".$mat_type."$$$$$".$season."$$$$$".$cat;
								?>
								<tr style="font-size: 10px;">
									<td><input type="checkbox" class="form-control input-sm checkSingle" id="<?PHP echo $temp_id;?>" name="single_checkbox" value="<?PHP echo $counter;?>"></td>
									<td><?php echo $foot_colour ?></td>
									<td>
										<select class="form-control input-sm" name="text2_status" id="text2_status_<?PHP echo $temp_id;?>">
											<option value="0"></option>
											<?php
												foreach ($status_array as $key=>$val)
												{ echo '<option value="' . $key . '">' . $val . '</option>'; }
											?>
										</select>
									</td>
									<td><?php echo $season; ?></td>
									<td><?PHP echo $cat; ?></td>
									<td><input type="text" class="form-control input-sm" name="comment" id="comment_<?PHP echo $temp_id;?>"></td>
								</tr>	
								<?php
							}
						?>
						</tbody>
					</table>
					<form action="finalise_newness.php" method="post" name="text2_frm" id="text2_frm">
						<input type="hidden" id="dataset" name="dataset" value="">
						<input type="hidden" id="process" name="process" value="upd_text2">
					</form>
				</div>
				<!-- /.table-responsive -->
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
    <!-- /.col-lg-12 -->
</div>