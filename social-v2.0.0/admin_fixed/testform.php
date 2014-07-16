<?php
	session_start();
?>

<html>
<head>
	<title></title>
</head>
<body>
	<form name="stuff" action="http://api.go-vibe.com/social-v2.0.0/admin_fixed/form_results_test.php" method="post">
		<input type="text" name="stuff" />
		<input type="hidden" name="uid" value=<?php echo '"'.$_SESSION['userID'].'"' ?>>
	    <input type="hidden" name="token" value=<?php echo '"'.$_SESSION['token'].'"' ?> >
		<input type="submit" />
	</form>
</body>
</html>