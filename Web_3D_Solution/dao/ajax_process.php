<?php

include ("lock.php");

$obj = new ajax_process();
$process = (string) filter_input(INPUT_POST, 'process');

if ($process == "edit_masterdata")
{
	$obj->edit_masterdata($db);
}
if ($process == "render")
{
	$obj->render($db);
}
if ($process == "check_newness")
{
	$obj->check_newness($db);
}
if ($process == "show_percen")
{
	$obj->show_percen($db);
}
if ($process == "cancel_import")
{
	$obj->cancel_upload($db);
}
if ($process == "insert_lookup")
{
	$obj->insert_lookup($db);
}
if ($process == "call_store")
{
	$obj->call_stored_procedure($db);
}
if ($process == "load_range")
{
	$obj->load_rangeoverview($db);
}

//echo $login_session;

class ajax_process
{

	public function edit_masterdata($db)
	{
		$userid = $_SESSION ['login_id'];
		$username = $_SESSION ['user_name'];
		$idd = trim(addslashes(filter_input(INPUT_POST, 'pk')));
		$value = trim(addslashes(filter_input(INPUT_POST, 'value')));
		$name = trim(addslashes(filter_input(INPUT_POST, 'name')));

		list($field_type, $headerid, $id) = explode('___', $name);

		if ($field_type == "name")
		{
			$dup_qry = "SELECT COUNT(id) as dup_count FROM next_master_data_detail WHERE DataName = '$value' AND HeaderID=$headerid AND id!=$idd";
			$ses_sql1 = mysqli_query($db, $dup_qry);

			$row1 = mysqli_fetch_array($ses_sql1, MYSQLI_ASSOC);
			$dup_count = $row1['dup_count'];
			if ($dup_count != "0")
			{
				$return_array["msg"] = "Already Exists!!!";
				$return_array["status"] = "error";
				echo json_encode($return_array);
				return;
			}
			$update_qry = "UPDATE next_master_data_detail set dataname='$value' WHERE id=$idd";
		} else if ($field_type == "desc")
		{
			$update_qry = "UPDATE next_master_data_detail set Description='$value' WHERE id=$idd";
		}


		mysqli_query($db, $update_qry);
		$t = time();
		$timelog = date("dmYhms", $t);
		if (mysqli_query($db, $update_qry))
		{
			$return_array["msg"] = "Success";
			$return_array["status"] = "success";
			$id = str_pad($userid, 5, "0", STR_PAD_LEFT);
			error_log($timelog . " => Success: [$value] updated successfully created by [$username - System Profile Id ($id)]\n", 3, "../log/Transaction.log");
			error_log($update_qry . "\n", 3, "../log/Transaction.log");
		} else
		{
			$return_array["msg"] = "Something went wrong!!";
			$return_array["status"] = "error";
			$id = str_pad($userid, 5, "0", STR_PAD_LEFT);
			error_log($timelog . " => Error: [$value] not updated Error uploaded by [$username - System Profile Id ($id)]\n", 3, "../log/Transaction.log");
			error_log($update_qry . "\n", 3, "../log/Transaction.log");
		}
		echo json_encode($return_array);
	}

	public function render($db)
	{
		header('Content-Type: application/excel');
		header('Content-Disposition: attachment; filename="sample.csv"');

		$user_CSV[0] = array('source model', 'new model', 'cameras', 'new feet', 'new fabric', 'new bead', 'six_two_six');

// very simple to increment with i++ if looping through a database result 
		$user_CSV[1] = array('Quentin', 'Del Viento', 34);
		$user_CSV[2] = array('Antoine', 'Del Torro', 55);
		$user_CSV[3] = array('Arthur', 'Vincente', 15);

		$fp = fopen('php://output', 'w');
		foreach ($user_CSV as $line)
		{
			// though CSV stands for "comma separated value"
			// in many countries (including France) separator is ";"
			fputcsv($fp, $line, ',');
		}
		fclose($fp);

		$userid = $_SESSION ['login_id'];
		$ids = trim(addslashes(filter_input(INPUT_POST, 'render_ids')));
		$id_array = explode(",", $ids);
		foreach ($id_array as $id_value)
		{
			list($rid, $phaseid, $rangeid) = explode("_", $id_value);
			//batch id creation
			if (!$db->query("SET @msg = ''") || !$db->query("CALL getTransid('Render',@msg)"))
			{
				
			}
			if (!($res = $db->query("SELECT @msg as _p_out")))
			{
				
			}
			$row = $res->fetch_assoc();
			$batchid = $row ['_p_out'];
			$sql_insert_phase = "INSERT INTO next_id_generator_table(Description,SystemId,CreatedBy) VALUES ('Render','$batchid',$userid)";
			mysqli_query($db, $sql_insert_phase);

			$select_matched_qry = "SELECT * FROM next_main_matched_entry WHERE phase_id='$phaseid' AND range_id=$rangeid AND matched_status=1 AND batchid IS NULL";
			$ses_sql1 = mysqli_query($db, $select_matched_qry);
			while ($value = mysqli_fetch_array($ses_sql1, MYSQLI_ASSOC))
			{
				$source_model = $value["source_model"];
				$temp_id = $value["temp_id"];
				$scode = $value["state_code"];
				$optid = $value["option_id"];
				#RA00001_02_na_na_f000_WU

				list($range_code, $opt_code, $state, $detail_code, $foot_shape, $wrap_code) = explode("_", $source_model);
				$select_temp_qry = "select * from next_main_upload_temp where id=$temp_id";
				$temp_result = mysqli_query($db, $select_temp_qry);
				$result_set = mysqli_fetch_array($temp_result, MYSQLI_ASSOC);

				$swat_item_number = $result_set['swatch_item_number'];
				$fab = $result_set['swatch_item_fabric'];
				$color = $result_set['swatch_item_fabric_colour'];
				$foot_color = $result_set['foot_colour'];
				$option_desc = $result_set['size_descrption'];
				$range_name = $result_set['sofa_range'];
				$new_feet = "";
				if ($foot_color == "")
					$foot_color = "na";
				if ($foot_color <> "" and strtolower($foot_color) <> "na")
					$new_feet = $foot_color . ".jpg";
				if ($state == "na")
					$state_val = "";
				else
					$state_val = "_" . $state;
				if ($foot_shape == "f000")
					$foot_shape_val = "";
				else
					$foot_shape_val = "_" . $foot_shape;

				$select_opt_qry = "SELECT * FROM next_option_lookup_table WHERE id=$optid";
				$result_set1 = mysqli_fetch_array(mysqli_query($db, $select_opt_qry), MYSQLI_ASSOC);
				$cam8 = $result_set1["_8"];
				$cam7 = $result_set1["_7"];
				$cam6 = $result_set1["_6"];
				$cam5 = $result_set1["_5"];
				$cam4 = $result_set1["_4"];
				$cam3 = $result_set1["_3"];
				$cam2 = $result_set1["_2"];
				$cam1 = $result_set1["_1"];
				$main = $result_set1["Main"];

				$camera = "";
				if (strtolower($main) != "na" and strtolower($main) != "n/a" and strtolower($main) != "")
				{
					$camera = "+" . $main;
				}
				if (strtolower($cam1) != "na" and strtolower($cam1) != "n/a" and strtolower($cam1) != "" and strtolower($cam1) != " ")
				{
					$camera = $camera . "+" . $cam1;
				}
				if (strtolower($cam2) != "na" and strtolower($cam2) != "n/a" and strtolower($cam2) != "")
				{
					$camera = $camera . "+" . $cam2;
				}
				if (strtolower($cam3) != "na" and strtolower($cam3) != "n/a" and strtolower($cam3) != "")
				{
					$camera = $camera . "+" . $cam3;
				}
				if (strtolower($cam4) != "na" and strtolower($cam4) != "n/a" and strtolower($cam4) != "")
				{
					$camera = $camera . "+" . $cam4;
				}
				if (strtolower($cam5) != "na" and strtolower($cam5) != "n/a" and strtolower($cam5) != "")
				{
					$camera = $camera . "+" . $cam5;
				}
				if (strtolower($cam6) != "na" and strtolower($cam6) != "n/a" and strtolower($cam2) != "")
				{
					$camera = $camera . "+" . $cam6;
				}
				if (strtolower($cam7) != "na" and strtolower($cam7) != "n/a" and strtolower($cam7) != "")
				{
					$camera = $camera . "+" . $cam7;
				}
				if (strtolower($cam8) != "na" and strtolower($cam8) != "n/a" and strtolower($cam8) != "")
				{
					$camera = $camera . "+" . $cam8;
				}
				$camera = ltrim($camera, '+');
				$source_model_altered = "[" . $range_name . "]_[" . $option_desc . "]_[" . $state . "]_[" . $color . "]_[" . $foot_shape . "]_[" . $foot_color . "]_";
				//$new_model1 = "[" . $range_name . "]_[" . $option_desc . "]_[" . $state . "]_[" . $fab . "]_[" . $color . "]_[" . $foot_shape . "]_[" . $foot_color . "]_";
				$new_model = $range_code . "_" . $opt_code . $state_val . "_" . $swat_item_number . $foot_shape_val;
				$new_fabric = $swat_item_number . ".jpg";
				if (stripos($wrap_code, "p"))
					$new_bead = $swat_item_number . "_bead.jpg";
				else
					$new_bead = "not required";
				echo $source_model . "___" . $new_model . "___" . $camera . "___" . $new_feet . "__" . $new_fabric . "___" . $new_bead . "\n";
			}
		}
	}

	public function cancel_upload($db)
	{
		$phaseid = trim(addslashes(filter_input(INPUT_POST, 'phaseid')));
		
		$del_qry1 = "DELETE FROM next_id_generator_table WHERE SystemId='$phaseid'";
		$res1 = mysqli_query($db, $del_qry1);
		$del_qry2 = "DELETE FROM next_main_phase_table WHERE PhaseId='$phaseid'";
		$res2 = mysqli_query($db, $del_qry2);
		$del_qry3 = "DELETE FROM next_main_upload_temp WHERE Phaseid='$phaseid'";
		$res3 = mysqli_query($db, $del_qry3);
		$del_qry4 = "DELETE FROM next_main_matched_entry WHERE phase_id='$phaseid'";
		$res4 = mysqli_query($db, $del_qry4);
		$del_qry4 = "DELETE FROM next_range_overview_table WHERE PhaseId='$phaseid'";
		$res4 = mysqli_query($db, $del_qry4);
		if ($res1 && $res2 && $res3 && $res4)
			echo "success";
		else
			echo "fail";
	}

	public function check_newness($db)
	{
		$phaseid = trim(addslashes(filter_input(INPUT_POST, 'phaseid')));
		$select_qry = "SELECT * FROM next_main_upload_temp WHERE total_error_count>0 AND phaseid='$phaseid'";
		$select_qry1 = mysqli_query($db, $select_qry);
		$no_of_rows = mysqli_affected_rows($db);
		if ($no_of_rows == 0)
		{
			echo "Allold-" . $phaseid;
			return false;
		}

		$foot_color_array = array();
		$foot_type_array = array();
		$detail_code_array = array();
		$opt_code_array = array();
		$option_code_array = array();
		$range_array = array();
		$item_number_array = array();
		$model_array = array();
		while ($result_row = mysqli_fetch_array($select_qry1, MYSQLI_ASSOC))
		{
			$id = $result_row["id"];
			$foot_color_error = $result_row["foot_color_error"];
			$foot_type_error = $result_row["foot_type_error"];
			$detail_code_error = $result_row["detail_code_error"];
			$option_code_error = $result_row["option_code_error"];
			$range_error = $result_row["range_error"];
			$item_number_error = $result_row["item_number_error"];
			$model_error = $result_row["model_error"];

			$foot_color = $result_row["foot_colour"];
			$foot_type = $result_row["foot_type"];
			$detail_code = $result_row["bed_detail"];
			$opt_code = $result_row["option_code"] . " - " . $result_row["size_descrption"];
			$sofa_range = $result_row["sofa_range"];
			$item_fabric = $result_row["swatch_item_number"] . " - " . $result_row["swatch_item_fabric"];

			if ($foot_color_error > 0)
			{
				$foot_color_array[] = array("id" => $id, "data" => $foot_color);
			}
			if ($foot_type_error > 0)
			{
				$foot_type_array[] = array("id" => $id, "data" => $foot_type);
			}
			if ($detail_code_error > 0)
			{
				$detail_code_array[] = array("id" => $id, "data" => $detail_code);
			}
			if ($option_code_error > 0)
			{
				$opt_code_array[] = array("id" => $id, "data" => $opt_code);
			}
			if ($range_error > 0)
			{
				$range_array[] = array("id" => $id, "data" => $sofa_range);
			}
			if ($item_number_error > 0)
			{
				$item_number_array[] = array("id" => $id, "data" => $item_fabric);
			}
			if ($model_error > 0)
			{
				$sel_model_qry = "SELECT * FROM next_main_matched_entry WHERE temp_id=$id AND  matched_status=0";
				$sel_model_qry1 = mysqli_query($db, $sel_model_qry);
				while ($sel_model_result = mysqli_fetch_array($sel_model_qry1, MYSQLI_ASSOC))
				{
					$model = $sel_model_result["source_model"];
					$tid = $sel_model_result["tid"];
					$model_array[] = array("id" => $tid, "data" => $model);
				}
			}
		}
		$full_error["Foot Color"] = $foot_color_array;
		$full_error["Foot Type"] = $foot_type_array;
		$full_error["Detail Code"] = $detail_code_array;
		$full_error["Option Code"] = $opt_code_array;
		$full_error["Range"] = $range_array;
		$full_error["Textures"] = $item_number_array;
		$full_error["Models"] = $model_array;
		$full_error["phaseid"] = $phaseid;
		$formatted_array = array_filter($full_error);
		#print_r($formatted_array);
		echo json_encode($formatted_array);
	}

	public function insert_lookup($db)
	{
		$phaseid = trim(addslashes(filter_input(INPUT_POST, 'phaseid')));

		$userid = $_SESSION ['login_id'];
		$season_qry = "SELECT * FROM next_main_phase_table WHERE PhaseId='$phaseid'";
		$season_qry1 = mysqli_query($db, $season_qry);
		$season_row = mysqli_fetch_array($season_qry1, MYSQLI_ASSOC);
		$season_id = $season_row["SeasonId"];
		$category_id = $season_row["categoryId"];

		$modal_status = "SELECT a.id as modal_status FROM next_master_data_detail a, next_master_header_detail b WHERE a.headerid = b.id AND a.dataname = 'Approved'  AND b.HeaderName = 'Model Status'";
		$modal_status_row = mysqli_fetch_array(mysqli_query($db, $modal_status), MYSQLI_ASSOC);
		$status_id = $modal_status_row["modal_status"];
		
		$sel1 = "SELECT a.id as fab_status FROM next_master_data_detail a, next_master_header_detail b WHERE a.headerid = b.id AND a.Description = 'Fully Approved' AND b.HeaderName ='Fabric Status'";
		$temp_result = mysqli_query($db, $sel1);
		$result_set = mysqli_fetch_array($temp_result, MYSQLI_ASSOC);
		$approved_status = $result_set['fab_status'];

		$select_qry = "SELECT * FROM next_main_upload_temp WHERE total_error_count>0 AND phaseid='$phaseid'";
		$select_qry1 = mysqli_query($db, $select_qry);

		while ($result_row = mysqli_fetch_array($select_qry1, MYSQLI_ASSOC))
		{

			$id = $result_row["id"];
			$foot_color_error = $result_row["foot_color_error"];
			$foot_type_error = $result_row["foot_type_error"];
			$detail_code_error = $result_row["detail_code_error"];
			$option_code_error = $result_row["option_code_error"];
			$range_error = $result_row["range_error"];
			$item_number_error = $result_row["item_number_error"];
			$model_error = $result_row["model_error"];
			$tot_count = $result_row["total_error_count"];
			$mat_type = $result_row["mat_type"];
			$option_code = $result_row["option_code"];
			$new_tot_count = $tot_count;
			#echo "foot_color ".$foot_color_error."<br>";
			#echo  "tot ".$tot_count."<br>";

			$foot_color = $result_row["foot_colour"];
			$foot_type = $result_row["foot_type"];
			$detail_code = $result_row["bed_detail"];
			$opt_code = $option_code . " - " . $result_row["size_descrption"];
			$sofa_range = $result_row["sofa_range"];
			$item_fabric = $result_row["swatch_item_number"] . " - " . $result_row["swatch_item_fabric"];

			if ($foot_color_error > 0)
			{
				$select_foot_count_qry = "SELECT COUNT(id) as foot_color_count FROM next_texturesec_lookup_table WHERE Texture_Color='$foot_color' AND Season=$season_id AND Category=$category_id";
				$select_foot_count_qry1 = mysqli_query($db, $select_foot_count_qry);
				$select_foot_count_row = mysqli_fetch_array($select_foot_count_qry1, MYSQLI_ASSOC);
				$foot_count = $select_foot_count_row["foot_color_count"];
				if ($foot_count == "0")
				{
					$insert_qry = "insert into next_texturesec_lookup_table(Texture_Color,Season,Category,Status) values('$foot_color', $season_id, $category_id,$approved_status)";
					mysqli_query($db, $insert_qry);
				}
				$new_tot_count = $new_tot_count - 1;
				$upd_qry = "update next_main_upload_temp set foot_color_error=0, total_error_count=$new_tot_count where id=$id";
				mysqli_query($db, $upd_qry);
				
				//$upd_qry = "update next_main_matched_entry set feet_color_status=1 where temp_id=$id";
				//mysqli_query($db, $upd_qry);
				//$foot_color_array[] = array("id" => $id, "data" => $foot_color);
			}
			if ($foot_type_error > 0)
			{
				$select_foot_shape_count_qry = "SELECT COUNT(dataname) as foot_shape_code_count FROM next_master_data_detail a, next_master_header_detail b WHERE a.headerid = b.id AND a.Description ='$foot_type'  AND b.HeaderName = 'Foot Shape LUT';";
				$select_foot_shape_count_qry1 = mysqli_query($db, $select_foot_shape_count_qry);
				$select_foot_shape_count_row = mysqli_fetch_array($select_foot_shape_count_qry1, MYSQLI_ASSOC);
				$foot_shape_count = $select_foot_shape_count_row["foot_shape_code_count"];
				if ($foot_count == "0")
				{
					//get footid
					$sel1 = "SELECT DataName,HeaderId FROM next_master_data_detail a, next_master_header_detail b WHERE a.headerid = b.id AND b.HeaderName = 'Foot Shape LUT' ORDER BY a.id DESC LIMIT 1";
					$sel1_row = mysqli_fetch_array(mysqli_query($db, $sel1), MYSQLI_ASSOC);
					$last_footid = $sel1_row["DataName"];
					$headerid = $sel1_row["HeaderId"];
					if ($last_footid == "")
						$footid = "f001";
					else
					{
						$numbers = substr($last_footid, 1);
						$nxt_number = $numbers + 1;
						$footid = "f" . str_pad($nxt_number, 3, "0", STR_PAD_LEFT);
					}
					$insert_qry = "insert into next_master_data_detail(DataName,Description,HeaderId,CreatedBy) values('$footid', '$foot_type', $headerid,$userid)";
					mysqli_query($db, $insert_qry);
					$new_tot_count = $new_tot_count - 1;
					$upd_qry = "update next_main_upload_temp set foot_type_error=0, total_error_count=$new_tot_count where id=$id";
					mysqli_query($db, $upd_qry);
				}
			}
//	if ($detail_code_error > 0)
//	{
//		$detail_code_array[] = array("id" => $id, "data" => $detail_code);
//	}
//	if ($option_code_error > 0)
//	{
//		$opt_code_array[] = array("id" => $id, "data" => $opt_code);
//	}
//	if ($range_error > 0)
//	{
//		$range_array[] = array("id" => $id, "data" => $sofa_range);
//	}
//	if ($item_number_error > 0)
//	{
//		$item_number_array[] = array("id" => $id, "data" => $item_fabric);
//	}
			if ($model_error > 0)
			{
				$sel_model_qry = "SELECT * FROM next_main_matched_entry WHERE temp_id=$id AND  matched_status=0";
				$sel_model_qry1 = mysqli_query($db, $sel_model_qry);
				while ($sel_model_result = mysqli_fetch_array($sel_model_qry1, MYSQLI_ASSOC))
				{
					$model = $sel_model_result["source_model"];
					$tid = $sel_model_result["tid"];
					$stateid = $sel_model_result["state_code"];
					$optid = $sel_model_result["option_id"];

					$select_model_count_qry = "SELECT COUNT(model_id) as model_count  FROM model_lookup WHERE model_name='$model' AND mod_category=$category_id and mod_season=$season_id";
					$select_model_count_qry1 = mysqli_query($db, $select_model_count_qry);
					$select_model_count_row = mysqli_fetch_array($select_model_count_qry1, MYSQLI_ASSOC);
					$model_count = $select_model_count_row["model_count"];
					if ($model_count == "0")
					{
						list($range_code, $opt_code, $state, $detail_code, $foot_shape, $wrap_code) = explode("_", $model);
						#SET model_id = CONCAT(db_range_id,"_",opt_sgkid,"_",state_name,"_",detail_code,"_",foot_shape_code,"_",wrap_code);

						$selectrange = "SELECT id, Angle_set_Option FROM next_range_lookup_table WHERE range_id='$range_code' AND Category=$category_id";
						$selectrange_row = mysqli_fetch_array(mysqli_query($db, $selectrange), MYSQLI_ASSOC);
						$rangedbid = $selectrange_row["id"];

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
						VALUES ('$model', $category_id, $rangedbid, $optid, $stateid, $detailid, $footid, $wrap_id, $status_id, $season_id, now(), now(), $userid);";
						mysqli_query($db, $insert_qry);
						
						//echo $insert_qry . "<br>";
						$upd_qry = "update next_main_matched_entry set matched_status=1, model_status=1, temp='' where tid=$tid";
						mysqli_query($db, $upd_qry);

//						$upd_qry = "update next_main_upload_temp set model_error=0, total_error_count=$new_tot_count where id=$id";
//						mysqli_query($db, $upd_qry);
					}
					$new_tot_count = $new_tot_count - 1;
					$upd_qry = "update next_main_upload_temp set model_error=0, total_error_count=$new_tot_count where id=$id";
					mysqli_query($db, $upd_qry);
				}
			}
		}
		$select_qry = "SELECT * FROM next_main_upload_temp WHERE total_error_count>0 AND phaseid='$phaseid'";
		$select_qry1 = mysqli_query($db, $select_qry);
		$no_of_rows = mysqli_affected_rows($db);
		if ($no_of_rows == 0)
		{
			echo "Allold";
			return false;
		} else
		{
			echo $phaseid;
			return false;
		}
	}

	public function call_stored_procedure($db)
	{
		$phaseid = trim(addslashes(filter_input(INPUT_POST, 'phaseid')));
		$res = $db->query("CALL insertrange('$phaseid',@out)");
		echo $res;
	}
	
	public function show_percen($db)
	{
		$rangeid = trim(addslashes(filter_input(INPUT_POST, 'rangeid')));
		$output_array = array();
		$formatted_array = array();
		$select_qry = "SELECT * FROM next_range_overview_table WHERE id=$rangeid ";
		$select_qry1 = mysqli_query($db, $select_qry);
		while ($val = mysqli_fetch_array($select_qry1, MYSQLI_ASSOC))
		{
			$tot_unique_model_array = array();
			$matched_model_array = array();
			$not_matched_model_array = array();
			$tot_unique_fab_array = array();
			$matched_fab_array = array();
			$not_matched_fab_array = array();
			$tot_unique_feet_array = array();
			$matched_feet_array = array();
			$not_matched_feet_array = array();
			$matched_id = $val["id"];
			$rangeid = $val["Rangeval"];
			$phaseid = $val["PhaseId"];
			$phaseval = $val["Phaseval"];
			$rec_qry = "SELECT * FROM next_main_matched_entry a, next_main_upload_temp b WHERE range_id=$rangeid AND phase_id='$phaseid' AND a.temp_id=b.id  and matched_status=1";
			$rec_qry1 = mysqli_query($db, $rec_qry);
			while ($val1 = mysqli_fetch_array($rec_qry1, MYSQLI_ASSOC))
			{
				if (!in_array($val1["source_model"], $tot_unique_model_array))
					$tot_unique_model_array[] = $val1["source_model"];
				if ($val1["model_status"] == 1)
				{
					if (!in_array($val1["source_model"], $matched_model_array))
						$matched_model_array[] = $val1["source_model"];
				}
				else
				{
					if (!in_array($val1["source_model"], $not_matched_model_array))
						$not_matched_model_array[] = $val1["source_model"];
				}

				if (!in_array($val1["swatch_item_number"], $tot_unique_fab_array))
					$tot_unique_fab_array[] = $val1["swatch_item_number"];
				if ($val1["fabric_status"] == 1)
				{
					if (!in_array($val1["swatch_item_number"], $matched_fab_array))
						$matched_fab_array[] = $val1["swatch_item_number"];
				}
				else
				{
					if (!in_array($val1["swatch_item_number"], $not_matched_fab_array))
						$not_matched_fab_array[] = $val1["swatch_item_number"];
				}

				if (!in_array($val1["foot_colour"], $tot_unique_feet_array))
					$tot_unique_feet_array[] = $val1["foot_colour"];
				if ($val1["feet_color_status"] == 1)
				{
					if (!in_array($val1["foot_colour"], $matched_feet_array))
						$matched_feet_array[] = $val1["foot_colour"];
				}
				else
				{
					if (!in_array($val1["foot_colour"], $not_matched_feet_array))
						$not_matched_feet_array[] = $val1["foot_colour"];
				}
			}
			$model_perc = (count($matched_model_array) / count($tot_unique_model_array)) * 100;
			$fab_perc = (count($matched_fab_array) / count($tot_unique_fab_array)) * 100;
			$feet_perc = (count($matched_feet_array) / count($tot_unique_feet_array)) * 100;
			$overall_perc = ($model_perc + $fab_perc + $feet_perc) / 3;
			$overall_perc = number_format($overall_perc, 2, '.', '');
			
			$output_array["title"] =$phaseval." - ".$overall_perc."%";
			$output_array["unique_model_count"] = count($tot_unique_model_array);
			$output_array["modal_approved_count"] = count($matched_model_array);
			$output_array["modal_not_approved_count"] = count($not_matched_model_array);
			$output_array["modal_approved"] = $matched_model_array;
			$output_array["modal_not_approved"] = $not_matched_model_array;
			
			$output_array["unique_fab_count"] = count($tot_unique_fab_array);
			$output_array["fab_approved_count"] = count($matched_fab_array);
			$output_array["fab_not_approved_count"] = count($not_matched_fab_array);
			$output_array["fab_approved"] = $matched_fab_array;
			$output_array["fab_not_approved"] = $not_matched_fab_array;
			
			$output_array["unique_feet_count"] = count($tot_unique_feet_array);
			$output_array["feet_approved_count"] = count($matched_feet_array);
			$output_array["feet_not_approved_count"] = count($not_matched_feet_array);
			$output_array["feet_approved"] = $matched_feet_array;
			$output_array["feet_not_approved"] = $not_matched_feet_array;
			
			//echo "--".count($not_matched_model_array)."--";
			//$formatted_array = array_filter($output_array);
			$formatted_array = ($output_array);
			//print_r($formatted_array);
			echo json_encode($formatted_array);
		}
	}

}

?>
