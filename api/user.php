<?php
$root=$_SERVER['DOCUMENT_ROOT'];
ini_set('display_errors',1); 
 error_reporting(E_ALL);
require( $root ."/config.php" );
$uid=$_POST['uid'];
$name=$_POST['name'];
echo $name;
//$uid-mysql_real_escape_string($uid)
$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD );
$sql="INSERT INTO Users (`UID`, `Name`, `Notes`)
    VALUES ('$uid','$name','Test')
        ON DUPLICATE KEY UPDATE `Notes` = 'Test2';";
$response_array['status'] = "200 Requested Queued";  


$st = $conn->prepare( $sql );
$st->execute();
$conn=null;
echo json_encode($response_array);
?>