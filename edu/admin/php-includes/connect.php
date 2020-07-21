<?php
	$db_host = "localhost";
	$db_user = "aditya";
	$db_pass = "1234";
	$db_name = "payprog";
	
	$con =  mysqli_connect($db_host,$db_user,$db_pass,$db_name);
	if(mysqli_connect_error()){
		echo 'connect to database failed';
	}
?>