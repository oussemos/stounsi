<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);
include("config.php");

if (!isset($_SESSION['id']))
{
	header("Location: index.php");
	exit();
}

mysql_query("DELETE FROM sites WHERE id='".$_SESSION['id']."'");
mysql_query("DELETE FROM faq WHERE site_id='".$_SESSION['id']."'");
mysql_query("DELETE FROM custom_page WHERE site_id='".$_SESSION['id']."'");

header("Location: logout.php");
exit();
?>