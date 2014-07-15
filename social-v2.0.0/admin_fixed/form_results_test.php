<?php 
	session_start();

	// file imports
	$root = $_SERVER['DOCUMENT_ROOT'];
	require_once($root . "/config.php");
	require_once($root . "/api/request.php");

	// grabbing URL fragments
	$uid =  $_REQUEST['uid'];
	$token = $_REQUEST['token'];

	echo "UID: " + $uid; 
	echo "Token: " + $token; 

?>