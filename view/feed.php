<?php 
session_start();
$_SESSION['token'];
?>
<html>
<head>
    <style type="text/css">
      input { border: none }
      /* other style definitions go here */

    </style>
<title>Success</title>
</head>
<body>
<h1> Success</h1>
<form name="status" action="http://niger.go-vibe.com/api/vibe.php" method="post">
    <input type="text" name="status" size="240"  placeholder="Input a Status" style="height:80px;font-size:24pt;" align="middle">
    <input type="submit" value="Submit">
</form>
</body>
</html>