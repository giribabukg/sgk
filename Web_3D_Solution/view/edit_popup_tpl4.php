<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<form id="edit_form4"  name="edit_form4" action="edit_popup.php?process=view_range&sub_process=update_range&rowid=<?PHP echo $idd; ?>" method="post">
	<div class="panel-heading">
	</div>
	<div class="panel-body">
		<div class="dataTable_wrapper">
			<table class="table">
				<tr>
					<td>
						<div class="form-group">
							<label>Range Description<font color="red">*</font></label>
							<input class="form-control" placeholder="Enter Texture Item Number" name="rengedesc"id="rengedesc"  value="<?PHP echo $range_desc; ?>">
						</div>
					</td>
					<td>
						<div class="form-group">
							<label>Material Type<font color="red">*</font></label> <select class="form-control"
																	 name="range_mt" id="range_mt">
								<option value="0">Please select one</option>
								<?php
								while ($row_mat_md = mysqli_fetch_array($matmasterdata_sql, MYSQLI_ASSOC))
								{
									$sel="";
									if ($mat == $row_mat_md['id'])
										$sel = "selected";
									echo '<option value="' . $row_mat_md['id'] . '" ' . $sel . '>' . $row_mat_md['dataname'] . '</option>';
								}
								?>
							</select>
						</div>
					</td>
				</tr>
				<tr>
					<td>
						<div class="form-group">
							<label>Bead Option<font color="red">*</font></label> 
							<select class="form-control" name="rangebead" id="rangebead">
								<option value="0">Please select one</option>
								<?php
								while ($row_bead_md = mysqli_fetch_array($beadmasterdata_sql, MYSQLI_ASSOC))
								{
									$sel="";
									if ($bead == $row_bead_md['id'])
										$sel = "selected";
									echo '<option value="' . $row_bead_md['id'] . '" ' . $sel . '>' . $row_bead_md['dataname'] . '</option>';
								}
								?>
							</select>
						</div>
					</td>
					<td>
						<div class="form-group">
							<label>Angle Set Option<font color="red">*</font></label>
							<select class="form-control" name="rangeangle" id="rangeangle">
								<option value="0">Please select one</option>
								<?php
								while ($row_aso_md = mysqli_fetch_array($anglesetmasterdata_sql, MYSQLI_ASSOC))
								{
									$sel="";
									if ($angle == $row_aso_md['id'])
										$sel = "selected";
									echo '<option value="' . $row_aso_md['id'] . '" ' . $sel . '>' . $row_aso_md['dataname'] . '</option>';
								}
								?>

							</select>
						</div>
					</td>
					<td>
						<div class="form-group">
							<label>Category<font color="red">*</font></label> <select class="form-control" name="rangecat" id="rangecat">
								<option value="0">Please select one</option>
								<?php
								while ($row_category_md = mysqli_fetch_array($categorymasterdata_sql, MYSQLI_ASSOC))
								{
									$sel="";
									if ($category == $row_category_md['id'])
										$sel = "selected";
									echo '<option value="' . $row_category_md['id'] . '" ' . $sel . '>' . $row_category_md['dataname'] . '</option>';
								}
								?>
							</select>
						</div>
					</td>
				</tr>
				<tr>
					<td><input type="button" name="edit" id="edit" value="Edit" onclick="check_range()" class="btn btn-primary btn-sm">
						<input type="button" name="close" id="close" value="Close" onclick="close_popup()" class="btn btn-primary btn-sm"></td></tr>
			</table>
		</div>
	</div>
</form>