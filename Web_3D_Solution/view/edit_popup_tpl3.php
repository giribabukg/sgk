<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>
<form id="edit_form3"  name="edit_form3" action="edit_popup.php?process=view_option&sub_process=update_option&rowid=<?PHP echo $idd; ?>" method="post">
	<div class="panel-heading">
	</div>
	<div class="panel-body">
		<div class="dataTable_wrapper">
			<table class="table">
					<tr>
						<td>
							<div class="form-group">
								<label>Option Description<font color="red">*</font></label> <input class="form-control"
																		 placeholder="Enter Option Desc..." name="optiondesc" id="optiondesc" value="<?PHP echo $des; ?>">
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>State<font color="red">*</font></label> <select class="form-control"
															 name="optionstate" id="optionstate">
									<option value="0">Please select one</option>
									<?php
									while ($row_state_md = mysqli_fetch_array($statemasterdata_sql, MYSQLI_ASSOC))
									{
										$sel="";
										if ($state == $row_state_md['id'])
											$sel = "selected";
										echo '<option value="' . $row_state_md['id'] . '" ' . $sel . '>' . $row_state_md['dataname'] . '</option>';
									}
									?>
								</select>
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>Wrap Code Option<font color="red">*</font></label> <select class="form-control"
																		name="optionwrap" id="optionwrap">
									<option value="0">Please select one</option>
									<?php
									while ($row_wo_md = mysqli_fetch_array($wrapopmasterdata_sql, MYSQLI_ASSOC))
									{
										$sel="";
										if ($wrapcode == $row_wo_md['id'])
											$sel = "selected";
										echo '<option value="' . $row_wo_md['id'] . '" ' . $sel . '>' . $row_wo_md['dataname'] . '</option>';
									}
									?>
								</select>
							</div>
						</td>
					</tr>
					<tr>
						<td>
							<div class="form-group">
								<label>Angle Set Option<font color="red">*</font></label> <select class="form-control"
																		name="optionangel" id="optionangel">
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
								<label>Category<font color="red">*</font></label> <select class="form-control"
																name="opcat" id="opcat">
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
				</table>
				<labeL><font  style="font-size:18px">Camera Angle</font></labeL>
				<table class="table">
					<tr>
						<td>
							<div class="form-group">
								<label>Main</label> <input class="form-control"
														   placeholder="Main  " name="maincangle"
														   id="maincangle" value="<?PHP echo $main; ?>">
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>_1</label> <input class="form-control"
														 placeholder="_1  " name="_onecangle"
														 id="_onecangle" value="<?PHP echo $angle1; ?>">
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>_2</label> <input class="form-control"
														 placeholder="_2  " name="_twocangle"
														 id="_twocangle" value="<?PHP echo $angle2; ?>">
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>_3</label> <input class="form-control"
														 placeholder="_3  " name="_threecangle"
														 id="_threecangle" value="<?PHP echo $angle3; ?>">
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>_4</label> <input class="form-control"
														 placeholder="_4  " name="_fourcangle"
														 id="_fourcangle"  value="<?PHP echo $angle4; ?>">
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>_5</label> <input class="form-control"
														 placeholder="_5  " name="_fivecangle"
														 id="_fivecangle" value="<?PHP echo $angle5; ?>">
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>_6</label> <input class="form-control"
														 placeholder="_6  " name="_sixcangle"
														 id="_sixcangle" value="<?PHP echo $angle6; ?>">
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>_7</label> <input class="form-control"
														 placeholder="_7  " name="_sevencangle"
														 id="_sevencangle" value="<?PHP echo $angle7; ?>">
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>_8</label> <input class="form-control"
														 placeholder="-8  " name="_eightcangle"
														 id="_eightcangle" value="<?PHP echo $angle8; ?>">
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>_9</label> <input class="form-control"
														 placeholder="_9  " name="_ninecangle"
														 id="_ninecangle" value="<?PHP echo $angle9; ?>">
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>_10</label> <input class="form-control"
														  placeholder="_10  " name="_tencangle"
														  id="_tencangle" value="<?PHP echo $angle10; ?>">
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>_11</label> <input class="form-control"
														  placeholder="_11  " name="_elevencangle"
														  id="_elevencangle" value="<?PHP echo $angle11; ?>">
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>_12</label> <input class="form-control"
														  placeholder="_12  " name="_twelvecangle"
														  id="_twelvecangle" value="<?PHP echo $angle12; ?>">
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>_13</label> <input class="form-control"
														  placeholder="_13  " name="_thirteencangle"
														  id="_thirteencangle" value="<?PHP echo $angle13; ?>">
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>_14</label> <input class="form-control"
														  placeholder="_14 " name="_forteencangle"
														  id="_forteencangle" value="<?PHP echo $angle14; ?>">
							</div>
						</td>
						<td>
							<div class="form-group">
								<label>_15</label> <input class="form-control"
														  placeholder="_15 " name="_fifteencangle"
														  id="_fifteencangle" value="<?PHP echo $angle15; ?>">
							</div>
						</td>	
					</tr>
					<tr>
					</tr>
					<tr>
						<td><input type="button" name="edit" id="edit" value="Edit" onclick="check_data()" class="btn btn-primary btn-sm"></td>
						<td><input type="button" name="close" id="close" value="Close" onclick="close_range()" class="btn btn-primary btn-sm"></td>
					</tr>
				</table>
		</div>
	</div>
</form>