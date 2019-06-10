<?php
	$server = '127.0.0.1'; //the server running in the computer to locally run a program, here, phpmyadmin
	$username = 'root';  
	$password = '';
	$schema = 'furniture'; //name of the database in phpmyadmin

	$pdo = new PDO('mysql:dbname=' . $schema . ';host=' . $server, $username, $password, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]); //connecting to the database in phpmyadmin
?>