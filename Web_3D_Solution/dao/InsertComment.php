<?php

include ("config2.php");
//session_start();
///$user_check=$_SESSION['login_user'];
$comments = $_GET['comments'];
$phaseid = $_GET['phaseid'];
///echo "$phaseid";
$t=time();
$timelog = date("dmYhms",$t);
//trigger error
try {
$sql_insert_comment = "INSERT INTO next_trans_cmtt_table(Comments,TransId,CommentedBy) VALUES ('$comments','$phaseid',$personId_session)";
// mysqli_query($con,$sql_insert_phase);
	
if (mysqli_query ( $db, $sql_insert_comment )) {
	echo "Comments succesfully inserted.";
	$id = str_pad ( $personId_session, 5, "0", STR_PAD_LEFT );
	error_log ( $timelog . " => Success: [$phaseid] comments successfully created by [$login_session - System Profile Id ($id)]\n", 3, "../log/Transaction.log" );
	error_log ( $sql_insert_comment."\n", 3, "../log/Transaction.log" );
}
else {
	echo "Comments not succesfully inserted.";
	$id = str_pad ( $personId_session, 5, "0", STR_PAD_LEFT );
	error_log ( $timelog . " => Error: [$phaseid] comments Error uploaded by [$personId_session - System Profile Id ($id)]\n", 3, "../log/Transaction.log" );
	error_log ( $sql_insert_comment."\n", 3, "../log/Transaction.log" );
}
} catch(Exception $e) {
    //echo "Error caught : " . $e->getMessage();

    //echo "Unable to process with the request. \n Error ID".$timelog.". PLease contact RND team.";
    echo '<span style="color:red;text-align:center;">We are sorry to inform that the latest transaction failed due to some technical constraint.
    		</span>'."\n";
    echo '<br></br>';
    echo '<span style="color:red;text-align:center;">Please contact RND team and please provive the transaction ID
    		<span style="font-weight: 900;">'.$timelog.'</span>
    		</span>';
    error_log($timelog." => Error: [$timelog].". $e->getMessage()."\n", 3, "../log/Error.log");
}

mysqli_close($db);
?>