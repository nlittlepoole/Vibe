<?php
if(!isset($_SESSION['token']) || !isset($_SESSION['userID'])){
	header('Location: http://go-vibe.com');
}
?>