<?php
$hostname = gethostname();
if ($hostname == "SELVAMEENAK5C3E") {
    $proj_path = "/PHP/NextWeb";
} else {
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
if (isset($process) && $del_id != "") {
    $t = time();
    $timelog = date("dmYhms", $t);
    try {
        $del_qry = "DELETE FROM next_texture_lookup_table WHERE id=$del_id";
        if (mysqli_query($db, $del_qry)) {
            echo "Row deleted successfully!!";
            $id = str_pad($userid, 5, "0", STR_PAD_LEFT);
            error_log($timelog . " => Success: [$del_id] deleted successfully created by [$username - System Profile Id ($id)]\n", 3, "../log/Transaction.log");
            error_log($del_qry . "\n", 3, "../log/Transaction.log");
        } else {
            echo "Row not able to delete!!";
            $id = str_pad($userid, 5, "0", STR_PAD_LEFT);
            error_log($timelog . " => Error: [$del_id] not deleted Error uploaded by [$username - System Profile Id ($id)]\n", 3, "../log/Transaction.log");
            error_log($del_qry . "\n", 3, "../log/Transaction.log");
        }
    } catch (Exception $ex) {
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


while ($category_array1 = mysqli_fetch_array($categorymasterdata_sql, MYSQLI_ASSOC)) {
    $cat_array[$category_array1["id"]] = $category_array1["dataname"];
}
$category_array = json_encode($cat_array);
?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Texture 1</h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<!-- /.row -->

<div class="panel panel-default">

    <div class="panel-heading"><label>Add New Texture 1 Data
        </label> 

    </div>
    <form id="addtexture1" name="addtexture1" action="../dao/insertLUT.php"
          method="post" enctype="multipart/form-data">
        <div class="panel-heading">

        </div>
        <div class="panel-body">
            <div class="dataTable_wrapper">
                <input type="hidden" name="tables" value="Texture1">
                <table class="table">
                    <tr>
                        <td>
                            <div class="form-group">
                                <label>Item Number <font color="red">*</font></label> <input class="form-control"
                                                                                             placeholder="Enter Texture Item Number" name="texitemno"
                                                                                             id="texitemno">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label>Texture Name <font color="red">*</font></label> <input class="form-control"
                                                                                              placeholder="Enter Texture name" name="texname"
                                                                                              id="texname">
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label>Texture Color <font color="red">*</font></label> <input class="form-control"
                                                                                               placeholder="Enter Texture Color" name="texcolor"
                                                                                               id="texcolor">
                            </div>
                        </td>	


                    </tr>

                    <tr>
                        <td>
                            <div class="form-group">
                                <label>Standard Wrap Code <font color="red">*</font></label> <select
                                    class="form-control" name="textwrapcode" id="textwrapcode">
                                    <option value="0">Please select one</option>
                                    <?php
                                    while ($row_wc_md = mysqli_fetch_array($wrapcodemasterdata_sql, MYSQLI_ASSOC)) {
                                        echo '<option value="' . $row_wc_md['id'] . '">' . $row_wc_md['dataname'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label>Alt Wrap Code 1 <font color="red">*</font></label> <select class="form-control"
                                                                                                  name="textwrapcode1" id="textwrapcode1">
                                    <option value="0">Please select one</option>

                                    <?php
                                    while ($row_wc_md = mysqli_fetch_array($wrapcodemasterdata_sql1, MYSQLI_ASSOC)) {
                                        echo '<option value="' . $row_wc_md['id'] . '">' . $row_wc_md['dataname'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </td>


                        <td>
                            <div class="form-group">
                                <label>Alt Wrap Code 2 <font color="red">*</font></label> <select class="form-control"
                                                                                                  name="textwrapcode2" id="textwrapcode2">
                                    <option value="0">Please select one</option>
                                    <?php
                                    while ($row_wc_md = mysqli_fetch_array($wrapcodemasterdata_sql2, MYSQLI_ASSOC)) {
                                        echo '<option value="' . $row_wc_md['id'] . '">' . $row_wc_md['dataname'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </td>

                        <td>
                            <div class="form-group">
                                <label>Alt Wrap Code 3 <font color="red">*</font></label> <select class="form-control"
                                                                                                  name="textwrapcode3" id="textwrapcode3">
                                    <option value="0">Please select one</option>
                                    <?php
                                    while ($row_wc_md = mysqli_fetch_array($wrapcodemasterdata_sql3, MYSQLI_ASSOC)) {
                                        echo '<option value="' . $row_wc_md['id'] . '">' . $row_wc_md['dataname'] . '</option>';
                                    }
                                    ?>



                                </select>
                            </div>
                        </td>


                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label>Status <font color="red">*</font></label> <select
                                    class="form-control" name="textstatus" id="textstatus">
                                    <option value="0">Please select one</option>
                                    <?php
                                    while ($row_status_md = mysqli_fetch_array($fabricstatusmasterdata_sql, MYSQLI_ASSOC)) {
                                        echo '<option value="' . $row_status_md['id'] . '">' . $row_status_md['dataname'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label>Season <font color="red">*</font></label> <select class="form-control"
                                                                                         name="textseson" id="textseson">
                                    <option value="0">Please select one</option>
                                    <?php
                                    while ($row_season_md = mysqli_fetch_array($seasonmasterdata_sql, MYSQLI_ASSOC)) {
                                        echo '<option value="' . $row_season_md['id'] . '">' . $row_season_md['dataname'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </td>
                        <td>
                            <div class="form-group">
                                <label>Category <font color="red">*</font></label> <select class="form-control"
                                                                                           name="textcat" id="textcat">
                                    <option value="0">Please select one</option>
                                    <?php
                                    while ($row_category_md = mysqli_fetch_array($categorymasterdata_sql1, MYSQLI_ASSOC)) {
                                        echo '<option value="' . $row_category_md['id'] . '">' . $row_category_md['dataname'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="form-group">
                                <label>Fabric Design <font color="red">*</font></label> 
                                <select class="form-control"
                                        name="texfabdeg" id="texfabdeg">
                                    <option value="0">Please select one</option>
                                    <?php
                                    while ($row_fab_md = mysqli_fetch_array($fabricmasterdata_sql, MYSQLI_ASSOC)) {
                                        echo '<option value="' . $row_fab_md['id'] . '">' . $row_fab_md['dataname'] . '</option>';
                                    }
                                    ?>
                                </select>


                            </div>
                        </td>

                        <td>
                            <div class="form-group">
                                <label>Material Type <font color="red">*</font></label> 

                                <select class="form-control"
                                        name="texmd" id="texmd">
                                    <option value="0">Please select one</option>
                                    <?php
                                    while ($row_mat_md = mysqli_fetch_array($matmasterdata_sql, MYSQLI_ASSOC)) {
                                        echo '<option value="' . $row_mat_md['id'] . '">' . $row_mat_md['dataname'] . '</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </td>	
                    </tr>
                    <tr>
                        <td><label>Comments</label>

                            <div class="form-group">
                                <input class="form-control" placeholder="Enter comment here" name="texcomments" id="texcomments">
                            </div>

                        </td>
                    </tr>
                    <tr>
                        <td><input type="button" name="texture1" id="texture1" value="Create" onclick="validateForm()"></td>
                    </tr>
                </table>
            </div>
        </div>
    </form>
</div>

<div class="row" id="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <label>Texture 1 LookUp Table</label>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="dataTable_wrapper">
                    <table class="table table-striped table-bordered table-hover nowrap" id="dataTables-example">
                        <thead>
                            <tr style="font-size: 10px;">
                                <th></th>
			<th>No</th>
                                <th title="Texture Item Number">Item No</th>
                                <th title="Texture Name">Tex Nm</th>
                                <th title="Texture Colour">Tex Clr</th>
                                <th title="Std Wrap Code">Std WC</th>
                                <th title="Alt Wrap Code 1">Alt WC1</th>
                                <th title="Alt Wrap Code 2">Alt WC2</th>
                                <th title="Alt Wrap Code 3">Alt WC3</th>
                                <th title="Fabric Design">Fab Dsgn</th>
                                <th title="Material type">Mat Type</th>
                                <th title="Status">Stts</th>
                                <th title="Season">Seas</th>
                                <th title="Category">Cat</th>
                                <th title="Date Added">Dte</th>
                                <th title="Added By">By</th>
                                <!--th title="Approval Status">Sts</th-->
                                <th title="Date Approved">App On</th>
                                <th title="Comments">Cmnts</th>											
                                <th title="Edit or Delete">Act</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $counter = 0;
                            $sql_texture1 = "SELECT aa.id,Texture_Item_no,Texture_Name,Texture_Color,
	(	SELECT DISTINCT  dataname FROM next_master_data_detail a,
		next_master_header_detail b
		WHERE a.headerid = b.id
		AND b.HeaderName = 'Wrapcode LUT'
		AND aa.StdWrapCode = a.id
	) AS StandardWrapCode,
	(	SELECT DISTINCT  dataname FROM next_master_data_detail a,
		next_master_header_detail b
		WHERE a.headerid = b.id
		AND b.HeaderName = 'Wrapcode LUT'
		AND aa.AltWrapCode1 = a.id
	) AS AltWrapCode1,
	(	SELECT DISTINCT  dataname FROM next_master_data_detail a,
		next_master_header_detail b
		WHERE a.headerid = b.id
		AND b.HeaderName = 'Wrapcode LUT'
		AND aa.AltWrapCode2 = a.id
	) AS AltWrapCode2,
	(	SELECT DISTINCT  dataname FROM next_master_data_detail a,
		next_master_header_detail b
		WHERE a.headerid = b.id
		AND b.HeaderName = 'Wrapcode LUT'
		AND aa.AltWrapCode3 = a.id
	) AS AltWrapCode3,	
	(	SELECT DISTINCT  dataname FROM next_master_data_detail a,
		next_master_header_detail b
		WHERE a.headerid = b.id
		AND b.HeaderName = 'Fabric'
		AND aa.FabricDesign = a.id
	) AS FabricDesign,	
	(	SELECT DISTINCT  dataname FROM next_master_data_detail a,
		next_master_header_detail b
		WHERE a.headerid = b.id
		AND b.HeaderName = 'Material Type LUT'
		AND aa.MaterialType = a.id
	) AS MaterialType,	
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
	next_texture_lookup_table aa,
	next_system_login_table bb
	WHERE aa.Addedby = bb.id";


                            $texture1_sql = mysqli_query($db, $sql_texture1);
                            unset($texture1array);
                            while ($row_texture1 = mysqli_fetch_array($texture1_sql, MYSQLI_ASSOC)) {
                                //echo $row_master_header['headername'];
                                $collectiontexture1 = $row_texture1['Texture_Item_no'] . "/**/" . $row_texture1['Texture_Name'] . "/**/" . $row_texture1['Texture_Color']
                                        . "/**/" . $row_texture1['StandardWrapCode'] . "/**/" . $row_texture1['AltWrapCode1'] . "/**/" . $row_texture1['AltWrapCode2']
                                        . "/**/" . $row_texture1['AltWrapCode3'] . "/**/" . $row_texture1['FabricDesign'] . "/**/" . $row_texture1['MaterialType']
                                        . "/**/" . $row_texture1['STATUS'] . "/**/" . $row_texture1['Season'] . "/**/" . $row_texture1['Category']
                                        . "/**/" . $row_texture1['dateadded'] . "/**/" . $row_texture1['Firstname'] . " " . $row_texture1['secondname'] . "/**/" . $row_texture1['isapproved']
                                        . "/**/" . $row_texture1['dateapproved'] . "/**/" . $row_texture1['id'];
                                $texture1array[] = $collectiontexture1;
                            }
                            foreach ($texture1array as $tablevalues) {
                                $counter++;
                                $tablevaluesarr = explode("/**/", $tablevalues);
                                $id = $tablevaluesarr[16];
                                $category = $tablevaluesarr[11];
                                ?>
                                <tr style="font-size: 10px;">
                                    <td><img style="width:20px;height:20px; cursor: pointer;" onclick="open_wind(<?PHP echo $id; ?>)" src="<?PHP print $proj_path ?>/img/edit.png" alt="Edit Row" title="Edit Row"></td>
				<td><?php echo $counter; ?></td>
                                    <td><?php echo $tablevaluesarr[0]; ?></td>
                                    <td><?php echo $tablevaluesarr[1]; ?></td>
                                    <td><?php echo $tablevaluesarr[2]; ?></td>
                                    <td><?php
                                        if ($tablevaluesarr[3] != "") {
                                            echo $tablevaluesarr[3];
                                        } else {
                                            echo "NIL";
                                        }
                                        ?></td>
                                    <td><?php
                                        if ($tablevaluesarr[4] != "") {
                                            echo $tablevaluesarr[4];
                                        } else {
                                            echo "NIL";
                                        }
                                        ?></td>
                                    <td><?php
                                        if ($tablevaluesarr[5] != "") {
                                            echo $tablevaluesarr[5];
                                        } else {
                                            echo "NIL";
                                        }
                                        ?></td>
                                    <td><?php
                                        if ($tablevaluesarr[6] != "") {
                                            echo $tablevaluesarr[6];
                                        } else {
                                          echo "NIL";
                                        }
                                        ?></td>
                                    <td><?php echo $tablevaluesarr[7]; ?></td>
                                    <td><?php echo $tablevaluesarr[8]; ?></td>
                                    <td><?php echo $tablevaluesarr[9]; ?></td>
                                    <td><?php echo $tablevaluesarr[10]; ?></td>
                                    <td><?PHP echo $category; ?></td>
                                    <td><?php echo $tablevaluesarr[12]; ?></td>
                                    <td><?php echo $tablevaluesarr[13]; ?></td>
                                    <!--<td><?php
//										if ($tablevaluesarr[14] != "")
//										{
//											print '<a href="../dao/approvedata.php?type=N&table=texture1&id=' . $tablevaluesarr[16] . '">Y</>';
//										} else
//										{
//
//											print '<a href="../dao/approvedata.php?type=Y&table=texture1&id=' . $tablevaluesarr[16] . '">N</>';
//										}
                                    ?></td-->
                                    <td><?php
                                        if ($tablevaluesarr[15] != "") {
                                            echo $tablevaluesarr[15];
                                        } else {
                                            echo "";
                                        }
                                        ?></td>
                                    <td>			
                                        <button type="button" class="form-control"
                                                style="font-size: larger;color: blue; 
                                                background-color: none;" onclick="myFunction(this.id)" value="TexO<?php echo $tablevaluesarr[16] ?>" id="TexO<?php echo $tablevaluesarr[16] ?>">*</button>
                                    </td>
                                    <td><a href="javascript:void(0);" onclick="del_row(<?PHP echo $id; ?>)"><span class="glyphicon glyphicon-remove"></span></a></td>
                                </tr>	
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <form action="viewtexture1.php" method="post" name="delete_action" id="delete_action">
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