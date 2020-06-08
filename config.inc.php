<?php
header("Access-Control-Allow-Origin: *");
date_default_timezone_set("Asia/Bangkok");
// ** MySQL settings - You can get this info from your web host ** //
/** The name of the database for WisniorWeb */

define( 'DB_NAME', 'epicheckin' );
define( 'DB_USER', 'root' );
define( 'DB_PASSWORD', 'mandymorenn' );
define( 'DB_HOST', 'localhost' );
define( 'TB_PREFIX', '' );
define( 'ROOT_DOMAIN', 'http://localhost/medipecheckin/' );

// Define system parameters
$sysdate = date('Y-m-d');
$sysdatetime = date('Y-m-d H:i:s');
$sysdateu = date('U');
$sysdateyear = date('Y');
$ip = $_SERVER['REMOTE_ADDR'];

$host = DB_HOST;
$user = DB_USER;
$password = DB_PASSWORD;
$dbname = DB_NAME;
$db_prefix = TB_PREFIX;

$conn = mysqli_connect($host, $user, $password, $dbname);
if(!$conn){
  echo "Can not connect database";
  die();
}

$conn->set_charset("utf8");

?>
