<?php 
require_once("header.php");
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
	foreach ($_SESSION['friend_list'] as $person){
		if($person['UID']!=$_SESSION['userID']){
			echo'<option value="'.$person['UID'].'">'.$person['Name'].'</option>';
		}
	}
?>
</select><br>
    <input type="text" name="status" size="240"  placeholder="Input a Status" style="height:80px;font-size:24pt;" align="middle">
    <input type="hidden" name="uid" value=<?php echo '"'.$_SESSION['userID'].'"' ?>>
    <input type="hidden" name="token" value=<?php echo '"'.$_SESSION['token'].'"' ?> >
    <input type="submit" value="Submit">
</form>
<br>
<h2><U> Newsfeed:</U></h2>
<br>
<?php 
	$request = "http://niger.go-vibe.com/api/user.php?action=getFeed&uid=". $_SESSION['userID'];
	$request = $request."&token=".$_SESSION['token'];
	$posts = json_decode(file_get_contents($request),true);
	$posts = $posts['friend'];
	foreach ($posts as $post){
			echo '<a href="http://niger.go-vibe.com/view/profile.php?user='.$post['Tagged'].'&name='.$post['Name'].'">' .$post['Name'] . "</a> : " . $post['Content'] . "<br>";
			foreach($post['Comments'] as $comment){
				echo '<li>' . $comment['Content'].'</li>';
			}
	}
?>
</body>
</html>