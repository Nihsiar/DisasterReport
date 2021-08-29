<?php
	session_start(); 
	$userCheck = $_SESSION['email'];
	if (!isset($userCheck) || !$userCheck)
		header('Location: signIn.php'); 
?>