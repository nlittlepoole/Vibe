<?php
session_start();
$user = isset( $_GET['user'] ) ? $_GET['user'] : "";
$name = isset( $_GET['name'] ) ? $_GET['name'] : "";
$request = "http://niger.go-vibe.com/api/vibe.php?action=getCloud&uid=". $_SESSION['userID'];
$request = $request."&token=".$_SESSION['token'];
$request = $request."&user=".$user;
$cloud = json_decode(file_get_contents($request),true);
$cloud=$cloud['url'];
$pic="https://graph.facebook.com/$user/picture?type=large"
?>
<html>
<head>
<title></title>
</head>
<body>
<h1><?php echo $name ?></h1>
<br>
<img src=<?php echo '"' .$pic.'"' ?>  onerror="this.src='assets/vibe.png';">
<br>
<img src=<?php echo '"' .$cloud.'"' ?> align="middle">
</body>
</html>