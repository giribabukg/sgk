<?php
include('../dao/lock.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">

<title>Next 3D - Phases</title>

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
function myFunction(x) {
   // 
	//var x = document.getElementById("myBtn").value;
	var myWindow = window.open("../dao/viewcomment.php?phaseid="+x, "", "width=500, height=250");
	//alert(x);
}
function myFunctionInsert(x) {
	//var x = document.getElementById("myBtn1").value;
	var y = "1";
	var z = y.concat(x);
	var comments = document.getElementById(z).value;
	//alert(comments);
	var myWindow = window.open('../dao/insertcomment.php?phaseid='+x+'&comments='+comments, '', 'width=500, height=250');
}
function validateForm() {
	var e = document.getElementById("phaseseason");
    var strUser = e.options[e.selectedIndex].value;

    var strUser1 = e.options[e.selectedIndex].text;
    if(strUser==0)
    {
        alert("Please select a Season");
        return false;
    }

    var e1 = document.getElementById("phasecategory");
    var strUsers = e1.options[e1.selectedIndex].value;

    if(strUsers==0)
    {
        alert("Please select a Category");
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
								<li><a href="../view/phase.php">Phase</a></li>
								<li><a href="#">Range Overview</a></li>
								<li><a href="#">Batch Management</a></li>
								<li><a href="#">Re-Render</a></li>
								<li><a href="#">Newness</a></li>
							</ul> <!-- /.nav-second-level --></li>

						<li><a href="forms.html"><i class="fa fa-edit fa-fw"></i> Profile</a>
						</li>
						<li><a href="#"><i class="fa fa-wrench fa-fw"></i> Look-up Tables<span
								class="fa arrow"></span></a>
							<ul class="nav nav-second-level">
								<li><a href="#">Texture 1</a></li>
								<li><a href="#">Texture 2</a></li>
								<li><a href="#">Option Code</a></li>
								<li><a href="#">Range Code</a></li>
								<li><a href="#">Model</a></li>
								<li><a href="#">Master Data</a></li>
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
		</div>
		</body>
		</html>