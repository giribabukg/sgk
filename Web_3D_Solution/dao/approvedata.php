<?php

include ("config2.php");

$type = $_GET["type"];
$table = $_GET["table"];
$id = $_GET["id"];
//echo $table;
#exit;
$t=time();
$timelog = date("Y-m-d h:m:s",$t);

if($table == "texture1")
{
	if($type == "Y")
	{
		$sql = "UPDATE next_texture_lookup_table SET isapproved='Y', dateapproved = '$timelog'  WHERE id='$id'";
		//echo $sql;
		if (mysqli_query($db, $sql)) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . mysqli_error($db);
		}
		
	}
	else
	{	
		$sql = "UPDATE next_texture_lookup_table SET isapproved='', dateapproved = ''  WHERE id='$id'";
		#echo $sql;
		
		
	}
	if (mysqli_query($db, $sql)) {
		$id = str_pad ( $personId_session, 5, "0", STR_PAD_LEFT );
		error_log ( $timelog . " => Success: [] masterd data successfully created by [$login_session - System Profile Id ($id)]\n", 3, "../log/Transaction.log" );
		error_log ( $sql."\n", 3, "../log/Transaction.log" );
		header ( "Location: ../view/viewtexture1.php" );
	} else {
		echo "Error updating record: " . mysqli_error($db);
	}
}

if($table == "texture2")
{
	if($type == "Y")
	{
		$sql = "UPDATE next_texturesec_lookup_table SET isapproved='Y', dateapproved = '$timelog'  WHERE id='$id'";
		echo $sql;
		if (mysqli_query($db, $sql)) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . mysqli_error($db);
		}

	}
	else
	{
		$sql = "UPDATE next_texturesec_lookup_table SET isapproved='', dateapproved = ''  WHERE id='$id'";
		#echo $sql;


	}
	if (mysqli_query($db, $sql)) {
		$id = str_pad ( $personId_session, 5, "0", STR_PAD_LEFT );
		error_log ( $timelog . " => Success: [] masterd data successfully created by [$login_session - System Profile Id ($id)]\n", 3, "../log/Transaction.log" );
		error_log ( $sql."\n", 3, "../log/Transaction.log" );
		header ( "Location: ../view/viewtexture2.php" );
	} else {
		echo "Error updating record: " . mysqli_error($db);
	}
}

if($table == "optionc")
{
	if($type == "Y")
	{
		$sql = "UPDATE next_option_lookup_table SET isapproved='Y', dateapproved = '$timelog'  WHERE id='$id'";
		echo $sql;
		if (mysqli_query($db, $sql)) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . mysqli_error($db);
		}

	}
	else
	{
		$sql = "UPDATE next_option_lookup_table SET isapproved='', dateapproved = ''  WHERE id='$id'";
		#echo $sql;


	}
	if (mysqli_query($db, $sql)) {
		$id = str_pad ( $personId_session, 5, "0", STR_PAD_LEFT );
		error_log ( $timelog . " => Success: [] masterd data successfully created by [$login_session - System Profile Id ($id)]\n", 3, "../log/Transaction.log" );
		error_log ( $sql."\n", 3, "../log/Transaction.log" );
		header ( "Location: ../view/optioncode.php" );
	} else {
		echo "Error updating record: " . mysqli_error($db);
	}
}

if($table == "Range")
{
	if($type == "Y")
	{
		$sql = "UPDATE next_range_lookup_table SET isapproved='Y', dateapproved = '$timelog'  WHERE id='$id'";
		echo $sql;
		#exit;
		if (mysqli_query($db, $sql)) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . mysqli_error($db);
		}

	}
	else
	{
		$sql = "UPDATE next_range_lookup_table SET isapproved='', dateapproved = ''  WHERE id='$id'";
		#echo $sql;


	}
	if (mysqli_query($db, $sql)) {
		$id = str_pad ( $personId_session, 5, "0", STR_PAD_LEFT );
		error_log ( $timelog . " => Success: [] masterd data successfully created by [$login_session - System Profile Id ($id)]\n", 3, "../log/Transaction.log" );
		error_log ( $sql."\n", 3, "../log/Transaction.log" );
		header ( "Location: ../view/range.php" );
	} else {
		echo "Error updating record: " . mysqli_error($db);
	}
}
if($table == "user")
{
	if($type == "D")
	{
		$sql = "UPDATE next_system_login_table SET active_status=0,deactivated_by=$personId_session, deleted_date=NOW() WHERE id=$id";
		echo $sql;
		#exit;
		if (mysqli_query($db, $sql)) {
			echo "Record updated successfully";
		} else {
			echo "Error updating record: " . mysqli_error($db);
		}

	}
	else
	{
		$sql = "UPDATE next_system_login_table SET active_status=1,deactivated_by=NULL, deleted_date=NULL WHERE id=$id";
		#echo $sql;
	}
	if (mysqli_query($db, $sql)) {
		$id = str_pad ( $personId_session, 5, "0", STR_PAD_LEFT );
		error_log ( $timelog . " => Success: [] masterd data successfully created by [$login_session - System Profile Id ($id)]\n", 3, "../log/Transaction.log" );
		error_log ( $sql."\n", 3, "../log/Transaction.log" );
		header ( "Location: ../view/adduser.php" );
	} else {
		echo "Error updating record: " . mysqli_error($db);
	}
}


?>	