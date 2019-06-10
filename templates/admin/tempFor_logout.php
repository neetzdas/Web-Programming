<?php
	session_start(); //starting the session handlers
	session_unset(); //unsetting the session for logging out 
	session_destroy(); //destroying the session for logging out
	header('location:admin_Home'); //location to be redirected after logging out
	?>
