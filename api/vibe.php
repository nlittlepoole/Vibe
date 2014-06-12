<?php
ini_set('display_errors',1); 
error_reporting(E_ALL);
session_start();
echo $_POST['uid'];
$output=[];
$status = isset( $_POST['status'] ) ? $_POST['status'] : ""; //sets $action to "Action" url fragment string if action isn't null
$command='cat password.txt | sudo python vibe.py "'.$status.'" 2>&1';
$temp = exec($command ,$output);
print_r($output)
?>