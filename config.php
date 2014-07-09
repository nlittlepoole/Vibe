
<?php
ini_set( "display_errors", true );
$adress=getenv('IP');
date_default_timezone_set( "America/New_York" );  // http://www.php.net/manual/en/timezones.php
define( "DB_DSN", "mysql:host=79afe5225f7fd454174526fe4108092758d4e751.rackspaceclouddb.com;dbname=VibeSocial" );
define( "DB_USERNAME", "nlittlepoole" );
define( "DB_PASSWORD", "Carman4ever!" );
define( "CLASS_PATH", "classes" );
define( "ADMIN_USERNAME", "teamvibe" );
define( "ADMIN_PASSWORD", "Carman4ever" );
define( "APP_ID", "162254093981266" );
define( "APP_SECRET", "7387b4372a38f8db30ae8834dd193c5b" );
$app_token=(string)file_get_contents("https://graph.facebook.com/oauth/access_token?%20client_id=162254093981266&client_secret=7387b4372a38f8db30ae8834dd193c5b&grant_type=client_credentials", true);
$app_token=str_replace('access_token=','',$app_token);
define( "APP_TOKEN", $app_token );

function handleException( $exception ) {
  echo "Sorry, a problem occurred. Please try later.";
  echo $exception->getMessage();
  error_log( $exception->getMessage() );
}
 
set_exception_handler( 'handleException' );
?>
