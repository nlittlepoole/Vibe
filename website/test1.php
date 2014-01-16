<?php 

 	session_start();
 	$_SESSION['things'] = array(); 
 	addAssoc(); 
 
	function addAssoc() {
		$_SESSION['things']['stuff'] = 'hello'; 
		$_SESSION['things']['stuff'] = 'overridden'; 
	}
?>

<html>
	<body>
		<p>
			<?php
				foreach($_SESSION['things'] as $key => $value) {
					echo "KEY: " . $key . "<br />"; 
					echo "VALUE: " . $value . "<br />"; 
				} 
			?>
		</p>
	</body>
</html>