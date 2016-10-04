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
$filename1 = basename($_SERVER["REQUEST_URI"], ".php");
$filename = pathinfo($filename1, PATHINFO_FILENAME);
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
		<!-- Custom Fonts -->
		<link href="<?PHP print $proj_path ?>/bower_components/font-awesome/css/font-awesome.min.css"
			  rel="stylesheet" type="text/css">
		<link href="<?PHP print $proj_path ?>/css/static.min.css" rel="stylesheet">

		<script src="<?PHP print $proj_path ?>/bower_components/jquery/dist/jquery.min.js"></script>

		<!-- Bootstrap Core JavaScript -->
		<script src="<?PHP print $proj_path ?>/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

		<!-- Metis Menu Plugin JavaScript -->
		<script src="<?PHP print $proj_path ?>/bower_components/metisMenu/dist/metisMenu.min.js"></script>

		<!-- DataTables JavaScript -->
		<script src="<?PHP print $proj_path ?>/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
		<script src="<?PHP print $proj_path ?>/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
		<script src="<?PHP print $proj_path ?>/js/bootstrap-editable.js"></script>
		<!-- Custom Theme JavaScript -->
		<script src="<?PHP print $proj_path ?>/dist/js/sb-admin-2.js"></script>
		<script src="<?PHP print $proj_path ?>/js/<?PHP print $filename; ?>.js"></script>
		

	</head>
	<body>
		<div id="wrapper">
			<div id="page-wrapper" style=" margin: 0 0 0 10px;">