<?php
include ("config2.php");

$phaseid = $_POST['phaseid'];


$tablevaluesarr = explode("/**/", $phaseid);

$result = count($tablevaluesarr);

if (! $db->query ( "SET @msg = ''" ) || ! $db->query ( "CALL getTransid('Render',@msg)" )) {
	// echo "CALL failed: (" . $db->errno . ") " . $db->error;
}
	
if (! ($res = $db->query ( "SELECT @msg as _p_out" ))) {
	// echo "Fetch failed: (" . $db->errno . ") " . $db->error;
}

$row = $res->fetch_assoc ();
$tid = $row ['_p_out'];

//echo "$tid";


echo "Range overview succesfully inserted. Redirecting to Master Data Add page in 3 secs... ".$tid;
//header ( "refresh:3;url=../view/rangeoverview.php" );

/*echo "<script type='text/javascript'>
 function closeWindow() {
    setTimeout(function() {
    window.close();
    }, 3000);
    }

    window.onload = closeWindow();
    </script>";*/

?>