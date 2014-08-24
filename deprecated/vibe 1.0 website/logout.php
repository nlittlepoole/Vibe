<?php
session_start();
$logout=$_SESSION['logoutUrl'];
session_unset();
header("Location:". $logout);
?>