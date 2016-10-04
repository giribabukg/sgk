<?php

mysqli_close($db);
session_start();
if(session_destroy())
{
header("Location:../index.php");
}
?>