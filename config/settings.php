<?php 

// pour afficher les erreurs = true, sinon = false
if (!defined("_MODE_DEV_")) {
	define("_MODE_DEV_", true);
}
if ("_MODE_DEV_" == true ) {
	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(1);
}else{
	ini_set('display_errors', 0);
	ini_set('display_startup_errors', 0);
	error_reporting(0);
}
define("_SITE_URL_" , "http://www.gprojet.loc/");