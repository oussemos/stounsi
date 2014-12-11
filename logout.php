<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);

if($_SESSION['id']){
	session_unset();
	session_destroy();
}
header("Location: index.php");
?>