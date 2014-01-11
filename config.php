<?php
ini_set( "display_errors", true );
$adress=getenv('IP');
date_default_timezone_set( "America/New_York" );  // http://www.php.net/manual/en/timezones.php
define( "DB_DSN", "mysql:host=localhost;dbname=Vibosphere" );
define( "DB_USERNAME", "Vibosphere" );
define( "DB_PASSWORD", "Carman4ever!" );
define( "CLASS_PATH", "classes" );
define( "ADMIN_USERNAME", "teamvibe" );
define( "ADMIN_PASSWORD", "Carman4ever" );
define( "APP_ID", "257473684410281" );
define( "APP_SECRET", "beeb8e7913c442c8ae1dd08bb05d74d5" );
 
function handleException( $exception ) {
  echo "Sorry, a problem occurred. Please try later.";
  echo $exception->getMessage();
  error_log( $exception->getMessage() );
}
 
set_exception_handler( 'handleException' );
?>