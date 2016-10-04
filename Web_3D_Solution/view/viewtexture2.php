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
if (isset($process) && $del_id != "")
{
	$t = time();
	$timelog = date("dmYhms", $t);
	try
	{
		$del_qry = "DELETE FROM next_texturesec_lookup_table WHERE id=$del_id";
		if (mysqli_query($db, $del_qry))
		{
			echo "Row deleted successfully!!";
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
        <h1 class="page-header">Texture 2</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<div class="panel panel-default">

    <div class="panel-heading"><label>Add New Texture 2 Data
        </label> 

    </div>


    <form id= "addtexture2" name="addtexture2" action="../dao/insertLUT.php" method="post" enctype="multipart/form-data">
	<div class="panel-heading">
		<input type="hidden" name="tables" value="Texture2">
        </div>
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <table class="table">
                    <tr>
                        <td>
                            <div class="form-group">
                                <label>Texture Color<font color="red">*</font></label> <input class="form-control"
                                                                                              placeholder="Enter Texture Color" name="texcolor2"
                                                                                              id="texcolor2">
                            </div>
                        </td>
			<td>
				<div class="form-group">
					<label>Status<font color="red">*</font></label> <select
						class="form-control" name="textstatus2" id="textstatus2">
						<option value="0">Please select one</option>
						<?php
						while ($row_status_md = mysqli_fetch_array($fabricstatusmasterdata_sql, MYSQLI_ASSOC))
						{

							echo '<option value="' . $row_status_md['id'] . '">' . $row_status_md['dataname'] . '</option>';
						}
						?>
					</select>
				</div>
				</td>	
                        <td>
                            <div class="form-group">
                                <label>Season<font color="red">*</font></label> <select class="form-control"
                                                                                        name="textseson2" id="textseson2">
                                    <option value="0">Please select one</option>
									<?php
									while ($row_season_md = mysqli_fetch_array($seasonmasterdata_sql, MYSQLI_ASSOC))
									{

										//echo "Key=" . $x . ", Value=" . $x_value;
										//echo "<br>";
										echo '<option value="' . $row_season_md['id'] . '">' . $row_season_md['dataname'] . '</option>';
									}
									?>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label>Category<font color="red">*</font></label> <select class="form-control"
                                                                                          name="textcat2" id="textcat2">
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
                    </tr>
                    <tr>
                        <td><label>Comments</label>

                            <div class="form-group">
                                <input class="form-control" placeholder="Enter comment here" name="texcomments2" id="texcomments2">
                            </div>

                        </td>

                    </tr>
                    <tr>
                        <td><input type="button" name="texture2" id="texture2" value="Create" onclick="validateForm2()"></td>
                </table>
            </div>
        </div>
    </form>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <label>Texture 2 LookUp Table</label>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover"
                           id="dataTables-example">
                        <thead>
                            <tr style="font-size: 10px;">
                                <th></th>
				<th>No</th>
                                <th title="Texture Item Number">Item Number</th>											
                                <th title="Texture Colour">Texture Color</th>
                                <th title="Status">Status</th>
                                <th title="Season">Season</th>
                                <th title="Category">Category</th>
                                <th title="Date Added">Added On</th>
                                <th title="Added By">Added By</th>
                                <!--th title="Approval Status">Approved?</th-->
                                <th title="Date Approved">Approved On</th>
                                <th title="Comments">Comments</th>
                                <th title="Edit or Delete">Act</th>

                            </tr>
                        </thead>
                        <tbody>

							<?php
							$counter1 = 0;

							$sql_texture2 = "SELECT aa.id,Texture_Item_no,Texture_Color,DateAdded,	
	(	SELECT DISTINCT  dataname FROM next_master_data_detail a,
		next_master_header_detail b
		WHERE a.headerid = b.id
		AND b.HeaderName = 'Fabric Status'
		AND aa.Status = a.id
	) AS STATUS
	,	
	(	SELECT DISTINCT  dataname FROM next_master_data_detail a,
		next_master_header_detail b
		WHERE a.headerid = b.id
		AND b.HeaderName = 'Season'
		AND aa.Season = a.id
	) AS Season,	
	(	SELECT DISTINCT  dataname FROM next_master_data_detail a,
		next_master_header_detail b
		WHERE a.headerid = b.id
		AND b.HeaderName = 'Category'
		AND aa.Category = a.id
	) AS Category,
	bb.Firstname,
	bb.secondname,
	dateadded,
	isapproved,
	dateapproved
	FROM 
	next_texturesec_lookup_table aa,
	next_system_login_table bb
	WHERE aa.Addedby = bb.id";

							$texture2_sql = mysqli_query($db, $sql_texture2);
							unset($texture2array);
							while ($row_texture2 = mysqli_fetch_array($texture2_sql, MYSQLI_ASSOC))
							{
								//echo $row_master_header['headername'];
								$collectiontexture2 = $row_texture2['Texture_Item_no'] . "/**/" . $row_texture2['Texture_Color']
										. "/**/" . $row_texture2['STATUS'] . "/**/" . $row_texture2['Season'] . "/**/" . $row_texture2['Category']
										. "/**/" . $row_texture2['dateadded'] . "/**/" . $row_texture2['Firstname'] . " " . $row_texture2['secondname'] . "/**/" . $row_texture2['isapproved']
										. "/**/" . $row_texture2['dateapproved'] . "/**/" . $row_texture2['id'];
								$texture2array[] = $collectiontexture2;
							}
							foreach ($texture2array as $tablevalues2)
							{
								$counter1++;

								$tablevaluesarr = explode("/**/", $tablevalues2);
								$id = $tablevaluesarr[9];
								?>


								<tr style="font-size: 10px;">
									<td><img style="width:20px;height:20px; cursor: pointer;" onclick="open_wind(<?PHP echo $id; ?>)" src="<?PHP print $proj_path ?>/img/edit.png" alt="Edit Row" title="Edit Row"></td>
									<td><?php echo $counter1; ?></td>
									<td><?php echo $tablevaluesarr[0]; ?></td>
									<td><?php echo $tablevaluesarr[1]; ?></td>
									<td><?php echo $tablevaluesarr[2]; ?></td>
									<td><?php echo $tablevaluesarr[3]; ?></td>
									<td><?php echo $tablevaluesarr[4]; ?></td>
									<td><?php echo $tablevaluesarr[5]; ?></td>
									<td><?php echo $tablevaluesarr[6]; ?></td>

									<!--td><?php
//										if ($tablevaluesarr[8] != "")
//										{
//											print '<a href="../dao/approvedata.php?type=N&table=texture2&id=' . $tablevaluesarr[9] . '">Y</>';
//										} else
//										{
//
//											print '<a href="../dao/approvedata.php?type=Y&table=texture2&id=' . $tablevaluesarr[9] . '">N</>';
//										}
									?></td-->
									<td><?php echo $tablevaluesarr[8]; ?></td>
									<td>
										<button type="button" class="form-control"
												style="font-size: larger;color: blue; 
												background-color: none;" onclick="myFunction(this.id)"; value="TeSO<?php echo $tablevaluesarr[9] ?>" id="TexS<?php echo $tablevaluesarr[9] ?>">*</button>
									</td>
									<td><a href="javascript:void(0);" onclick="del_row(<?PHP echo $id; ?>)"><span class="glyphicon glyphicon-remove"></span></a></td>
								</tr>
								<?php
							}
							?>
                        </tbody>
                    </table>
                    <form action="viewtexture2.php" method="post" name="delete_action" id="delete_action">
                        <input type="hidden" name ="del_id" id="del_id" value="">
                        <input type ="hidden" name="process" id="process" value="delete_row">
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