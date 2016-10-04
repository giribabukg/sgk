
<div class="row" id="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
            <!-- /.panel-heading -->
			<div class="panel-body">
				
					<div class="dataTable_wrapper">
						<a href="javascript:void(0);" class="btn btn-default btn-sm" onclick="update_model()" style="margin-bottom: 15px;"><span class="glyphicon glyphicon-ok"></span> Update</a>
						<table class="table table-condensed table-striped table-bordered table-hover nowrap" id="dataTables-example">
							<thead>
								<tr style="font-size: 10px;">
									<th><input type="checkbox" class="form-control input-sm" id="checkedAll" name="check_all"></th>
									<th title="Name">Model <font color="red">*</font></th>
									<th title="Description">Status</th>
									<th title="Comments">Cmnts</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$counter = 0;
							$fabricstatusmasterdata_sql = mysqli_query($db, "SELECT a.id, dataname FROM next_master_data_detail a, next_master_header_detail b WHERE a.headerid = b.id AND b.HeaderName = 'Model Status'");
							while ($row_wc_md = mysqli_fetch_array($fabricstatusmasterdata_sql, MYSQLI_ASSOC))
							{
								
								$status_array[$row_wc_md['id']]=$row_wc_md['dataname'];
							}
							$query1 = "SELECT * FROM next_main_upload_temp a, next_main_matched_entry b WHERE a.id=b.temp_id AND matched_status=0 GROUP BY source_model";
							$query1 = mysqli_query($db, $query1);
							while ($row_texture1 = mysqli_fetch_array($query1, MYSQLI_ASSOC))
							{
								$counter++;
								$temp_id = $row_texture1["tid"];
								$source_model = $row_texture1["source_model"];
								$phaseid = $row_texture1["phaseid"];
								$qry = "SELECT b.DataName as season, c.DataName as cat FROM next_main_phase_table a, next_master_data_detail b,next_master_data_detail c WHERE PhaseId='$phaseid' AND a.SeasonId=b.id AND a.categoryId=c.id";
								$qry = mysqli_query($db, $qry);
								$result_set = mysqli_fetch_array($qry, MYSQLI_ASSOC);
								$season = $result_set['season'];
								$cat = $result_set['cat'];
								
								?>
								<tr style="font-size: 12px;">
									<td><input type="checkbox" class="form-control input-sm checkSingle" id="<?PHP echo $temp_id;?>" name="single_checkbox" value="<?PHP echo $counter;?>"></td>
									<td><?php echo $source_model ?></td>
									<td>
										<select class="form-control input-sm" name="model_status" id="model_status_<?PHP echo $temp_id;?>">
											<option value="0"></option>
											<?php
												foreach ($status_array as $key=>$val)
												{ 
													if ($val =="Approved")
														echo '<option value="' . $key . '" selected>' . $val . '</option>'; 
													else
														echo '<option value="' . $key . '">' . $val . '</option>'; 
												}
											?>
										</select>
									</td>
									<td><input type="text" class="form-control input-sm" name="comment" id="comment_<?PHP echo $temp_id;?>">
										<input type="hidden" id="tempid_<?PHP echo $temp_id;?>" name="tempid" value="<?PHP echo $row_texture1["id"];?>">
									</td>
								</tr>	
								
								<?php
								
							}
						?>
						</tbody>
					</table>
					<form action="finalise_newness.php" method="post" name="model_frm" id="model_frm">
						<input type="hidden" id="dataset" name="dataset" value="">
						<input type="hidden" id="process" name="process" value="upd_model">
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