<?php
if(!$_SESSION['token'] || !$_SESSION['userID']){
	header('Location: http://go-vibe.com');
}
?>