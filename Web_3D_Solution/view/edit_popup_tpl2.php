<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<form id="edit_form1"  name="edit_form1" action="edit_popup.php?process=view_texture2&sub_process=update_texture2&rowid=<?PHP echo $idd; ?>" method="post">
	<div class="panel-heading">
	</div>
	<div class="panel-body">
		<div class="dataTable_wrapper">
			<table class="table">
				<tr>
					<td>
						<div class="form-group">
							<label>Texture Color</label> <input class="form-control" placeholder="Enter Texture Color" name="texcolor2" id="texcolor2" value="<?PHP echo $texture_color; ?>">
						</div>
					</td>
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
							<label>Season</label> <select class="form-control"
														  name="textseson2" id="textseson2">
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
							<label>Category</label> <select class="form-control"
															name="textcat2" id="textcat2">
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
						<input type="hidden" name="old_stat_id" id="old_stat_id" value="<?PHP echo $status; ?>">
						<input type="button" name="edit" id="edit" value="Edit" onclick="validateForm1()" class="btn btn-primary btn-sm">
						<input type="button" name="close" id="close" value="Close" onclick="close_text2()" class="btn btn-primary btn-sm"></td></tr>
			</table>

		</div>
	</div>
</form>