<?php

error_reporting(E_ALL);
//error handler function
function customError ($errno, $errstr) {
    if (error_reporting() == 0) {
        return;
    }
    $timelog = date("d-m-Y h:i:s", time());
    throw new Exception($timelog . ':' . $errstr, $errno);
}

//set error handler
set_error_handler("customError", E_ALL & ~E_NOTICE);
//trigger error
try {
$username = "web3d";
$password = "web123";
$host = "localhost";
$dbname = "nextdb";
$db = new mysqli($host, $username, $password,$dbname);
} catch(Exception $e) {
    //echo "Error caught : " . $e->getMessage();
    $t=time();
    $timelog = date("dmYhms",$t);
    //echo "Unable to process with the request. \n Error ID".$timelog.". PLease contact RND team.";
    echo '<span style="color:red;text-align:center;">We are sorry to inform that the latest transaction failed due to some technical constraint.
    		</span>'."\n";
    echo '<br></br>';
    echo '<span style="color:red;text-align:center;">Please contact RND team and please provive the transaction ID
    		<span style="font-weight: 900;">'.$timelog.'</span>
    		</span>';
    error_log($timelog." => Error: [$timelog].". $e->getMessage()."\n", 3, "../log/Error.log");
}

?>