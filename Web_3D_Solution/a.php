<?php
error_reporting(0);
//error handler function
function customError($errno, $errstr) {
  //echo "<b>Error:</b> [$errno] $errstr<br>";
	$t=time();
	$timelog = date("dmYhms",$t);
    echo "Unable to process with the request. \n Error ID".$timelog.". PLease contact RND team.";
    error_log($timelog."=> Error: [$errno] $errstr\n", 3, "error_log/Error.log");
}

//set error handler
set_error_handler("customError",E_USER_WARNING);

//trigger error
$username = "root";
$password = "AIT123";
$host = "localhost";
$dbname = "nikid";

$db = new mysqli($host, $username, $password,$dbname);
if ($db->connect_error) {
	trigger_error($db->connect_error,E_USER_WARNING);
}




/*$test=2;
if ($test>1) {
  trigger_error("Value must be 1 or below",E_USER_WARNING);
}*/
?>