<?php 
session_start ();
include_once('config.php');
error_reporting ( E_ALL & ~ E_DEPRECATED );

if(isset($_SESSION['id'])){
	$_GET['page'] = 'edit';
}else{
	$_GET['page'] = 'home';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>	

	
	<link rel="stylesheet" type="text/css" href="../assets/css/site.css" />
	<script type="text/javascript" src="../assets/js/jquery-1.4.3.min.js"></script>
	<script type="text/javascript" src="../assets/js/site.js"></script>
	
	<script type="text/javascript" src="../assets/js/jquery.fancybox-1.3.4.pack.js"></script>
	<script type="text/javascript" src="../assets/js/jquery.mousewheel-3.0.4.pack.js"></script>
	<link rel="stylesheet" type="text/css" href="../assets/css/jquery.fancybox-1.3.4.css" media="screen" />
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Website Maker</title>
	

  <style type="text/css">
  	.invalid_fdata{
		border:2px solid #cd0000;
  	}
  </style>


</head>
<body link="#FFFFFF" vlink="#FFFFFF" alink="#FFFFFF" onload="javascript:change_image(0)" >
<table width="882" border="0" align="center" cellpadding="0" cellspacing="0" class="text">
  <tr>
    <td height="81" colspan="3" valign="top" bgcolor="#E4E5E0">
    	<?php include_once('template/header.php');?>
    </td>
  </tr>
  
  <tr>
    <td height="5" colspan="3" valign="top" bgcolor="#DAECF3"></td>
  </tr>
  
  <tr>
    <td width="24" bgcolor="#FFFFFF">&nbsp;</td>
    <td colspan="2" valign="top" bgcolor="#FFFFFF">
    	<?php include_once('template/body.php');?>	
    </td>
  </tr>
  <tr>
    <td height="29" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="28" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="830" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  
  <tr>
    <td height="91" colspan="3" valign="middle" background="../assets/images/sitemaker.jpg">
    	 
      	<?php include_once('template/footer.php')?>
    </td>
  </tr>
</table>	
<div id="abc" style="display: none"></div>

</body>
</html>