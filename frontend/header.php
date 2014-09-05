<?php
if(!$_SESSION['token'] || !$_SESSION['userID']){
	header('Location: /index.php');
}
?>