<?php
$servername = "localhost";
$username = "root";
$password = "";
$db = "gestion_projet";
try {
    $conn = new PDO("mysql:host=$servername;dbname=$db", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf8");
}
catch(PDOException $e)
{
	die( "Connection failed: " . $e->getMessage());
}
?>