
<div class="row" id="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
            <!-- /.panel-heading -->
			<div class="panel-body">
					<div class="dataTable_wrapper">
						<a href="javascript:void(0);" class="btn btn-default btn-sm" onclick="update_texture1()" style="margin-bottom: 15px;"><span class="glyphicon glyphicon-ok"></span> Update</a>
						<a href="javascript:void(0);" class="btn btn-default btn-sm" onclick="delRec_FinalNew('<?php echo FABRIC; ?>')" style="margin-bottom: 15px;"><span class="glyphicon glyphicon-ok"></span> Delete</a>
						<table class="table table-condensed table-striped table-bordered table-hover nowrap" id="dataTables-example">
							<thead>
								<tr style="font-size: 10px;">
									<th><input type="checkbox" class="form-control input-sm" id="checkedAll" name="check_all"></th>
									<th title="Texture Item Number">Item No</th>
									<th title="Texture Name">Tex Nm</th>
									<th title="Texture Colour">Tex Clr</th>
									<th title="Std Wrap Code">Std WC <font color="red">*</font></th>
									<th title="Alt Wrap Code 1">Alt WC1 <font color="red">*</font></th>
									<th title="Alt Wrap Code 2">Alt WC2</th>
									<th title="Alt Wrap Code 3">Alt WC3</th>
									<th title="Fabric Design">Fab Dsgn <font color="red">*</font></th>
									<th title="Material type">Mat Type</th>
									<th title="Status">Stts <font color="red">*</font></th>
									<th title="Season">Seas</th>
									<th title="Category">Cat</th>
									<th title="Comments">Cmnts</th>
								</tr>
							</thead>
							<tbody>
							<?php
							$wrapmasterdata_sql = mysqli_query($db, "SELECT a.id, dataname FROM next_master_data_detail a, next_master_header_detail b WHERE a.headerid = b.id AND b.HeaderName = 'Wrapcode LUT'");
							while ($row_wc_md = mysqli_fetch_array($wrapmasterdata_sql, MYSQLI_ASSOC))
							{
								$wrap_array[$row_wc_md['id']]=$row_wc_md['dataname'];
							}
							$fabricmasterdata_sql = mysqli_query($db, "SELECT a.id, dataname FROM next_master_data_detail a, next_master_header_detail b WHERE a.headerid = b.id AND b.HeaderName = 'Fabric'");
							while ($row_wc_md = mysqli_fetch_array($fabricmasterdata_sql, MYSQLI_ASSOC))
							{
								$fabric_design_array[$row_wc_md['id']]=$row_wc_md['dataname'];
							}
							$fabricstatusmasterdata_sql = mysqli_query($db, "SELECT a.id, dataname FROM next_master_data_detail a, next_master_header_detail b WHERE a.headerid = b.id AND b.HeaderName = 'Fabric Status'");
							while ($row_wc_md = mysqli_fetch_array($fabricstatusmasterdata_sql, MYSQLI_ASSOC))
							{
								$status_array[$row_wc_md['id']]=$row_wc_md['dataname'];
							}
							$counter = 0;
							$query1 = "SELECT * FROM next_main_upload_temp WHERE total_error_count>0 AND item_number_error=1 GROUP BY swatch_item_number";
							$query1 = mysqli_query($db, $query1);
							while ($row_texture1 = mysqli_fetch_array($query1, MYSQLI_ASSOC))
							{
								$counter++;
								$temp_id = $row_texture1["id"];
								$item_number = $row_texture1["swatch_item_number"];
								$item_fabric = $row_texture1["swatch_item_fabric"];
								$item_fabric_color = $row_texture1["swatch_item_fabric_colour"];
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
									<td><?php echo $item_number ?></td>
									<td><?php echo $item_fabric ?></td>
									<td><?php echo $item_fabric_color ?></td>
									<td>
										<select class="form-control input-sm" name="swrapcode" id="swrapcode_<?PHP echo $temp_id;?>">
											<option value="0"></option>
											<?php
												foreach ($wrap_array as $key=>$val)
												{ echo '<option value="' . $key . '">' . $val . '</option>'; }
											?>
										</select>
									</td>
									<td>
										<select class="form-control input-sm" name="awrapcode1" id="awrapcode1_<?PHP echo $temp_id;?>">
											<option value="0"></option>
											<?php
												foreach ($wrap_array as $key=>$val)
												{ echo '<option value="' . $key . '">' . $val . '</option>'; }
											?>
										</select>
									</td>
									<td>
										<select class="form-control input-sm" name="awrapcode2" id="awrapcode2_<?PHP echo $temp_id;?>">
											<option value="0"></option>
											<?php
												foreach ($wrap_array as $key=>$val)
												{ echo '<option value="' . $key . '">' . $val . '</option>'; }
											?>
										</select>
									</td>
									<td>
										<select class="form-control input-sm" name="awrapcode3" id="awrapcode3_<?PHP echo $temp_id;?>">
											<option value="0"></option>
											<?php
												foreach ($wrap_array as $key=>$val)
												{ echo '<option value="' . $key . '">' . $val . '</option>'; }
											?>
										</select>
									</td>
									<td>
										<select class="form-control input-sm" name="fab_design" id="fab_design_<?PHP echo $temp_id;?>">
											<option value="0"></option>
											<?php
												foreach ($fabric_design_array as $key=>$val)
												{ echo '<option value="' . $key . '">' . $val . '</option>'; }
											?>
										</select>
									</td>
									<td><?PHP echo $mat_type; ?></td>
									<td>
										<select class="form-control input-sm" name="text1_status" id="text1_status_<?PHP echo $temp_id;?>">
											<option value="0"></option>
											<?php
												foreach ($status_array as $key=>$val)
												{
													if ($val =="Approved")
														echo '<option value="' . $key . '" selected>' . $val . '</option>'; 
													else
														echo '<option value="' . $key . '">' . $val . '</option>'; 
													//echo '<option value="' . $key . '">' . $val . '</option>';
												}
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
					<form action="finalise_newness.php" method="post" name="text1_frm" id="text1_frm">
						<input type="hidden" id="dataset" name="dataset" value="">
						<input type="hidden" id="process" name="process" value="upd_text1">
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