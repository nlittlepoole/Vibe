<?php
function pushNotification($uid,$message,$source){
    $time=date("Y-m-d H:i:s", time());
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); //initialies connection to the database using the credentials found in config.php
    echo $sql = "INSERT INTO  `pull notifications` (Recipient,Message,Source,Time) VALUES ('$uid','$message','$source','$time')"; //gets the active status of the user with $uid as a user ID
    $st = $conn->prepare( $sql ); //this is a useful security line, hides the sql commands from browser consoles
    $st->execute(); //executes the sql query found above
}
function pullNotifications($uid){
    $conn = new PDO( DB_DSN, DB_USERNAME, DB_PASSWORD ); //initialies connection to the database using the credentials found in config.php
    $sql = "SELECT * FROM `pull notifications` WHERE Recipient='$uid'"; //gets the active status of the user with $uid as a user ID
    $st = $conn->prepare( $sql ); //this is a useful security line, hides the sql commands from browser consoles
    $st->execute(); //executes the sql query found above
    return $st->fetchAll();
}
?>