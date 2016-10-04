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
echo '<link rel="stylesheet" href="' . $proj_path . '/css/style1.css">';
include ('../dao/paginate.php'); //include of paginat page
$process = (string) filter_input(INPUT_POST, 'process');
if ($process == "render")
{
//	/$filename = "";
	$userid = $_SESSION ['login_id'];
	$ids = trim(addslashes(filter_input(INPUT_POST, 'render_ids')));
	$id_array = explode(",", $ids);
	$stringData1 = "";
	$tot_count = 0;
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

	foreach ($id_array as $id_value)
	{
		list($rid, $phaseid, $rangeid) = explode("_", $id_value);
		//batch id creation


		$flag = 0;

		$select_matched_qry = "SELECT * FROM next_main_matched_entry WHERE phase_id='$phaseid' AND range_id=$rangeid AND matched_status=1 and model_status=1 and fabric_status=1 and feet_color_status=1 AND batchid IS NULL";
		$ses_sql1 = mysqli_query($db, $select_matched_qry);
		while ($value = mysqli_fetch_array($ses_sql1, MYSQLI_ASSOC))
		{
			$source_model = $value["source_model"];
			$temp_id = $value["temp_id"];
			$scode = $value["state_code"];
			$optid = $value["option_id"];
			$tid = $value["tid"];
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
			$six_two_six = $result_set['six_two_six'];

			$new_feet = "";
			$text2col = "";
			if ($foot_color == "")
				$foot_color = "na";
			if ($foot_color <> "" and strtolower($foot_color) <> "na")
			{
				$new_feet = $foot_color . ".jpg";
				$text2col = "_" .$foot_color; 
			}
			else
			{
				$text2col = "_NA";
			}
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
			$cam8 = trim($result_set1["_8"]);
			$cam7 = trim($result_set1["_7"]);
			$cam6 = trim($result_set1["_6"]);
			$cam5 = trim($result_set1["_5"]);
			$cam4 = trim($result_set1["_4"]);
			$cam3 = trim($result_set1["_3"]);
			$cam2 = trim($result_set1["_2"]);
			$cam1 = trim($result_set1["_1"]);
			$main = trim($result_set1["Main"]);
			
			//$camera = "";
			$camera = array();
			if (strtolower($main) != "na" and strtolower($main) != "n/a" and strtolower($main) != "")
			{
				$camera[] = $main;
			}
			if (strtolower($cam1) != "na" and strtolower($cam1) != "n/a" and strtolower($cam1) != "")
			{
				//$camera = $camera . "+" . $cam1;
				$camera[] = $cam1;
			}
			if (strtolower($cam2) != "na" and strtolower($cam2) != "n/a" and strtolower($cam2) != "")
			{
				//$camera = $camera . "+" . $cam2;
				$camera[] = $cam2;
			}
			if (strtolower($cam3) != "na" and strtolower($cam3) != "n/a" and strtolower($cam3) != "")
			{
				//$camera = $camera . "+" . $cam3;
				$camera[] = $cam3;
			}
			if (strtolower($cam4) != "na" and strtolower($cam4) != "n/a" and strtolower($cam4) != "")
			{
				//$camera = $camera . "+" . $cam4;
				$camera[] = $cam4;
			}
			if (strtolower($cam5) != "na" and strtolower($cam5) != "n/a" and strtolower($cam5) != "")
			{
				//$camera = $camera . "+" . $cam5;
				$camera[] = $cam5;
			}
			if (strtolower($cam6) != "na" and strtolower($cam6) != "n/a" and strtolower($cam6) != "")
			{
				//$camera = $camera . "+" . $cam6;
				$camera[] = $cam6;
			}
			if (strtolower($cam7) != "na" and strtolower($cam7) != "n/a" and strtolower($cam7) != "")
			{
				//$camera = $camera . "+" . $cam7;
				$camera[] = $cam7;
			}
			if (strtolower($cam8) != "na" and strtolower($cam8) != "n/a" and strtolower($cam8) != "")
			{
				//$camera = $camera . "+" . $cam8;
				$camera[] = $cam8;
			}
			$camera_txt = implode("+", $camera);
			$camera_txt = preg_replace('/[a-zA-Z]+/', '', $camera_txt);
			#$camera = ltrim($camera, '+');
			$source_model_altered = "[" . $range_name . "]_[" . $option_desc . "]_[" . $state . "]_[" . $color . "]_[" . $foot_shape . "]_[" . $foot_color . "]_";
			//$new_model1 = "[" . $range_name . "]_[" . $option_desc . "]_[" . $state . "]_[" . $fab . "]_[" . $color . "]_[" . $foot_shape . "]_[" . $foot_color . "]_";
			$new_model = $range_code . "_" . $opt_code . $state_val . "_" . $swat_item_number . $foot_shape_val . $text2col."_";
			$new_fabric = $swat_item_number . ".jpg";
			if (stripos($wrap_code, "p"))
				$new_bead = $swat_item_number . "_bead.jpg";
			else
				$new_bead = "not required";
			$comments = "";
			//echo $stringData = $source_model . "___" . $new_model . "___" . $camera . "___" . $new_feet . "__" . $new_fabric . "___" . $new_bead . "\n";
			$stringData1 = $stringData1 . strtoupper($source_model) . "," . strtoupper($new_model) . "," . $camera_txt . "," . $new_feet . "," . $new_fabric . "," . $new_bead . "," . $comments . "," . $six_two_six . "\n";
			$tot_count++;
			$upd_qry = "UPDATE next_main_matched_entry SET batchid='$batchid',new_model='$new_model' WHERE tid=$tid";
			mysqli_query($db, $upd_qry);
			$flag = 1;
		}
		if ($flag == 1)
		{
			//			$upd = "UPDATE next_range_overview_table SET model_percen=$model_perc, fabric_percen=$fab_perc, feet_percen=$feet_perc, overall_percen=$overall_pec, range_status=$range_status WHERE id=$matched_id";
			$upd_qry = "UPDATE next_range_overview_table SET batchid='$batchid', range_status=21 WHERE id=$rid";
			mysqli_query($db, $upd_qry);
			$select_matched_qry1 = "SELECT * FROM next_main_matched_entry WHERE phase_id='$phaseid' AND range_id=$rangeid AND matched_status=1 and batchid IS NULL";
			$ses_sql2 = mysqli_query($db, $select_matched_qry1);
			$no_of_rows = mysqli_affected_rows($db);
			if ($no_of_rows > 0)
			{
				$select_qr = "select Phaseval, Rangeval from next_range_overview_table where id=$rid";
				$selectrange_row = mysqli_fetch_array(mysqli_query($db, $select_qr), MYSQLI_ASSOC);
				$phaseval = $selectrange_row["Phaseval"];
				$rangeval = $selectrange_row["Rangeval"];

				$insert_range = "INSERT INTO next_range_overview_table (phaseval,rangeval,rendervol,PhaseId, range_status) VALUES ('$phaseval',$rangeval,$no_of_rows,'$phaseid',2)";
				mysqli_query($db, $insert_range);
			}
		}
	}


	$insert_qry = "INSERT INTO batch_master(batchid,rec_count,phaseid) VALUES('$batchid',$tot_count,'$phaseid')";
	mysqli_query($db, $insert_qry);

	//file write
	$myFile = "..\\files\\$batchid.csv";
	$fh = fopen($myFile, 'w') or die("can't open file");
	$stringData = "source model,new model,cameras,new feet,new fabric,new bead,comments,six_two_six\n";
	fwrite($fh, $stringData);
	fwrite($fh, $stringData1);
	fclose($fh);
}


//$process="refresh";
//if ($process == "refresh")
///{   // number of results to show per page
	$select_qry = "SELECT count(id) as rec_count FROM next_range_overview_table WHERE range_status=1 or range_status =  2 or range_status=21";
	$cam_count1 = mysqli_fetch_array(mysqli_query($db, $select_qry), MYSQLI_ASSOC);
	$num_rows = $cam_count1['rec_count'];
	
	$select_qry1 = "SELECT count(id) as rec_count FROM next_range_overview_table";
	$cam_count2 = mysqli_fetch_array(mysqli_query($db, $select_qry1), MYSQLI_ASSOC);
	$num_rows1 = $cam_count2['rec_count'];
	
	$pages = new Paginator($num_rows1, 9, array('All', 10, 3, 6, 9, 12, 15, 25, 50, 100, 250, 'All'));
//if ($process == "refresh")
{   // number of results t
	$select_qry = "SELECT * FROM next_range_overview_table WHERE range_status=1 or range_status =  2 or range_status=21  limit $pages->limit_start, $pages->limit_end";
	$select_qry1 = mysqli_query($db, $select_qry);
	$rowcount = mysqli_affected_rows($db);
	if ($rowcount > 0)
	{
		while ($val = mysqli_fetch_array($select_qry1, MYSQLI_ASSOC))
		{
			$tot_unique_model_array = array();
			$matched_model_array = array();
			$tot_unique_fab_array = array();
			$matched_fab_array = array();
			$tot_unique_feet_array = array();
			$matched_feet_array = array();
			$matched_id = $val["id"];
			$rangeid = $val["Rangeval"];
			$phaseid = $val["PhaseId"];
			$range_status = $val["range_status"];

			if ($range_status == 21)
				$app_qry = " and batchid is not null";
			else
			{
				$rec_qry1 = "SELECT count(tid) as t FROM next_main_matched_entry a, next_main_upload_temp b WHERE range_id=$rangeid AND phase_id='$phaseid' AND a.temp_id=b.id  and matched_status=1 and model_status=1 and fabric_status=1 and feet_color_status=1 and batchid is null";
				$rec_qry2 = mysqli_fetch_array(mysqli_query($db, $rec_qry1), MYSQLI_ASSOC);
				$tot2 = $rec_qry2['t'];
				$app_qry = " and batchid is null";
			}

			$rec_qry = "SELECT source_model,model_status,fabric_status,swatch_item_number,foot_colour,feet_color_status  FROM next_main_matched_entry a, next_main_upload_temp b WHERE range_id=$rangeid AND phase_id='$phaseid' AND a.temp_id=b.id  and matched_status=1$app_qry";
			$rec_qry1 = mysqli_query($db, $rec_qry);
			$tot1 = mysqli_affected_rows($db);

			while ($val1 = mysqli_fetch_array($rec_qry1, MYSQLI_ASSOC))
			{

				if (!in_array($val1["source_model"], $tot_unique_model_array))
					$tot_unique_model_array[] = $val1["source_model"];
				if ($val1["model_status"] == 1)
				{
					if (!in_array($val1["source_model"], $matched_model_array))
						$matched_model_array[] = $val1["source_model"];
				}

				if (!in_array($val1["swatch_item_number"], $tot_unique_fab_array))
					$tot_unique_fab_array[] = $val1["swatch_item_number"];
				if ($val1["fabric_status"] == 1)
				{
					if (!in_array($val1["swatch_item_number"], $matched_fab_array))
						$matched_fab_array[] = $val1["swatch_item_number"];
				}

				if (!in_array($val1["foot_colour"], $tot_unique_feet_array))
					$tot_unique_feet_array[] = $val1["foot_colour"];
				if ($val1["feet_color_status"] == 1)
				{
					if (!in_array($val1["foot_colour"], $matched_feet_array))
						$matched_feet_array[] = $val1["foot_colour"];
				}
			}
			$model_perc = (count($matched_model_array) / count($tot_unique_model_array)) * 100;
			$fab_perc = (count($matched_fab_array) / count($tot_unique_fab_array)) * 100;
			$feet_perc = (count($matched_feet_array) / count($tot_unique_feet_array)) * 100;
			$overall_pec = ($model_perc + $fab_perc + $feet_perc) / 3;

			if ($range_status == "21")
				$app_qry1 = ", RenderVol = $tot1";
			else
				$app_qry1 = ", ready_to_render_count=$tot2";
			if (($overall_pec == 100) && $range_status == 21)
				$range_status = 3;
			else if ($overall_pec == 100)
				$range_status = 1;
			else
				$range_status = 2;
			$upd = "UPDATE next_range_overview_table SET model_percen=$model_perc, fabric_percen=$fab_perc, feet_percen=$feet_perc, overall_percen=$overall_pec, range_status=$range_status $app_qry1 WHERE id=$matched_id";
			mysqli_query($db, $upd);
			//echo $upd."<br>";
		}
	}

//	echo "<pre>";
//	print_r($tot_unique_model_array);
//	echo "</pre>";
//	echo "<pre>";
//	print_r($matched_model_array);
//	echo "</pre>";
}
?>

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Range Overview</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<form name="rangeform" id="rangeform" method="post" enctype="multipart/form-data" action="rangeoverview.php">
	<div class="row">
		<div class="col-lg-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<label>Range Overview Table</label>
				</div>
				<!-- /.panel-heading -->
				<div class="panel-body">
					<div class="dataTable_wrapper">
					<a href="javascript:void(0);" class="btn btn-default btn-sm" onclick="validateForm()"><span class="glyphicon glyphicon-save"></span> Render</a>
						<?PHP
						$select_qry = "SELECT id,Range_Desc FROM next_range_lookup_table";
						$range_master = mysqli_query($db, $select_qry);
						while ($range_array = mysqli_fetch_array($range_master, MYSQLI_ASSOC))
						{
							$ran_array[$range_array["id"]] = $range_array["Range_Desc"];
						}
						$rangeoverviewarray1 = array();
						
						echo $pages->display_pages();

						$rangeoverview_sql = mysqli_query($db, "SELECT id,Phaseval,Rangeval,batchid,RenderVol,range_status,Date,PhaseId,model_percen,fabric_percen,feet_percen,RenderVol,overall_percen,ready_to_render_count
FROM
next_range_overview_table limit $pages->limit_start, $pages->limit_end");
						while ($row_rangeoverview = mysqli_fetch_array($rangeoverview_sql, MYSQLI_ASSOC))
						{
							$collectionrangeoverview = $row_rangeoverview['Phaseval'] . "/**/" . $row_rangeoverview['Rangeval'] . "/**/" . $row_rangeoverview['batchid']
									. "/**/" . $row_rangeoverview['RenderVol'] . "/**/" . $row_rangeoverview['range_status'] . "/**/" . $row_rangeoverview['Date'] . "/**/" . $row_rangeoverview['PhaseId']
									. "/**/" . $row_rangeoverview['model_percen'] . "/**/" . $row_rangeoverview['fabric_percen'] . "/**/" . $row_rangeoverview['id'] . "/**/" . $row_rangeoverview['feet_percen'] . "/**/" . $row_rangeoverview['RenderVol'] . "/**/" . $row_rangeoverview['overall_percen'] . "/**/" . $row_rangeoverview['ready_to_render_count'];

							$rangeoverviewarray1[] = $collectionrangeoverview;
						}
						echo "<span class=\"\">" . $pages->display_jump_menu() . $pages->display_items_per_page() . "</span>";
						?>
						<table class="table table-striped table-bordered table-hover table-condensed"
							   id="dataTables-example" style="margin-top: 20px;">
							<thead>
								<tr style='font-size:10px;'>
									<th></th>
									<th>No</th>
									<th>Phase<br>Id</th>
									<th>Phase</th>
									<th>Range</th>
									<th>Batch</th>
									<!--th>Total<br>Vol</th-->
									<th>No of Models</th>
									<th>Render<br>Vol</th>
									<th>Status</th>
									<th>%</th>
									<th>Date Created</th>
									<th>Comments</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th></th>
									<th>No</th>
									<th>Phase<br>Id</th>
									<th>Phase</th>
									<th>Range</th>
									<th>Batch</th>
									<!--th>Total<br>Vol</th-->
									<th>No of Models</th>
									<th>Render<br>Vol</th>
									<th>Status</th>
									<th>%</th>
									<th>Date Created</th>
									<th>Comments</th>
								</tr>
							</tfoot>
							<tbody>

								<?php
								$status_array = array("1" => "Ready to Render", "2" => "WIP", "3" => "Rendered", "21" => "inter");
								$counter = 0;
								foreach ($rangeoverviewarray1 as $tablevalues)
								{
									$counter++;
									$tablevaluesarr = explode("/**/", $tablevalues);
									$rec_count = $tablevaluesarr[13];
									$tot_cam_count = 0;
									//if ($rec_count != 0)
									{
										$appd_query = "";
										if ($tablevaluesarr[4] == "1")
											$appd_query = " and batchid is null";
										else if ($tablevaluesarr[4] == "2")
											$appd_query = " and batchid is null";
										else if ($tablevaluesarr[4] == "3")
											$appd_query = " and batchid is not null";

										#$qry = "SELECT option_id,camera_count FROM next_main_matched_entry a, next_option_lookup_table b WHERE a.option_id=b.id $appd_query AND range_id=$tablevaluesarr[1] AND phase_id='$tablevaluesarr[6]' AND  matched_status=1 AND model_status=1 AND fabric_status=1  AND feet_color_status=1";
										$qry = "SELECT sum(camera_count) as tot_cam FROM next_main_matched_entry a, next_option_lookup_table b WHERE a.option_id=b.id $appd_query AND range_id=$tablevaluesarr[1] AND phase_id='$tablevaluesarr[6]' AND  matched_status=1 AND model_status=1 AND fabric_status=1  AND feet_color_status=1";
										$cam_count = mysqli_fetch_array(mysqli_query($db, $qry), MYSQLI_ASSOC);
										$tot_cam_count = $cam_count['tot_cam'];

//									$tot_cam_count = 0;
//									while ($cam_array = mysqli_fetch_array($cam_count, MYSQLI_ASSOC))
//									{
//										$tot_cam_count = $tot_cam_count + $cam_array["camera_count"];
//									}
									}
									$model_per = $tablevaluesarr[7];
									$fabric_per = $tablevaluesarr[8];
									$feet_per = $tablevaluesarr[10];
									$tot_count = $tablevaluesarr[11];
									$tot_percen = $tablevaluesarr[12];

									//$rec_count = 0;
									$id = $tablevaluesarr[9];
									$percjob1 = number_format($tot_percen, 2, '.', '');
									$disabled = "";
									if ($rec_count == 0)
									{
										$disabled = " disabled";
									}
									if ($tablevaluesarr[4] == "3" or $tablevaluesarr[4] == "21")
									{
										$disabled = " disabled";
									}

									$stat = $status_array[$tablevaluesarr[4]];
									$pass_id = $id . "_" . $tablevaluesarr[6] . "_" . $tablevaluesarr[1];
									?>
									<tr style="font-size: 10px;">
										<td><input type="checkbox" name="range_chk" id="<?PHP echo $id; ?>" value ="<?php echo $pass_id; ?>" <?PHP echo $disabled; ?> ></td>
										<td><?php echo $counter; ?></td>
										<td><?php echo $tablevaluesarr[6]; ?></td>
										<td><?php echo $tablevaluesarr[0]; ?></td>
										<td><?php echo $ran_array[$tablevaluesarr[1]]; ?></td>
										<td><?php echo "<a href='download.php?name=" . $tablevaluesarr[2] . "'>$tablevaluesarr[2]</a>" ?></td>
										<!--td><?php // echo $tot_count;       ?></td-->
										<td><?php echo $rec_count ?></td>
										<td><?php echo $tot_cam_count; ?></td>
										<td><?php echo $stat; ?></td>
										<td><b><a href="javascript:void(0);" onclick="enable_popup(<?PHP echo $id; ?>)"><?php echo $percjob1 ?></a></b></td>
										<td><?php echo $tablevaluesarr[5]; ?></td>
										<td></td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
						<?PHP
						echo $pages->display_pages();
						echo "<p class=\"paginate\">Page: $pages->current_page of $pages->num_pages</p>\n";
						//echo "<p class=\"paginate\">SELECT * FROM table LIMIT $pages->limit_start,$pages->limit_end (retrieve records $pages->limit_start-" . ($pages->limit_start + $pages->limit_end) . " from table - $pages->total_items item total / $pages->items_per_page items per page)";
						?>
					</div>
					<!-- /.table-responsive -->
					<input type="hidden" name="process" id="process" value="">
					<input type="hidden" name="render_ids" id="render_ids" value="">
					<!--a href="#" class="btn btn-default btn-sm" onclick="refresh_table()"><span class="glyphicon glyphicon-refresh"></span> Refresh</a-->
					<a href="javascript:void(0);" class="btn btn-default btn-sm" onclick="validateForm()"><span class="glyphicon glyphicon-save"></span> Render</a>					
				</div>
				<!-- /.panel-body -->
			</div>
			<!-- /.panel -->
		</div>
		<!-- /.col-lg-12 -->
	</div>
</form>

<!-- Modal -->
<div id="rangemodal" class="modal fade" role="dialog" >
	<div class="modal-dialog" style="width:600px;height:600px;">

		<!-- Modal content-->
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="modal_title" name="modal_title"></h4>
			</div>
			<div class="modal-body">
				<div id="nestedAccordion" style="font-size:14px">
					<h2 style="font-size:14px">Parent 1</h2>
					<div>
						<h3 style="font-size:14px">Child 1</h3>
						<div>Sub 1</div>
						<h3 style="font-size:14px">Child 2</h3>
						<div>Sub 2</div>
					</div>
					<h2 style="font-size:14px">Parent 2</h2>
					<div>
						<h3 style="font-size:14px">Child 1</h3>
						<div>Sub 1</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal"  id="cancel_btn">Close</button>
			</div>
		</div>

	</div>
</div>

<?PHP
include('footer.php');
?>