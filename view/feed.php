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
<form name="status" action="http://niger.go-vibe.com/api/vibe.php?action=postVibe" method="post">
	<select name="recipient">
<?php 
ini_set('display_errors',1); 
error_reporting(E_ALL);
$request="http://niger.go-vibe.com/api/user.php?action=getFriends&uid=".$_SESSION['userID'];
$request=$request."&token=".$_SESSION['token'];
$friends=json_decode(file_get_contents($request),true);
foreach ($friends['data'] as $person){
	echo'<option value="'.$person['id'].'">'.$person['name'].'</option>';
}
?>
</select><br>
	<input type="hidden" name="recipient"  value=<?php echo '"'.$_SESSION['userID'].'"' ?>>
    <input type="text" name="status" size="240"  placeholder="Input a Status" style="height:80px;font-size:24pt;" align="middle">
    <input type="hidden" name="uid" value=<?php echo '"'.$_SESSION['userID'].'"' ?>>
    <input type="hidden" name="token" value=<?php echo '"'.$_SESSION['token'].'"' ?> >

    <input type="submit" value="Submit">
</form>
</body>
</html>