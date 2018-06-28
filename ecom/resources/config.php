<?php ob_start();

session_start();

// define session variables
$_SESSION['username'];
$_SESSION['user_id'];


defined("DS") ? null : define("DS",DIRECTORY_SEPARATOR);


//connect constant
defined("TEMPLATE_FRONT") ? null : define("TEMPLATE_FRONT" , __DIR__. DS ."templates/front");
defined("TEMPLATE_BACK") ? null : define("TEMPLATE_BACK" , __DIR__. DS ."templates/back");

//database connect
defined("DB_HOST") ? null : define("DB_HOST" , "localhost");
defined("DB_USER") ? null : define("DB_USER" , "root");
defined("DB_PASS") ? null : define("DB_PASS" , "root");
defined("DB_NAME") ? null : define("DB_NAME" , "final");
defined("DB_PORT") ? null : define("DB_PORT" , "8889");

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME,DB_PORT);



require_once("functions.php");
require_once("cart.php");


?>