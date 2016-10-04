<?php
$hostname = gethostname();
if ($hostname == "SELVAMEENAK5C3E")
{
	$proj_path = "/PHP/NextWeb";
} else
{
	$proj_path = "..";
}
?>

<?php  if(!empty($_REQUEST) && $_REQUEST['msg'] != ''){ ?>
<div class="alert alert-info ">
    <a href="#" class="close" data-dismiss="alert">&times;</a>
    <strong>Message : </strong><?php echo trim(base64_decode($_REQUEST['msg'])); ?>
</div>
<?php } ?>

<?php
include('header.php');
$del_id = trim(addslashes(filter_input(INPUT_POST, 'del_id')));
$process = trim(addslashes(filter_input(INPUT_POST, 'process')));
$userid = $_SESSION ['login_id'];
$username = $_SESSION ['user_name'];
if ($process == "insert_row")
{
	$rengedesc = trim(addslashes($_POST ["rengedesc"]));
	$rangebead = $_POST ["rangebead"];
	$rangemt = $_POST ["range_mt"];
	$rangeangle = $_POST ["rangeangle"];
	$rangecat = $_POST ["rangecat"];
	$rangecomments = trim(addslashes($_POST ["rangecomments"]));
	//$texcomments = $_POST ["texcomments2"];

	$sel_qry = "SELECT id FROM next_range_lookup_table WHERE Range_desc='$rengedesc'";
	mysqli_query($db, $sel_qry);
	$dup_count = mysqli_affected_rows($db);
	if ($dup_count == 0)
	{

		$sql_insert_comment = "INSERT INTO next_range_lookup_table(Range_desc,Bead_Option,Angle_Set_Option,material_type,Category,AddedBy) VALUES
			('$rengedesc','$rangebead','$rangeangle','$rangemt','$rangecat','$personId_session')";

		mysqli_query($db, $sql_insert_comment);

		$sql_id = mysqli_query($db, " select id from next_range_lookup_table ORDER BY dateAdded DESC LIMIT 1");
		$row_id = mysqli_fetch_array($sql_id, MYSQLI_ASSOC);
		$rangeid = $row_id['id'];

		$strtest = "RA" . str_pad($rangeid, 5, "0", STR_PAD_LEFT);
		$upd_qry = "update next_range_lookup_table set range_id='$strtest' where id=$rangeid";
		mysqli_query($db, $upd_qry);

		//echo $id_texture1;
		if ($rangecomments != "")
		{
			$newid = "Ran" . $rangeid;
			$sql_insert_comment1 = "INSERT INTO next_trans_cmtt_table(Comments,TransId,CommentedBy) VALUES ('$rangecomments','$newid',$personId_session)";
			mysqli_query($db, $sql_insert_comment1);
		}

		echo "<div class='alert alert-success'>
			<strong>$rengedesc</strong> Successfully inserted.
			</div>";
	} else
	{
		echo "<div class='alert alert-danger'>
			<strong>$rengedesc</strong> Already Exists!!!.
			</div>";
	}
}

if (($process == "delete_row") && $del_id != "")
{
	$t = time();
	$timelog = date("dmYhms", $t);
	try
	{
		$del_qry = "DELETE FROM next_range_lookup_table WHERE id=$del_id";
		if (mysqli_query($db, $del_qry))
		{
			echo "<div class='alert alert-success'>
			<strong>Success</strong> Row deleted successfully.
			</div>";
			$id = str_pad($userid, 5, "0", STR_PAD_LEFT);
			error_log($timelog . " => Success: [$del_id] deleted successfully created by [$username - System Profile Id ($id)]\n", 3, "../log/Transaction.log");
			error_log($del_qry . "\n", 3, "../log/Transaction.log");
		} else
		{
			echo "Row not able to delete!!";
			$id = str_pad($userid, 5, "0", STR_PAD_LEFT);
			error_log($timelog . " => Error: [$del_id] not deleted Error uploaded by [$username - System Profile Id ($id)]\n", 3, "../log/Transaction.log");
			error_log($del_qry . "\n", 3, "../log/Transaction.log");
		}
	} catch (Exception $ex)
	{
		echo '<span style="color:red;text-align:center;">We are sorry to inform that the latest transaction failed due to some technical constraint.
    		</span>' . "\n";
		echo '<br></br>';
		echo '<span style="color:red;text-align:center;">Please contact RND team and please provive the transaction ID
    		<span style="font-weight: 900;">' . $timelog . '</span>
    		</span>';
		error_log($timelog . " => Error: [$timelog]." . $e->getMessage() . "\n", 3, "../log/Error.log");
	}

	$t = time();
	$timelog = date("dmYhms", $t);
}
?>

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Range</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<div class="panel panel-default">

	<div class="panel-heading"><label>Add Range Data
		</label>

	</div>
	<form name="range_frm" id="range_frm" action="range.php"
		  method="post" enctype="multipart/form-data">
		<div class="panel-heading">
			<input type="hidden" name="tables" value="Range">
		</div>
		<div class="panel-body">
			<div class="dataTable_wrapper">
				<table class="table">
					<tr>
						<td>
							<div class="form-group">
								<label>Range Description<font color="red">*</font></label> <input class="form-control"
																								  placeholder="Enter Texture Item Number" name="rengedesc"
																								  id="rengedesc">
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>Material Type<font color="red">*</font></label> <select class="form-control"
																							   name="range_mt" id="range_mt">
									<option value="0">Please select one</option>
									<?php
									while ($row_mat_md = mysqli_fetch_array($matmasterdata_sql, MYSQLI_ASSOC))
									{
										echo '<option value="' . $row_mat_md['id'] . '">' . $row_mat_md['dataname'] . '</option>';
									}
									?>
								</select>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="form-group">
								<label>Bead Option<font color="red">*</font></label> <select
									class="form-control" name="rangebead" id="rangebead">
									<option value="0">Please select one</option>
									<?php
									while ($row_bead_md = mysqli_fetch_array($beadmasterdata_sql, MYSQLI_ASSOC))
									{
										echo '<option value="' . $row_bead_md['id'] . '">' . $row_bead_md['dataname'] . '</option>';
									}
									?>
								</select>
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>Angle Set Option<font color="red">*</font></label> <select class="form-control"
																								  name="rangeangle" id="rangeangle">
									<option value="0">Please select one</option>
									<?php
									while ($row_aso_md = mysqli_fetch_array($anglesetmasterdata_sql, MYSQLI_ASSOC))
									{
										echo '<option value="' . $row_aso_md['id'] . '">' . $row_aso_md['dataname'] . '</option>';
									}
									?>

								</select>
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>Category<font color="red">*</font></label> <select class="form-control"
																						  name="rangecat" id="rangecat">
									<option value="0">Please select one</option>
									<?php
									while ($row_category_md = mysqli_fetch_array($categorymasterdata_sql, MYSQLI_ASSOC))
									{
										echo '<option value="' . $row_category_md['id'] . '">' . $row_category_md['dataname'] . '</option>';
									}
									?>
								</select>
							</div>
						</td>
					</tr>
					<tr>
						<td><label>Comments</label>
							<div class="form-group">
								<input class="form-control" placeholder="Enter comment here" name="rangecomments" id="rangecomments">
							</div>
						</td>
					</tr>
					<tr>
						<td><input type="button" name="button" value="Create" onclick="validateForm()"></td></tr>
				</table>
			</div>
		</div>
		<input type ="hidden" name="process" id="process" value="">
	</form>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<label>Range LookUp Table</label>
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="dataTable_wrapper">
					<table class="table table-striped table-bordered table-hover"
						   id="dataTables-example">
						<thead>
							<tr style="font-size: 12px;">
								<th></th>
								<th>No</th>
								<th title="Range Id">ID</th>
								<th title="Range Descriptor">Descriptor</th>
								<th title="Material type">MT</th>
								<th title="Bead Option">Bead</th>
								<th title="Angle Set Option">Angle Set</th>
								<th title="Category">Category</th>
								<th title="Date Added">Added On</th>
								<th title="Added By">Added By</th>
								<!--th title="Is Approved">Approved?</th>
								<th title="Date Approved">Approved On</th-->
								<th title="Comments">Comments</th>
								<th></th>

							</tr>
						</thead>
						<tbody>

							<?php
							$counter = 0;
// get all range data
							$sql_range = "SELECT Range_desc,(	SELECT DISTINCT  dataname FROM next_master_data_detail a,
									next_master_header_detail b
									WHERE a.headerid = b.id
									AND b.HeaderName = 'Bead Option'
									AND aa.bead_option = a.id
								) AS bead,
								(	SELECT DISTINCT  dataname FROM next_master_data_detail a,
									next_master_header_detail b
									WHERE a.headerid = b.id
									AND b.HeaderName = 'Angle Set LUT'
									AND aa.angle_set_option = a.id
								) AS angle,
								(	SELECT DISTINCT  dataname FROM next_master_data_detail a,
									next_master_header_detail b
									WHERE a.headerid = b.id
									AND b.HeaderName = 'Category'
									AND aa.Category = a.id
								) AS Category,
								(	SELECT DISTINCT  dataname FROM next_master_data_detail a,
									next_master_header_detail b
									WHERE a.headerid = b.id
									AND b.HeaderName = 'Material Type LUT'
									AND aa.material_type = a.id
								) AS Mat_type,
								bb.Firstname,
								bb.secondname,
								dateadded,
								isapproved,
								dateapproved,aa.id,
								range_id
								FROM
								next_range_lookup_table aa,
								next_system_login_table bb
								WHERE aa.Addedby = bb.id";

							$range_sql = mysqli_query($db, $sql_range);
							unset($rangearray);
							while ($row_range = mysqli_fetch_array($range_sql, MYSQLI_ASSOC))
							{
								//echo $row_master_header['headername'];
								$collectionrange = $row_range['Range_desc'] . "/**/" . $row_range['bead']
										. "/**/" . $row_range['angle'] . "/**/" . $row_range['Category'] . "/**/" . $row_range['Firstname'] . " " . $row_range['secondname']
										. "/**/" . $row_range['dateadded'] . "/**/" . $row_range['isapproved']
										. "/**/" . $row_range['dateapproved'] . "/**/" . $row_range['id'] . "/**/" . $row_range['range_id'] . "/**/" . $row_range['Mat_type'];
								$rangearray[] = $collectionrange;
							}
							foreach ($rangearray as $tablevalues)
							{
								$counter++;
								$tablevaluesarr = explode("/**/", $tablevalues);
								$id = $tablevaluesarr[8];
								?>


								<tr style="font-size: 12px;">
									<td><img style="width:20px;height:20px; cursor: pointer;" onclick="open_wind(<?PHP echo $id; ?>)" src="<?PHP print $proj_path ?>/img/edit.png" alt="Edit Row" title="Edit Row"></td>
									<td><?php echo $counter; ?></td>
									<td><?php echo $tablevaluesarr[9]; ?></td>
									<td><?php echo $tablevaluesarr[0]; ?></td>
									<td><?php echo $tablevaluesarr[10]; ?></td>
									<td><?php echo $tablevaluesarr[1]; ?></td>
									<td><?php echo $tablevaluesarr[2]; ?></td>
									<td><?php echo $tablevaluesarr[3]; ?></td>
									<td><?php echo $tablevaluesarr[4]; ?></td>
									<td><?php echo $tablevaluesarr[5]; ?></td>

									<!--td><?php
//										if ($tablevaluesarr[6] != "")
//										{
//											print '<a href="../dao/approvedata.php?type=N&table=Range&id=' . $tablevaluesarr[8] . '">Y</>';
//										} else
//										{
//
//											print '<a href="../dao/approvedata.php?type=Y&table=Range&id=' . $tablevaluesarr[8] . '">N</>';
//										}
									?></td>
									<td><?php //echo $tablevaluesarr[7];    ?></td-->
									<td>
										<button type="button" class="form-control"
												style="font-size: larger;color: blue;
												background-color: none;" onclick="myFunction(this.id)"; value="Ran<?php echo $tablevaluesarr[8] ?>" id="Ran<?php echo $tablevaluesarr[8] ?>">*</button>
									</td>


									<td><a href="javascript:void(0);" onclick="del_row(<?PHP echo $id; ?>)"><span class="glyphicon glyphicon-remove"></span></a></td>

								</tr>
								<?php
							}
							?>

						</tbody>
					</table>
					<form action="range.php" method="post" name="delete_action" id="delete_action">
						<input type="hidden" name ="del_id" id="del_id" value="">
						<input type ="hidden" name="process" id="process" value="">
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
