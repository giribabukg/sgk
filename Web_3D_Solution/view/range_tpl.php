
<div class="row" id="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
            <!-- /.panel-heading -->
			<div class="panel-body">
				
					<div class="dataTable_wrapper">
						<div style="padding-bottom:10px;font-size:21px;font-weight: bold;">Range</div>
						<a href="javascript:void(0);" class="btn btn-default btn-sm" onclick="update_range()" style="margin-bottom: 15px;"><span class="glyphicon glyphicon-ok"></span> Update</a>
						<a href="javascript:void(0);" class="btn btn-default btn-sm" onclick="delRec_FinalNew('<?php echo RANGE; ?>')" style="margin-bottom: 15px;margin-left: 10px;"><span class="glyphicon glyphicon-remove"></span> Delete</a>
						<table class="table table-striped table-condensed table-bordered table-hover nowrap" id="dataTables-example">
							<thead>
								<tr style="font-size: 10px;">
									<th><input type="checkbox" class="form-control input-sm" id="checkedAll" name="check_all"></th>
									<th title="Range Descriptor">Descriptor</th>
									<th title="Material type">MT</th>
									<th title="Bead Option">Bead <font color="red">*</font></th>
									<th title="Angle Set Option">Angle Set <font color="red">*</font></th>
									<th title="Category">Category</th>
									<th title="Comments">Comments</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$beadmasterdata_sql = mysqli_query($db, "SELECT a.id, dataname FROM next_master_data_detail a, next_master_header_detail b WHERE a.headerid = b.id AND b.HeaderName = 'Bead Option'");
							while ($row_wc_md = mysqli_fetch_array($beadmasterdata_sql, MYSQLI_ASSOC))
							{
								$bead_array[$row_wc_md['id']]=$row_wc_md['dataname'];
							}
							$fabricstatusmasterdata_sql = mysqli_query($db, "SELECT a.id, dataname FROM next_master_data_detail a, next_master_header_detail b WHERE a.headerid = b.id AND b.HeaderName = 'Angle Set LUT'");
							while ($row_wc_md = mysqli_fetch_array($fabricstatusmasterdata_sql, MYSQLI_ASSOC))
							{
								$angleset_array[$row_wc_md['id']]=$row_wc_md['dataname'];
							}
							$counter = 0;
							$query1 = "SELECT * FROM next_main_upload_temp WHERE total_error_count>0 AND range_error=1 GROUP BY sofa_range";
							$query1 = mysqli_query($db, $query1);
							while ($row_texture1 = mysqli_fetch_array($query1, MYSQLI_ASSOC))
							{
								$counter++;
								$temp_id = $row_texture1["id"];
								$range = $row_texture1["sofa_range"];
								$mat_type = $row_texture1["material_type"];
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
									<td><?php echo $range ?></td>
									<td><?php echo $mat_type ?></td>
									<td>
										<select class="form-control input-sm" name="bead_opt" id="bead_opt_<?PHP echo $temp_id;?>">
											<option value="0"></option>
											<?php
												foreach ($bead_array as $key=>$val)
												{ echo '<option value="' . $key . '">' . $val . '</option>'; }
											?>
										</select>
									</td>
									<td>
										<select class="form-control input-sm" name="angle_set" id="angle_set_<?PHP echo $temp_id;?>">
											<option value="0"></option>
											<?php
												foreach ($angleset_array as $key=>$val)
												{ echo '<option value="' . $key . '">' . $val . '</option>'; }
											?>
										</select>
									</td>
									<td><?PHP echo $cat; ?></td>
									<td><input type="text" class="form-control input-sm" name="comment" id="comment_<?PHP echo $temp_id;?>"></td>
								</tr>	
								<?php
							}
						?>
						</tbody>
					</table>
					<form action="finalise_newness.php" method="post" name="range_frm" id="range_frm">
						<input type="hidden" id="dataset" name="dataset" value="">
						<input type="hidden" id="process" name="process" value="upd_range">
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