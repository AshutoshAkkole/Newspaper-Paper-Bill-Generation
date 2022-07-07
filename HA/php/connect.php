<?php 
	$servername = "localhost:7778";
	$username = "root";
	$password = "";
	$dbname = "homeassignment";


	$connect = new mysqli($servername, $username, $password, $dbname);

	if (!$connect) {
		echo "Something went wrong ...";
	}
	else
		echo "Connected Successfully ... <br>";
?>