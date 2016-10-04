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
$del_id = trim(addslashes(filter_input(INPUT_POST, 'del_id')));
$process = trim(addslashes(filter_input(INPUT_POST, 'process')));
$userid = $_SESSION ['login_id'];
$username = $_SESSION ['user_name'];
if ($process == "insert_row")
{
	$opcat = $_POST ["opcat"];
	//$optionmt = $_POST ["optionmt"];
	$optionstate = $_POST ["optionstate"];
	$optionwrap = $_POST ["optionwrap"];
	$optionangel = $_POST ["optionangel"];
	//$optioncode = $_POST ["optioncode"];
	$optiondesc = trim(addslashes($_POST ["optiondesc"]));
	$optcomments = trim(addslashes($_POST ["optcomments"]));
	$_onecangle = trim($_POST ["_onecangle"]);
	$_twocangle = trim($_POST ["_twocangle"]);
	$_threecangle = trim($_POST ["_threecangle"]);
	$_fourcangle = trim($_POST ["_fourcangle"]);
	$_fivecangle = trim($_POST ["_fivecangle"]);
	$_sixcangle = trim($_POST ["_sixcangle"]);
	$_sevencangle = trim($_POST ["_sevencangle"]);
	$_eightcangle = trim($_POST ["_eightcangle"]);
	$_ninecangle = trim($_POST ["_ninecangle"]);
	$_tencangle = trim($_POST ["_tencangle"]);
	$_elevencangle = trim($_POST ["_elevencangle"]);
	$_twelvecangle = trim($_POST ["_twelvecangle"]);
	$_thirteencangle = trim($_POST ["_thirteencangle"]);
	$_forteencangle = trim($_POST ["_forteencangle"]);
	$_fifteencangle = trim($_POST ["_fifteencangle"]);
	$_maincangle = trim($_POST ["maincangle"]);
	$camera_count = 0;
	if (strtolower($_maincangle) != "na" and strtolower($_maincangle) != "n/a" and strtolower($_maincangle) != "")
	{
		$camera_count = $camera_count+1;
	}
	if (strtolower($_onecangle) != "na" and strtolower($_onecangle) != "n/a" and strtolower($_onecangle) != "")
	{
		$camera_count = $camera_count+1;
	}
	if (strtolower($_twocangle) != "na" and strtolower($_twocangle) != "n/a" and strtolower($_twocangle) != "")
	{
		$camera_count = $camera_count+1;
	}
	if (strtolower($_threecangle) != "na" and strtolower($_threecangle) != "n/a" and strtolower($_threecangle) != "")
	{
		$camera_count = $camera_count+1;
	}
	if (strtolower($_fourcangle) != "na" and strtolower($_fourcangle) != "n/a" and strtolower($_fourcangle) != "")
	{
		$camera_count = $camera_count+1;
	}
	if (strtolower($_fivecangle) != "na" and strtolower($_fivecangle) != "n/a" and strtolower($_fivecangle) != "")
	{
		$camera_count = $camera_count+1;
	}
	if (strtolower($_sixcangle) != "na" and strtolower($_sixcangle) != "n/a" and strtolower($_sixcangle) != "")
	{
		$camera_count = $camera_count+1;
	}
	if (strtolower($_sevencangle) != "na" and strtolower($_sevencangle) != "n/a" and strtolower($_sevencangle) != "")
	{
		$camera_count = $camera_count+1;
	}
	if (strtolower($_eightcangle) != "na" and strtolower($_eightcangle) != "n/a" and strtolower($_eightcangle) != "")
	{
		$camera_count = $camera_count+1;
	}
	if (strtolower($_ninecangle) != "na" and strtolower($_ninecangle) != "n/a" and strtolower($_ninecangle) != "")
	{
		$camera_count = $camera_count+1;
	}
	if (strtolower($_tencangle) != "na" and strtolower($_tencangle) != "n/a" and strtolower($_tencangle) != "")
	{
		$camera_count = $camera_count+1;
	}
	if (strtolower($_elevencangle) != "na" and strtolower($_elevencangle) != "n/a" and strtolower($_elevencangle) != "")
	{
		$camera_count = $camera_count+1;
	}
	if (strtolower($_twelvecangle) != "na" and strtolower($_twelvecangle) != "n/a" and strtolower($_twelvecangle) != "")
	{
		$camera_count = $camera_count+1;
	}
	if (strtolower($_thirteencangle) != "na" and strtolower($_thirteencangle) != "n/a" and strtolower($_thirteencangle) != "")
	{
		$camera_count = $camera_count+1;
	}
	if (strtolower($_forteencangle) != "na" and strtolower($_forteencangle) != "n/a" and strtolower($_forteencangle) != "")
	{
		$camera_count = $camera_count+1;
	}
	if (strtolower($_fifteencangle) != "na" and strtolower($_fifteencangle) != "n/a" and strtolower($_fifteencangle) != "")
	{
		$camera_count = $camera_count+1;
	}
	$sql_insert_comment = "INSERT INTO next_option_lookup_table(Category,State,WrapCode_Option,AngleSet,Description,Main,_1,_2,_3,_4,_5,_6,_7,_8,_9,_10,_11,_12,_13,_14, _15, AddedBy,camera_count) "
			. "VALUES('$opcat','$optionstate','$optionwrap','$optionangel','$optiondesc','$_maincangle','$_onecangle','$_twocangle','$_threecangle','$_fourcangle','$_fivecangle','$_sixcangle','$_sevencangle','$_eightcangle','$_ninecangle','$_tencangle','$_elevencangle','$_twelvecangle','$_thirteencangle','$_forteencangle','$_fifteencangle','$personId_session',$camera_count)";

	mysqli_query($db, $sql_insert_comment);

	$sql_id = mysqli_query($db, " select id from next_option_lookup_table ORDER BY dateadded DESC LIMIT 1");
	$row_id = mysqli_fetch_array($sql_id, MYSQLI_ASSOC);
	$id_texture1 = $row_id['id'];

	$strtest = "S" . str_pad($id_texture1, 3, "0", STR_PAD_LEFT);
	$upd_qry = "update next_option_lookup_table set option_sgkid='$strtest' where id=$id_texture1";
	mysqli_query($db, $upd_qry);

	//echo $id_texture1;
	if ($optcomments != "")
	{
		$newid = "OptC" . $id_texture1;
		$sql_insert_comment1 = "INSERT INTO next_trans_cmtt_table(Comments,TransId,CommentedBy) VALUES ('$optcomments	','$newid',$personId_session)";
		mysqli_query($db, $sql_insert_comment1);
	}
	echo "<div class='alert alert-success'>
			<strong>$optiondesc</strong> Successfully Added!!!.
			</div>";
}
if ($process == "delete_row" && $del_id != "")
{
	$t = time();
	$timelog = date("dmYhms", $t);
	try
	{
		$del_qry = "DELETE FROM next_option_lookup_table WHERE id=$del_id";
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
		<h1 class="page-header">Option Code</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<div class="panel panel-default">

	<div class="panel-heading">
		<label>Add New Option Code Data </label>
	</div>
	<form name="option_frm" id="option_frm" action="optioncode.php"
		  method="post" enctype="multipart/form-data">
		<div class="panel-heading"></div>
		<div class="panel-body">
			<div class="dataTable_wrapper">
				<input type="hidden" name="tables" value="Option">
				<table class="table">
					<tr>
						<td>
							<div class="form-group">
								<label>Option Description<font color="red">*</font></label> <input class="form-control"
																								   placeholder="Enter Option Desc..." name="optiondesc" id="optiondesc">
							</div>

						</td>
						<td>
							<div class="form-group">
								<label>State<font color="red">*</font></label> <select class="form-control"
																					   name="optionstate" id="optionstate">
									<option value="0">Please select one</option>
									<?php
									while ($row_state_md = mysqli_fetch_array($statemasterdata_sql, MYSQLI_ASSOC))
									{

										//echo "Key=" . $x . ", Value=" . $x_value;
										//echo "<br>";
										echo '<option value="' . $row_state_md['id'] . '">' . $row_state_md['dataname'] . '</option>';
									}
									?>
								</select>
							</div>
						</td>

						<td>
							<div class="form-group">
								<label>Wrap Code Option<font color="red">*</font></label> <select class="form-control"
																								  name="optionwrap" id="optionwrap">
									<option value="0">Please select one</option>
									<?php
									while ($row_wo_md = mysqli_fetch_array($wrapopmasterdata_sql, MYSQLI_ASSOC))
									{

										//echo "Key=" . $x . ", Value=" . $x_value;
										//echo "<br>";
										echo '<option value="' . $row_wo_md['id'] . '">' . $row_wo_md['dataname'] . '</option>';
									}
									?>

								</select>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="form-group">
								<label>Angle Set Option<font color="red">*</font></label> <select class="form-control"
																								  name="optionangel" id="optionangel">
									<option value="0">Please select one</option>

									<?php
									while ($row_aso_md = mysqli_fetch_array($anglesetmasterdata_sql, MYSQLI_ASSOC))
									{

										//echo "Key=" . $x . ", Value=" . $x_value;
										//echo "<br>";
										echo '<option value="' . $row_aso_md['id'] . '">' . $row_aso_md['dataname'] . '</option>';
									}
									?>
								</select>
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>Category<font color="red">*</font></label> <select class="form-control"
																						  name="opcat" id="opcat">
									<option value="0">Please select one</option>
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

						<td><label>Comments</label>
							<div class="form-group">
								<input class="form-control" placeholder="Enter comment here" name="optcomments" id="optcomments">

							</div>
						</td>
					</tr>

				</table>
				<labeL><font  style="font-size:18px">Camera Angle</font></labeL>
				<table class="table">


					<tr>
						<td>
							<div class="form-group">
								<label>Main</label> <input class="form-control"
														   placeholder="Main  " name="maincangle"
														   id="maincangle">
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>_1</label> <input class="form-control"
														 placeholder="_1  " name="_onecangle"
														 id="_onecangle">
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>_2</label> <input class="form-control"
														 placeholder="_2  " name="_twocangle"
														 id="_twocangle">
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>_3</label> <input class="form-control"
														 placeholder="_3  " name="_threecangle"
														 id="_threecangle">
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>_4</label> <input class="form-control"
														 placeholder="_4  " name="_fourcangle"
														 id="_fourcangle">
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>_5</label> <input class="form-control"
														 placeholder="_5  " name="_fivecangle"
														 id="_fivecangle">
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>_6</label> <input class="form-control"
														 placeholder="_6  " name="_sixcangle"
														 id="_sixcangle">
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>_7</label> <input class="form-control"
														 placeholder="_7  " name="_sevencangle"
														 id="_sevencangle">
							</div>
						</td>



						<td>
							<div class="form-group">
								<label>_8</label> <input class="form-control"
														 placeholder="-8  " name="_eightcangle"
														 id="_eightcangle">
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>_9</label> <input class="form-control"
														 placeholder="_9  " name="_ninecangle"
														 id="_ninecangle">
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>_10</label> <input class="form-control"
														  placeholder="_10  " name="_tencangle"
														  id="_tencangle">
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>_11</label> <input class="form-control"
														  placeholder="_11  " name="_elevencangle"
														  id="_elevencangle">
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>_12</label> <input class="form-control"
														  placeholder="_12  " name="_twelvecangle"
														  id="_twelvecangle">
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>_13</label> <input class="form-control"
														  placeholder="_13  " name="_thirteencangle"
														  id="_thirteencangle">
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>_14</label> <input class="form-control"
														  placeholder="_14 " name="_forteencangle"
														  id="_forteencangle">
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>_15</label> <input class="form-control"
														  placeholder="_15 " name="_fifteencangle"
														  id="_fifteencangle">
							</div>
						</td>	
					</tr>
					<tr>
					</tr>
					<tr>
						<td><input type="button" name="button" id="button" value="Create" onclick="validateForm();"></td>
					</tr>
				</table>
			</div>
		</div>
		<input type="hidden" name="process" id="process" value="">
	</form>
</div>

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<label>Option Code LookUp Table</label>
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="dataTable_wrapper">
					<table class="table table-striped table-bordered table-hover display" id="dataTables-example" cellspacing="0" width="100%">
						<thead>
							<tr  style="font-size: 12px;">
								<th></th>
								<th>No</th>
								<th title="Option SGK ID">OI</th>
								<th title="Option Description" width="20%">Option<br> Description</th>
								<th title="State">ST</th>
								<th title="Wrap Code option">WC</th>
								<th title="Angle Set Option">AS</th>
								<th title="Category">Cat</th>
								<th title="Main Camera Angle">MA</th>
								<th title="_1 Camera Angle">1</th>
								<th title="_2 Camera Angle">2</th>
								<th title="_3 Camera Angle">3</th>
								<th title="_4 Camera Angle">4</th>
								<th title="_5 Camera Angle">5</th>
								<th title="_6 Camera Angle">6</th>
								<th title="_7 Camera Angle">7</th>
								<th title="_8 Camera Angle">8</th>
								<th title="_9 Camera Angle">9</th>
								<th title="_10 Camera Angle">10</th>
								<th title="_11 Camera Angle">11</th>
								<th title="_12 Camera Angle">12</th>
								<th title="_13 Camera Angle">13</th>
								<th title="_14 Camera Angle">14</th>
								<th title="_15 Camera Angle">15</th>
								<th title="Added By">BY</th>
								<th title="Date Added">DT</th>											
								<!--th title="Is Approved">AP?</th>
								<th title="Date Approved">DTA</th-->
								<th title="Comments">CM</th>
								<th>Act</th>
							</tr>
						</thead>
						<tbody>

							<?php
							$counter = 0;
							unset($optioncodearray);
							$sql_optioncode = "SELECT	
								(SELECT DISTINCT  dataname FROM next_master_data_detail a,
									next_master_header_detail b
									WHERE a.headerid = b.id
									AND b.HeaderName = 'Category'
									AND aa.Category = a.id
								) AS Category,	
								(SELECT DISTINCT  dataname FROM next_master_data_detail a,
									next_master_header_detail b
									WHERE a.headerid = b.id
									AND b.HeaderName = 'State LUT'
									AND aa.State = a.id
								) AS state,
								(SELECT DISTINCT  dataname FROM next_master_data_detail a,
									next_master_header_detail b
									WHERE a.headerid = b.id
									AND b.HeaderName = 'Wrapcode Option'
									AND aa.Wrapcode_option = a.id
								) AS wrap,
								(SELECT DISTINCT  dataname FROM next_master_data_detail a,
									next_master_header_detail b
									WHERE a.headerid = b.id
									AND b.HeaderName = 'Angle Set LUT'
									AND aa.Angleset = a.id
								) AS angle,
								Option_code,
								Description,
								main,
								_1,_2,_3,_4,_5,_6,_7,_8,_9,_10,_11,_12,_13,_14,_15,
								bb.Firstname,
								bb.secondname,
								dateadded,
								isapproved,
								dateapproved,aa.id,
								option_sgkid
								FROM 
								next_option_lookup_table aa,
								next_system_login_table bb
								WHERE aa.Addedby = bb.id";
							$optioncode_sql = mysqli_query($db, $sql_optioncode);

							while ($row_optioncode = mysqli_fetch_array($optioncode_sql, MYSQLI_ASSOC))
							{
								//echo $row_master_header['headername'];
								$collectionoptioncode = $row_optioncode['Category'] . "/**/" . $row_optioncode['option_sgkid']
										. "/**/" . $row_optioncode['state'] . "/**/" . $row_optioncode['wrap'] . "/**/" . $row_optioncode['angle']
										. "/**/" . $row_optioncode['Option_code'] . "/**/" . $row_optioncode['Description'] . "/**/" . $row_optioncode['main'] . "/**/" . $row_optioncode['_1']
										. "/**/" . $row_optioncode['_2'] . "/**/" . $row_optioncode['_3'] . "/**/" . $row_optioncode['_4'] . "/**/" . $row_optioncode['_5']
										. "/**/" . $row_optioncode['_6'] . "/**/" . $row_optioncode['_7'] . "/**/" . $row_optioncode['_8'] . "/**/" . $row_optioncode['_9']
										. "/**/" . $row_optioncode['_10'] . "/**/" . $row_optioncode['_11'] . "/**/" . $row_optioncode['_12'] . "/**/" . $row_optioncode['_13']
										. "/**/" . $row_optioncode['_14'] . "/**/" . $row_optioncode['_15'] . "/**/" . $row_optioncode['Firstname'] . " " . $row_optioncode['secondname']
										. "/**/" . $row_optioncode['dateadded'] . "/**/" . $row_optioncode['isapproved'] . "/**/" . $row_optioncode['dateapproved']
										. "/**/" . $row_optioncode['id'];
								$optioncodearray[] = $collectionoptioncode;
							}

							foreach ($optioncodearray as $tablevalues)
							{
								$counter++;
								$tablevaluesarr = explode("/**/", $tablevalues);
								$id = $tablevaluesarr[27];
								?>


								<tr style="font-size: 12px;">
									<td><img style="width:20px;height:20px; cursor: pointer;" onclick="open_wind(<?PHP echo $id; ?>)" src="<?PHP print $proj_path ?>/img/edit.png" alt="Edit Row" title="Edit Row"></td>
									<td><?php echo $counter; ?></td>
									<td><?php echo $tablevaluesarr[1]; ?></td>
									<td><?php echo $tablevaluesarr[6]; ?></td>
									<td><?php echo $tablevaluesarr[2]; ?></td>
									<td><?php echo $tablevaluesarr[3]; ?></td>
									<td><?php echo $tablevaluesarr[4]; ?></td>
									<td><?php echo $tablevaluesarr[0]; ?></td>
									<td><?php echo $tablevaluesarr[7]; ?></td>
									<td><?php echo $tablevaluesarr[8]; ?></td>
									<td><?php echo $tablevaluesarr[9]; ?></td>
									<td><?php echo $tablevaluesarr[10]; ?></td>
									<td><?php echo $tablevaluesarr[11]; ?></td>
									<td><?php echo $tablevaluesarr[12]; ?></td>
									<td><?php echo $tablevaluesarr[13]; ?></td>
									<td><?php echo $tablevaluesarr[14]; ?></td>
									<td><?php echo $tablevaluesarr[15]; ?></td>
									<td><?php echo $tablevaluesarr[16]; ?></td>
									<td><?php echo $tablevaluesarr[17]; ?></td>
									<td><?php echo $tablevaluesarr[18]; ?></td>
									<td><?php echo $tablevaluesarr[19]; ?></td>
									<td><?php echo $tablevaluesarr[20]; ?></td>
									<td><?php echo $tablevaluesarr[21]; ?></td>
									<td><?php echo $tablevaluesarr[22]; ?></td>
									<td><?php echo $tablevaluesarr[23]; ?></td>
									<td><?php echo $tablevaluesarr[24]; ?></td>
									<!--td><?php
//										if ($tablevaluesarr[25] != "")
//										{
//											print '<a href="../dao/approvedata.php?type=N&table=optionc&id=' . $tablevaluesarr[27] . '">Y</>';
//										} else
//										{
//
//											print '<a href="../dao/approvedata.php?type=Y&table=optionc&id=' . $tablevaluesarr[27] . '">N</>';
//										}
									?></td>
									<td><?php //echo $tablevaluesarr[26];   ?></td-->

									<td>
										<button type="button" class="form-control"
												style="font-size: larger;color: blue; 
												background-color: none;" onclick="myFunction(this.id)" value="OptC<?php echo $tablevaluesarr[27] ?>" id="OptC<?php echo $tablevaluesarr[27] ?>">*</button>
									</td>
									<td><a href="javascript:void(0);" onclick="del_row(<?PHP echo $id; ?>)"><span class="glyphicon glyphicon-remove"></span></a></td>
								</tr>
								<?php
							}
							?>
						</tbody>
					</table>
					<form action="optioncode.php" method="post" name="delete_action" id="delete_action">
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

