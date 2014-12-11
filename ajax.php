<?php	
	$subdomain = $_GET['subdomain'];
	
	$subdomain = strtolower($subdomain);
	
	if (isset($subdomain) && empty($subdomain))
	{
		echo "failed";
		exit();
	}
	
	if ($handle = opendir('subdomains')) 
	{
		while (false !== ($file = readdir($handle))) 
		{
			if ($file != "." && $file != "..") 
			{
				if ($file == $subdomain)
				{
					echo "failed";
					exit();
				}				
			}
		}
		closedir($handle);
		echo "ok";
	}
	else
		echo "failed";
		
?>