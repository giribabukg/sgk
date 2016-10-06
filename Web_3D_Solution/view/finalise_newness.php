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

$process = (string) filter_input(INPUT_POST, 'process');
if ($process == "upd_text1")
{
	$dataset = (string) filter_input(INPUT_POST, 'dataset');
	$dataarray = explode("|||||", $dataset);
	$phase_array = array();
	foreach ($dataarray as $value)
	{
		//echo $value."<br>";
		list($tempid, $wrapid, $awrapid1, $awrapid2, $awrapid3, $fabdesign, $fabstatus, $texcommen) = explode("$$$$$", $value);
		//echo $tempid . "<br>";
		$select_qry = "SELECT b.PhaseId,SeasonId,categoryId,swatch_item_number,swatch_item_fabric,swatch_item_fabric_colour,mat_type FROM next_main_upload_temp a, next_main_phase_table b WHERE a.phaseid=b.PhaseId AND a.id=$tempid";
		$select_qry1 = mysqli_query($db, $select_qry);
		$res_set = mysqli_fetch_array($select_qry1, MYSQLI_ASSOC);
		$phaseid = $res_set["PhaseId"];
		$item_number = $res_set["swatch_item_number"];
		$item_fab = $res_set["swatch_item_fabric"];
		$item_fab_color = $res_set["swatch_item_fabric_colour"];
		$mat_type = $res_set["mat_type"];
		$textseson = $res_set["SeasonId"];
		$textcat = $res_set["categoryId"];
		if (!in_array($res_set["PhaseId"], $phase_array))
			$phase_array[] = $phaseid . "__" . $textseson . "__" . $textcat;

		$dup_qry = "SELECT COUNT(id) as text1 FROM next_texture_lookup_table WHERE Texture_Item_No='$item_number' and Category='".$textcat."'";
		$dup_qry = mysqli_query($db, $dup_qry);
		$dup_qry_row = mysqli_fetch_array($dup_qry, MYSQLI_ASSOC);
		$text1_count = $dup_qry_row["text1"];
		if ($text1_count == "0")
		{
			$sql_insert_comment = "INSERT INTO next_texture_lookup_table(Texture_Item_No,Texture_Name,Texture_Color,StdWrapCode,AltWrapCode1,
			AltWrapCode2,AltWrapCode3,FabricDesign,MaterialType,Status,Season,Category,AddedBy) VALUES
			('$item_number','$item_fab','$item_fab_color','$wrapid','$awrapid1','$awrapid2','$awrapid3'
			,'$fabdesign','$mat_type','$fabstatus','$textseson','$textcat','$personId_session')";
			mysqli_query($db, $sql_insert_comment);

			$sql_id = mysqli_query($db, " select id from next_texture_lookup_table ORDER BY id DESC LIMIT 1");
			$row_id = mysqli_fetch_array($sql_id, MYSQLI_ASSOC);
			$id_texture1 = $row_id['id'];

			if ($texcommen != "")
			{
				$newid = "TexO" . $id_texture1;
				$sql_insert_comment1 = "INSERT INTO next_trans_cmtt_table(Comments,TransId,CommentedBy) VALUES ('$texcommen','$newid',$personId_session)";
				mysqli_query($db, $sql_insert_comment1);
			}
		}
		$upd_qry = "update next_main_upload_temp set item_number_error=0,need_to_run=1 where swatch_item_number='$item_number' and item_number_error=1";
		mysqli_query($db, $upd_qry);
	}
	foreach ($phase_array as $val)
	{
		list($tid, $phaseseason, $phasecategoty) = explode("__", $val);
		$res = $db->query("CALL testbrief('$tid',$phaseseason,$phasecategoty,@out)");
		$res = $db->query("CALL insertrange('$tid',@out)");
	}
	echo "<div class='alert alert-success'>
			<strong>Fabric 1 </strong> Successfully inserted.
			</div>";
} else if ($process == "upd_text2")
{
	$dataset = (string) filter_input(INPUT_POST, 'dataset');
	$dataarray = explode("|||||", $dataset);
	$phase_array = array();
	foreach ($dataarray as $value)
	{
		//echo $value."<br>";
		list($tempid, $fabstatus, $texcommen) = explode("$$$$$", $value);
		//echo $tempid . "<br>";
		$select_qry = "SELECT b.PhaseId,SeasonId,categoryId,foot_colour FROM next_main_upload_temp a, next_main_phase_table b WHERE a.phaseid=b.PhaseId AND a.id=$tempid";
		$select_qry1 = mysqli_query($db, $select_qry);
		$res_set = mysqli_fetch_array($select_qry1, MYSQLI_ASSOC);
		$phaseid = $res_set["PhaseId"];
		$item_foot_color = $res_set["foot_colour"];
		$textseson = $res_set["SeasonId"];
		$textcat = $res_set["categoryId"];
		if (!in_array($res_set["PhaseId"], $phase_array))
			$phase_array[] = $phaseid . "__" . $textseson . "__" . $textcat;

		$dup_qry = "SELECT COUNT(id) as text1 FROM next_texturesec_lookup_table WHERE Texture_Color='$item_foot_color' and Category='".$textcat."'";
		$dup_qry = mysqli_query($db, $dup_qry);
		$dup_qry_row = mysqli_fetch_array($dup_qry, MYSQLI_ASSOC);
		$text1_count = $dup_qry_row["text1"];
		if ($text1_count == "0")
		{
			$sql_insert_comment = "INSERT INTO next_texturesec_lookup_table(Texture_Color,Status,Season,Category,AddedBy) VALUES
			('$item_foot_color',$fabstatus,$textseson,$textcat,'$personId_session')";
			mysqli_query($db, $sql_insert_comment);

			$sql_id = mysqli_query($db, "select id from next_texturesec_lookup_table ORDER BY id DESC LIMIT 1");
			$row_id = mysqli_fetch_array($sql_id, MYSQLI_ASSOC);
			$id_texture1 = $row_id['id'];

			$strtest = "TIN2-" . str_pad($id_texture1, 3, "0", STR_PAD_LEFT);
			$upd_qry = "update next_texturesec_lookup_table set Texture_Item_No='$strtest' where id=$id_texture1";
			mysqli_query($db, $upd_qry);

			if ($texcommen)
			{
				$newid = "TexS" . $id_texture1;
				//echo $newid;
				$sql_insert_comment1 = "INSERT INTO next_trans_cmtt_table(Comments,TransId,CommentedBy) VALUES ('$texcommen','$newid',$personId_session)";
				mysqli_query($db, $sql_insert_comment1);
			}
		}
		$upd_qry = "update next_main_upload_temp set foot_color_error=0, need_to_run=1 where foot_colour='$item_foot_color' and foot_color_error=1";
		mysqli_query($db, $upd_qry);
	}
	foreach ($phase_array as $val)
	{
		list($tid, $phaseseason, $phasecategoty) = explode("__", $val);
		$res = $db->query("CALL testbrief('$tid',$phaseseason,$phasecategoty,@out)");
		$res = $db->query("CALL insertrange('$tid',@out)");
	}
	echo "<div class='alert alert-success'>
			<strong>Foot colour</strong> Successfully inserted.
			</div>";
} else if ($process == "upd_range")
{
	$dataset = (string) filter_input(INPUT_POST, 'dataset');
	$dataarray = explode("|||||", $dataset);
	$phase_array = array();
	foreach ($dataarray as $value)
	{
		//echo $value."<br>";
		list($tempid, $bead, $angleset, $texcommen) = explode("$$$$$", $value);
		//echo $tempid . "<br>";
		$select_qry = "SELECT b.PhaseId,SeasonId,categoryId,sofa_range,mat_type FROM next_main_upload_temp a, next_main_phase_table b WHERE a.phaseid=b.PhaseId AND a.id=$tempid";
		$select_qry1 = mysqli_query($db, $select_qry);
		$res_set = mysqli_fetch_array($select_qry1, MYSQLI_ASSOC);
		$phaseid = $res_set["PhaseId"];
		$sofa_range = $res_set["sofa_range"];
		$mat_type = $res_set["mat_type"];
		$textseson = $res_set["SeasonId"];
		$textcat = $res_set["categoryId"];
		if (!in_array($res_set["PhaseId"], $phase_array))
			$phase_array[] = $phaseid . "__" . $textseson . "__" . $textcat;

		$dup_qry = "SELECT COUNT(id) as text1 FROM next_range_lookup_table WHERE Range_desc='$sofa_range' and Category='".$textcat."'";
		$dup_qry = mysqli_query($db, $dup_qry);
		$dup_qry_row = mysqli_fetch_array($dup_qry, MYSQLI_ASSOC);
		$text1_count = $dup_qry_row["text1"];
		if ($text1_count == "0")
		{
			$sql_insert_comment = "INSERT INTO next_range_lookup_table(Range_desc,Bead_Option,Angle_Set_Option,material_type,Category,AddedBy) VALUES
			('$sofa_range','$bead','$angleset','$mat_type','$textcat','$personId_session')";
			mysqli_query($db, $sql_insert_comment);

			$sql_id = mysqli_query($db, "select id from next_range_lookup_table ORDER BY id DESC LIMIT 1");
			$row_id = mysqli_fetch_array($sql_id, MYSQLI_ASSOC);
			$id_texture1 = $row_id['id'];

			$strtest = "RA" . str_pad($id_texture1, 5, "0", STR_PAD_LEFT);
			$upd_qry = "update next_range_lookup_table set range_id='$strtest' where id=$id_texture1";
			mysqli_query($db, $upd_qry);

			if ($texcommen)
			{
				$newid = "Ran" . $id_texture1;
				//echo $newid;
				$sql_insert_comment1 = "INSERT INTO next_trans_cmtt_table(Comments,TransId,CommentedBy) VALUES ('$texcommen','$newid',$personId_session)";
				mysqli_query($db, $sql_insert_comment1);
			}
		}
		$upd_qry = "update next_main_upload_temp set range_error=0, need_to_run=1 where sofa_range='$sofa_range' and range_error=1";
		mysqli_query($db, $upd_qry);
	}
	foreach ($phase_array as $val)
	{
		//echo "here";
		list($tid, $phaseseason, $phasecategoty) = explode("__", $val);
		$res = $db->query("CALL testbrief('$tid',$phaseseason,$phasecategoty,@out)");
		$res = $db->query("CALL insertrange('$tid',@out)");
	}
	echo "<div class='alert alert-success'>
			<strong>Range</strong> Successfully inserted.
			</div>";
} else if ($process == "upd_option")
{
	$dataset = (string) filter_input(INPUT_POST, 'dataset');
	$dataarray = explode("|||||", $dataset);
	$phase_array = array();
	foreach ($dataarray as $value)
	{
		//echo $value."<br>";
		list($tempid, $state, $wrapid, $main_angle, $cam1, $cam2, $cam3, $cam4, $cam5, $cam6, $cam7, $cam8, $cam9, $cam10, $cam11, $cam12, $cam13, $cam14, $cam15, $texcommen) = array_map('trim', explode("$$$$$", $value));
		//echo $tempid . "<br>";
		$camera_count = 0;
		if (strtolower($main_angle) != "na" and strtolower($main_angle) != "n/a" and strtolower($main_angle) != "")
		{
			$camera_count = $camera_count + 1;
		}
		if (strtolower($cam1) != "na" and strtolower($cam1) != "n/a" and strtolower($cam1) != "")
		{
			$camera_count = $camera_count + 1;
		}
		if (strtolower($cam2) != "na" and strtolower($cam2) != "n/a" and strtolower($cam2) != "")
		{
			$camera_count = $camera_count + 1;
		}
		if (strtolower($cam3) != "na" and strtolower($cam3) != "n/a" and strtolower($cam3) != "")
		{
			$camera_count = $camera_count + 1;
		}
		if (strtolower($cam4) != "na" and strtolower($cam4) != "n/a" and strtolower($cam4) != "")
		{
			$camera_count = $camera_count + 1;
		}
		if (strtolower($cam5) != "na" and strtolower($cam6) != "n/a" and strtolower($cam6) != "")
		{
			$camera_count = $camera_count + 1;
		}
		if (strtolower($cam7) != "na" and strtolower($cam7) != "n/a" and strtolower($cam7) != "")
		{
			$camera_count = $camera_count + 1;
		}
		if (strtolower($cam8) != "na" and strtolower($cam8) != "n/a" and strtolower($cam8) != "")
		{
			$camera_count = $camera_count + 1;
		}
		if (strtolower($cam9) != "na" and strtolower($cam9) != "n/a" and strtolower($cam9) != "")
		{
			$camera_count = $camera_count + 1;
		}
		if (strtolower($cam10) != "na" and strtolower($cam10) != "n/a" and strtolower($cam10) != "")
		{
			$camera_count = $camera_count + 1;
		}
		if (strtolower($cam11) != "na" and strtolower($cam11) != "n/a" and strtolower($cam11) != "")
		{
			$camera_count = $camera_count + 1;
		}
		if (strtolower($cam12) != "na" and strtolower($cam12) != "n/a" and strtolower($cam12) != "")
		{
			$camera_count = $camera_count + 1;
		}
		if (strtolower($cam13) != "na" and strtolower($cam13) != "n/a" and strtolower($cam13) != "")
		{
			$camera_count = $camera_count + 1;
		}
		if (strtolower($cam14) != "na" and strtolower($cam14) != "n/a" and strtolower($cam14) != "")
		{
			$camera_count = $camera_count + 1;
		}
		if (strtolower($cam15) != "na" and strtolower($cam15) != "n/a" and strtolower($cam15) != "")
		{
			$camera_count = $camera_count + 1;
		}
		if (strtolower($cam5) != "na" and strtolower($cam5) != "n/a" and strtolower($cam5) != "")
		{
			$camera_count = $camera_count + 1;
		}
		$select_qry = "SELECT b.PhaseId,SeasonId,categoryId,size_descrption,angle_set FROM next_main_upload_temp a, next_main_phase_table b WHERE a.phaseid=b.PhaseId AND a.id=$tempid";
		$select_qry1 = mysqli_query($db, $select_qry);
		$res_set = mysqli_fetch_array($select_qry1, MYSQLI_ASSOC);
		$phaseid = $res_set["PhaseId"];
		$size_descrption = $res_set["size_descrption"];
		$angle_set = $res_set["angle_set"];
		$textseson = $res_set["SeasonId"];
		$textcat = $res_set["categoryId"];
		if (!in_array($res_set["PhaseId"], $phase_array))
			$phase_array[] = $phaseid . "__" . $textseson . "__" . $textcat;

		$dup_qry = "SELECT COUNT(id) as text1 FROM next_option_lookup_table WHERE Description='$size_descrption' and State=$state and AngleSet=$angle_set";
		$dup_qry = mysqli_query($db, $dup_qry);
		$dup_qry_row = mysqli_fetch_array($dup_qry, MYSQLI_ASSOC);
		$text1_count = $dup_qry_row["text1"];
		if ($text1_count == "0")
		{
			$sql_insert_comment = "INSERT INTO next_option_lookup_table(Category,State,WrapCode_Option,AngleSet,Description,Main,_1,_2,_3,_4,_5,_6,_7,_8,_9,_10,_11,_12,_13,_14, _15, AddedBy,camera_count) "
					. "VALUES('$textcat','$state','$wrapid','$angle_set','$size_descrption','$main_angle','$cam1','$cam2','$cam3','$cam4','$cam5','$cam6','$cam7',"
					. "'$cam8','$cam9','$cam10','$cam11','$cam12','$cam13','$cam14','$cam15','$personId_session',$camera_count)";
			mysqli_query($db, $sql_insert_comment);
			$s = " select id from next_option_lookup_table ORDER BY id DESC LIMIT 1";
			$sql_id = mysqli_query($db, $s);
			$row_id = mysqli_fetch_array($sql_id, MYSQLI_ASSOC);
			$id_texture1 = $row_id['id'];

			$strtest = "S" . str_pad($id_texture1, 3, "0", STR_PAD_LEFT);
			$upd_qry = "update next_option_lookup_table set option_sgkid='$strtest' where id=$id_texture1";
			mysqli_query($db, $upd_qry);

			if ($texcommen != "")
			{
				$newid = "OptC" . $id_texture1;
				$sql_insert_comment1 = "INSERT INTO next_trans_cmtt_table(Comments,TransId,CommentedBy) VALUES ('$texcommen','$newid',$personId_session)";
				mysqli_query($db, $sql_insert_comment1);
			}
		}
		$upd_qry = "update next_main_upload_temp set option_code_error=0,need_to_run=1 where size_descrption='$size_descrption' and angle_set=$angle_set and option_code_error=1";
		mysqli_query($db, $upd_qry);
	}
	foreach ($phase_array as $val)
	{
		list($tid, $phaseseason, $phasecategoty) = explode("__", $val);
		$res = $db->query("CALL testbrief('$tid',$phaseseason,$phasecategoty,@out)");
		$res = $db->query("CALL insertrange('$tid',@out)");
	}

	echo "<div class='alert alert-success'>
	<strong>Option</strong> Successfully inserted.
	</div>";
} else if ($process == "upd_detail")
{
	$dataset = (string) filter_input(INPUT_POST, 'dataset');
	$dataarray = explode("|||||", $dataset);
	$phase_array = array();
	foreach ($dataarray as $value)
	{
		//echo $value."<br>";
		list($tempid, $name) = explode("$$$$$", $value);
		$name = trim(addslashes($name));
		//echo $tempid . "<br>";
		$select_qry = "SELECT b.PhaseId,SeasonId,categoryId,bed_detail FROM next_main_upload_temp a, next_main_phase_table b WHERE a.phaseid=b.PhaseId AND a.id=$tempid";
		$select_qry1 = mysqli_query($db, $select_qry);
		$res_set = mysqli_fetch_array($select_qry1, MYSQLI_ASSOC);
		$phaseid = $res_set["PhaseId"];
		$bed_detail = $res_set["bed_detail"];
		$textseson = $res_set["SeasonId"];
		$textcat = $res_set["categoryId"];
		if (!in_array($res_set["PhaseId"], $phase_array))
			$phase_array[] = $phaseid . "__" . $textseson . "__" . $textcat;

		$qry = "SELECT id FROM  next_master_header_detail WHERE HeaderName = 'Detail Code'";
		$id_qry = mysqli_query($db, $qry);
		$id_qry_row = mysqli_fetch_array($id_qry, MYSQLI_ASSOC);
		$headerid = $id_qry_row["id"];

		$dup_qry = "SELECT count(id) as text1 FROM next_master_data_detail WHERE HeaderId=$headerid AND Description = '$bed_detail'";
		$dup_qry = mysqli_query($db, $dup_qry);
		$dup_qry_row = mysqli_fetch_array($dup_qry, MYSQLI_ASSOC);
		$text1_count = $dup_qry_row["text1"];
		if ($text1_count == "0")
		{
			$sql_insert_comment = "INSERT INTO next_master_data_detail(Dataname,Description,headerid,createdby) VALUES 
			('$name','$bed_detail','$headerid','$personId_session')";
			mysqli_query($db, $sql_insert_comment);
		}
		$upd_qry = "update next_main_upload_temp set detail_code_error=0, need_to_run=1 where bed_detail='$bed_detail' and detail_code_error=1";
		mysqli_query($db, $upd_qry);
	}
	foreach ($phase_array as $val)
	{
		list($tid, $phaseseason, $phasecategoty) = explode("__", $val);
		$res = $db->query("CALL testbrief('$tid',$phaseseason,$phasecategoty,@out)");
		$res = $db->query("CALL insertrange('$tid',@out)");
	}
	echo "<div class='alert alert-success'>
			<strong>Detail Code</strong> Successfully inserted.
			</div>";
} else if ($process == "upd_foot_type")
{
	$dataset = (string) filter_input(INPUT_POST, 'dataset');
	$dataarray = explode("|||||", $dataset);
	$phase_array = array();
	foreach ($dataarray as $value)
	{
		//echo $value."<br>";
		list($tempid, $name) = explode("$$$$$", $value);
		$name = trim(addslashes($name));
		//echo $tempid . "<br>";
		$select_qry = "SELECT b.PhaseId,SeasonId,categoryId,foot_type FROM next_main_upload_temp a, next_main_phase_table b WHERE a.phaseid=b.PhaseId AND a.id=$tempid";
		$select_qry1 = mysqli_query($db, $select_qry);
		$res_set = mysqli_fetch_array($select_qry1, MYSQLI_ASSOC);
		$phaseid = $res_set["PhaseId"];
		$foot_type = $res_set["foot_type"];
		$textseson = $res_set["SeasonId"];
		$textcat = $res_set["categoryId"];
		if (!in_array($res_set["PhaseId"], $phase_array))
			$phase_array[] = $phaseid . "__" . $textseson . "__" . $textcat;

		$qry = "SELECT id FROM  next_master_header_detail WHERE HeaderName = 'Foot Shape LUT'";
		$id_qry = mysqli_query($db, $qry);
		$id_qry_row = mysqli_fetch_array($id_qry, MYSQLI_ASSOC);
		$headerid = $id_qry_row["id"];

		$dup_qry = "SELECT count(id) as text1 FROM next_master_data_detail WHERE HeaderId=$headerid AND Description = '$foot_type'";
		$dup_qry = mysqli_query($db, $dup_qry);
		$dup_qry_row = mysqli_fetch_array($dup_qry, MYSQLI_ASSOC);
		$text1_count = $dup_qry_row["text1"];
		if ($text1_count == "0")
		{
			$sql_insert_comment = "INSERT INTO next_master_data_detail(Dataname,Description,headerid,createdby) VALUES 
			('$name','$foot_type','$headerid','$personId_session')";
			mysqli_query($db, $sql_insert_comment);
		}
		$upd_qry = "update next_main_upload_temp set foot_type_error=0, need_to_run=1 where foot_type='$foot_type' and foot_type_error=1";
		mysqli_query($db, $upd_qry);
	}
	foreach ($phase_array as $val)
	{
		list($tid, $phaseseason, $phasecategoty) = explode("__", $val);
		$res = $db->query("CALL testbrief('$tid',$phaseseason,$phasecategoty,@out)");
		$res = $db->query("CALL insertrange('$tid',@out)");
	}
	echo "<div class='alert alert-success'>
			<strong>Foot Type</strong> Successfully inserted.
			</div>";
} else if ($process == "upd_model")
{
	$dataset = (string) filter_input(INPUT_POST, 'dataset');
	$dataarray = explode("|||||", $dataset);
	$phase_array = array();
	foreach ($dataarray as $value)
	{
		//echo $value."<br>";
		list($mainid, $tempid, $status, $texcommen) = explode("$$$$$", $value);
		//echo $tempid . "<br>";
		$select_qry = "SELECT b.PhaseId,SeasonId,categoryId FROM next_main_upload_temp a, next_main_phase_table b WHERE a.phaseid=b.PhaseId AND a.id=$tempid";
		$select_qry1 = mysqli_query($db, $select_qry);
		$res_set = mysqli_fetch_array($select_qry1, MYSQLI_ASSOC);

		$phaseid = $res_set["PhaseId"];
		$textseson = $res_set["SeasonId"];
		$textcat = $res_set["categoryId"];
		if (!in_array($res_set["PhaseId"], $phase_array))
			$phase_array[] = $phaseid . "__" . $textseson . "__" . $textcat;

		$select_qry11 = "SELECT source_model,state_code,option_id,range_id FROM next_main_matched_entry WHERE tid=$mainid";
		$select_qry111 = mysqli_query($db, $select_qry11);
		$res_set1 = mysqli_fetch_array($select_qry111, MYSQLI_ASSOC);
		$source_model = $res_set1["source_model"];
		$stateid = $res_set1["state_code"];
		$optid = $res_set1["option_id"];
		$rangedbid = $res_set1["range_id"];

		$dup_qry = "SELECT COUNT(model_id) as text1 FROM model_lookup WHERE model_name='$source_model'";
		$dup_qry = mysqli_query($db, $dup_qry);
		$dup_qry_row = mysqli_fetch_array($dup_qry, MYSQLI_ASSOC);
		$text1_count = $dup_qry_row["text1"];
		if ($text1_count == "0")
		{
			list($range_code, $opt_code, $state, $detail_code, $foot_shape, $wrap_code) = explode("_", $source_model);

			$selectdetail = "SELECT a.id as detail_code FROM next_master_data_detail a, next_master_header_detail b WHERE a.headerid = b.id AND a.DataName = '$detail_code' AND b.HeaderName = 'Detail Code'";
			$selectdetail_row = mysqli_fetch_array(mysqli_query($db, $selectdetail), MYSQLI_ASSOC);
			$detailid = $selectdetail_row["detail_code"];

			$selectfoot = "SELECT a.id as foot_shape_code FROM next_master_data_detail a, next_master_header_detail b WHERE a.headerid = b.id AND a.DataName = '$foot_shape' AND b.HeaderName = 'Foot Shape LUT'";
			$selectfoot_row = mysqli_fetch_array(mysqli_query($db, $selectfoot), MYSQLI_ASSOC);
			$footid = $selectfoot_row["foot_shape_code"];

			$selectwrap = "SELECT a.id as wrap_id FROM next_master_data_detail a, next_master_header_detail b WHERE a.headerid = b.id AND a.DataName = '$wrap_code' AND b.HeaderName = 'Wrapcode LUT'";
			$selectwrap_row = mysqli_fetch_array(mysqli_query($db, $selectwrap), MYSQLI_ASSOC);
			$wrap_id = $selectwrap_row["wrap_id"];

			$insert_qry = "INSERT INTO model_lookup (model_name, mod_category, mod_range, mod_option, mod_state, mod_detailcode, mod_footshape, mod_wrapcode, mod_status, mod_season, added_date, approved_date, approved_by)
						VALUES ('$source_model', $textcat, $rangedbid, $optid, $stateid, $detailid, $footid, $wrap_id, $status, $textseson, now(), now(), $personId_session);";
			mysqli_query($db, $insert_qry);

			$sql_id = mysqli_query($db, "select model_id from model_lookup ORDER BY model_id DESC LIMIT 1");
			$row_id = mysqli_fetch_array($sql_id, MYSQLI_ASSOC);
			$id_texture1 = $row_id['model_id'];

			if ($texcommen != "")
			{
				$newid = "Model" . $id_texture1;
				$sql_insert_comment1 = "INSERT INTO next_trans_cmtt_table(Comments,TransId,CommentedBy) VALUES ('$texcommen','$newid',$personId_session)";
				mysqli_query($db, $sql_insert_comment1);
			}
		}
		$select_qry = "SELECT temp_id FROM next_main_matched_entry WHERE source_model='$source_model'  and matched_status=0";
		$data_master = mysqli_query($db, $select_qry);
		while ($data_array = mysqli_fetch_array($data_master, MYSQLI_ASSOC))
		{
			$temp_array[] = $data_array["temp_id"];
		}
		$tarray = array_unique($temp_array);
		$ids = implode(",", $tarray);
		
		$upd_qry = "UPDATE next_main_upload_temp SET need_to_run=1 WHERE id IN ($ids)";
		mysqli_query($db, $upd_qry);

		$upd_qry = "update next_main_matched_entry set matched_status=1, temp='' where source_model='$source_model' and matched_status=0";
		mysqli_query($db, $upd_qry);
		
			echo "<div class='alert alert-success'>
			<strong>$source_model</strong> Successfully inserted.
			</div>";
	}
	foreach ($phase_array as $val)
	{
		list($tid, $phaseseason, $phasecategoty) = explode("__", $val);
		$res = $db->query("CALL testbrief('$tid',$phaseseason,$phasecategoty,@out)");
		$res = $db->query("CALL insertrange('$tid',@out)");
	}
	echo "<div class='alert alert-success'>
			<strong>Models</strong> Successfully inserted.
			</div>";
}
?>
<?php  if(!empty($_REQUEST) && isset($_REQUEST['msg'])){ 
	$msgg = '';
	if($_REQUEST['msg'] == 1){
		$msgg = 'Deleted successfully.';
	} else {
		$msgg = 'Cannot delete the records successfully.';
	}
?>
	<div class="alert alert-info ">
	    <a href="#" class="close" data-dismiss="alert">&times;</a>
	    <strong>Message : </strong><?php echo $msgg; ?>
	</div>
<?php } ?>
<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Finalize Newness</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">

			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="col-lg-4">
					<div class="dataTable_wrapper">
						<table class="table table-striped table-bordered table-hover" id="dataTables-examples">
							<thead>
								<tr>
									<th>S No</th>
									<th>LUT</th>
									<th>No. Items</th>
									<th>No. Feeds</th>

								</tr>
							</thead>
							<tbody>
								<?php
								$select_qry = "SELECT count(id) as tot_count FROM next_main_upload_temp WHERE total_error_count>0";
								$select_qry1 = mysqli_query($db, $select_qry);
								$select_tot_count_row = mysqli_fetch_array($select_qry1, MYSQLI_ASSOC);
								$no_of_rows = $select_tot_count_row["tot_count"];
								if ($no_of_rows > 0)
								{
									$counter = 0;
									$query1 = "SELECT swatch_item_number FROM next_main_upload_temp WHERE total_error_count>0 AND item_number_error=1 GROUP BY swatch_item_number";
									$query1 = mysqli_query($db, $query1);
									$fab_error_count = mysqli_affected_rows($db);
									$feed_count = 0;
									if ($fab_error_count > 0)
									{
										$query2 = "SELECT count(swatch_item_number) as rec_count FROM next_main_upload_temp WHERE total_error_count>0 AND item_number_error=1";
										$query2 = mysqli_query($db, $query2);
										$res_set = mysqli_fetch_array($query2, MYSQLI_ASSOC);
										$feed_count = $res_set["rec_count"];
										$counter++;
										?>
										<tr style="font-size: 12px;">
											<td><?PHP echo $counter; ?></td>
											<td><b><a href="javascript:void(0);" onclick="link_click('fabric1')">Fabric 1</b></td>
											<td><?php echo $fab_error_count; ?></td>
											<td><?php echo $feed_count; ?></td>
										</tr>
										<?PHP
									}
									$feed_count = 0;
									$query1 = "SELECT foot_colour FROM next_main_upload_temp WHERE total_error_count>0 AND foot_color_error=1 GROUP BY foot_colour";
									$query1 = mysqli_query($db, $query1);
									$foot_color_count = mysqli_affected_rows($db);


									if ($foot_color_count > 0)
									{
										$query2 = "SELECT count(foot_colour) as rec_count FROM next_main_upload_temp WHERE total_error_count>0 AND foot_color_error=1";
										$query2 = mysqli_query($db, $query2);
										$res_set = mysqli_fetch_array($query2, MYSQLI_ASSOC);
										$feed_count = $res_set["rec_count"];

										$query2 = "SELECT count(foot_colour) as rec_count FROM next_main_upload_temp WHERE total_error_count>0 AND foot_color_error=1";
										$query2 = mysqli_query($db, $query2);
										$res_set = mysqli_fetch_array($query2, MYSQLI_ASSOC);
										$feed_count = $res_set["rec_count"];
										$counter++;
										?>
										<tr style="font-size: 12px;">
											<td><?PHP echo $counter; ?></td>
											<td><b><a href="javascript:void(0);" onclick="link_click('fabric2')">Fabric 2</b></td>
											<td><?php echo $foot_color_count; ?></td>
											<td><?php echo $feed_count; ?></td>
										</tr>
										<?PHP
									}
									$query1 = "SELECT sofa_range FROM next_main_upload_temp WHERE total_error_count>0 AND range_error=1 GROUP BY sofa_range";
									$query1 = mysqli_query($db, $query1);
									$sofa_range_error_count = mysqli_affected_rows($db);
									$feed_count = 0;
									if ($sofa_range_error_count > 0)
									{
										$query2 = "SELECT count(sofa_range) as rec_count FROM next_main_upload_temp WHERE total_error_count>0 AND range_error=1";
										$query2 = mysqli_query($db, $query2);
										$res_set = mysqli_fetch_array($query2, MYSQLI_ASSOC);
										$feed_count = $res_set["rec_count"];

										$counter++;
										?>
										<tr style="font-size: 12px;">
											<td><?PHP echo $counter; ?></td>
											<td><b><a href="javascript:void(0);" onclick="link_click('range')">Range</b></td>
											<td><?php echo $sofa_range_error_count; ?></td>
											<td><?php echo $feed_count; ?></td>
										</tr>
										<?PHP
									}
									$query1 = "SELECT size_descrption FROM next_main_upload_temp WHERE total_error_count>0 AND option_code_error=1 GROUP BY size_descrption";
									$query1 = mysqli_query($db, $query1);
									$size_error_count = mysqli_affected_rows($db);
									$feed_count = 0;
									if ($size_error_count > 0)
									{
										$query2 = "SELECT count(size_descrption) as rec_count FROM next_main_upload_temp WHERE total_error_count>0 AND option_code_error=1";
										$query2 = mysqli_query($db, $query2);
										$res_set = mysqli_fetch_array($query2, MYSQLI_ASSOC);
										$feed_count = $res_set["rec_count"];
										$counter++;
										?>
										<tr style="font-size: 12px;">
											<td><?PHP echo $counter; ?></td>
											<td><b><a href="javascript:void(0);" onclick="link_click('option')">Option</b></td>
											<td><?php echo $size_error_count; ?></td>
											<td><?php echo $feed_count; ?></td>
										</tr>
										<?PHP
									}
									$query1 = "select * from next_main_matched_entry where matched_status=0 GROUP BY source_model";
									$query1 = mysqli_query($db, $query1);
									$model_error_count = mysqli_affected_rows($db);
									$feed_count = 0;
									if ($model_error_count > 0)
									{
										$query2 = "SELECT count(source_model) as rec_count FROM next_main_matched_entry WHERE matched_status=0";
										$query2 = mysqli_query($db, $query2);
										$res_set = mysqli_fetch_array($query2, MYSQLI_ASSOC);
										$feed_count = $res_set["rec_count"];
										$counter++;
										?>
										<tr style="font-size: 12px;">
											<td><?PHP echo $counter; ?></td>
											<td><b><a href="javascript:void(0);" onclick="link_click('model')">Model</b></td>
											<td><?php echo $model_error_count; ?></td>
											<td><?php echo $feed_count; ?></td>
										</tr>
										<?PHP
									}
									$query1 = "SELECT bed_detail FROM next_main_upload_temp WHERE total_error_count>0 AND detail_code_error=1 GROUP BY bed_detail";
									$query1 = mysqli_query($db, $query1);
									$detail_error_count = mysqli_affected_rows($db);
									$feed_count = 0;
									if ($detail_error_count > 0)
									{
										$query2 = "SELECT count(bed_detail) as rec_count FROM next_main_upload_temp WHERE total_error_count>0 AND detail_code_error=1";
										$query2 = mysqli_query($db, $query2);
										$res_set = mysqli_fetch_array($query2, MYSQLI_ASSOC);
										$feed_count = $res_set["rec_count"];
										$counter++;
										?>
										<tr style="font-size: 12px;">
											<td><?PHP echo $counter; ?></td>
											<td><b><a href="javascript:void(0);" onclick="link_click('detail_code')">Detail Code</b></td>
											<td><?php echo $detail_error_count; ?></td>
											<td><?php echo $feed_count; ?></td>
										</tr>
										<?PHP
									}
									$query1 = "SELECT foot_type FROM next_main_upload_temp WHERE total_error_count>0 AND foot_type_error=1 GROUP BY foot_type";
									$query1 = mysqli_query($db, $query1);
									$foot_type_error_count = mysqli_affected_rows($db);
									$feed_count = 0;
									if ($foot_type_error_count > 0)
									{
										$query2 = "SELECT count(foot_type) as rec_count FROM next_main_upload_temp WHERE total_error_count>0 AND foot_type_error=1";
										$query2 = mysqli_query($db, $query2);
										$res_set = mysqli_fetch_array($query2, MYSQLI_ASSOC);
										$feed_count = $res_set["rec_count"];
										$counter++;
										?>
										<tr style="font-size: 12px;">
											<td><?PHP echo $counter; ?></td>
											<td><b><a href="javascript:void(0);" onclick="link_click('foot_type')">Foot Type</b></td>
											<td><?php echo $foot_type_error_count; ?></a></td>
											<td><?php echo $feed_count; ?></td>
										</tr>
										<?PHP
									}
								}
								?>

							</tbody>
						</table>
						<form id="display_form" name="display_form" method="post" action="finalise_newness.php">
							<input type="hidden" id="process" name="process" value=""> 
						</form>
					</div>
				</div>
				<!-- /.table-responsive -->
			</div>
			<!-- /.panel-body -->
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-12 -->
</div>

<?PHP
if ($process == "fabric1")
{
	include 'fabric1_tpl.php';
} else if ($process == "fabric2")
{
	include 'fabric2_tpl.php';
} else if ($process == "range")
{
	include 'range_tpl.php';
} else if ($process == "option")
{
	include 'option_tpl.php';
} else if ($process == "detail_code")
{
	include 'detailcode_tpl.php';
} else if ($process == "foot_type")
{
	include 'foottype_tpl.php';
} else if ($process == "model")
{
	include 'model_tpl.php';
}
include('footer.php');
?>