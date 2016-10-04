<?php
include ('../dao/lock.php');?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>Next 3D - Mster Data</title>

<!-- Bootstrap Core CSS -->
<link href="../bower_components/bootstrap/dist/css/bootstrap.min.css"
	rel="stylesheet">

<!-- MetisMenu CSS -->
<link href="../bower_components/metisMenu/dist/metisMenu.min.css"
	rel="stylesheet">

<!-- DataTables CSS -->
<link
	href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css"
	rel="stylesheet">

<!-- DataTables Responsive CSS -->
<link
	href="../bower_components/datatables-responsive/css/dataTables.responsive.css"
	rel="stylesheet">

<!-- Custom CSS -->
<link href="../dist/css/sb-admin-2.css" rel="stylesheet">

<!-- Custom Fonts -->
<link href="../bower_components/font-awesome/css/font-awesome.min.css"
	rel="stylesheet" type="text/css">

<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
<script>

function validateForm() {
	var e = document.getElementById("masterds");
    var strUser = e.options[e.selectedIndex].value;

    var strUser1 = e.options[e.selectedIndex].text;
    if(strUser==0)
    {
        alert("Please select a Header");
        return false;
    }

    var comments = document.getElementById("masterd").value;
	 if(comments==0)
	    {
	        alert("Please enter Data");
	        return false;
	    }

   
   
}

function validateMaster() {
	
	var comments = document.getElementById("masterh").value;
	 if(comments==0)
	    {
	        alert("Please enter Header");
	        return false;
	    }
}
</script>
	<div id="wrapper">

		<!-- Navigation -->
		<!-- Navigation -->
		<nav class="navbar navbar-default navbar-static-top" role="navigation"
			style="margin-bottom: 0">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse"
					data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span> <span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="index.html">Welcome <?php echo $login_session; ?></a>
			</div>
			<!-- /.navbar-header -->

			<ul class="nav navbar-top-links navbar-right">

				<!-- /.dropdown -->

				<!-- /.dropdown -->

				<!-- /.dropdown -->
				<li class="dropdown"><a class="dropdown-toggle"
					data-toggle="dropdown" href="#"> <i class="fa fa-user fa-fw"></i> <i
						class="fa fa-caret-down"></i>
				</a>
					<ul class="dropdown-menu dropdown-user">
						<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
						</li>
						<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a></li>
						<li class="divider"></li>
						<li><a href="../dao/logout.php"><i class="fa fa-sign-out fa-fw"></i>
								Logout</a></li>
					</ul> <!-- /.dropdown-user --></li>
				<!-- /.dropdown -->
			</ul>
			<!-- /.navbar-top-links -->

			<div class="navbar-default sidebar" role="navigation">
				<div class="sidebar-nav navbar-collapse">
					<ul class="nav" id="side-menu">
						<li class="sidebar-search">
							<div class="input-group custom-search-form">

								</span>
							</div> <!-- /input-group -->
						</li>
						<li><a href="../pages/index.php"><i class="fa fa-dashboard fa-fw"></i>
								Dashboard</a></li>
						<li><a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> WIP<span
								class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li><a href="phase.php">Phase</a></li>
								<li><a href="rangeoverview.php">Range Overview</a></li>
								<li><a href="batchmanagement.php">Batch Management</a></li>
								<li><a href="#">Re-Render</a></li>
								<li><a href="newness.php">Newness</a></li>
							</ul> <!-- /.nav-second-level --></li>

						<li><a href="forms.html"><i class="fa fa-edit fa-fw"></i> Profile</a>
						</li>
						<li><a href="#"><i class="fa fa-wrench fa-fw"></i> Look-up Tables<span
								class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li><a href="viewtexture1.php">Texture 1</a></li>
								<li><a href="viewtexture2.php">Texture 2</a></li>
								<li><a href="optioncode.php">Option Code</a></li>
								<li><a href="range.php">Range Code</a></li>
								<li><a href="model.php">Model</a></li>
								<li>
                                    <a href="#">Master Data<span class="fa arrow"></span></a>
                                     <ul class="nav nav-third-level">
                                        <li>
                                            <a href="viewmasterdata.php">View Master Data</a>
                                        </li>
                                        <li>
                                            <a href="entermasterdata.php">Enter Master Data</a>
                                        </li>
                                       
                                    </ul>
                                </li>
							</ul> <!-- /.nav-second-level --></li>
						<li><a href="#"><i class="fa fa-sitemap fa-fw"></i> Admin<span
								class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li><a href="#">Add User</a></li>
								<li><a href="#">Delete User</a></li>

							</ul> <!-- /.nav-second-level --></li>
						<li><a href="tables.html"><i class="fa fa-table fa-fw"></i> Report<span
								class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li><a href="#">Fabric Status Report</a></li>
								<li><a href="#">Model Creation Report</a></li>
								<li><a href="#">Phase Status Report</a></li>

							</ul></li>
						<li><a href="../dao/logout.php"><i class="fa fa-files-o fa-fw"></i>
								Log Out</a></li>

					</ul>
				</div>
				<!-- /.sidebar-collapse -->
			</div>
			<!-- /.navbar-static-side -->
		</nav>

		<div id="page-wrapper">
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
													while($row_season_md=mysqli_fetch_array($masterheader,MYSQLI_ASSOC))
													{
													
	//echo "Key=" . $x . ", Value=" . $x_value;
	//echo "<br>";
	echo '<option value="'.$row_season_md['id'].'">'.$row_season_md['dataname'].'</option>';
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
			<!-- /.row -->

			<!-- /.row -->

			<!-- /.row -->

			<!-- /.row -->
		</div>
		<!-- /#page-wrapper -->

	</div>
	<!-- /#wrapper -->

	<!-- jQuery -->
	<script src="../bower_components/jquery/dist/jquery.min.js"></script>

	<!-- Bootstrap Core JavaScript -->
	<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

	<!-- Metis Menu Plugin JavaScript -->
	<script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

	<!-- DataTables JavaScript -->
	<script
		src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	<script
		src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

	<!-- Custom Theme JavaScript -->
	<script src="../dist/js/sb-admin-2.js"></script>

	<!-- Page-Level Demo Scripts - Tables - Use for reference -->
	<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>
