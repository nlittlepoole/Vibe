<?php
function search($query){
	$conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); //initialies connection to the database using the credentials found in config.php
    $sql = "SELECT Name, UID FROM user WHERE Name LIKE '%".$query."%'"; //gets the active status of the user with $input_id as a user ID
    $st = $conn->prepare( $sql ); //this is a useful security line, hides the sql commands from browser consoles
    $st->execute(); //executes the sql query found above
    $users=$st->fetchAll();
    $sql = "SELECT Name, UID FROM directory WHERE Name LIKE '%".$query."%'"; //gets the active status of the user with $input_id as a user ID
    $st = $conn->prepare( $sql ); //this is a useful security line, hides the sql commands from browser consoles
    $st->execute(); //executes the sql query found above
    $communities=$st->fetchAll();
    return Array($users,$communities);
}
?>