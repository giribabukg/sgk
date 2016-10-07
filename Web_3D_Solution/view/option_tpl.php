
<div class="row" id="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
            <!-- /.panel-heading -->
			<div class="panel-body">

				<div class="dataTable_wrapper">
					<div style="padding-bottom:10px;font-size:21px;font-weight: bold;">Option</div>
					<a href="javascript:void(0);" class="btn btn-default btn-sm" onclick="update_option()" style="margin-bottom: 15px;"><span class="glyphicon glyphicon-ok"></span> Update</a>
					<a href="javascript:void(0);" class="btn btn-default btn-sm" onclick="delRec_FinalNew('<?php echo OPTION_CODE; ?>')" style="margin-bottom: 15px;margin-left: 10px;"><span class="glyphicon glyphicon-remove"></span> Delete</a>
					<table class="table table-condensed table-bordered table-hover nowrap display" id="dataTables-example1" style="width:100%">
						<thead>
							<tr style="font-size: 10px;">
								<th><input type="checkbox" class="form-control input-sm" id="checkedAll" name="check_all"></th>
								<th title="Option Description">Option<br> Description</th>
								<th title="State">ST <font color="red">*</font></th>
								<th title="Wrap Code option">WC <font color="red">*</font></th>
								<th title="Angle Set Option">AS</th>
								<th title="Category"  style="width:2%">Cat</th>
								<th title="Main Camera Angle" style="width:1%">MA</th>
								<th title="_1 Camera Angle" style="width:1%">1</th>
								<th title="_2 Camera Angle"  style="width:1%">2</th>
								<th title="_3 Camera Angle"  style="width:1%">3</th>
								<th title="_4 Camera Angle"  style="width:1%">4</th>
								<th title="_5 Camera Angle"  style="width:1%">5</th>
								<th title="_6 Camera Angle"  style="width:1%">6</th>
								<th title="_7 Camera Angle"  style="width:1%">7</th>
								<th title="_8 Camera Angle"  style="width:1%">8</th>
								<th title="_9 Camera Angle"  style="width:1%">9</th>
								<th title="_10 Camera Angle"  style="width:1%">10</th>
								<th title="_11 Camera Angle"  style="width:1%">11</th>
								<th title="_12 Camera Angle"  style="width:1%">12</th>
								<th title="_13 Camera Angle"  style="width:1%">13</th>
								<th title="_14 Camera Angle" style="width:1%">14</th>
								<th title="_15 Camera Angle" style="width:1%">15</th>
								<th title="Comments" style="width:2%">Cmnts</th>											
							</tr>
						</thead>
						<tbody>
							<?php
							$wrapmasterdata_sql = mysqli_query($db, "SELECT a.id, dataname FROM next_master_data_detail a, next_master_header_detail b WHERE a.headerid = b.id AND b.HeaderName = 'Wrapcode Option'");
							while ($row_wc_md = mysqli_fetch_array($wrapmasterdata_sql, MYSQLI_ASSOC))
							{
								$wrap_array[$row_wc_md['id']] = $row_wc_md['dataname'];
							}
							$anglemasterdata_sql = mysqli_query($db, "SELECT a.id, dataname FROM next_master_data_detail a, next_master_header_detail b WHERE a.headerid = b.id AND b.HeaderName = 'Angle Set LUT'");
							while ($row_wc_md = mysqli_fetch_array($anglemasterdata_sql, MYSQLI_ASSOC))
							{
								$angleset_array[$row_wc_md['id']] = $row_wc_md['dataname'];
							}
							
							$statemasterdata_sql = mysqli_query($db, "SELECT a.id, dataname FROM next_master_data_detail a, next_master_header_detail b WHERE a.headerid = b.id AND b.HeaderName = 'State LUT'");
							while ($row_wc_md = mysqli_fetch_array($statemasterdata_sql, MYSQLI_ASSOC))
							{
								$state_array[$row_wc_md['id']] = $row_wc_md['dataname'];
							}
							$counter = 0;
							$query1 = "SELECT a.*,b.DataName FROM next_main_upload_temp a, next_master_data_detail b WHERE total_error_count>0 AND option_code_error=1 AND a.angle_set=b.id GROUP BY size_descrption,angle_set";
							$query1 = mysqli_query($db, $query1);
							while ($row_texture1 = mysqli_fetch_array($query1, MYSQLI_ASSOC))
							{
								$counter++;
								$temp_id = $row_texture1["id"];
								$size_descrption = $row_texture1["size_descrption"];
								$angle_set = $row_texture1["DataName"];
								$phaseid = $row_texture1["phaseid"];
								$qry = "SELECT b.DataName as season, c.DataName as cat FROM next_main_phase_table a, next_master_data_detail b,next_master_data_detail c WHERE PhaseId='$phaseid' AND a.SeasonId=b.id AND a.categoryId=c.id";
								$qry = mysqli_query($db, $qry);
								$result_set = mysqli_fetch_array($qry, MYSQLI_ASSOC);
								$season = $result_set['season'];
								$cat = $result_set['cat'];
								//$send_val = $item_number."$$$$$".$item_fabric."$$$$$".$item_fabric_color."$$$$$".$mat_type."$$$$$".$season."$$$$$".$cat;
								?>
								<tr style="font-size: 10px;" class="">
									<td><a href="javascript:void(0);" class="tr_clone_add"  style="margin-right: 5px;" id="<?PHP echo $temp_id; ?>"><span class="glyphicon glyphicon-plus"></span></a>
										<a href="javascript:void(0);" class="tr_clone_remove"  id="<?PHP echo $temp_id; ?>" style="margin-right: 5px;display:none;"><span class="glyphicon glyphicon-minus"></span></a>
										<input type="checkbox" class="form-control input-sm checkSingle" id="<?PHP echo $temp_id; ?>" name="single_checkbox" value="<?PHP echo $counter; ?>" parent="<?PHP echo $temp_id; ?>"></td>
									<td><?php echo $size_descrption ?></td>
									<td>
										<select class="form-control input-sm" name="state" id="state_<?PHP echo $temp_id; ?>">
											<option value="0"></option>
											<?php
											foreach ($state_array as $key => $val)
											{
												echo '<option value="' . $key . '">' . $val . '</option>';
											}
											?>
										</select>
									</td>
									<td>
										<select class="form-control input-sm" name="wrapcode1" id="wrapcode1_<?PHP echo $temp_id; ?>">
											<option value="0"></option>
											<?php
											foreach ($wrap_array as $key => $val)
											{
												echo '<option value="' . $key . '">' . $val . '</option>';
											}
											?>
										</select>
									</td>
									<td><?PHP echo $angle_set; ?></td>
									<td><?PHP echo $cat; ?></td>
									<td><input type="text" class="form-control input-sm" style="padding-left: 4px;width: 35px;" name="main_angle" id="main_angle_<?PHP echo $temp_id; ?>"></td>
									<td><input type="text" class="form-control input-sm" style="padding-left: 4px;width: 35px;" name="cam1" id="cam1_<?PHP echo $temp_id; ?>"></td>
									<td><input type="text" class="form-control input-sm" style="padding-left: 4px;width: 35px;" name="cam2" id="cam2_<?PHP echo $temp_id; ?>"></td>
									<td><input type="text" class="form-control input-sm" style="padding-left: 4px;width: 35px;" name="cam3" id="cam3_<?PHP echo $temp_id; ?>"></td>
									<td><input type="text" class="form-control input-sm" style="padding-left: 4px;width: 35px;" name="cam4" id="cam4_<?PHP echo $temp_id; ?>"></td>
									<td><input type="text" class="form-control input-sm" style="padding-left: 4px;width: 35px;" name="cam5" id="cam5_<?PHP echo $temp_id; ?>"></td>
									<td><input type="text" class="form-control input-sm" style="padding-left: 4px;width: 35px;" name="cam6" id="cam6_<?PHP echo $temp_id; ?>"></td>
									<td><input type="text" class="form-control input-sm" style="padding-left: 4px;width: 35px;" name="cam7" id="cam7_<?PHP echo $temp_id; ?>"></td>
									<td><input type="text" class="form-control input-sm" style="padding-left: 4px;width: 35px;" name="cam8" id="cam8_<?PHP echo $temp_id; ?>"></td>
									<td><input type="text" class="form-control input-sm" style="padding-left: 4px;width: 35px;" name="cam9" id="cam9_<?PHP echo $temp_id; ?>"></td>
									<td><input type="text" class="form-control input-sm"style="padding-left: 4px;width: 35px;"  name="cam10" id="cam10_<?PHP echo $temp_id; ?>"></td>
									<td><input type="text" class="form-control input-sm" style="padding-left: 4px;width: 35px;" name="cam11" id="cam11_<?PHP echo $temp_id; ?>"></td>
									<td><input type="text" class="form-control input-sm" style="padding-left: 4px;width: 35px;"  name="cam12" id="cam12_<?PHP echo $temp_id; ?>"></td>
									<td><input type="text" class="form-control input-sm" style="padding-left: 4px;width: 35px;" name="cam13" id="cam13_<?PHP echo $temp_id; ?>"></td>
									<td><input type="text" class="form-control input-sm" style="padding-left: 4px;width: 35px;" name="cam14" id="cam14_<?PHP echo $temp_id; ?>"></td>
									<td><input type="text" class="form-control input-sm" style="padding-left: 4px;width: 35px;" name="cam15" id="cam15_<?PHP echo $temp_id; ?>"></td>
									<td><input type="text" class="form-control input-sm" name="comment" id="comment_<?PHP echo $temp_id; ?>"></td>
								</tr>	
	<?php } ?>
						</tbody>
					</table>
					<form action="finalise_newness.php" method="post" name="option_frm" id="option_frm">
						<input type="hidden" id="dataset" name="dataset" value="">
						<input type="hidden" id="process" name="process" value="upd_option">
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