<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/Samara');



include("config.php");
include("core/mysqli.php");
var_dump($_config['mysql']);
$db= new DB($_config['mysql']);

?>