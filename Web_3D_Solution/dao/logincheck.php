<?php
include ("config.php");
error_reporting(E_ALL);
//error handler function


//set error handler
set_error_handler("customError", E_ALL & ~E_NOTICE);
//trigger error
try {

	// $_SESSION['login_user']="test";
	if ($_SERVER ["REQUEST_METHOD"] == "POST") {
		$t = time ();
		$timelog = date ( "d:m:Y h:m:s", $t );
		// username and password sent from Form
	
		$username = mysqli_real_escape_string ( $db, $_POST ['Username'] );
		$password = mysqli_real_escape_string ( $db, $_POST ['Password'] );
		// $password=md5($password); // Encrypted Password
	
		// error_log($timelog." => Successsess: [$login_session] login succesfully\n", 3, "../log/Transaction.log");
		// /header("Location: ../view/loginsuccess.php");
	
		$sql = "SELECT domain FROM next_system_login_table WHERE username='$username'";
		$result = mysqli_query ( $db, $sql );
		$count = mysqli_num_rows ( $result );
	
		//$error = 5/0;
	
		while ( $row = $result->fetch_assoc () ) {
	
			$domain = $row ["domain"];
	
			//$ldap = ldap_connect ( "ldap://c3corpdc01p.schawk.com" );
			//$usernamel = $domain . "\\" . $username;
	
			// echo $usernamel."tes";
			// exit;
			// $password = "";
                        //$res = ldap_bind ( $ldap, $usernamel, $password );
                        $bind= true;
			if ($bind = true) {
				// log them in!
				// session_register($username);
				// $_SESSION['login_user']=$username;
				session_start ();
				$_SESSION ['login_user'] = $username;
					
				error_log ( $timelog . " => Success: [$username] login succesfully\n", 3, "../log/Transaction.log" );
				header ( "Location: ../view/loginsuccess.php" );
			} else {
				// error message
				error_log ( $timelog . " => Error: [$username] login failed\n", 3, "../log/Transaction.log" );
				header ( "Location: ../failedlogin.php" );
			}
		}
	
		if ($count == 0) {
			error_log ( $timelog . " => Error: [$username] login failed \n", 3, "../log/Transaction.log" );
			header ( "Location: ../failedlogin.php" );
		}
		// If result matched $username and $password, table row must be 1 row
	}
} catch(Exception $e) {
  // echo "Error caught : " . $e->getMessage();
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