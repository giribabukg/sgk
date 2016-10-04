<?php
include ('../dao/lock.php');
$hostname = gethostname();
if ($hostname == "SELVAMEENAK5C3E")
{
	$proj_path = "/PHP/NextWeb";
} else
{
	$proj_path = "..";
}
//$filename = basename($_SERVER["REQUEST_URI"], ".php");
$filename = basename(parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH), ".php");
//$filename_without_ext = basename($_SERVER["REQUEST_URI"], ".php");
?>
<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Next 3D</title>
		<!-- Bootstrap Core CSS -->
		<link href="<?PHP print $proj_path ?>/bower_components/bootstrap/dist/css/bootstrap.min.css"
			  rel="stylesheet">

		<!-- MetisMenu CSS -->
		<link href="<?PHP print $proj_path ?>/bower_components/metisMenu/dist/metisMenu.min.css"
			  rel="stylesheet">

		<!-- DataTables CSS -->
		<link
			href="<?PHP print $proj_path ?>/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css"
			rel="stylesheet">

		<!-- DataTables Responsive CSS -->
		<link href="<?PHP print $proj_path ?>/bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

		<link href="<?PHP print $proj_path ?>/css/bootstrap-editable.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="<?PHP print $proj_path ?>/dist/css/sb-admin-2.css" rel="stylesheet">
		<link href="<?PHP print $proj_path ?>/css/general.css" rel="stylesheet">
		<link href="<?PHP print $proj_path ?>/css/static.min.css" rel="stylesheet">
		<!-- Custom Fonts -->
		<link href="<?PHP print $proj_path ?>/bower_components/font-awesome/css/font-awesome.min.css"
			  rel="stylesheet" type="text/css">

		<link href="<?PHP print $proj_path ?>/bower_components/jquery-ui-1.11.4.custom/jquery-ui.css"
			  rel="stylesheet" type="text/css">
		<!--link href="<?PHP //print $proj_path  ?>/bower_components/jquery-ui-1.11.4.custom/multiaccordion.jquery.css"
			  rel="stylesheet" type="text/css"-->

		<script src="<?PHP print $proj_path ?>/bower_components/jquery/dist/jquery.min.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="<?PHP print $proj_path ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

		<!-- Metis Menu Plugin JavaScript -->
		<script src="<?PHP print $proj_path ?>/bower_components/metisMenu/dist/metisMenu.js"></script>

		<!-- DataTables JavaScript -->
		<script src="<?PHP print $proj_path ?>/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
		<script src="<?PHP print $proj_path ?>/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
		<script src="<?PHP print $proj_path ?>/bower_components/jquery-ui-1.11.4.custom/jquery-ui.js"></script>
		<!--script src="<?PHP //print $proj_path  ?>/bower_components/jquery-ui-1.11.4.custom/multiaccordion.jquery.js"></script-->

		<script src="<?PHP print $proj_path ?>/js/bootstrap-editable.js"></script>
		<!-- Custom Theme JavaScript -->
		<script src="<?PHP print $proj_path ?>/dist/js/sb-admin-2.js"></script>

		<script src="<?PHP print $proj_path ?>/js/jquery.progresstimer.js"></script>

		<script src="<?PHP print $proj_path ?>/js/<?PHP print $filename; ?>.js"></script>


	</head>
	<body>
		<div id="fade"></div>
		<div id="wrapper">

			<!-- Navigation -->
			<!-- Navigation -->
			<nav class="navbar navbar-default navbar-static-top" role="navigation"  style="margin-bottom: 0">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span> <span
							class="icon-bar"></span> <span class="icon-bar"></span> <span
							class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.html">Welcome <?php echo $login_session; ?></a>
				</div>
				<!-- /.navbar-header -->

				<ul class="nav navbar-top-links navbar-right">
					<li class="dropdown"><a class="dropdown-toggle"
											data-toggle="dropdown" href="#"> <i class="fa fa-user fa-fw"></i> <i
								class="fa fa-caret-down"></i>
						</a>
						<ul class="dropdown-menu dropdown-user">
							<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
							</li>
							<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a></li>
							<li class="divider"></li>
							<li><a href="<?PHP print $proj_path ?>/dao/logout.php"><i class="fa fa-sign-out fa-fw"></i>
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
							<li><a href="<?PHP print $proj_path ?>/pages/index.php"><i class="fa fa-dashboard fa-fw"></i>
									Dashboard</a></li>
							<li><a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> WIP<span
										class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li><a href="phase.php">Phase</a></li>
									<li><a href="rangeoverview.php">Range Overview</a></li>
									<li><a href="batchmanagement.php">Batch Management</a></li>
									<li><a href="#">Re-Render</a></li>
								</ul> <!-- /.nav-second-level --></li>

							<!--li><a href="forms.html"><i class="fa fa-edit fa-fw"></i> Profile</a>
							</li-->
							<li><a href="#"><i class="fa fa-wrench fa-fw"></i> Look-up Tables<span
										class="fa arrow"></span></a>
								<ul class="nav nav-second-level" id="test">
									<li><a href="viewtexture1.php">Texture 1</a></li>
									<li><a href="viewtexture2.php">Texture 2</a></li>
									<li><a href="optioncode.php">Option Code</a></li>
									<li><a href="range.php">Range Code</a></li>
									<li><a href="model.php">Model</a></li>
									<li><a href="finalise_newness.php">Finalize Newness</a></li>
									<li><a href="viewmasterdata.php">View Master Data</a></li>
									<li><a href="entermasterdata.php">Enter Master Data</a></li>
								</ul> <!-- /.nav-second-level --></li>
							<li><a href="#"><i class="fa fa-sitemap fa-fw"></i> Admin<span
										class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li><a href="adduser.php">Manage Users</a></li>
								</ul> <!-- /.nav-second-level --></li>
							<li><a href="tables.html"><i class="fa fa-table fa-fw"></i> Report<span
										class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li><a href="#">Fabric Status Report</a></li>
									<li><a href="#">Model Creation Report</a></li>
									<li><a href="#">Phase Status Report</a></li>

								</ul></li>
							<li><a href="<?PHP print $proj_path ?>/dao/logout.php"><i class="fa fa-files-o fa-fw"></i>
									Log Out</a></li>

						</ul>
					</div>
					<!-- /.sidebar-collapse -->
				</div>
				<!-- /.navbar-static-side -->
			</nav>
			<!--menu ends-->


			<div id="page-wrapper">