<html>
	<head>
		<title>Results</title>
	</head>
<body>

	<p>Blurb: <?php echo $_POST["blurb"]; ?></p>
	<br />
	<p>Website Link: <?php echo $_POST["websitelink"]; ?></p>
	<br />
	<p>Options locations: <?php echo $_POST["optionsLocations"]; ?></p>
	<br />
	<p>Options birthdate: <?php echo $_POST["optionsBirthdate"]; ?></p>
	<br />
	<p>Number of Friends?: <?php echo $_POST["optionsFriends"]; ?></p>
	<br />
	Checkbox Values:
	<?php
		echo "<br />"; 
		for($i = 0; $i < 14; $i++){
			echo $_POST['checkbox' . ($i + 1)] . " ";
		}
	?>

</body>
</html>