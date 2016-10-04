<?php

include ("config2.php");
//error_reporting(E_ALL);
// error handler function
// set error handler
//set_error_handler("customError", E_ALL & ~ E_NOTICE);
// trigger error
error_reporting(0);
try
{
	// Get the phase ID
	$user_id = $_SESSION ['login_id'];
	$t = time();
	$timelog = date("dmYhms", $t);


	$id = str_pad($personId_session, 5, "0", STR_PAD_LEFT);
	if (isset($_FILES["brief"] ["error"]))
	{
		if ($_FILES ["brief"] ["error"] > 0)
		{
			echo "Errors: " . $_FILES ["brief"] ["error"] . "<br>";
		} else
		{
			$allowed = array(
				"xls" => "excel/xls",
				"xlsx" => "excel/xlsx"
			);
			$filename = $_FILES ["brief"] ["name"];
			$filetype = $_FILES ["brief"] ["type"];
			$filesize = $_FILES ["brief"] ["size"];

			// Verify file extension
			$ext = pathinfo($filename, PATHINFO_EXTENSION);


			if (!array_key_exists($ext, $allowed))
			{
				echo "Error: Please select a valid file format. Redirect to previous page in 5 secs.";
			}
			// Verify file size - 5MB maximum
			$maxsize = 10 * 1024 * 1024;
			if ($filesize > $maxsize)
			{
				echo "Error: File size is larger than the allowed limit. Redirect to previous page in 5 secs.";
			}
			if (file_exists("upload/" . $_FILES ["brief"] ["name"]))
			{
				echo $_FILES ["brief"] ["name"] . " is already exists.";
			} else
			{
				move_uploaded_file($_FILES ["brief"] ["tmp_name"], "../brief/phaseupload/" . $_FILES ["brief"] ["name"]);
				// Get phaseid from transaction table.

				if (!$db->query("SET @msg = ''") || !$db->query("CALL getTransid('Phase',@msg)"))
				{
					// echo "CALL failed: (" . $db->errno . ") " . $db->error;
				}

				if (!($res = $db->query("SELECT @msg as _p_out")))
				{
					// echo "Fetch failed: (" . $db->errno . ") " . $db->error;
				}

				$row = $res->fetch_assoc();
				$tid = $row ['_p_out'];
				if (endsWith($filename, "xlsx"))
				{
					$newfilenamerenamed = $tid . ".xlsx";
				} else
				{
					$newfilenamerenamed = $tid . ".xls";
				}

				rename("../brief/phaseupload/" . $_FILES ["brief"] ["name"], "../brief/phaseupload/" . $newfilenamerenamed);
				error_log($timelog . " => Success: [$tid] successfully rename the brief old name [$filename] new name [$newfilenamerenamed] by [$login_session - System Profile Id ($id)]\n", 3, "../log/Transaction.log");

				$sql_insert_phase = "INSERT INTO next_id_generator_table(Description,SystemId,CreatedBy) VALUES ('Phase','$tid',$user_id)";

				if (mysqli_query($db, $sql_insert_phase))
				{
					$id = str_pad($personId_session, 5, "0", STR_PAD_LEFT);
					error_log($timelog . " => Success: [$tid] successfully created by [$login_session - System Profile Id ($id)]\n", 3, "../log/Transaction.log");
					error_log($sql_insert_phase . "\n", 3, "../log/Transaction.log");
				} else
				{
					error_log($timelog . " => Error: [$tid] Error created by [$login_session - System Profile Id ($id)]\n", 3, "../log/Transaction.log");
					error_log($sql_insert_phase . "\n", 3, "../log/Transaction.log");
				}

				if ($_SERVER ["REQUEST_METHOD"] == "POST")
				{
					$phaseseason = $_POST ["phaseseason"];
					$phasecategoty = $_POST ["phasecategory"];
					$desc = $_POST ['phasedesc'];
					// echo "$phaseseason $phasecategoty";
					$sql_insert_phase_d = "INSERT INTO next_main_phase_table(phaseid,seasonid,categoryid,description,Brieffilename,Uploadedby,NewbriefName)
						VALUES
						('$tid','$phaseseason','$phasecategoty','$desc','$filename',$user_id,'$newfilenamerenamed')";
					if (mysqli_query($db, $sql_insert_phase_d))
					{
						$id = str_pad($personId_session, 5, "0", STR_PAD_LEFT);
						error_log($timelog . " => Success: [$tid] successfully uploaded by [$login_session - System Profile Id ($id)]\n", 3, "../log/Transaction.log");
						error_log($sql_insert_phase_d . "\n", 3, "../log/Transaction.log");
						//read excel to load to main table.
					} else
					{
						error_log($timelog . " => Error: [$tid] Error uploaded by [$login_session - System Profile Id ($id)]\n", 3, "../log/Transaction.log");
						error_log($sql_insert_phase_d . "\n", 3, "../log/Transaction.log");
					}
				}
				getExcelData($newfilenamerenamed, $db, $id, $login_session, $timelog, $personId_session, $tid);

				
				$id = str_pad($personId_session, 5, "0", STR_PAD_LEFT);
				error_log($timelog . " => Success: [$filename] brief successfully uploaded to system by [$login_session - System Profile Id ($id)]\n", 3, "../log/Transaction.log");

				$res = $db->query("CALL testbrief('$tid',$phaseseason,$phasecategoty,@out)");

				$res = $db->query("CALL insertrange('$tid',@out)");

				$select_qry = "SELECT * FROM next_main_upload_temp WHERE total_error_count>0 AND phaseid='$tid'";
				$select_qry1 = mysqli_query($db, $select_qry);
				$no_of_rows = mysqli_affected_rows($db);
				if ($no_of_rows == 0)
				{
					echo "Allold-" . $tid;
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
						//$foot_color_array[] = array("id" => $id, "data" => $foot_color);
						$foot_color_array[] = $foot_color;
					}
					if ($foot_type_error > 0)
					{
						//$foot_type_array[] = array("id" => $id, "data" => $foot_type);
						$foot_type_array[] =$foot_type;
					}
					if ($detail_code_error > 0)
					{
						//$detail_code_array[] = array("id" => $id, "data" => $detail_code);
						$detail_code_array[] =$detail_code;
					}
					if ($option_code_error > 0)
					{
						//$opt_code_array[] = array("id" => $id, "data" => $opt_code);
						$opt_code_array[]=$opt_code;
					}
					if ($range_error > 0)
					{
						//$range_array[] = array("id" => $id, "data" => $sofa_range);
						$range_array[] =$sofa_range;
					}
					if ($item_number_error > 0)
					{
						//$item_number_array[] = array("id" => $id, "data" => $item_fabric);
						$item_number_array[] = $item_fabric;
					}
					if ($model_error > 0)
					{
						$sel_model_qry = "SELECT * FROM next_main_matched_entry WHERE temp_id=$id AND  matched_status=0";
						$sel_model_qry1 = mysqli_query($db, $sel_model_qry);
						while ($sel_model_result = mysqli_fetch_array($sel_model_qry1, MYSQLI_ASSOC))
						{
							$model = $sel_model_result["source_model"];
							$tidd = $sel_model_result["tid"];
							//$model_array[] = array("id" => $tidd, "data" => $model);
							$model_array[] = $model;
						}
					}
				}
				$full_error["Foot Color"] = array_unique($foot_color_array);
				$full_error["Foot Type"] = array_unique($foot_type_array);
				$full_error["Detail Code"] = array_unique($detail_code_array);
				$full_error["Option Code"] = array_unique($opt_code_array);
				$full_error["Range"] = array_unique($range_array);
				$full_error["Textures"] = array_unique($item_number_array);
				//$full_error["Textures"] = array_unique(array_column($model_array, 'data'));;
				
				$full_error["Models"] = array_unique($model_array);
				//$full_error["Models"] = $model_array;
				$full_error["phaseid"] = $tid;
				$formatted_array = array_filter($full_error);
				#print_r($formatted_array);
				echo json_encode($formatted_array);
			}
		}
	} else
	{
		echo "File not uploaded!!!";
	}
} catch (Exception $e)
{
	$t = time();
	$timelog = date("dmYhms", $t);
	error_log($timelog . " => Error: [$timelog]." . $e->getMessage() . " by [$login_session - System Profile Id ($id)]\n", 3, "../log/Error.log");
}

function endsWith($haystack, $needle)
{
	// search forward starting from end minus needle length characters
	return $needle === "" || (($temp = strlen($haystack) - strlen($needle)) >= 0 && strpos($haystack, $needle, $temp) !== FALSE);
}

function getExcelData($filename, $db, $id, $login_session, $timelog, $personId_session, $tid)
{
	include '../Classes/PHPExcel/IOFactory.php';

	$cacheMethod = PHPExcel_CachedObjectStorageFactory:: cache_to_phpTemp;
	$cacheSettings = array(' memoryCacheSize ' => '1MB');
	PHPExcel_Settings::setCacheStorageMethod($cacheMethod, $cacheSettings);
	try
	{

		//error_reporting(E_ALL);
		//ini_set('display_errors', TRUE);
		//ini_set('display_startup_errors', TRUE);

		$inputFileName = "../brief/phaseupload/" . $filename;


		//  Read your Excel workbook
		try
		{
			$inputFileType = PHPExcel_IOFactory::identify($inputFileName);
			$objReader = PHPExcel_IOFactory::createReader($inputFileType);
			$objPHPExcel = $objReader->load($inputFileName);
		} catch (Exception $e)
		{
			//die('Error loading file "' . pathinfo($inputFileName, PATHINFO_BASENAME) . '": ' . $e->getMessage());
		}

		//  Get worksheet dimensions
		$sheet = $objPHPExcel->getSheet(0);
		$highestRow = $sheet->getHighestRow();
		$highestColumn = $sheet->getHighestColumn();
		$select_query = "SELECT id,DataName FROM next_master_data_detail WHERE HeaderId IN (SELECT id FROM next_master_header_detail WHERE HeaderName='Material Type LUT')";
		$ses_sql = mysqli_query($db, $select_query);
		while ($row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC))
		{
			$mat_type[$row["id"]] = strtolower($row["DataName"]);
		}
		//  Loop through each row of the worksheet in turn
		for ($row = 2; $row <= $highestRow; $row++)
		{
			//  Read a row of data into an array
			$rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row, NULL, TRUE, FALSE);
			//  Insert row data array into your database of choice here
			//$sql_insert_phase = "INSERT INTO next_main_upload_temp VALUES ()";
			//error_log (" => Error:$rowData", 3, "../log/.log" );
			$six_two_six = trim($rowData[0][6]);
			if ($six_two_six == "")
			{
				continue;
			}
			list($itemcode, $optcode, $footpack) = explode("_", $six_two_six);
			$product_area = trim($rowData[0][7]);
			$season = trim($rowData[0][8]);
			$shape_start_phase = trim($rowData[0][9]);
			$sofa_range = trim($rowData[0][10]);
			$material_type = trim($rowData[0][11]);
			$lwr_material_type = strtolower(trim($rowData[0][11]));
			$db_mat_type = array_search($lwr_material_type, $mat_type);
			$size_range = trim($rowData[0][12]);
			$size_descrption = trim($rowData[0][13]);
			$swatch_item_number = trim($rowData[0][14]);
			$swatch_item_fabric = trim($rowData[0][15]);
			$swatch_item_fabric_colour = trim($rowData[0][16]);
			$foot_start_phase = trim($rowData[0][17]);
			$foot_type = trim($rowData[0][18]);
			$foot_colour = trim($rowData[0][19]);
			if ($foot_colour == "")
				$foot_colour = "na";
			$chair_format = trim($rowData[0][20]);
			$bed_detail = trim($rowData[0][21]);
			$fabric_start_phase = trim($rowData[0][22]);
			$pattern_match = trim($rowData[0][23]);
			$piping = trim($rowData[0][24]);

			$sql_insert_phase_temp = "INSERT INTO next_main_upload_temp (six_two_six, item_code, option_code, foot_pack, product_area,season,shape_start_phase,sofa_range,material_type,
			size_range,size_descrption,swatch_item_number,swatch_item_fabric,swatch_item_fabric_colour,foot_start_phase,foot_type,foot_colour,
			chair_format,bed_detail,fabric_start_phase,pattern_match,piping,phaseid, mat_type) VALUES (
					'$six_two_six', '$itemcode', '$optcode', '$footpack', '$product_area','$season','$shape_start_phase','$sofa_range','$material_type','$size_range','$size_descrption',
					'$swatch_item_number','$swatch_item_fabric','$swatch_item_fabric_colour','$foot_start_phase','$foot_type','$foot_colour',
					'$chair_format','$bed_detail','$fabric_start_phase','$pattern_match','$piping','$tid', $db_mat_type)";
			//echo $sql_insert_phase_temp."<br>";

			if (mysqli_query($db, $sql_insert_phase_temp))
			{
				$id = str_pad($personId_session, 5, "0", STR_PAD_LEFT);
				error_log($timelog . " => Success: [$row] successfully uploaded by [$login_session - System Profile Id ($id)]\n", 3, "../log/Transaction_Excel.log");
				error_log($sql_insert_phase_temp . "\n", 3, "../log/Transaction_Excel.log");

				//read excel to load to main table.
			} else
			{
				error_log($timelog . " => Error: [$row] Error uploaded by [$login_session - System Profile Id ($id)]\n", 3, "../log/Transaction_Excel.log");
				error_log($sql_insert_phase_temp . "\n", 3, "../log/Transaction_Excel.log");
			}
		}
	} catch (Exception $e)
	{
		
	}
}

?>