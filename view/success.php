<?php 
session_start();
echo $_SESSION['token'];
print_r(json_decode(file_get_contents("http://graph.facebook.com/endpoint?key=value&access_token=app_id|app_secret", true));
?>
<html>
<head>
<title>Success</title>
</head>
<body>
<h1> Success<h2>
</body>
</html>