<?php 
	session_start();

	error_reporting(E_ALL);

	// file imports
	$root = $_SERVER['DOCUMENT_ROOT'];

	// grabbing URL fragments
	$uid =  $_REQUEST['uid'];
	$token = $_REQUEST['token'];

	echo "RESULTS: "; 

	echo "UID: " + $uid; 
	echo "Token: " + $token; 

	echo "end of form"; 

?>