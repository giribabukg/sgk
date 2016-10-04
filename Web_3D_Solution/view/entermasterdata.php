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
?>

<div class="row">
	<div class="col-lg-12">
		<h1 class="page-header">Master Data</h1>
	</div>
	<!-- /.col-lg-12 -->
</div>
<!-- /.row -->
<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-default">
			<div class="panel-heading"><label>Master Data - Insert</label></div>
			<!-- /.panel-heading -->

			<form name="masterdata" action="../dao/addmaster.php?type=data" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
				<div class="panel-heading"><label>Add New Master Data</label></div>
				<div class="panel-body">
					<div class="dataTable_wrapper">
						<table>


							<tr>
								<td>
									<div class="form-group">
										<label>Header</label> <select class="form-control" name="masterds" id ="masterds">
											<option value="0">Please select Header</option>
											<?php
											while ($row_season_md = mysqli_fetch_array($masterheader, MYSQLI_ASSOC))
											{

												//echo "Key=" . $x . ", Value=" . $x_value;
												//echo "<br>";
												echo '<option value="' . $row_season_md['id'] . '">' . $row_season_md['dataname'] . '</option>';
											}
											?>												</select>
									</div>
								</td>
								<td>&nbsp;</td>

								<td>&nbsp;</td>
								<td><div class="form-group">
										<label>Data</label> <input class="form-control"
																   placeholder="Enter Data" name="masterd" id="masterd">
									</div></td>
								<td>&nbsp;</td>
								<td><div class="form-group">
										<label>Description</label> <input class="form-control"
																		  placeholder="Enter Desc..." name="masterdd" id="masterdd">
									</div></td>
								<td>&nbsp;</td>											
								<td><input type="submit" name="submit" value="Create"></td>
								<td>&nbsp;</td>

							</tr>


						</table>
					</div>
				</div>
			</form>

			<form name="masterdata" action="../dao/addmaster.php?type=master" method="post" enctype="multipart/form-data" onsubmit="return validateMaster()">
				<div class="panel-heading"><label>Add New Master Header</label></div>
				<div class="panel-body">
					<div class="dataTable_wrapper">
						<table>


							<tr>



								<td>&nbsp;</td>
								<td><div class="form-group">
										<label>Header</label> <input class="form-control"
																	 placeholder="Enter description" name="masterh" id="masterh">
									</div></td>
								<td>&nbsp;</td>

								<td>&nbsp;</td>											
								<td><input type="submit" name="submit" value="Create"></td>
								<td>&nbsp;</td>

							</tr>


						</table>
					</div>
				</div>
			</form>
		</div>
		<!-- /.panel -->
	</div>
	<!-- /.col-lg-12 -->
</div>

