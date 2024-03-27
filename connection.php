<?php
	$dbhost="localhost";
	$dbuser="root";
	$dbpass="";
	$dbname="lord";
	$con=mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
	if(!$con)
	{
		die("falied to connect!");
	}

?>