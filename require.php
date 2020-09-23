<?php
session_start();
require(dirname(__FILE__) . "/config/settings.php");
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
	header('location: '._SITE_URL_.'login.php');
}
require(dirname(__FILE__) . '/autoload.php'); 
require(dirname(__FILE__) . "/connexion.php");
ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(1);
?>