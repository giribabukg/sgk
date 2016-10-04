<?php

include('header_without_menu.php');
$obj = new edit_popup();

$process = $_REQUEST["process"];
$sub_process = $_REQUEST["sub_process"];

if ($sub_process == "update_texture1")
{
	$obj->update_texture1($db);
} else if ($sub_process == "update_texture2")
{
	$obj->update_texture2($db);
} else if ($sub_process == "update_option")
{
	$obj->update_option($db);
}
else if ($sub_process == "update_range")
{
	$obj->update_range($db);
}

$obj->show_template($db);


//echo $login_session;
include('footer.php');

class edit_popup
{

	public function show_template($db)
	{
		$userid = $_SESSION ['login_id'];
		$username = $_SESSION ['user_name'];
		$process = $_REQUEST["process"];

		$idd = trim(addslashes(filter_input(INPUT_GET, 'rowid')));
		if ($idd != "")
		{
			$seasonmasterdata_sql = mysqli_query($db, "SELECT a.id, dataname FROM next_master_data_detail a,
				next_master_header_detail b
				WHERE a.headerid = b.id
				AND b.HeaderName = 'Season'");

			$categorymasterdata_sql = mysqli_query($db, "SELECT a.id, dataname FROM next_master_data_detail a,
				next_master_header_detail b
				WHERE a.headerid = b.id
				AND b.HeaderName = 'Category'");

			$matmasterdata_sql = mysqli_query($db, "SELECT a.id, dataname FROM next_master_data_detail a,
				next_master_header_detail b
				WHERE a.headerid = b.id
				AND b.HeaderName = 'Material Type LUT'");

			$wrapopmasterdata_sql = mysqli_query($db, "SELECT a.id, dataname FROM next_master_data_detail a,
				next_master_header_detail b
				WHERE a.headerid = b.id
				AND b.HeaderName = 'Wrapcode Option'");

			$statemasterdata_sql = mysqli_query($db, "SELECT a.id, dataname FROM next_master_data_detail a,
				next_master_header_detail b
				WHERE a.headerid = b.id
				AND b.HeaderName = 'State LUT'");
			
			$anglesetmasterdata_sql = mysqli_query($db, "SELECT a.id, dataname FROM next_master_data_detail a,
				next_master_header_detail b
				WHERE a.headerid = b.id
				AND b.HeaderName = 'Angle Set LUT'");
			
			$fabricstatusmasterdata_sql = mysqli_query($db, "SELECT a.id, dataname FROM next_master_data_detail a,
				next_master_header_detail b
				WHERE a.headerid = b.id
				AND b.HeaderName = 'Fabric Status'");

			if ($process == "view_texture1")
			{
				$select_qry = "SELECT * FROM next_texture_lookup_table WHERE id=$idd";
				$select_qry1 = mysqli_query($db, $select_qry);

				$row1 = mysqli_fetch_array($select_qry1, MYSQLI_ASSOC);

				$id = $row1["id"];
				$texture_item_no = $row1["Texture_Item_No"];
				$texture_name = $row1["Texture_Name"];
				$texture_color = $row1["Texture_Color"];
				$altwpcode = $row1["StdWrapCode"];
				$altwpcode1 = $row1["AltWrapCode1"];
				$altwpcode2 = $row1["AltWrapCode2"];
				$altwpcode3 = $row1["AltWrapCode3"];
				$fabric_design = $row1["FabricDesign"];
				$material_type = $row1["MaterialType"];
				$status = $row1["Status"];
				$season = $row1["Season"];
				$category = $row1["Category"];
				$comments = $row1["Comments"];
				

				$wrapcodemasterdata_sql = mysqli_query($db, "SELECT a.id, dataname FROM next_master_data_detail a,
				next_master_header_detail b
				WHERE a.headerid = b.id
				AND b.HeaderName = 'Wrapcode LUT'");
				$wrapcodemasterdata_sql1 = mysqli_query($db, "SELECT a.id, dataname FROM next_master_data_detail a,
				next_master_header_detail b
				WHERE a.headerid = b.id
				AND b.HeaderName = 'Wrapcode LUT'");
				$wrapcodemasterdata_sql2 = mysqli_query($db, "SELECT a.id, dataname FROM next_master_data_detail a,
				next_master_header_detail b
				WHERE a.headerid = b.id
				AND b.HeaderName = 'Wrapcode LUT'");
				$wrapcodemasterdata_sql3 = mysqli_query($db, "SELECT a.id, dataname FROM next_master_data_detail a,
				next_master_header_detail b
				WHERE a.headerid = b.id
				AND b.HeaderName = 'Wrapcode LUT'");

				$fabricmasterdata_sql = mysqli_query($db, "SELECT a.id, dataname FROM next_master_data_detail a,
				next_master_header_detail b
				WHERE a.headerid = b.id
				AND b.HeaderName = 'Fabric'");
				
				

				echo '<div class="row"><div class="col-lg-12"><h4 class="page-header"></h1></div></div>';
				echo '<div class="panel panel-default"><div class="panel-heading"><label>Edit Texture1 Data</label></div>';
				include('edit_popup_tpl1.php');
			} else if ($process == "view_texture2")
			{
				$select_qry = "SELECT * FROM next_texturesec_lookup_table WHERE id=$idd";
				$select_qry1 = mysqli_query($db, $select_qry);

				$row1 = mysqli_fetch_array($select_qry1, MYSQLI_ASSOC);

				$id = $row1["id"];
				$texture_item_no = $row1["Texture_Item_No"];
				$texture_color = $row1["Texture_Color"];
				$season = $row1["Season"];
				$category = $row1["Category"];
				$status = $row1["Status"];

				echo '<div class="row"><div class="col-lg-12"><h4 class="page-header"></h1></div></div>';
				echo '<div class="panel panel-default"><div class="panel-heading"><label>Edit Texture2 Data</label></div>';
				include('edit_popup_tpl2.php');
			} else if ($process == "view_option")
			{
				$wrapopmasterdata_sql = mysqli_query($db, "SELECT a.id, dataname FROM next_master_data_detail a,
				next_master_header_detail b
				WHERE a.headerid = b.id
				AND b.HeaderName = 'Wrapcode Option'");

				$statemasterdata_sql = mysqli_query($db, "SELECT a.id, dataname FROM next_master_data_detail a,
				next_master_header_detail b
				WHERE a.headerid = b.id
				AND b.HeaderName = 'State LUT'");

				$select_qry = "SELECT * FROM next_option_lookup_table WHERE id=$idd";
				$select_qry1 = mysqli_query($db, $select_qry);

				$row1 = mysqli_fetch_array($select_qry1, MYSQLI_ASSOC);

				$id = $row1["id"];
				$category = $row1["Category"];
				$state = $row1["State"];
				//$mat = $row1["MaterialType"];
				//$option_code = $row1["Option_Code"];
				$angle = $row1["AngleSet"];
				$wrapcode = $row1["WrapCode_Option"];
				$des = $row1["Description"];
				$main = $row1["Main"];
				$angle1 = $row1["_1"];
				$angle2 = $row1["_2"];
				$angle3 = $row1["_3"];
				$angle4 = $row1["_4"];
				$angle5 = $row1["_5"];
				$angle6 = $row1["_6"];
				$angle7 = $row1["_7"];
				$angle8 = $row1["_8"];
				$angle9 = $row1["_9"];
				$angle10 = $row1["_10"];
				$angle11 = $row1["_11"];
				$angle12 = $row1["_12"];
				$angle13 = $row1["_13"];
				$angle14 = $row1["_14"];
				$angle15 = $row1["_15"];

				echo '<div class="row"><div class="col-lg-12"><h4 class="page-header"></h1></div></div>';
				echo '<div class="panel panel-default"><div class="panel-heading"><label>Edit Option Data</label></div>';
				include('edit_popup_tpl3.php');
			}
			else if ($process == "view_range")
			{
				//get Bead
				$beadmasterdata_sql = mysqli_query($db, "SELECT a.id, dataname FROM next_master_data_detail a,
				next_master_header_detail b
				WHERE a.headerid = b.id
				AND b.HeaderName = 'Bead Option'");
				
				$select_qry = "SELECT * FROM next_range_lookup_table WHERE id=$idd";
				$select_qry1 = mysqli_query($db, $select_qry);

				$row1 = mysqli_fetch_array($select_qry1, MYSQLI_ASSOC);

				$id = $row1["id"];
				$range_desc = $row1["Range_desc"];
				$bead = $row1["Bead_Option"];
				$mat = $row1["material_type"];
				$angle = $row1["Angle_set_Option"];
				$category = $row1["Category"];

				echo '<div class="row"><div class="col-lg-12"><h4 class="page-header"></h1></div></div>';
				echo '<div class="panel panel-default"><div class="panel-heading"><label>Edit Range Data</label></div>';
				include('edit_popup_tpl4.php');
			} 
		}
	}

	public function update_texture1($db)
	{
		$userid = $_SESSION ['login_id'];
		$username = $_SESSION ['user_name'];
		$item_no = trim(addslashes($_POST["texitemno"]));
		$texname = trim(addslashes($_POST["texname"]));
		$texcolor = trim(addslashes($_POST["texcolor"]));
		$textwrapcode = trim(addslashes($_POST["textwrapcode"]));
		$textwrapcode1 = trim(addslashes($_POST["textwrapcode1"]));
		$textwrapcode2 = trim(addslashes($_POST["textwrapcode2"]));
		$textwrapcode3 = trim(addslashes($_POST["textwrapcode3"]));
		$textseson = trim(addslashes($_POST["textseson"]));
		$textcat = trim(addslashes($_POST["textcat"]));
		$texmd = trim(addslashes($_POST["texmd"]));
		$texfabdeg = trim(addslashes($_POST["texfabdeg"]));
		$status = trim(addslashes($_POST["textstatus"]));
		$old_stat_id = trim(addslashes($_POST["old_stat_id"]));
		$id = $_REQUEST["rowid"];
		
		$upd_qurey = "UPDATE nextdb.next_texture_lookup_table SET Status=$status, Texture_Item_No = '$item_no' ,  Texture_Name = '$texname' ,  Texture_Color = '$texcolor' , StdWrapCode = '$textwrapcode' ,  AltWrapCode1 = '$textwrapcode1' , AltWrapCode2 = '$textwrapcode2' , AltWrapCode3 = '$textwrapcode3' , FabricDesign = '$texfabdeg' , MaterialType = '$texmd' , Season = '$textseson' , Category = '$textcat'  WHERE id = $id ";
		$t = time();
		$timelog = date("dmYhms", $t);
		if (mysqli_query($db, $upd_qurey))
		{
			echo "Data updated Successfully!!!";
			if ($old_stat_id !=$status)
			{
				$sel1 = "SELECT a.id as fab_status FROM next_master_data_detail a, next_master_header_detail b WHERE a.headerid = b.id AND a.Description = 'Fully Approved' AND b.HeaderName ='Fabric Status'";
				$temp_result = mysqli_query($db, $sel1);
				$result_set = mysqli_fetch_array($temp_result, MYSQLI_ASSOC);
				$approved_status = $result_set['fab_status'];
				if ($status ==$approved_status)
				{
					$upd1 = "UPDATE next_main_matched_entry SET fabric_status=1 WHERE texture1id=$id AND batchid IS NULL AND fabric_status=0";
				}
				else
					$upd1 = "UPDATE next_main_matched_entry SET fabric_status=0 WHERE texture1id=$id AND batchid IS NULL AND fabric_status=1";
				mysqli_query($db, $upd1);
			}
			$id = str_pad($userid, 5, "0", STR_PAD_LEFT);
			error_log($timelog . " => Success: [$id] updated successfully created by [$username - System Profile Id ($id)]\n", 3, "../log/Transaction.log");
			error_log($upd_qurey . "\n", 3, "../log/Transaction.log");
		} else
		{
			echo "Data not updated Successfully!!!";
			$id = str_pad($userid, 5, "0", STR_PAD_LEFT);
			error_log($timelog . " => Error: [$id] not updated Error uploaded by [$username - System Profile Id ($id)]\n", 3, "../log/Transaction.log");
			error_log($upd_qurey . "\n", 3, "../log/Transaction.log");
		}
	}

	public function update_texture2($db)
	{
		$userid = $_SESSION ['login_id'];
		$username = $_SESSION ['user_name'];

		$texcolor = trim(addslashes($_POST["texcolor2"]));
		$textseson = trim(addslashes($_POST["textseson2"]));
		$textcat = trim(addslashes($_POST["textcat2"]));
		$status = trim(addslashes($_POST["textstatus"]));
		$old_stat_id = trim(addslashes($_POST["old_stat_id"]));
		
		$id = $_REQUEST["rowid"];

		$upd_qurey = "UPDATE nextdb.next_texturesec_lookup_table SET Status=$status, Texture_Color = '$texcolor' , Season = '$textseson' , Category = '$textcat'  WHERE id = $id ";
		$t = time();
		$timelog = date("dmYhms", $t);
		if (mysqli_query($db, $upd_qurey))
		{
			echo "Data updated Successfully!!!";
			if ($old_stat_id !=$status)
			{
				$sel1 = "SELECT a.id as fab_status FROM next_master_data_detail a, next_master_header_detail b WHERE a.headerid = b.id AND a.Description = 'Fully Approved' AND b.HeaderName ='Fabric Status'";
				$temp_result = mysqli_query($db, $sel1);
				$result_set = mysqli_fetch_array($temp_result, MYSQLI_ASSOC);
				$approved_status = $result_set['fab_status'];
				if ($status ==$approved_status)
				{
					$upd1 = "UPDATE next_main_matched_entry SET feet_color_status=1 WHERE texture2id=$id AND batchid IS NULL AND feet_color_status=0";
				}
				else
					$upd1 = "UPDATE next_main_matched_entry SET feet_color_status=0 WHERE texture2id=$id AND batchid IS NULL AND feet_color_status=1";
				mysqli_query($db, $upd1);
			}
			$id = str_pad($userid, 5, "0", STR_PAD_LEFT);
			error_log($timelog . " => Success: [$id] updated successfully created by [$username - System Profile Id ($id)]\n", 3, "../log/Transaction.log");
			error_log($upd_qurey . "\n", 3, "../log/Transaction.log");
		} else
		{
			echo "Data not updated Successfully!!!";
			$id = str_pad($userid, 5, "0", STR_PAD_LEFT);
			error_log($timelog . " => Error: [$id] not updated Error uploaded by [$username - System Profile Id ($id)]\n", 3, "../log/Transaction.log");
			error_log($upd_qurey . "\n", 3, "../log/Transaction.log");
		}
	}

	public function update_option($db)
	{

		$userid = $_SESSION ['login_id'];
		$username = $_SESSION ['user_name'];
		$category = trim(addslashes($_POST["opcat"]));
		$state = trim(addslashes($_POST["optionstate"]));
		//$mat = trim(addslashes($_POST["optionmt"]));
		//$option_code = trim(addslashes($_POST["optioncode"]));
		$angle = trim(addslashes($_POST["optionangel"]));
		$wrapcode = trim(addslashes($_POST["optionwrap"]));
		$des = trim(addslashes($_POST["optiondesc"]));
		$main = trim(addslashes($_POST["maincangle"]));
		$angle1 = trim(addslashes($_POST["_onecangle"]));
		$angle2 = trim(addslashes($_POST["_twocangle"]));
		$angle3 = trim(addslashes($_POST["_threecangle"]));
		$angle4 = trim(addslashes($_POST["_fourcangle"]));
		$angle5 = trim(addslashes($_POST["_fivecangle"]));
		$angle6 = trim(addslashes($_POST["_sixcangle"]));
		$angle7 = trim(addslashes($_POST["_sevencangle"]));
		$angle8 = trim(addslashes($_POST["_eightcangle"]));
		$angle9 = trim(addslashes($_POST["_ninecangle"]));
		$angle10 = trim(addslashes($_POST["_tencangle"]));
		$angle11 = trim(addslashes($_POST["_elevencangle"]));
		$angle12 = trim(addslashes($_POST["_twelvecangle"]));
		$angle13 = trim(addslashes($_POST["_thirteencangle"]));
		$angle14 = trim(addslashes($_POST["_forteencangle"]));
		$angle15 = trim(addslashes($_POST["_fifteencangle"]));
		$id = $_REQUEST["rowid"];

		$camera_count=0;
		if (strtolower($main) != "na" and strtolower($main) != "n/a" and strtolower($main) != "")
		{
			$camera_count = $camera_count + 1;
		}
		if (strtolower($angle1) != "na" and strtolower($angle1) != "n/a" and strtolower($angle1) != "")
		{
			$camera_count = $camera_count + 1;
		}
		if (strtolower($angle2) != "na" and strtolower($angle2) != "n/a" and strtolower($angle2) != "")
		{
			$camera_count = $camera_count + 1;
		}
		if (strtolower($angle3) != "na" and strtolower($angle3) != "n/a" and strtolower($angle3) != "")
		{
			$camera_count = $camera_count + 1;
		}
		if (strtolower($angle4) != "na" and strtolower($angle4) != "n/a" and strtolower($angle4) != "")
		{
			$camera_count = $camera_count + 1;
		}
		if (strtolower($angle5) != "na" and strtolower($angle5) != "n/a" and strtolower($angle5) != "")
		{
			$camera_count = $camera_count + 1;
		}
		if (strtolower($angle7) != "na" and strtolower($angle7) != "n/a" and strtolower($angle7) != "")
		{
			$camera_count = $camera_count + 1;
		}
		if (strtolower($angle8) != "na" and strtolower($angle8) != "n/a" and strtolower($angle8) != "")
		{
			$camera_count = $camera_count + 1;
		}
		if (strtolower($angle9) != "na" and strtolower($angle9) != "n/a" and strtolower($angle9) != "")
		{
			$camera_count = $camera_count + 1;
		}
		if (strtolower($angle10) != "na" and strtolower($angle10) != "n/a" and strtolower($angle10) != "")
		{
			$camera_count = $camera_count + 1;
		}
		if (strtolower($angle11) != "na" and strtolower($angle11) != "n/a" and strtolower($angle11) != "")
		{
			$camera_count = $camera_count + 1;
		}
		if (strtolower($angle12) != "na" and strtolower($angle12) != "n/a" and strtolower($angle12) != "")
		{
			$camera_count = $camera_count + 1;
		}
		if (strtolower($angle13) != "na" and strtolower($angle13) != "n/a" and strtolower($angle13) != "")
		{
			$camera_count = $camera_count + 1;
		}
		if (strtolower($angle14) != "na" and strtolower($angle14) != "n/a" and strtolower($angle14) != "")
		{
			$camera_count = $camera_count + 1;
		}
		if (strtolower($angle15) != "na" and strtolower($angle15) != "n/a" and strtolower($angle15) != "")
		{
			$camera_count = $camera_count + 1;
		}
		if (strtolower($angle6) != "na" and strtolower($angle6) != "n/a" and strtolower($angle6) != "")
		{
			$camera_count = $camera_count + 1;
		}
		$upd_qurey = "UPDATE nextdb.next_option_lookup_table SET Category = '$category', State = '$state' , WrapCode_Option = '$wrapcode' , AngleSet = '$angle' ,  Description = '$des' , Main = '$main' , _1 = '$angle1' , _2 = '$angle2' , _3 = '$angle3' , _4 = '$angle4' , _5 = '$angle5' , _6 = '$angle6' , _7 = '$angle7' , _8 = '$angle8' , _9 = '$angle9' , _10 = '$angle10' , _11 = '$angle11' , _12 = '$angle12' ,_13 = '$angle13' , _14 = '$angle14' , _15 = '$angle15', camera_count=$camera_count WHERE id = $id";
		$t = time();
		$timelog = date("dmYhms", $t);
		mysqli_query($db, $upd_qurey);
		echo "<div class='alert alert-success'>
			<strong>$des</strong> Successfully inserted.
			</div>";
		
	}
	public function update_range($db)
	{
		$userid = $_SESSION ['login_id'];
		$username = $_SESSION ['user_name'];

		$rengedesc = trim(addslashes($_POST["rengedesc"]));
		$rangebead = trim(addslashes($_POST["rangebead"]));
		$rangeangle = trim(addslashes($_POST["rangeangle"]));
		$rangecat = trim(addslashes($_POST["rangecat"]));
		$mat  = trim(addslashes($_POST["range_mt"]));
		$id = $_REQUEST["rowid"];
		
		$sel_qry = "SELECT id FROM next_range_lookup_table WHERE Range_desc='$rengedesc' and id !=$id";
		mysqli_query($db, $sel_qry);
		$dup_count = mysqli_affected_rows($db);
		
		if ($dup_count==0)
		{
			$upd_qurey = "UPDATE next_range_lookup_table SET Range_desc = '$rengedesc', material_type='$mat', Bead_Option = '$rangebead' , Angle_set_Option = '$rangeangle' , Category = '$rangecat'  WHERE id = $id ";
			$t = time();
			$timelog = date("dmYhms", $t);
			if (mysqli_query($db, $upd_qurey))
			{
				echo "<div class='alert alert-success'>
					<strong>$rengedesc</strong> Successfully inserted.
					</div>";
				$id = str_pad($userid, 5, "0", STR_PAD_LEFT);
				error_log($timelog . " => Success: [$id] updated successfully created by [$username - System Profile Id ($id)]\n", 3, "../log/Transaction.log");
				error_log($upd_qurey . "\n", 3, "../log/Transaction.log");
			} else
			{
				echo "Data not updated Successfully!!!";
				$id = str_pad($userid, 5, "0", STR_PAD_LEFT);
				error_log($timelog . " => Error: [$id] not updated Error uploaded by [$username - System Profile Id ($id)]\n", 3, "../log/Transaction.log");
				error_log($upd_qurey . "\n", 3, "../log/Transaction.log");
			}
		}
		else
		{
			echo "<div class='alert alert-danger'>
			<strong>$rengedesc</strong> Already Exists!!!.
			</div>";
		}
	}
}
?>
