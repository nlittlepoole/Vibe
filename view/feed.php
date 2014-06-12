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
<title>Feed</title>
</head>
<body>
<h1>Post a Vibe:</h1>
<form name="status" action="http://niger.go-vibe.com/api/vibe.php" method="post">
	@:<input type="text" name="recipient">
    <input type="text" name="status" size="240"  placeholder="Input a Status" style="height:80px;font-size:24pt;" align="middle">
    <input type="hidden" name="uid" value=<?php echo '"'.$_SESSION['userID'].'"' ?>>
    <input type="hidden" name="token" value=<?php echo '"'.$_SESSION['token'].'"' ?> >

    <input type="submit" value="Submit">
</form>
</body>
</html>>