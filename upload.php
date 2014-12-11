<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);
include("config.php");

if (!isset($_SESSION['id']))
{
	echo "Error. Go to login.php page and enter your email and password.";
	exit();
}

$query = mysql_query("SELECT subdomain FROM sites WHERE id='".$_SESSION['id']."'");
if ($query)
{
	$result = mysql_fetch_array($query);
	if ($result)
		$subdomain = $result['subdomain'];
	else
		$subdomain = "";
}

foreach ($_FILES as $key => $file)
{
	$filename = "subdomains/".$subdomain."/".md5(time())."_".$file['name'];

	if (!copy($file['tmp_name'], $filename))
	{
		echo "Error. Can't upload file.";
	}
	else
	{
		//echo "<div id=\"logo\" align=\"center\"><img src=\"".$filename."\"></div>";
		$queryStr = "UPDATE sites SET ".$key."='".$filename."' WHERE id='".$_SESSION['id']."'";
		mysql_query($queryStr);
		echo '<script>top.location.href = top.location.href </script>';
	}
}
?>