<?php
	
	session_start();
	error_reporting(E_ALL & ~E_NOTICE);
	include("config.php");
	
if ($_POST)
{
	$email = prepare_insert($_POST['email']);
	$password = prepare_insert($_POST['password']);
	
	$query = mysql_query("SELECT id FROM sites WHERE email='".$email."' AND password='".md5($password)."' LIMIT 1");
	if ($query)
	{
		$result = mysql_fetch_array($query);
		$count = mysql_num_rows($query);
		
		if ($result)
		{
			//registration is ok
			if ($count > 0)
			{
				$_SESSION['id'] = $result['id'];
				header("Location: edit.php");
			}
		}
	}
}	
?>
<html><style type="text/css">
<!--
.style5 {font-family: Arial, Helvetica, sans-serif; color: #FFFFFF; }
-->
</style>
<title></title>
	<body>
	<form method="post">
	  <table width="352" border="0" align="center" cellpadding="1" cellspacing="0">
        
        <tr>
          <td width="156"><input name="email" type="text"></td>
          <td width="144"><input type="password" name="password"></td>
          <td width="46"><input type="image" src="images/websites-submit.gif" name="image"></td>
        </tr>
        <tr>
          
        </tr>
      </table>
	</form>
    </body>
</html>