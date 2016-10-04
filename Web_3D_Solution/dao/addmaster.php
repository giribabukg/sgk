<?php

include ("config2.php");

$type = $_GET['type'];

$t=time();
$timelog = date("dmYhms",$t);
//trigger error
try {
	
	
	if ($type=="data")
	{
		/*echo "$type";
		 echo "<br/>";
		 echo "this is data page";*/
		$header = $_POST ['masterds'];
		$data = $_POST ['masterd'];
		$datades = $_POST ['masterdd'];
		//echo "$header";
		
		$sql_insert_comment = "INSERT INTO next_master_data_detail(Dataname,Description,headerid,createdby) VALUES 
		('$data','$datades','$header','$personId_session')";
	}
	else {
		/*echo "$type";
		 echo "<br/>";
		 echo "this is master page";*/
		$header = $_POST ['masterh'];

		$sql_insert_comment = "INSERT INTO next_master_header_detail(Headername,createdby) VALUES ('$header','$personId_session')";
		// mysqli_query($con,$sql_insert_phase);
	
	}	
	
	
	

	
if (mysqli_query ( $db, $sql_insert_comment )) {
	echo "Master Data header succesfully inserted. Redirecting to Master Data Add page in 3 secs...";
	$id = str_pad ( $personId_session, 5, "0", STR_PAD_LEFT );
	error_log ( $timelog . " => Success: [$header] masterd data successfully created by [$login_session - System Profile Id ($id)]\n", 3, "../log/Transaction.log" );
	error_log ( $sql_insert_comment."\n", 3, "../log/Transaction.log" );
	header ( "refresh:3;url=../view/entermasterdata.php" );
}
else {
	echo "Comments not succesfully inserted. Redirecting to Master Data Add page in 3 secs...";
	$id = str_pad ( $personId_session, 5, "0", STR_PAD_LEFT );
	error_log ( $timelog . " => Error: [$header] masterd data Error uploaded by [$personId_session - System Profile Id ($id)]\n", 3, "../log/Transaction.log" );
	error_log ( $sql_insert_comment."\n", 3, "../log/Transaction.log" );
	header ( "refresh:3;url=../view/entermasterdata.php" );
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