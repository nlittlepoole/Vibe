<?php
ini_set( "display_errors", true );
$adress=getenv('IP');
date_default_timezone_set( "America/New_York" );  // http://www.php.net/manual/en/timezones.php
define( "DB_DSN", "mysql:host=localhost;dbname=Vibosphere" );
define( "DB_USERNAME", "Vibosphere" );
define( "DB_PASSWORD", "Carman4ever!" );
define( "CLASS_PATH", "classes" );
define( "TEMPLATE_PATH", "templates" );
define( "HOMEPAGE_NUM_ARTICLES", 5 );
define( "ADMIN_USERNAME", "teamvibe" );
define( "ADMIN_PASSWORD", "Carman4ever" );
require( CLASS_PATH . "/Vibe.php" );
 
function handleException( $exception ) {
  echo "Sorry, a problem occurred. Please try later.";
  echo $exception->getMessage();
  error_log( $exception->getMessage() );
}
 
set_exception_handler( 'handleException' );
?>