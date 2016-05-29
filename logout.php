<?php

	if(!isset($_SESSION)) {
		session_start();
	}
	//session_destroy();
	unset($_SESSION['session_username']);
	header("Location: login.php");
	
?>