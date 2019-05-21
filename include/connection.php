<?php
	// Set Your DB here..
	$ip_address = 'localhost:1337';
	$user = 'root';
	$password = 'localhost';
	$database = 'cms';

	$connection = mysqli_connect($ip_address, $user, $password);
	$select_db = mysqli_select_db($connection, $database);
	
	$connection->set_charset("utf8");
	
	if (!$connection)
	{
		die("Database Connection Failed" . mysqli_error($connection));
	}
	if (!$select_db)
	{
		die("Database Selection Failed" . mysqli_error($connection));
	}
	
?>