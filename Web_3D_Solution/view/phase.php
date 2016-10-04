<?php
$hostname = gethostname();
if ($hostname == "SELVAMEENAK5C3E")
{
	$proj_path = "/PHP/NextWeb";
} else
{
	$proj_path = "..";
}
include('header.php');
$pid = (string) filter_input(INPUT_POST, 'delid');
if ($pid!="")
{
	
	$del1 = "DELETE FROM batch_master WHERE phaseid='$pid'";
	mysqli_query($db, $del1);
	$del2 = "DELETE FROM next_main_upload_temp WHERE phaseid='$pid'";
	mysqli_query($db, $del2);
	$del3 = "DELETE FROM next_main_matched_entry WHERE phase_id='$pid'";
	mysqli_query($db, $del3);
	$del4 = "DELETE FROM next_main_phase_table WHERE PhaseId='$pid'";
	mysqli_query($db, $del4);
	$del5 = "DELETE FROM next_range_overview_table WHERE PhaseId='$pid'";
	mysqli_query($db, $del5);
	echo "<div class='alert alert-success'>
			<strong>$pid</strong> Deleted Successfully!!!.
			</div>";
}
?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Phase</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading"><label>Phase Table</label></div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="dataTable_wrapper">
					<table class="table table-striped table-bordered table-hover"
						   id="dataTables-example">
						<thead>
							<tr>
								<th>No</th>
								<th>Phase</th>
								<th>Id</th>
								<th>Date</th>
								<th>Total<br>Count</th>
								<th>Render<br>Vol</th>
								<th>Brief</th>
								<th>Comments</th>
								<th></th>
							</tr>
						</thead>
						<tbody>

							<?php
							$counter = 1;
							$phase_all_data = mysqli_query($db, "SELECT m.phaseid phaseid,a.dataname Season, b.dataname Category,
m.Description descs,
brieffilename brief,
m.uploadeddt FROM
next_master_data_detail a
,next_master_data_detail b
,next_main_phase_table m
WHERE a.id = m.seasonid
AND b.id = m.categoryid");
							while ($rowphaseall = mysqli_fetch_array($phase_all_data, MYSQLI_ASSOC))
							{
								$phaseid = $rowphaseall['phaseid'];
								$sql = "SELECT COUNT(id) AS tot_count FROM next_main_upload_temp WHERE phaseid='$phaseid'";
								$sql_row = mysqli_fetch_array(mysqli_query($db, $sql), MYSQLI_ASSOC);
								$tot_count = $sql_row["tot_count"];
								
								#$qry = "SELECT option_id,camera_count FROM next_main_matched_entry a, next_option_lookup_table b WHERE a.option_id=b.id and phase_id='$phaseid' AND  matched_status=1 AND model_status=1 AND fabric_status=1  AND feet_color_status=1";
								$qry = "SELECT sum(camera_count) as tot_cam FROM next_main_matched_entry a, next_option_lookup_table b WHERE a.option_id=b.id and phase_id='$phaseid' AND  matched_status=1 AND model_status=1 AND fabric_status=1  AND feet_color_status=1";
								//echo $qry."<br>";
								$cam_count = mysqli_query($db, $qry);
								$tot_cam_count = 0;
								$cam_count = mysqli_fetch_array($cam_count, MYSQLI_ASSOC);
								$tot_cam_count = $cam_count['tot_cam'];
								$phase =$rowphaseall['phaseid'];
								
//								{
//									$tot_cam_count = $tot_cam_count + $cam_array["camera_count"];
//								}
//								while ($cam_array = mysqli_fetch_array($cam_count, MYSQLI_ASSOC))
//								{
//									$tot_cam_count = $tot_cam_count + $cam_array["camera_count"];
//								}
								?>
								<tr class="odd gradeX" style="font-size: 12px;">
									<td><?php echo $counter; ?></td>
									<td><?php echo $rowphaseall['Season'] . ' ' . $rowphaseall['Category'] . ' ' . $rowphaseall['descs']; ?></td>
									<td><?php echo $phaseid; ?></td>
									<td><?php echo $rowphaseall['uploadeddt'] ?></td>
									<td><?PHP echo $tot_count; ?></td>
									<td><?PHP echo $tot_cam_count; ?></td>
									<td><?php echo $rowphaseall['brief'] ?></td>
									<td>
										<div class="form-group">
											<input class="form-control" placeholder="Enter comment here" name="phasecomments" id="1<?php echo $rowphaseall['phaseid'] ?>">
										</div>
										<a href="javascript:void(0);" class="btn btn-primary btn-xs" value="<?php echo $rowphaseall['phaseid'] ?>" id="<?php echo $rowphaseall['phaseid'] ?>" onclick="myFunctionInsert(this.id)"><span title="Save"  class="glyphicon glyphicon-ok"></span></a>
										<a href="javascript:void(0);" class="btn btn-primary btn-xs" value="<?php echo $rowphaseall['phaseid'] ?>" id="<?php echo $rowphaseall['phaseid'] ?>" onclick="myFunction(this.id)"><span title="View" class="glyphicon glyphicon-list"></span></a>
									</td>
									<td><a href = "javascript:void(0);" onclick="del_phase('<?PHP echo $phase;?>')">
										<span class="glyphicon glyphicon-remove"></span>
									</a></td>

								</tr>

								<?php
								$counter++;
							}
							?>
						</tbody>
					</table>
				</div>
				<!-- /.table-responsive -->
			</div>
			<!-- /.panel-body -->
			<!--form id="uploadphase" name="uploadphase" action="<?PHP print $proj_path ?>/dao/briefupload.php" method="post" enctype="multipart/form-data"-->
			<form id="uploadphase" name="uploadphase" method="post" enctype="multipart/form-data">
				<div class="panel-heading"><label>Add New Phase</label></div>
				<div class="panel-body">
					<div class="dataTable_wrapper">
						<table>
							<tr>
								<td>
									<div class="form-group">
										<label>Season</label> <select class="form-control" name="phaseseason" id ="phaseseason">
											<option value="0">Please select Season</option>
											<?php
											while ($row_season_md = mysqli_fetch_array($seasonmasterdata_sql, MYSQLI_ASSOC))
											{

												//echo "Key=" . $x . ", Value=" . $x_value;
												//echo "<br>";
												echo '<option value="' . $row_season_md['id'] . '">' . $row_season_md['dataname'] . '</option>';
											}
											?>												</select>
									</div>
								</td>
								<td>&nbsp;</td>
								<td>
									<div class="form-group">
										<label>Category</label> <select class="form-control" name="phasecategory" id="phasecategory">
											<option value="0">Please select Category</option>

											<?php
											while ($row_category_md = mysqli_fetch_array($categorymasterdata_sql, MYSQLI_ASSOC))
											{

												//echo "Key=" . $x . ", Value=" . $x_value;
												//echo "<br>";
												echo '<option value="' . $row_category_md['id'] . '">' . $row_category_md['dataname'] . '</option>';
											}
											?>

										</select>
									</div>
								</td>
								<td>&nbsp;</td>
								<td><div class="form-group">
										<label>Description</label> <input class="form-control"
																		  placeholder="Enter description" name="phasedesc" id="phasedesc">
									</div></td>
								<td>&nbsp;</td>
								<td>
									<div class="form-group">
										<label>File input (Excel)</label> <input type="file" name="brief" id="brief">
									</div>
								</td>
								<td>&nbsp;</td>
								<td>
									<input type="button" name="sub_btn" value="Upload" class="form-control" style="background-color: #086a87;color: white;" onclick="check_validation_new()"></td>
								<td>&nbsp;</td>
							</tr>
						</table>

						<div id="modal">
							<img src="<?PHP print $proj_path ?>/view/hourglass.gif" alt="Loading..."/>
						</div>
						<div class="loading-progress"></div>
						<h3 id="status"></h3>

					</div>
				</div>
			</form>
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-12 -->
</div>


<form id="delphase" name="delphase" action="phase.php" method="post">
<input type="hidden" id="delid" name="delid" value="">	
</form>
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Confirm Newness Upload Confirmation</h4>
			</div>
			<div class="modal-body">
				<div class="panel-group" id="accordion">

				</div>
				</p>
			</div>
			<div class="modal-footer">
				<input type="hidden" name="phaseid" id="phaseid" value="">
				<button type="button" class="btn btn-default" onclick="location.href = 'finalise_newness.php'">Insert Now</button>
				<button type="button" class="btn btn-default"  data-dismiss="modal" onclick="location.reload();">Insert Later</button>
				<button type="button" class="btn btn-default" onclick="cancel_upload()" id="cancel_btn">Cancel</button>
			</div>
		</div>

	</div>
</div>
<?PHP
include('footer.php');
?>