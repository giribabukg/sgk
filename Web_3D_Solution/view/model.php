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
if ($process == "upd_model")
{
	$modal_status = "SELECT a.id as modal_status FROM next_master_data_detail a, next_master_header_detail b WHERE a.headerid = b.id AND a.dataname = 'Approved'  AND b.HeaderName = 'Model Status'";
	$modal_status_row = mysqli_fetch_array(mysqli_query($db, $modal_status), MYSQLI_ASSOC);
	$status_id = $modal_status_row["modal_status"];
	
	$dataset = (string) filter_input(INPUT_POST, 'dataset');
	$dataarray = explode("|||||", $dataset);
	foreach ($dataarray as $value)
	{
		//echo $value . "<br>";
		list($model_id, $status,$cat) = explode("$$$$$", $value);
		$upd_qry = "UPDATE model_lookup SET mod_status=$status WHERE model_id=$model_id";
		mysqli_query($db, $upd_qry);
		if ($status==$status_id)
		{
			$upd_qry = "update next_main_matched_entry set model_status=1 where modelid=$model_id and model_status=0";
			mysqli_query($db, $upd_qry);
		}
		else
		{
			$upd_qry = "update next_main_matched_entry set model_status=0 where modelid=$model_id and batchid is null and model_status=1";
			mysqli_query($db, $upd_qry);
		}
		echo $upd_qry;
		
	}
}

$select_query = 'SELECT a.*,b.DataName AS modelstatus,c.DataName AS season,d.DataName AS category, e.Range_desc AS modrange, f.Description AS modoption,g.DataName AS modsate,h.DataName AS detailcode, i.DataName AS footshape, j.DataName AS wrapcode, k.firstname AS Approvedby
FROM model_lookup a, next_master_data_detail b,next_master_data_detail c, next_master_data_detail d, next_range_lookup_table e,next_option_lookup_table f, next_master_data_detail g, next_master_data_detail h, next_master_data_detail i, next_master_data_detail j, next_system_login_table k
WHERE a.mod_status=b.id AND a.mod_season=c.id AND a.mod_category=d.id AND a.mod_range=e.id AND a.mod_option=f.id AND a.mod_state=g.id AND a.mod_detailcode=h.id AND a.mod_footshape=i.id AND a.mod_wrapcode=j.id AND a.approved_by=k.id';
$retval = mysqli_query($db, $select_query);
?>

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Model</h1>
	</div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<label>Model LookUp Table</label>
			</div>
            <!-- /.panel-heading -->
			<div class="panel-body">
				<div class="dataTable_wrapper">
					<a href="javascript:void(0);" class="btn btn-default btn-sm" onclick="update_dbmodel()" style="margin-bottom: 15px;"><span class="glyphicon glyphicon-ok"></span> Update</a>
					<table class="table table-striped table-bordered table-hover nowrap table-condensed" id="dataTables-example">
						<thead>
							<tr style="font-size: 10px;">
								<th><input type="checkbox" class="form-control input-sm" id="checkedAll" name="check_all"></th>
								<th>No</th>
								<th title="Model Name">Name</th>
								<th title="Category">Category</th>
								<th title="Range ID">Range ID</th>
								<th title="Option Code">Option</th>
								<th title="State">State</th>
								<th title="Detail Code">Detail Code</th>
								<th title="Foot Shape">Foot Shape</th>
								<th title="Wrap Code">Wrap Code</th>
								<th title="Status">Status</th>
								<th title="Season">Season</th>
								<th title="Date Added">Date Added</th>
								<th title="Date Approved">Date Approved</th>
								<th title="Approved By">Approved by</th>
                                <!--th title="Comments">Comments</th-->
<!--   <td>
                                        <button type="button" class="form-control"
                                                style="font-size: larger;color: blue;
                                                background-color: none;" onclick="myFunction(this.id)" value="TexO<?php //echo $tablevaluesarr[14]            ?>" id="TexO<?php //echo $tablevaluesarr[14]            ?>">*</button>
                                    </td>-->
							</tr>
						</thead>
						<tbody>
							<?PHP
							$counter = 0;
							$fabricstatusmasterdata_sql = mysqli_query($db, "SELECT a.id, dataname FROM next_master_data_detail a, next_master_header_detail b WHERE a.headerid = b.id AND b.HeaderName = 'Model Status'");
							while ($row_wc_md = mysqli_fetch_array($fabricstatusmasterdata_sql, MYSQLI_ASSOC))
							{
								$status_array[$row_wc_md['id']] = $row_wc_md['dataname'];
							}
							while ($row = mysqli_fetch_array($retval, MYSQL_ASSOC))
							{
								$modelid = $row["model_id"];
								$counter++;
								echo "<tr style='font-size: 10px;'>";
								?>
							<td><input type="checkbox" class="form-control input-sm checkSingle" id="<?PHP echo $modelid; ?>" name="single_checkbox" value="<?PHP echo $counter; ?>"></td>
							<?PHP
							echo "<td>$counter</td>";
							echo "<td>" . $row["model_name"] . "</td>";
							echo "<td>" . $row["category"] . "</td>";
							echo "<td>" . $row["modrange"] . "</td>";
							echo "<td>" . $row["modoption"] . "</td>";
							echo "<td>" . $row["modsate"] . "</td>";
							echo "<td>" . $row["detailcode"] . "</td>";
							echo "<td>" . $row["footshape"] . "</td>";
							echo "<td>" . $row["wrapcode"] . "</td>";
							?>
							<td>
								<input type="hidden" name="cat" id="cat_"<?PHP echo $row["category"];?>>
								<select class="form-control input-sm" name="model_status" id="model_status_<?PHP echo $modelid; ?>">
									<?php
									foreach ($status_array as $key => $val)
									{
										$sel = "";
										if ($key == $row["mod_status"])
											$sel = "selected";
										echo '<option value="' . $key . '"  ' . $sel . '>' . $val . '</option>';
									}
									?>
								</select>
							</td>
							<?PHP
							echo "<td>" . $row["season"] . "</td>";
							echo "<td>" . $row["added_date"] . "</td>";
							echo "<td>" . $row["approved_date"] . "</td>";
							echo "<td>" . $row["Approvedby"] . "</td>";
							// echo "<td>" . $row["approved_by"] . "</td>";
							echo "</tr>";
						}
						?>
						</tbody>
                    </table>
					<form action="model.php" method="post" name="model_frm" id="model_frm">
						<input type="hidden" id="dataset" name="dataset" value="">
						<input type="hidden" id="process" name="process" value="upd_model">
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


<?PHP
include('footer.php');
?>