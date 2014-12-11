<?php
	session_start();
	error_reporting(E_ALL & ~E_NOTICE);
	include("config.php");
	$run_query = 1;
	if (!isset($_SESSION['id']))
	{
		echo "Error. Go to login.php page and enter your email and password.";
		exit();
	}

	$editorId = $_REQUEST['editorId'];
	
	if (!isset($editorId) || empty($editorId)){
		echo "error...";
	}	
		
	$query = "";
	
	//question
	if (strpos($editorId, "q_") === 0)
	{
		$query = "UPDATE faq SET q = '".prepare_insert($_GET['value'])."' WHERE id='".substr($editorId, strlen("q_"))."'";
	}
	//answer
	else if (strpos($editorId, "a_") === 0)
	{
		$query = "UPDATE faq SET a = '".prepare_insert($_GET['value'])."' WHERE id='".substr($editorId, strlen("a_"))."'";
	}
	else if (strpos($editorId, "page_title_") === 0)
	{
		$query = "UPDATE custom_page SET title = '".prepare_insert($_GET['value'])."' WHERE id='".substr($editorId, strlen("page_title_"))."'";
	}
	else if (strpos($editorId, "page_text_") === 0)
	{
		$query = "UPDATE custom_page SET text = '".prepare_insert($_GET['value'])."' WHERE id='".substr($editorId, strlen("page_text_"))."'";
	}
	else
	{
		switch($editorId)
		{
			case "company_name":
			{
				$query = "UPDATE sites SET name = '".prepare_insert($_GET['value'])."' WHERE id='".$_SESSION['id']."'";
				break;
			}
			case "subdomain":
			{
				$query = "UPDATE sites SET subdomain = '".prepare_insert($_GET['value'])."' WHERE id='".$_SESSION['id']."'";
				break;
			}
			case "use_about_us":
			{
				if (prepare_insert($_GET['value']) == "Yes")
					$value = 1;
				else
					$value = 0;
					
				$query = "UPDATE sites SET use_about_us = '".$value."' WHERE id='".$_SESSION['id']."'";
				break;
			}
			case "about_us_text":
			{
				$query = "UPDATE sites SET about_us_text = '".prepare_insert($_GET['value'])."' WHERE id='".$_SESSION['id']."'";
				break;
			}
			case "about_us_phone":
			{
				$query = "UPDATE sites SET about_us_phone = '".prepare_insert($_GET['value'])."' WHERE id='".$_SESSION['id']."'";
				break;
			}
			case "about_us_address":
			{
				$query = "UPDATE sites SET about_us_address = '".prepare_insert($_GET['value'])."' WHERE id='".$_SESSION['id']."'";
				break;
			}
			case "about_us_city":
			{
				$query = "UPDATE sites SET about_us_city = '".prepare_insert($_GET['value'])."' WHERE id='".$_SESSION['id']."'";
				break;
			}
			case "about_us_state":
			{
				$query = "UPDATE sites SET about_us_state = '".prepare_insert($_GET['value'])."' WHERE id='".$_SESSION['id']."'";
				break;
			}
			case "about_us_zip":
			{
				$query = "UPDATE sites SET about_us_zip = '".prepare_insert($_GET['value'])."' WHERE id='".$_SESSION['id']."'";
				break;
			}
			case "about_us_hours":
			{
				$query = "UPDATE sites SET about_us_hours = '".prepare_insert($_GET['value'])."' WHERE id='".$_SESSION['id']."'";
				break;
			}
			case "use_testmonials":
			{
				if (prepare_insert($_GET['value']) == "Yes")
					$value = 1;
				else
					$value = 0;
					
				$query = "UPDATE sites SET use_testimonials = '".$value."' WHERE id='".$_SESSION['id']."'";
				break;
			}
			case "Testmonial_1":
			{
				$query = "UPDATE sites SET testimonail_1 = '".prepare_insert($_GET['value'])."' WHERE id='".$_SESSION['id']."'";
				break;
			}
			case "Testmonial_2":
			{
				$query = "UPDATE sites SET testimonail_2 = '".prepare_insert($_GET['value'])."' WHERE id='".$_SESSION['id']."'";
				break;
			}
			case "Testmonial_3":
			{
				$query = "UPDATE sites SET testimonail_3 = '".prepare_insert($_GET['value'])."' WHERE id='".$_SESSION['id']."'";
				break;
			}
			case "Testmonial_4":
			{
				$query = "UPDATE sites SET testimonail_4 = '".prepare_insert($_GET['value'])."' WHERE id='".$_SESSION['id']."'";
				break;
			}
			case "Testmonial_5":
			{
				$query = "UPDATE sites SET testimonail_5 = '".prepare_insert($_GET['value'])."' WHERE id='".$_SESSION['id']."'";
				break;
			}
			case "Testmonial_6":
			{
				$query = "UPDATE sites SET testimonail_6 = '".prepare_insert($_GET['value'])."' WHERE id='".$_SESSION['id']."'";
				break;
			}
			case "use_gallery":
			{
				if (prepare_insert($_GET['value']) == "Yes")
					$value = 1;
				else
					$value = 0;
					
				$query = "UPDATE sites SET use_gallery = '".$value."' WHERE id='".$_SESSION['id']."'";
				break;
			}
			case "use_faq":
			{
				if (prepare_insert($_GET['value']) == "Yes")
					$value = 1;
				else
					$value = 0;
					
				$query = "UPDATE sites SET use_faq = '".$value."' WHERE id='".$_SESSION['id']."'";
				break;
			}
			case "use_contact_us":
			{
				if (prepare_insert($_GET['value']) == "Yes")
					$value = 1;
				else
					$value = 0;
					
				$query = "UPDATE sites SET use_conact_us = '".$value."' WHERE id='".$_SESSION['id']."'";
				break;
			}
			case "contact_us_text":
			{
				$query = "UPDATE sites SET contact_us_text = '".prepare_insert($_GET['value'])."' WHERE id='".$_SESSION['id']."'";
				break;
			}
			case "contact_us_email":
			{
				$query = "UPDATE sites SET contact_us_email = '".prepare_insert($_GET['value'])."' WHERE id='".$_SESSION['id']."'";
				break;
			}
			case "contact_us_use_names":
			{
				if (prepare_insert($_GET['value']) == "Yes")
					$value = 1;
				else
					$value = 0;
					
				$query = "UPDATE sites SET contact_us_use_names = '".$value."' WHERE id='".$_SESSION['id']."'";
				break;
			}
			case "contact_us_use_address":
			{
				if (prepare_insert($_GET['value']) == "Yes")
					$value = 1;
				else
					$value = 0;
					
				$query = "UPDATE sites SET contact_us_use_address = '".$value."' WHERE id='".$_SESSION['id']."'";
				break;
			}
			case "contact_us_use_phone":
			{
				if (prepare_insert($_GET['value']) == "Yes")
					$value = 1;
				else
					$value = 0;
					
				$query = "UPDATE sites SET contact_us_use_phone = '".$value."' WHERE id='".$_SESSION['id']."'";
				break;
			}
			case "contact_us_use_email":
			{
				if (prepare_insert($_GET['value']) == "Yes")
					$value = 1;
				else
					$value = 0;
					
				$query = "UPDATE sites SET contact_us_use_email = '".$value."' WHERE id='".$_SESSION['id']."'";
				break;
			}
			case "contact_us_use_how_learn":
			{
				if (prepare_insert($_GET['value']) == "Yes")
					$value = 1;
				else
					$value = 0;
					
				$query = "UPDATE sites SET contact_us_use_how_learn = '".$value."' WHERE id='".$_SESSION['id']."'";
				break;
			}
			case "use_service":
			{
				if (prepare_insert($_GET['value']) == "Yes")
					$value = 1;
				else
					$value = 0;
					
				$query = "UPDATE sites SET use_service = '".$value."' WHERE id='".$_SESSION['id']."'";
				break;
			}
			case "use_custom_page":
			{
				if (prepare_insert($_GET['value']) == "Yes")
					$value = 1;
				else
					$value = 0;
					
				$query = "UPDATE sites SET use_custom_page = '".$value."' WHERE id='".$_SESSION['id']."'";
				break;
			}
			case "use_google_ads":
			{
				if (prepare_insert($_GET['value']) == "Yes")
					$value = 1;
				else
					$value = 0;
					
				$query = "UPDATE sites SET use_google_ads = '".$value."' WHERE id='".$_SESSION['id']."'";
				break;
			}
			case "google_code":
			{
				$query = "UPDATE sites SET google_code = '".prepare_insert($_GET['value'])."' WHERE id='".$_SESSION['id']."'";
				break;
			}
			case 'ins_faq' :
			{
				$query = "delete from faq WHERE site_id='".$_SESSION['id']."'";
				mysql_query($query);
					
				
				foreach($_POST['question'] as $k=>$q){
					if($k && $q){
						$query = "insert into faq 
												SET q = '".prepare_insert($_POST['question'][$k])."',
											    a = '".prepare_insert($_POST['answer'][$k])."',
											    site_id='".$_SESSION['id']."'" ;
						mysql_query($query);
					}
					
				}
				
				
				$run_query = 0;
				
				break;
					
			}
			break;
			
			default:  
			{
				echo "error... (in switch (".$editorId."))";
				exit();
			}
		}
	}
	if($run_query){
		$result = mysql_query($query);
		if ($result)
			echo $_GET['value'];
		else
			echo "error... (in mysql)";	
	}else{
		header("location:edit.php");
	}
	
?>