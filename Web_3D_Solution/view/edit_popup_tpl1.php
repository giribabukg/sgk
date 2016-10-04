<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<form id="edit_form"  name="edit_form" action="edit_popup.php?process=view_texture1&sub_process=update_texture1&rowid=<?PHP echo $idd;?>" method="post">
	<div class="panel-heading">
	</div>
	<div class="panel-body">
		<div class="dataTable_wrapper">
			
			<table class="table">
				<tr>
					<td>
						<div class="form-group">
							<label>Item Number <font color="red">*</font></label> 
							<input class="form-control" placeholder="Enter Texture Item Number" name="texitemno" id="texitemno" value="<?PHP echo $texture_item_no; ?>">
						</div>
					</td>
					<td>
						<div class="form-group">
							<label>Texture Name <font color="red">*</font></label>
							<input class="form-control" placeholder="Enter Texture name" name="texname" id="texname" value="<?PHP echo $texture_name; ?>">
						</div>
					</td>
					<td>
						<div class="form-group">
							<label>Texture Color <font color="red">*</font></label>
							<input class="form-control" placeholder="Enter Texture Color" name="texcolor" id="texcolor" value="<?PHP echo $texture_color; ?>">
						</div>
					</td>	
				</tr>
				<tr>
					<td>
						<div class="form-group">
							<label>Standard Wrap Code<font color="red">*</font></label> 
							<select class="form-control" name="textwrapcode" id="textwrapcode">
								<option value="0">Please select one</option>
								<?php
								
								while ($row_wc_md = mysqli_fetch_array($wrapcodemasterdata_sql, MYSQLI_ASSOC))
								{
									$sel = "";
									if ($altwpcode == $row_wc_md['id'])
										$sel = "selected";
									echo '<option value="' . $row_wc_md['id'] . '" ' . $sel . '>' . $row_wc_md['dataname'] . '</option>';
								}
								?>
							</select>
						</div>
					</td>
					<td>
						<div class="form-group">
							<label>Alt Wrap Code 1<font color="red">*</font></label> <select class="form-control" name="textwrapcode1" id="textwrapcode1">
								<option value="0">Please select one</option>
								<?php
							while ($row_wc_md = mysqli_fetch_array($wrapcodemasterdata_sql1, MYSQLI_ASSOC))
								{
									$sel = "";
									if ($altwpcode1 == $row_wc_md['id'])
										$sel = "selected";
									echo '<option value="' . $row_wc_md['id'] . '" ' . $sel . '>' . $row_wc_md['dataname'] . '</option>';
								}
								?>
							</select>
						</div>
					</td>
					<td>
						<div class="form-group">
							<label>Alt Wrap Code 2<font color="red">*</font></label> <select class="form-control" name="textwrapcode2" id="textwrapcode2">
								<option value="0">Please select one</option>
								<?php
								while ($row_wc_md = mysqli_fetch_array($wrapcodemasterdata_sql2, MYSQLI_ASSOC))
								{
									$sel = "";
									if ($altwpcode2 == $row_wc_md['id'])
										$sel = "selected";
									echo '<option value="' . $row_wc_md['id'] . '" ' . $sel . '>' . $row_wc_md['dataname'] . '</option>';
								}
								?>
							</select>
						</div>
					</td>

					<td>
						<div class="form-group">
							<label>Alt Wrap Code 3<font color="red">*</font></label> <select class="form-control" name="textwrapcode3" id="textwrapcode3">
								<option value="0">Please select one</option>
								<?php
								while ($row_wc_md = mysqli_fetch_array($wrapcodemasterdata_sql3, MYSQLI_ASSOC))
								{
									$sel = "";
									if ($altwpcode3 == $row_wc_md['id'])
										$sel = "selected";
									echo '<option value="' . $row_wc_md['id'] . '" ' . $sel . '>' . $row_wc_md['dataname'] . '</option>';
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
									while ($row_status_md = mysqli_fetch_array($fabricstatusmasterdata_sql, MYSQLI_ASSOC))
									{
										$sel = "";
										if ($status == $row_status_md['id'])
										$sel = "selected";
										echo '<option value="' . $row_status_md['id'] . '" ' . $sel . '>' . $row_status_md['dataname'] . '</option>';
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
								while ($row_season_md = mysqli_fetch_array($seasonmasterdata_sql, MYSQLI_ASSOC))
								{
									$sel = "";
									if ($season == $row_season_md['id'])
										$sel = "selected";
									echo '<option value="' . $row_season_md['id'] . '" ' . $sel . '>' . $row_season_md['dataname'] . '</option>';
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
								while ($row_category_md = mysqli_fetch_array($categorymasterdata_sql, MYSQLI_ASSOC))
								{
									$sel = "";
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
					<td>
						<div class="form-group">
							<label>Fabric Design <font color="red">*</font></label> 
							<select class="form-control"
									name="texfabdeg" id="texfabdeg">
								<option value="0">Please select one</option>
								<?php
								while ($row_fab_md = mysqli_fetch_array($fabricmasterdata_sql, MYSQLI_ASSOC))
								{
									$sel = "";
									if ($fabric_design == $row_fab_md['id'])
										$sel = "selected";
									echo '<option value="' . $row_fab_md['id'] . '" ' . $sel . '>' . $row_fab_md['dataname'] . '</option>';
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
								while ($row_mat_md = mysqli_fetch_array($matmasterdata_sql, MYSQLI_ASSOC))
								{
									$sel = "";
									if ($material_type == $row_mat_md['id'])
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
						<input type="hidden" name="old_stat_id" id="old_stat_id" value="<?PHP echo $status; ?>">
						<input type="button" name="edit" id="edit" value="Edit" onclick="validate_Form()" class="btn btn-primary btn-sm">
						<input type="button" name="close" id="close" value="Close" onclick="close_text1()" class="btn btn-primary btn-sm">
					</td>
				</tr>
			</table>
		</div>
	</div>
</form>
