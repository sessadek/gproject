<?php 
require('require.php');
session_destroy();
header("location:"._SITE_URL_."login.php");
?>