<?php
 
 $ldap = ldap_connect("ldap://c3corpdc01p.schawk.com");
 $username = "asia\gmuniandy";
 $password = "Chinna820516";
 if ($bind = ldap_bind($ldap, $username, $password)) {
 	// log them in!
 	echo "Succesfull";
 } else {
 	// error message
 	echo "Error";
 }
?>