<?php

	// overall settings
	ini_set("display_errors", true);
	$address = getenv('IP');
	date_default_timezone_set("America/New_York");
	
	// database specific settings
	define("DB_DSN", "mysql:host=localhost;dbname=new_vibe");
	define("DB_USERNAME", "Vibosphere");
	define("DB_PASSWORD", "Carman4ever!");
	define("CLASS_PATH", "classes");
	define("ADMIN_USERNAME", "teamvibe");
	define("ADMIN_PASSWORD", "Carman4ever");
	define("APP_ID", "257473684410281");
	define("APP_SECRET", "beeb8e7913c442c8ae1dd08bb05d74d5");
	
	$app_token = (string)file_get_contents("https://graph.facebook.com/oauth/access_token?%20client_id=257473684410281&client_secret=beeb8e7913c442c8ae1dd08bb05d74d5&grant_type=client_credentials", true);
	$app_token = str_replace('access_token=', '', $app_token);
	
	define( "APP_TOKEN", $app_token );

	function handleException( $exception ) {
		echo "Sorry, a problem occurred. Please try later.";
		echo $exception->getMessage();
		error_log($exception->getMessage());
	}
	 
	set_exception_handler('handleException');
?>