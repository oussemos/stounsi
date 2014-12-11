<?php
	
	include("config.php");
	//error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
	error_reporting(E_ALL);
	ini_set('display_errors',1);
	
	
	foreach($_POST as $k=>$v){
		$_POST[$k] = urldecode($v);
	}
	
	$message = $_POST['message'];
	
	 
	$name = urldecode($_POST['name']);
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$email = $_POST['email'];
	$how_learn = $_POST['how_learn'];
	$to = $_POST['to'];
	
	$messageSend = "<h3>New message from your site</h3><br />".$message."<br><br>";
	if (!empty($name))
		$messageSend .= "Sender: ".$name."<br>";
	if (!empty($address))
		$messageSend .= "Address: ".$address."<br>";
	if (!empty($email))
		$messageSend .= "Email: ".$email."<br>";
	if (!empty($how_learn))
		$messageSend .= "How did you learn about us: ".$how_learn."<br>";
		
	$headers = 'Content-type: text/html; charset=utf8' . "\r\n";	
	if($email){
		$headers .= 'From:'.$email. "\r\n";
		$headers .= 'mailed-by:'.$email. "\r\n";
			
	}
	
	
	
	$result = mail($to, "New message from your site", $messageSend,$headers);
//	$result = mail("", "New message from your site", $messageSend,$headers);
	if ($result)
		echo "ok";
	else
		echo "failed";
?>