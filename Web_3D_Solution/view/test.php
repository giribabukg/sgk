<?php
include ('../dao/lock.php');?>


<!DOCTYPE html>
<html lang="en">




</head>



	<body>
	
	<form name="uploadphase" action="../dao/briefupload.php" method="post" enctype="multipart/form-data">
							<div class="panel-heading"><label>Add New Phase</label></div>
							<div class="panel-body">
								<div class="dataTable_wrapper">
									<table>


										<tr>
											<td>
												<div class="form-group">
													<label>Season</label> <select class="form-control">
													<option>Please select Season</option>
														<?php 	foreach($seasonmd as $x => $x_value) {
			
	
	if(((int)$x%2) != 0)
	{
	//echo "Key=" . $x . ", Value=" . $x_value;
	//echo "<br>";
	echo '<option value="'.$x.'">'.$x_value.'</option>';
}
		
	
	
}?>
													</select>
												</div>
											</td>
											<td>&nbsp;</td>
											<td>
												<div class="form-group">
													<label>Category</label> <select class="form-control">
													<option>Please select Category</option>
														
													<?php 	foreach($categorymd as $x => $x_value) {
			
	
	if(((int)$x%2) != 0)
	{
	//echo "Key=" . $x . ", Value=" . $x_value;
	//echo "<br>";
	echo '<option value="'.$x.'">'.$x_value.'</option>';
}
		
	
	
}?>
														
													</select>
												</div>
											</td>
											<td>&nbsp;</td>
											<td><div class="form-group">
													<label>Description</label> <input class="form-control"
														placeholder="Enter description">
												</div></td>
												<td>&nbsp;</td>
											<td>
												<div class="form-group">
													<label>File input</label> <input type="file" name="brief" id="uploadbrief">
												</div>
											</td>
											<td>&nbsp;</td>											
												<td><input type="submit" name="submit" value="Upload"></td>
												<td>&nbsp;</td>
												
										</tr>


									</table>
								</div>
							</div>
						</form>
						
						
						</body>

</html>