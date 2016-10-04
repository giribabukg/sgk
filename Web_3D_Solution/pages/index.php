<?php
include('../dao/lock.php');
$hostname = gethostname();
if ($hostname == "SELVAMEENAK5C3E")
{
	$proj_path = "/PHP/NextWeb";
} else
{
	$proj_path = "..";
}
?>

<!DOCTYPE html>
<html lang="en">

	<head>

		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>Next 3D - Main Page</title>

		<!-- Bootstrap Core CSS -->
		<link href="<?PHP print $proj_path ?>/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

		<!-- MetisMenu CSS -->
		<link href="<?PHP print $proj_path ?>/bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

		<!-- Timeline CSS -->
		<link href="<?PHP print $proj_path ?>/dist/css/timeline.css" rel="stylesheet">

		<!-- Custom CSS -->
		<link href="<?PHP print $proj_path ?>/dist/css/sb-admin-2.css" rel="stylesheet">

		<!-- Morris Charts CSS -->
		<link href="<?PHP print $proj_path ?>/bower_components/morrisjs/morris.css" rel="stylesheet">

		<!-- Custom Fonts -->
		<link href="<?PHP print $proj_path ?>/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

	</head>

	<body>

		<div id="wrapper">

			<!-- Navigation -->
			<nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="index.html">Welcome <?php echo $login_session; ?> - System Profile Id (<?php
echo
str_pad($personId_session, 5, "0", STR_PAD_LEFT)
;
?>)</a>
				</div>
				<!-- /.navbar-header -->

				<ul class="nav navbar-top-links navbar-right">

					<!-- /.dropdown -->

					<!-- /.dropdown -->

					<!-- /.dropdown -->
					<li class="dropdown">
						<a class="dropdown-toggle" data-toggle="dropdown" href="#">
							<i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
						</a>
						<ul class="dropdown-menu dropdown-user">
							<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
							</li>
							<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
							</li>
							<li class="divider"></li>
							<li><a href="../dao/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
							</li>
						</ul>
						<!-- /.dropdown-user -->
					</li>
					<!-- /.dropdown -->
				</ul>
				<!-- /.navbar-top-links -->

				<div class="navbar-default sidebar" role="navigation">
					<div class="sidebar-nav navbar-collapse">
						<ul class="nav" id="side-menu">
							<li class="sidebar-search">
								<div class="input-group custom-search-form">

									</span>
								</div>
								<!-- /input-group -->
							</li>
							<li>
								<a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
							</li>
							<li>
								<a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> WIP<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="../view/phase.php">Phase</a>
									</li>
									<li>
										<a href="../view/rangeoverview.php">Range Overview</a>
									</li>
									<li>
										<a href="../view/batchmanagement.php">Batch Management</a>
									</li>
									<li>
										<a href="#">Re-Render</a>
									</li>
								</ul>
								<!-- /.nav-second-level -->
							</li>                       
							<li>
								<a href="#"><i class="fa fa-wrench fa-fw"></i> Look-up Tables<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="../view/viewtexture1.php">Texture 1</a>
									</li>
									<li>
										<a href="../view/viewtexture2.php">Texture 2</a>
									</li>
									<li>
										<a href="../view/optioncode.php">Option Code</a>
									</li>
									<li>
										<a href="../view/range.php">Range Code</a>
									</li>
									<li>
										<a href="../view/model.php">Model</a>
									</li>
									<li><a href="../view/finalise_newness.php">Finalize Newness</a></li>
									<li>
										<a href="../view/viewmasterdata.php">View Master Data</a>
									</li>
									<li>
										<a href="../view/entermasterdata.php">Enter Master Data</a>
									</li>
								</ul>
								<!-- /.nav-second-level -->
							</li>
							<li>
								<a href="#"><i class="fa fa-sitemap fa-fw"></i> Admin<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="add_user">Manage Users</a>
									</li>
								</ul>
								<!-- /.nav-second-level -->
							</li>
							<li>
								<a href="tables.html"><i class="fa fa-table fa-fw"></i> Report<span class="fa arrow"></span></a>
								<ul class="nav nav-second-level">
									<li>
										<a href="#">Fabric Status Report</a>
									</li>
									<li>
										<a href="#">Model Creation Report</a>
									</li>
									<li>
										<a href="#">Phase Status Report</a>
									</li>

								</ul>
							</li>
							<li>
								<a href="../dao/logout.php"><i class="fa fa-files-o fa-fw"></i> Log Out</a>
							</li>

						</ul>
					</div>
					<!-- /.sidebar-collapse -->
				</div>
				<!-- /.navbar-static-side -->
			</nav>

			<div id="page-wrapper">
				<div class="row">
					<div class="col-lg-12">
						<h1 class="page-header">Dashboard</h1>
					</div>
					<!-- /.col-lg-12 -->
				</div>
				<!-- /.row -->
				<div class="row">
					<div class="col-lg-3 col-md-6">
						<div class="panel panel-primary">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-user fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge"><?php echo $noofpeople_session; ?></div>
										<div>Registered user</div>
									</div>
								</div>
							</div>
							<a href="#">
								<div class="panel-footer">
									<span class="pull-left">View Details</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="panel panel-green">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-tasks fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge"><?php echo $noofphase_session; ?></div>
										<div>Phases!</div>
									</div>
								</div>
							</div>
							<a href="#">
								<div class="panel-footer">
									<span class="pull-left">View Details</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="panel panel-yellow">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-shopping-cart fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge">124</div>
										<div>Newness</div>
									</div>
								</div>
							</div>
							<a href="#">
								<div class="panel-footer">
									<span class="pull-left">View Details</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>
					<div class="col-lg-3 col-md-6">
						<div class="panel panel-red">
							<div class="panel-heading">
								<div class="row">
									<div class="col-xs-3">
										<i class="fa fa-support fa-5x"></i>
									</div>
									<div class="col-xs-9 text-right">
										<div class="huge">1300</div>
										<div>Total Rendered</div>
									</div>
								</div>
							</div>
							<a href="#">
								<div class="panel-footer">
									<span class="pull-left">View Details</span>
									<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
									<div class="clearfix"></div>
								</div>
							</a>
						</div>
					</div>
				</div>
				<!-- /.row -->
				<div class="row">
					<div class="col-lg-8">

						<div class="panel panel-default">
							<div class="panel-heading">
								<i class="fa fa-bar-chart-o fa-fw"></i> Next 3d - Jobs Chart
								<div class="pull-right">
									<div class="btn-group">
										<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
											Actions
											<span class="caret"></span>
										</button>
										<ul class="dropdown-menu pull-right" role="menu">
											<li><a href="#">Export to Excel</a>
											</li>
											<li><a href="#">Export to Word</a>
											</li>

											<li class="divider"></li>
											<li><a href="#">Refresh</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<!-- /.panel-heading -->
							<div class="panel-body">
								<div id="morris-area-chart"></div>
							</div>
							<!-- /.panel-body -->
						</div>
						<!-- /.panel -->
						<div class="panel panel-default">
							<div class="panel-heading">
								<i class="fa fa-bar-chart-o fa-fw"></i> Bar Chart Example
								<div class="pull-right">
									<div class="btn-group">
										<button type="button" class="btn btn-default btn-xs dropdown-toggle" data-toggle="dropdown">
											Actions
											<span class="caret"></span>
										</button>
										<ul class="dropdown-menu pull-right" role="menu">
											<li><a href="#">Export to Excel</a>
											</li>
											<li><a href="#">Export to Word</a>
											</li>

											<li class="divider"></li>
											<li><a href="#">Refresh</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<!-- /.panel-heading -->
							<div class="panel-body">
								<div class="row">
									<div class="col-lg-4">
										<div class="table-responsive">
											<table class="table table-bordered table-hover table-striped">
												<thead>
													<tr>
														<th>#</th>
														<th>Date</th>
														<th>Time</th>
														<th>Amount</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>3326</td>
														<td>10/21/2013</td>
														<td>3:29 PM</td>
														<td>$321.33</td>
													</tr>
													<tr>
														<td>3325</td>
														<td>10/21/2013</td>
														<td>3:20 PM</td>
														<td>$234.34</td>
													</tr>
													<tr>
														<td>3324</td>
														<td>10/21/2013</td>
														<td>3:03 PM</td>
														<td>$724.17</td>
													</tr>
													<tr>
														<td>3323</td>
														<td>10/21/2013</td>
														<td>3:00 PM</td>
														<td>$23.71</td>
													</tr>
													<tr>
														<td>3322</td>
														<td>10/21/2013</td>
														<td>2:49 PM</td>
														<td>$8345.23</td>
													</tr>
													<tr>
														<td>3321</td>
														<td>10/21/2013</td>
														<td>2:23 PM</td>
														<td>$245.12</td>
													</tr>
													<tr>
														<td>3320</td>
														<td>10/21/2013</td>
														<td>2:15 PM</td>
														<td>$5663.54</td>
													</tr>
													<tr>
														<td>3319</td>
														<td>10/21/2013</td>
														<td>2:13 PM</td>
														<td>$943.45</td>
													</tr>
												</tbody>
											</table>
										</div>
										<!-- /.table-responsive -->
									</div>
									<!-- /.col-lg-4 (nested) -->
									<div class="col-lg-8">
										<div id="morris-bar-chart"></div>
									</div>
									<!-- /.col-lg-8 (nested) -->
								</div>
								<!-- /.row -->
							</div>
							<!-- /.panel-body -->
						</div>
						<!-- /.panel -->

						<!-- /.panel -->
					</div>
					<!-- /.col-lg-8 -->
					<div class="col-lg-4">

						<!-- /.panel -->
						<div class="panel panel-default">
							<div class="panel-heading">
								<i class="fa fa-bar-chart-o fa-fw"></i> Donut Chart Example
							</div>
							<div class="panel-body">
								<div id="morris-donut-chart"></div>
								<a href="#" class="btn btn-default btn-block">View Details</a>
							</div>
							<!-- /.panel-body -->
						</div>
						<!-- /.panel -->

						<!-- /.panel .chat-panel -->
					</div>
					<!-- /.col-lg-4 -->
				</div>
				<!-- /.row -->
			</div>
			<!-- /#page-wrapper -->

		</div>
		<!-- /#wrapper -->

		<!-- jQuery -->
		<script src="<?PHP print $proj_path ?>/bower_components/jquery/dist/jquery.min.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="<?PHP print $proj_path ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

		<!-- Metis Menu Plugin JavaScript -->
		<script src="<?PHP print $proj_path ?>/bower_components/metisMenu/dist/metisMenu.min.js"></script>

		<!-- Morris Charts JavaScript -->
		<script src="<?PHP print $proj_path ?>/bower_components/raphael/raphael-min.js"></script>
		<script src="<?PHP print $proj_path ?>/bower_components/morrisjs/morris.min.js"></script>
		<script src="<?PHP print $proj_path ?>/js/morris-data.js"></script>

		<!-- Custom Theme JavaScript -->
		<script src="<?PHP print $proj_path ?>/dist/js/sb-admin-2.js"></script>

	</body>

</html>
