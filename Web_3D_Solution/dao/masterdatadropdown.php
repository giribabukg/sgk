<?php
include('../dao/config.php');
session_start();
//$user_check=$_POST['username'];
$user_check=$_SESSION['login_user'];
$ses_sql=mysqli_query($db,"SELECT id,firstname FROM next_system_login_table where username='$user_check' ");
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_session=$row['firstname'];
$personId_session =$row['id'];
			
$ses_sql1=mysqli_query($db,"SELECT count(id) as number FROM next_system_login_table");
$row1=mysqli_fetch_array($ses_sql1,MYSQLI_ASSOC);
$noofpeople_session = $row1['number'];

print_r($seasonmd);
echo "<br/>";
echo "Id is " . $seasonmd['2'] . " years old.";

echo "<br/>";


foreach($seasonmd as $x => $x_value) {
			
	
	if(((int)$x%2) != 0)
	{
	echo "Key=" . $x . ", Value=" . $x_value;
	echo "<br>";
	}
	
}


//mysqli_close($db);
if(!isset($login_session))
{
header("Location: ../index.php");
}
?>