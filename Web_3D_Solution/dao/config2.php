<?php
include('../dao/config.php');
session_start();
//$user_check=$_POST['username'];
$user_check=$_SESSION['login_user'];
$ses_sql=mysqli_query($db,"SELECT id,firstname FROM next_system_login_table where username='$user_check' ");
$row=mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_session=$row['firstname'];
$personId_session =$row['id'];
			

if(!isset($login_session))
{
header("Location: ../index.php");
}
?>