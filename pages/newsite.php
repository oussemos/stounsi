<?php
	session_start();
	error_reporting(E_ALL & ~E_NOTICE);
	include("config.php");



if ($_POST)
{
	$isOk = false;
	$haveErrors = false;
	$errors = array();
	
	/*  Get post variab;es */
	
	$design_template = $_POST['design'];
	
	if (!preg_match("/^[0-9]$/i", $design_template))
		$design_template = 1;
	
	$company_name = prepare_insert($_POST['company_name']);
	
	$subdomain = strtolower($_POST['subdomain']);
	
	if ($subdomain == "")
	{
		$errors[] = "Directory name is empty.";
	}
	else
	{
		if (!is_good_subdomain_name($subdomain))
		{
			$errors[] = "Directory ".$subdomain." contains unallowed symbols. Please don't use the following symbols: / \ \" ? * : | <>.";
			$haveErrors = true;
		}
		else
		{
			//already exist this subdomain?
			if (!is_free_subdomain($subdomain))
			{
				$errors[] = "Directory ".$subdomain." already exists.";
				$haveErrors = true;
			}
		}
	}
	
	$password = prepare_insert($_POST['password']);
	if (!preg_match("/[A-Z]/", $password) || !preg_match("/[0-9]/i", $password))
	{
		$errors[] = "Password must contain one capitalized letter and one number.";
	}
		
	//upload logo
	$logo = $_FILES['logo'];
		
	
	$email = prepare_insert($_POST['email']);
	
	$use_about_us = prepare_insert($_POST['use_about_us']);
	
		$about_us_text = prepare_insert($_POST['about_us_text']);
		
		$about_us_phone = prepare_insert($_POST['about_us_phone']);
		
		$about_us_address = prepare_insert($_POST['about_us_address']);
		
		$about_us_city = prepare_insert($_POST['about_us_city']);
		
		$about_us_state = prepare_insert($_POST['about_us_state']);
		
		$about_us_zip = prepare_insert($_POST['about_us_zip']);
		
		$about_us_hours = prepare_insert($_POST['about_us_hours']);
		
	$use_testmonials = prepare_insert($_POST['use_testmonials']);
	
		$testmonial_1 = prepare_insert($_POST['Testmonial_1']);
		
		$testmonial_2 = prepare_insert($_POST['Testmonial_2']);
		
		$testmonial_3 = prepare_insert($_POST['Testmonial_3']);
		
		$testmonial_4 = prepare_insert($_POST['Testmonial_4']);
		
		$testmonial_5 = prepare_insert($_POST['Testmonial_5']);
		
		$testmonial_6 = prepare_insert($_POST['Testmonial_6']);
		
	$use_gallery = prepare_insert($_POST['use_gallery']);

	$use_faq = prepare_insert($_POST['use_faq']);
	
		foreach ($_POST as $key => $value)
		{
			if (strpos($key, "question_") !== false)
			{
				$number = substr($key, strlen("question_"));
				$faq[$number]['question'] = prepare_insert($value);
			}
			if (strpos($key, "answer_") !== false)
			{
				$number = substr($key, strlen("answer_"));
				$faq[$number]['answer'] = prepare_insert($value);		
			}
		}
	
	$use_contact_us = prepare_insert($_POST['use_contact_us']);
	
		$contact_us_text = prepare_insert($_POST['contact_us_text']);
			
		$contact_us_email = prepare_insert($_POST['contact_us_email']);
		
		$contact_us_use_names = prepare_insert($_POST['contact_us_use_names']);
		
		$contact_us_use_address = prepare_insert($_POST['contact_us_use_address']);
		
		$contact_us_use_phone = prepare_insert($_POST['contact_us_use_phone']);
		
		$contact_us_use_email = prepare_insert($_POST['contact_us_use_email']);
		
		$contact_us_use_how_learn = prepare_insert($_POST['contact_us_use_how_learn']);

	$use_service = prepare_insert($_POST['use_service']);
	
		$use_custom_page = prepare_insert($_POST['use_custom_page']);
		
		foreach ($_POST as $key => $value)
		{
			if (strpos($key, "page_title_") !== false)
			{
				$number = substr($key, strlen("page_title_"));
				$custom_pages[$number]['title'] = prepare_insert($value);
			}
			if (strpos($key, "page_text_") !== false)
			{
				$number = substr($key, strlen("page_text_"));
				$custom_pages[$number]['text'] = prepare_insert($value);
			}
		}
		
	$use_google_ads = prepare_insert($_POST['use_google_ads']);
		
		$google_code = prepare_insert($_POST['google_code']);
		
	
	/* Show errors */
	if (is_array($errors))
		foreach ($errors as $value)
			showError($value);

	/* If we haven't any errors */
	
	//Create subdomain folder and all subfolder
	if (count($errors) == 0)
	{
		$mk = make_directories(array(SUBDOMAINS_FOLDER.$subdomain, SUBDOMAINS_FOLDER.$subdomain."/gallery", SUBDOMAINS_FOLDER.$subdomain."/images"));
		if ($mk)
			$isSubdomainCreated = true;
		else
		{
			showError("Can't create directories");
			$haveErrors = true;
			$isSubdomainCreated = false;
		}
	}
	//check subdomain
	if ($isSubdomainCreated == false && count($errors) == 0)
	{
		showError("Couldn't create folders. <a href=\"javascript: history.back()\">Please try again</a>");
		exit();
	}
	//copy images into folders
	if ($isSubdomainCreated == true && count($errors) == 0)
	{
		if ($logo['size'] == 0)
				$logo = "";
		else
		{
			if ($logo['size'] > $max_size)
			{
				$image_errors[] = "Size of Logo is large. Max size is ".($max_size/2024)."Kb";
				$logo = "";
				$haveErrors = true;
			}
			else if (!is_good_extension($logo['name']))
			{
				$image_errors[] = "Extension of Logo is not image extension. Please try again with an image file.";
				$logo = "";
				$haveErrors = true;
			}
			else
			{	
				$uploaddir = SUBDOMAINS_FOLDER.$subdomain."/images/";
				$uploadfile = $uploaddir.basename($logo['name']);

				if (!move_uploaded_file($logo['tmp_name'], $uploadfile)) 
				{
					$image_errors[] = "File ".$logo['name']." has not been uploaded.";
					$logo = "";
					$haveErrors = true;
				}
				else
					$logo = $uploadfile;	
			}
		}
		
		if ($use_gallery)
		{
			$image_1 = $_FILES['image_1'];
				if ($image_1['size'] == 0)
					$image_1 = "";
				else
				{
					if ($image_1['size'] > $max_size)
					{
						$image_errors[] = "Size of Image1 is large. Max size is ".($max_size/3024)."Kb";
						$image_1 = "";
					}
					else if (!is_good_extension($image_1['name']))
					{
						$image_errors[] = "Extension of Image1 is not image extension. Upload only images.";
						$image_1 = "";
					}
					else
					{
						$uploaddir = SUBDOMAINS_FOLDER.$subdomain."/gallery/";
						$uploadfile = $uploaddir.basename($image_1['name']);

						if (!move_uploaded_file($image_1['tmp_name'], $uploadfile)) 
						{
							$image_errors[] = "File ".$image_1['name']." has not been uploaded.";
							$image_1 = "";
						}
						else
							$image_1 = $uploadfile;
						
					}
				}
			
			$image_2 = $_FILES['image_2'];
				//checking image_2
				if ($image_2['size'] == 0)
					$image_2 = "";
				else
				{
					if ($image_2['size'] > $max_size)
					{
						$image_errors[] = "Size of Image2 is large. Max size is ".($max_size/3024)."Kb";
						$image_2 = "";
					}
					else if (!is_good_extension($image_2['name']))
					{
						$image_errors[] = "Extension of Image2 is not image extension. Upload only images.";
						$image_2 = "";
					}
					else
					{
						
							$uploaddir = SUBDOMAINS_FOLDER.$subdomain."/gallery/";
							$uploadfile = $uploaddir.basename($image_2['name']);

							if (!move_uploaded_file($image_2['tmp_name'], $uploadfile)) 
							{
								$image_errors[] = "File ".$image_2['name']." has not been uploaded.";
								$image_2 = "";
							}
							else
								$image_2 = $uploadfile;
					}
				}
			
			$image_3 = $_FILES['image_3'];
				//checking image_3
				if ($image_3['size'] == 0)
					$image_3 = "";
				else
				{
					if ($image_3['size'] > $max_size)
					{
						$image_errors[] = "Size of Image3 is large. Max size is ".($max_size/3024)."Kb";
						$image_3 = "";
					}
					else if (!is_good_extension($image_3['name']))
					{
						$image_errors[] = "Extension of Image3 is not image extension. Upload only images.";
						$image_3 = "";
					}
					else
					{
						
						$uploaddir = SUBDOMAINS_FOLDER.$subdomain."/gallery/";
						$uploadfile = $uploaddir.basename($image_3['name']);

						if (!move_uploaded_file($image_3['tmp_name'], $uploadfile)) 
						{
							$image_errors[] = "File ".$image_3['name']." has not been uploaded.";
							$image_3 = "";
						}
						else
							$image_3 = $uploadfile;
					}
				}
			

			$image_4 = $_FILES['image_4'];
				//checking image_4
				if ($image_4['size'] == 0)
					$image_4 = "";
				else
				{
					if ($image_4['size'] > $max_size)
					{
						$image_errors[] = "Size of Image4 is large. Max size is ".($max_size/3024)."Kb";
						$image_4 = "";
					}
					else if (!is_good_extension($image_4['name']))
					{
						$image_errors[] = "Extension of Image4 is not image extension. Upload only images.";
						$image_4 = "";
					}
					else
					{
						$uploaddir = SUBDOMAINS_FOLDER.$subdomain."/gallery/";
						$uploadfile = $uploaddir.basename($image_4['name']);

						if (!move_uploaded_file($image_4['tmp_name'], $uploadfile)) 
						{
							$image_errors[] = "File ".$image_4['name']." has not been uploaded.";
							$image_4 = "";
						}
						else
							$image_4 = $uploadfile;
					}
				}
			
			$image_5 = $_FILES['image_5'];
				//checking image_5
				if ($image_5['size'] == 0)
					$image_5 = "";
				else
				{
					if ($image_5['size'] > $max_size)
					{
						$image_errors[] = "Size of Image5 is large. Max size is ".($max_size/3024)."Kb";
						$image_5 = "";
					}
					else if (!is_good_extension($image_5['name']))
					{
						$image_errors[] = "Extension of Image5 is not image extension. Upload only images.";
						$image_5 = "";
					}
					else
					{
						$uploaddir = SUBDOMAINS_FOLDER.$subdomain."/gallery/";
						$uploadfile = $uploaddir.basename($image_5['name']);

						if (!move_uploaded_file($image_5['tmp_name'], $uploadfile)) 
						{
							$image_errors[] = "File ".$image_5['name']." has not been uploaded.";
							$image_5 = "";
						}
						else
							$image_5 = $uploadfile;
					}
				}
			
			$image_6 = $_FILES['image_6'];
				//checking image_6
				if ($image_6['size'] == 0)
					$image_6 = "";
				else
				{
					if ($image_6['size'] > $max_size)
					{
						$image_errors[] = "Size of Image6 is large. Max size is ".($max_size/3024)."Kb";
						$image_6 = "";
					}
					else if (!is_good_extension($image_6['name']))
					{
						$image_errors[] = "Extension of Image6 is not image extension. Upload only images.";
						$image_6 = "";
					}
					else
					{
						$uploaddir = SUBDOMAINS_FOLDER.$subdomain."/gallery/";
						$uploadfile = $uploaddir.basename($image_6['name']);

						if (!move_uploaded_file($image_6['tmp_name'], $uploadfile)) 
						{
							$image_errors[] = "File ".$image_6['name']." has not been uploaded.";
							$image_6 = "";
						}
						else
							$image_6 = $uploadfile;
					}
				}
			
			$image_7 = $_FILES['image_7'];
				//checking image_7
				if ($image_7['size'] == 0)
					$image_7 = "";
				else
				{
					if ($image_7['size'] > $max_size)
					{
						$image_errors[] = "Size of Image7 is large. Max size is ".($max_size/3024)."Kb";
						$image_7 = "";
					}
					else if (!is_good_extension($image_7['name']))
					{
						$image_errors[] = "Extension of Image7 is not image extension. Upload only images.";
						$image_7 = "";
					}
					else
					{
						$uploaddir = SUBDOMAINS_FOLDER.$subdomain."/gallery/";
						$uploadfile = $uploaddir.basename($image_7['name']);

						if (!move_uploaded_file($image_7['tmp_name'], $uploadfile)) 
						{
							$image_errors[] = "File ".$image_7['name']." has not been uploaded.";
							$image_7 = "";
						}
						else
							$image_7 = $uploadfile;
					}
				}
			
			$image_8 = $_FILES['image_8'];
				//checking image_8
				if ($image_8['size'] == 0)
					$image_8 = "";
				else
				{
					if ($image_8['size'] > $max_size)
					{
						$image_errors[] = "Size of Image8 is large. Max size is ".($max_size/3024)."Kb";
						$image_8 = "";
					}
					else if (!is_good_extension($image_8['name']))
					{
						$image_errors[] = "Extension of Image8 is not image extension. Upload only images.";
						$image_8 = "";
					}
					else
					{
						$uploaddir = SUBDOMAINS_FOLDER.$subdomain."/gallery/";
						$uploadfile = $uploaddir.basename($image_8['name']);

						if (!move_uploaded_file($image_8['tmp_name'], $uploadfile)) 
						{
							$image_errors[] = "File ".$image_8['name']." has not been uploaded.";
							$image_8 = "";
						}
						else
							$image_8 = $uploadfile;
					}
				}
			
			$image_9 = $_FILES['image_9'];
				//checking image_9
				if ($image_9['size'] == 0)
					$image_9 = "";
				else
				{
					if ($image_9['size'] > $max_size)
					{
						$image_errors[] = "Size of Image9 is large. Max size is ".($max_size/3024)."Kb";
						$image_9 = "";
					}
					else if (!is_good_extension($image_9['name']))
					{
						$image_errors[] = "Extension of Image9 is not image extension. Upload only images.";
						$image_9 = "";
					}
					else
					{
						$uploaddir = SUBDOMAINS_FOLDER.$subdomain."/gallery/";
						$uploadfile = $uploaddir.basename($image_9['name']);

						if (!move_uploaded_file($image_9['tmp_name'], $uploadfile)) 
						{
							$image_errors[] = "File ".$image_9['name']." was not been uploaded.";
							$image_9 = "";
						}
						else
							$image_9 = $uploadfile;
					}
				}
			
			$image_10 = $_FILES['image_10'];
				//checking image_10
				if ($image_10['size'] == 0)
					$image_10 = "";
				else
				{
					if ($image_10['size'] > $max_size)
					{
						$image_errors[] = "Size of Image10 is large. Max size is ".($max_size/3024)."Kb";
						$image_10 = "";
					}
					else if (!is_good_extension($image_10['name']))
					{
						$image_errors[] = "Extension of Image10 is not image extension. Upload only images.";
						$image_10 = "";
					}
					else
					{
						$uploaddir = SUBDOMAINS_FOLDER.$subdomain."/gallery/";
						$uploadfile = $uploaddir.basename($image_10['name']);

						if (!move_uploaded_file($image_10['tmp_name'], $uploadfile)) 
						{
							$image_errors[] = "File ".$image_10['name']." was not been uploaded.";
							$image_10 = "";
						}
						else
							$image_10 = $uploadfile;
					}
				}
		}
		
		foreach ($_FILES as $key => $value)
		{
			if (strpos($key, "image_custom_page_") !== false)
			{
				$number = substr($key, strlen("image_custom_page_"));
				
				/*
				echo "Key = ".$key."<br>";
				echo "Value = ";
				echo "<pre>";
				print_r($value);
				echo "</pre>";
				echo "Number = ".$number."<br>";
				echo "Size = ".$value['size']."<br>";
				echo "<pre>";
				print_r($value['size']);
				echo "</pre>";
				*/
				
				if ($value['size'] == 0)
					$custom_pages[$number]['image'] = "";
				else
				{
					if ($value['size'] > $max_size)
					{
						$custom_page_errors[] = "Size of image is large. Max size is ".($max_size/3024)."Kb";
						$custom_pages[$number]['image'] = "";
					}
					else if (!is_good_extension($value['name']))
					{
						$custom_page_errors[] = "Extension of image is not image extension. Upload only images.";
						$custom_pages[$number]['image'] = "";
					}
					else
					{
						$uploaddir = SUBDOMAINS_FOLDER.$subdomain."/images/";
						$uploadfile = $uploaddir.basename($value['name']);

						if (!move_uploaded_file($value['tmp_name'], $uploadfile)) 
						{
							$custom_page_errors[] = "File ".$value['name']." was not been uploaded.";
							$custom_pages[$number]['image'] = "";
						}
						else
							$custom_pages[$number]['image'] = $uploadfile;
					}
				}
			}
		}
	}
	
	if (is_array($image_errors))
		foreach ($image_errors as $value)
			showError($value);
	if (is_array($custom_page_errors))
		foreach ($custom_page_errors as $value)
			showError($value);
	
	if (count($errors) == 0)
	{
		//ID of site
		$siteID = md5(microtime());
		
		$query[0]['fields'] = "id";
		$query[0]['date'] = $siteID;
		
		//design
		$query[1]['fields'] = "design";
		$query[1]['date'] = $design_template+1;
		//name
		$query[2]['fields'] = "name";
		$query[2]['date'] = $company_name;
		//subdomain
		$query[3]['fields'] = "subdomain";
		$query[3]['date'] = $subdomain;
		//password
		$query[4]['fields'] = "password";
		$query[4]['date'] = md5($password);
		//email
		$query[5]['fields'] = "email";
		$query[5]['date'] = $email;
		//use about us page
		$query[6]['fields'] = "use_about_us";
		$query[6]['date'] = $use_about_us;
		if ($use_about_us)
		{
			//about_us_text
			$query[50]['fields'] = "about_us_text";
			$query[50]['date'] = $about_us_text;
			//about_us_phone
			$query[51]['fields'] = "about_us_phone";
			$query[51]['date'] = $about_us_phone;
			//about_us_address
			$query[52]['fields'] = "about_us_address";
			$query[52]['date'] = $about_us_address;
			//about_us_city
			$query[53]['fields'] = "about_us_city";
			$query[53]['date'] = $about_us_city;
			//about_us_state
			$query[54]['fields'] = "about_us_state";
			$query[54]['date'] = $about_us_state;
			//about_us_zip
			$query[55]['fields'] = "about_us_zip";
			$query[55]['date'] = $about_us_zip;
			//about_us_hours
			$query[56]['fields'] = "about_us_hours";
			$query[56]['date'] = $about_us_hours;
		}
		//testmonials
		$query[7]['fields'] = "use_testimonials";
		$query[7]['date'] = $use_testmonials;
		if ($use_testmonials)
		{
			//testmonial_1
			$query[60]['fields'] = "testimonail_1";
			$query[60]['date'] = $testmonial_1;
			//testmonial_2
			$query[61]['fields'] = "testimonail_2";
			$query[61]['date'] = $testmonial_2;
			//testmonial_3
			$query[62]['fields'] = "testimonail_3";
			$query[62]['date'] = $testmonial_3;
			//testmonial_4
			$query[63]['fields'] = "testimonail_4";
			$query[63]['date'] = $testmonial_4;
			//testmonial_5
			$query[64]['fields'] = "testimonail_5";
			$query[64]['date'] = $testmonial_5;
			//testmonial_6
			$query[65]['fields'] = "testimonail_6";
			$query[65]['date'] = $testmonial_6;
		}
		//gallery
		$query[8]['fields'] = "use_gallery";
		$query[8]['date'] = $use_gallery;
		if ($use_gallery)
		{
			//image 1
			$query[70]['fields'] = "gallery_1";
			$query[70]['date'] = $image_1;
			//image 2
			$query[71]['fields'] = "gallery_2";
			$query[71]['date'] = $image_2;
			//image 3
			$query[72]['fields'] = "gallery_3";
			$query[72]['date'] = $image_3;
			//image 4
			$query[73]['fields'] = "gallery_4";
			$query[73]['date'] = $image_4;
			//image 5
			$query[74]['fields'] = "gallery_5";
			$query[74]['date'] = $image_5;
			//image6
			$query[75]['fields'] = "gallery_6";
			$query[75]['date'] = $image_6;
			//image 7
			$query[76]['fields'] = "gallery_7";
			$query[76]['date'] = $image_7;
			//image 8
			$query[78]['fields'] = "gallery_8";
			$query[78]['date'] = $image_8;
			//image 9
			$query[79]['fields'] = "gallery_9";
			$query[79]['date'] = $image_9;
			//image 10
			$query[80]['fields'] = "gallery_10";
			$query[80]['date'] = $image_10;
		}
		
		//faq
		$query[9]['fields'] = "use_faq";
		$query[9]['date'] = $use_faq;
		if ($use_faq)
		{
			$query_faq = "INSERT INTO faq VALUES";
			
			for ($i=0; $i<count($faq); $i++)
			{
				if ($i != 0)
					$query_faq .= ",";
				$query_faq .= " (NULL, '".$faq[$i]['question']."', '".$faq[$i]['answer']."', '".$siteID."')";
			} 

			$result = mysql_query($query_faq);
			if (!$result)
			{
				$errors[] = "MySQL Error: ".mysql_error();
				$haveErrors = true;
			}
		}
		
		//contact us
		$query[10]['fields'] = "use_conact_us";
		$query[10]['date'] = $use_contact_us;
		if ($use_contact_us)
		{
			//contact_us_text
			$query[90]['fields'] = "contact_us_text";
			$query[90]['date'] = $contact_us_text;
			//contact_us_email
			$query[91]['fields'] = "contact_us_email";
			$query[91]['date'] = $contact_us_email;
			//contact_us_use_names
			$query[92]['fields'] = "contact_us_use_names";
			$query[92]['date'] = $contact_us_use_names;
			//contact_us_use_address
			$query[93]['fields'] = "contact_us_use_address";
			$query[93]['date'] = $contact_us_use_address;
			//contact_us_use_phone
			$query[94]['fields'] = "contact_us_use_phone";
			$query[94]['date'] = $contact_us_use_phone;
			//contact_us_use_email
			$query[95]['fields'] = "contact_us_use_email";
			$query[95]['date'] = $contact_us_use_email;
			//contact_us_use_how_learn
			$query[96]['fields'] = "contact_us_use_how_learn";
			$query[96]['date'] = $contact_us_use_how_learn;
		}
		
		//service
		$query[11]['fields'] = "use_service";
		$query[11]['date'] = $use_service;
		if ($use_service)
		{
			$query[97]['fields'] = "use_custom_page";
			$query[97]['date'] = $use_custom_page;
			//custom pages
			if ($use_custom_page)
			{
				$query_custom_page = "INSERT INTO custom_page VALUES";
			
				for ($i=0; $i<count($custom_pages); $i++)
				{
					if ($i != 0)
						$query_custom_page .= ",";
					$query_custom_page .= " (NULL, '".$siteID."', '".$custom_pages[$i]['title']."', '".$custom_pages[$i]['text']."', '".$custom_pages[$i]['image']."')";
				} 

				$result = mysql_query($query_custom_page);
				if (!$result)
				{
					$errors[] = "MySQL Error (INSER INTO custom_page): ".mysql_error();
					$haveErrors = true;
				}
			}
		}
		
		//logo
		if ($logo != "")
		{
			$query[12]['fields'] = "logo";
			$query[12]['date'] = $logo;
		}
		
		//Google ads code
		$query[13]['fields'] = "use_google_code";
		$query[13]['date'] = $use_google_ads;
		if ($use_google_ads)
		{
			$query[14]['fields'] = "google_code";
			$query[14]['date'] = $google_code;
		}
		
		
		/*  Insert into table*/
		$str = "INSERT INTO sites (";
		$i = 0;
		
		foreach ($query as $key1 => $value1)
			foreach ($value1 as $key2 => $value2)
			{
				if ($key2 == "fields")
				{
					if ($i != 0)
						$str .= ", ";
						
					$str .= $value2;
					$i++;
				}
			}
			
		$str .= ") VALUES (";
		
		$i = 0;
		foreach ($query as $key1 => $value1)
			foreach ($value1 as $key2 => $value2)
			{
				if ($key2 != "fields")
				{
					if ($i != 0)
						$str .= ", ";
						
					$str .= "'".$value2."'";
					$i++;
				}
			}
		
		$str .= ")";
		
		$result = mysql_query($str);
		if (!$result)
		{
			$errors[] = "MySQL Error: ".mysql_error();
			$haveErrors = true;
		}
		
		//show errors
		foreach ($errors as $key => $value)
			echo "<font size=\"3\" color=\"red\">".$value."</font><br />";
			
		if (!$haveErrors)
		{
			echo "<center>Congratulations!<br /><a href=\"user/".$subdomain."/index.html\">View your page:</a></center>";
			$isCompleate = true;
		}
	}
	//}
}

if (!$isCompleate)
{
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>	
	<meta name="keywords" content="website builder, free websites, ezsitemaker.com" />
<meta name="description" content="Free way to build your own website. Our website builder is a great way to get your own free website. Source for free websites." />

	<script type="text/javascript" src="js/prototype.js"></script>
	<script type="text/javascript" src="js/scriptaculous.js"></script>
	<script type="text/javascript" src="js/unittest.js"></script>
	<script type="text/javascript" src="js/webform.js"></script>
	

	<script type="text/javascript">
		var imgFile = new Array();
<?php
	$imageCount = 0;
	if ($handle = opendir(BASE_FOLDER.'thumbs')) 
	{
		$templatesThumb=array();
		while (false !== ($file = readdir($handle))) 
		{
			if ($file != "." && $file != "..") 
			{
				list($font, $null) = split('\.', $file);
				$font = ucwords($font);
				$templatesThumb[]=$file;
				$imageCount++;
			}
		}
		closedir($handle);
		sort($templatesThumb);
		$j=0;
		foreach($templatesThumb as $thumb) {
		  echo "imgFile[$j] = \"".SITE_ROOT."thumbs/".$thumb."\";\n";
		  $j++;
		}
	}
?>
		var imgObj = new Array();
		for (i=0; i<imgFile.length; i++)
		{
			imgObj[i] = new Image(150, 150);
			imgObj[i].src = imgFile[i];
		}

		var imgBegin = 0;
		var selectedRadio = 0;
		<?php 
			if ($_POST)
				echo "var selectedDesign = ".$design_template;	
			else
				echo "var selectedDesign = -1";	
		?>
		
		function select_radio(element)
		{
			selectedRadio = element.value;
		}
				
		function change_image(index)
		{
			imgBegin += index;

			if (imgBegin < 0)
				imgBegin = imgFile.length-1;

			for (i=0; i<<?php if ($imageCount >= 6) echo 6; else echo $imageCount; ?>; i++)
			{
				var indx = (imgBegin+i) % imgFile.length;

				document.getElementById("icon"+(i+1)).innerHTML = '<img src="'+imgObj[indx].src+'">';
				if (selectedDesign != -1)
				{
					if (indx == selectedDesign)
						document.getElementById("rbutton"+(i+1)).innerHTML = '<input type="radio" value="'+indx+'" name="design" onclick="javascript:select_radio(this)" checked>';
					else
						document.getElementById("rbutton"+(i+1)).innerHTML = '<input type="radio" value="'+indx+'" name="design" onclick="javascript:select_radio(this)">';
				}
				else
				{
					if (indx == selectedRadio)
						document.getElementById("rbutton"+(i+1)).innerHTML = '<input type="radio" value="'+indx+'" name="design" onclick="javascript:select_radio(this)" checked>';
					else
						document.getElementById("rbutton"+(i+1)).innerHTML = '<input type="radio" value="'+indx+'" name="design" onclick="javascript:select_radio(this)">';
				}
			}
		}
		
		function check_avalible()
		{
			var load_image = document.getElementById("ajax-loader");
			load_image.style.display = 'block';
			
			var subdomain = document.getElementById("subdomain");
			
			var url = 'ajax.php';
			var params = '?subdomain=' + $F(subdomain);
			
			var ajax   = new Ajax.Updater(
											'subdomain',
	                                        url, 
											{
												method: 'get',
		                                        parameters: {subdomain: $F(subdomain)},
												onComplete: function (response) 
													{
												        if (response.responseText == "ok")
															subdomain.style.backgroundColor = "#4BB504";
														else
															subdomain.style.backgroundColor = "#d02e48";
															
														load_image.style.display = 'none';
												    },
												onFailure: function ()
													{
														subdomain.style.backgroundColor = "#ff0000";
														load_image.style.display = 'none';
													}
											}
										);
   
			/*
			//We can use one Request object many times.
			var req = new Request.HTML({url:'ajax.php?subdomain='+subdomain.value, 
				onSuccess: function(html) {
					//Clear the text currently inside the results div.
					$("abc").set('text', '');
					$("abc").adopt(html);

					if ($("abc").innerHTML == "ok")
					{
						subdomain.style.color = "#00ff00";
					}
					else
					{
						subdomain.style.color = "#ff0000";
					}
					
					load_image.style.display = 'none';
				},
				//Our request will most likely succeed, but just in case, we'll add an
				//onFailure method which will let the user know what happened.
				onFailure: function() {
					subdomain.style.color = "#ff0000";
					//load_image.style.display = 'none';
				}
			});
			
			req.send();
			*/
		}
		
		function change_visible(isVisible, elementID)
		{
			//alert(isVisible)
			var item = document.getElementById(elementID);
			if (isVisible)
				item.style.display = 'block';
			else
				item.style.display = 'none';
		}
		
		</script>
		<style type="text/css">
<!--
.text {
	font-family: "Century Gothic";
	font-size: 12px;
	font-style: normal;
	font-weight: normal;
	color: #666666;
}
.button {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 16px;
	font-style: normal;
	font-weight: bold;
	color: #333333;
	padding: 11;
}
.style6 {font-size: 16px; font-style: normal; font-weight: bold; padding: 11; font-family: Arial, Helvetica, sans-serif;}
.style7 {font-weight: bold; padding: 11; font-size: 16px; font-style: normal;}
body {
	background-color: #e4e5e0;
	margin-top: 5px;
}
.websitemakertext {	font-family: Corbel;
	font-size: 12px;
	font-style: normal;
	font-weight: normal;
	color: #FFFFFF;
}
.style8 {
	color: #009933;
	font-weight: bold;
}
.style9 {color: #999999}
.style10 {font-family: "Century Gothic"; font-size: 12px; font-style: normal; font-weight: bold; color: #666666; }
-->
        </style>
		<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /><title>Website Builder | Free Websites</title></head>

<body link="#FFFFFF" vlink="#FFFFFF" alink="#FFFFFF" onload="javascript:change_image(0)">
<table width="830" border="0" align="center" cellpadding="0" cellspacing="0" class="text">
  <tr>
    <td height="14" colspan="3" valign="bottom">
      
      
    <div align="center">
      <h2 align="center" class="style9"><font size="1">make your own website | website maker | website generator | free websites |  small business websites | free website builder </font></h2>
    </div></td>
  </tr>
  <tr>
    <td height="81" colspan="3" valign="top" bgcolor="#4CB7EB"><img src="http://www.ezsitemaker.com/images/makeyourownwebsite.jpg" alt="website builder, free websites, site maker" width="883" height="154" border="0" usemap="#Map3" />
      <map name="Map3" id="Map3">
        <area shape="rect" coords="76,61,288,107" href="http://www.ezsitemaker.com/" alt="website builder, free websites, free, website" />
        <area shape="rect" coords="562,110,698,130" href="http://www.ezsitemaker.com/websitemaker/" alt="free websites, website builder, website maker" />
    </map>    </td>
  </tr>
  <tr>
    <td height="5" colspan="3" valign="top" bgcolor="#4CB7EB"></td>
  </tr>
  
  <tr>
    <td width="23" bgcolor="#FFFFFF">&nbsp;</td>
    <td colspan="2" valign="top" bgcolor="#FFFFFF"><form method="post" enctype="multipart/form-data">	
      
        <h3 align="center" class="style7"><font color="#CCCCCC" size="2" face="Century Gothic"><br />
        Make Your Own Website | Free Website | Website Maker | Website Generator | Websites | Small Business Websites</font> </h3>
        <p align="center"><img src="images/free_websites.png" alt="websites, website generator, make your own" width="741" height="8" /></p>
        <p><img src="http://www.ezsitemaker.com/websitemaker/images/freewebsitebuilder.png" alt="website builder, free websites" width="813" height="35" /><font size="3"></p>
        <h4 class="style6"><font color="#333333">Select The Website Design Style for Your Free Website:</font></h4>
        <table align="left">
    <tr>
  <?php
	if ($imageCount >= 4)
	{
?>
      <td><a href="javascript:change_image(-1)"><img src="http://www.ezsitemaker.com/images/websitemaker.gif" alt="website design, free, maker" width="30" height="38" border="0" /></a></td>
		  
		<td>
		  <div id="icon1"></div>		</td>
		  
		<td valign="top">
		  <div id="rbutton1"></div>		</td>
		  
		<td>
		  <div id="icon2"></div>		</td>
		  
		<td valign="top">
		  <div id="rbutton2"></div>		</td>
		  
		<td>
		  <div id="icon3"></div>		</td>
		  
		<td valign="top">
		  <div id="rbutton3"></div>		</td>
		  
		<td>
		  <div id="icon4"></div>		</td>
		  
		<td valign="top">
		  <div id="rbutton4"></div>		</td>
		  
		<td><a href="javascript:change_image(1)"><img src="http://www.ezsitemaker.com/images/websitebuilder.gif" alt="make your own website" width="30" height="38" border="0" /></a></td>
  <?php
	}
	else
	{
		for ($i=0; $i<$imageCount; $i++)
		{
			echo "<td>
					<div id=\"icon".($i+1)."\"></div>
				</td>
				<td valign=\"top\">
					<div id=\"rbutton".($i+1)."\"></div>
				</td>";
		}
	}
?>
      </tr>
  </table>
  
<div align="left">
  <p><br />
    </p>
  <p align="center"><img src="images/free_websites.png" alt="site maker, website, free" width="741" height="8" />  </p>
</div>
  <p align="left"><br />
    <font color="#027E91" class="button">Enter Account Information :</font></p>
  <table width="628" cellpadding="8">
    <tr>
      <td width="271" class="text"><div align="left"><strong><font color="#302F2D" size="2">Site Name/Company Name:</font></strong></div></td>
		  <td width="144"><input type="text" name="company_name" value="<?php if ($_POST) echo $company_name; ?>"></td>
	  </tr>
    <tr>
      <td class="text"><div align="left"><strong><font color="#302F2D">Subdomain Address:</font></strong></div></td>
		  <td><input type="text" name="subdomain" id="subdomain" onkeyup="check_avalible()" value="<?php if ($_POST) echo $subdomain; ?>"></td>
		  <td width="134"><input type="button" value="Check for Availability" onclick="check_avalible()"></td>
		  <td width="3"><div id="ajax-loader" style="display: none"><img src="images/ajax-loader.gif"></div></td>
	  </tr>
    <tr>
      <td class="text"><div align="left"><em>( EzSiteMaker.com/<span class="style8">subdomainaddress </span>)</em></div></td>
	    <td><font color="#836D7B"><img src="images/domainavailability.png" alt="domain availability" width="97" height="23" /></font></td>
	    <td>&nbsp;</td>
	    <td>&nbsp;</td>
	    </tr>
    <tr>
      <td class="text"><div align="left"><strong><font color="#302F2D">Password:</font></strong></div></td>
		  <td><input type="password" name="password" value="<?php echo $_POST['password']; ?>"></td>
	  </tr>
    <tr>
      <td colspan="2" class="text"><strong><font color="#d02e48">*Password must contain ONE NUMBER (i.e. - &quot;4&quot;) <u>AND</u> ONE CAPITALIZED LETTER&nbsp; (i.e. - &quot;W&quot;) character</font></strong> - <strong>Example:</strong> Password1 </td>
	    </tr>
    <tr>
      <td class="text"><div align="left">Email:</div></td>
		  <td><input type="text" name="email" value="<?php echo $_POST['email']; ?>"></td>
	  </tr>
  </table>
  
<p align="center"><img src="images/free_websites.png" alt="website builder, website" width="741" height="8" /></p>
  <h4 class="button"><font color="#333333" size="3">&quot;About Us&quot; Page:</font></h4>
  <table width="769">
    <tr>
      <td width="638">Would you like to add an "About Us" page?</td>
		  <td width="119"><input type="radio" name="use_about_us" value="1" onclick="change_visible(true, 'about_us')" <?php if ($_POST) if ($use_about_us) echo "checked"; ?>>
		    Yes 
		    <input type="radio" name="use_about_us" value="0" onclick="change_visible(false, 'about_us')" <?php if ($_POST) {if (!$use_about_us) echo "checked";} else echo "checked"; ?>>No</td>
	  </tr>
  </table>
  
<div style="display: <?php if ($_POST) if ($use_about_us) echo "block"; else echo "none"; else echo "none"; ?>; padding-left: 10px" id="about_us">
  <table>
    <tr>
      <td>About us text:</td>
		  <td><input type="text" name="about_us_text" value="<?php echo $_POST['about_us_text']; ?>"></td>
	  </tr>
    <tr>
      <td>Phone:</td>
		  <td><input type="text" name="about_us_phone" value="<?php echo $_POST['about_us_phone']; ?>"></td>
	  </tr>
    <tr>
      <td>Address:</td>
		  <td><input type="text" name="about_us_address" value="<?php echo $_POST['about_us_address']; ?>"></td>
	  </tr>
    <tr>
      <td>City:</td>
		  <td><input type="text" name="about_us_city" value="<?php echo $_POST['about_us_city']; ?>"></td>
	  </tr>
    <tr>
      <td>State:</td>
		  <td><input type="text" name="about_us_state" value="<?php echo $_POST['about_us_state']; ?>"></td>
	  </tr>
    <tr>
      <td>Zip:</td>
		  <td><input type="text" name="about_us_zip" value="<?php echo $_POST['about_us_zip']; ?>"></td>
	  </tr>
    <tr>
      <td>Hours of operation:</td>
		  <td><input type="text" name="about_us_hours" value="<?php echo $_POST['about_us_hours']; ?>"></td>
	  </tr>
  </table>
  </div>
  
<h4 align="center"><img src="images/free_websites.png" alt="free, websites" width="741" height="8" /></h4>
  <h4 class="style6"><font color="#333333" size="3">&quot;Testimonials&quot; Page:</font></h4>
  <table width="776">
    <tr>
      <td width="637">Would you like to add a &quot;Customer Testmonials&quot; page?</td>
		  <td width="127"><input type="radio" name="use_testmonials" value="1" onclick="change_visible(true, 'testmonials')" <?php if ($_POST) if ($use_testmonials) echo "checked"; ?>>
		    Yes 
		    <input type="radio" name="use_testmonials" value="0" onclick="change_visible(false, 'testmonials')" <?php if ($_POST) {if (!$use_testmonials) echo "checked";} else echo "checked"; ?>>No</td>
	  </tr>
  </table>
  <div style="display: <?php if ($_POST) if ($use_testmonials) echo "block"; else echo "none"; else echo "none"; ?>; padding-left: 10px" id="testmonials">
  <table>
    <tr>
      <td>Testimonial #1:</td>
		  <td><input type="text" name="Testmonial_1" value="<?php echo $_POST['Testmonial_1']; ?>"></td>
	  </tr>
    <tr>
      <td>Testimonial #2:</td>
		  <td><input type="text" name="Testmonial_2" value="<?php echo $_POST['Testmonial_2']; ?>"></td>
	  </tr>
    <tr>
      <td>Testimonial #3:</td>
		  <td><input type="text" name="Testmonial_3" value="<?php echo $_POST['Testmonial_3']; ?>"></td>
	  </tr>
    <tr>
      <td>Testimonial #4:</td>
		  <td><input type="text" name="Testmonial_4" value="<?php echo $_POST['Testmonial_4']; ?>"></td>
	  </tr>
    <tr>
      <td>Testimonial #5:</td>
		  <td><input type="text" name="Testmonial_5" value="<?php echo $_POST['Testmonial_5']; ?>"></td>
	  </tr>
    <tr>
      <td>Testimonial #6:</td>
		  <td><input type="text" name="Testmonial_6" value="<?php echo $_POST['Testmonial_6']; ?>"></td>
	  </tr>
  </table>
  <p align="center"><br>
  </p>
  </div>
  
  <p align="center"><img src="images/free_websites.png" alt="website builder, free, websites" width="741" height="8" /></p>
  <table>
    <tr>
      <td width="163" valign="middle" class="style6"><font color="#302F2D"><img src="images/logo_maker.png" alt="logo maker, website maker" width="27" height="27" />&nbsp;Company Logo:
        </font>
      <td width="10">
          <td width="226"><input type="file" name="logo"><td width="10">
          </tr>
    <tr>
      <td height="40" colspan="4" valign="middle" class="style6"><table width="431" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td colspan="3" valign="middle" class="style6"><div align="right" class="style10">DON'T HAVE A LOGO YET? </div></td>
          <td width="175" valign="middle"><div align="right"><a href="http://www.ezlogomaker.com/" target="_blank"><img src="http://www.ezsitemaker.com/websitemaker/images/logodesignmaker.png" alt="logo design maker, free logo maker" width="161" height="38" border="0" /></a> </div></td>
          <td width="20">&nbsp;</td>
        </tr>
      </table>                          </tr>
  </table>
  
  <h4 align="center"><img src="images/free_websites.png" alt="website builder, free websites" width="741" height="8" /></h4>
  <h4 class="style6"><font color="#333333" size="3">&quot;Gallery&quot; Page:</font></h4>
  <table>
    <tr>
      <td width="643">Would you like to use your free &quot;Gallery&quot;?</td>
		  <td width="120"><input type="radio" name="use_gallery" value="1" onclick="change_visible(true, 'gallery')" <?php if ($_POST) if ($use_gallery) echo "checked"; ?>>
		    Yes 
		    <input type="radio" name="use_gallery" value="0" onclick="change_visible(false, 'gallery')" <?php if ($_POST) {if (!$use_gallery) echo "checked";} else echo "checked"; ?>>No</td>
	  </tr>
  </table>
  <div style="display: <?php if ($_POST) if ($use_gallery) echo "block"; else echo "none"; else echo "none"; ?>; padding-left: 10px" id="gallery">
  <p class="style6">Website Gallery | Upload Your Photos </p>
  <table>
    <tr>
      <td><img src="images/website_photos.png" alt="website photos, free image gallery" width="24" height="26" /> #1:</td>
		  <td><input type="file" name="image_1"></td>
	  </tr>
    <tr>
      <td><img src="images/website_photos.png" alt="website photos, free image gallery" width="24" height="26" /> #2:</td>
		  <td><input type="file" name="image_2"></td>
	  </tr>
    <tr>
      <td><img src="images/website_photos.png" alt="website photos, free image gallery" width="24" height="26" /> #3:</td>
		  <td><input type="file" name="image_3"></td>
	  </tr>
    <tr>
      <td><img src="images/website_photos.png" alt="website photos, free image gallery" width="24" height="26" /> #4:</td>
		  <td><input type="file" name="image_4"></td>
	  </tr>
    <tr>
      <td><img src="images/website_photos.png" alt="website photos, free image gallery" width="24" height="26" /> #5:</td>
		  <td><input type="file" name="image_5"></td>
	  </tr>
    <tr>
      <td><img src="images/website_photos.png" alt="website photos, free image gallery" width="24" height="26" /> #6:</td>
		  <td><input type="file" name="image_6"></td>
	  </tr>
    <tr>
      <td><img src="images/website_photos.png" alt="website photos, free image gallery" width="24" height="26" /> #7:</td>
		  <td><input type="file" name="image_7"></td>
	  </tr>
    <tr>
      <td><img src="images/website_photos.png" alt="website photos, free image gallery" width="24" height="26" /> #8:</td>
		  <td><input type="file" name="image_8"></td>
	  </tr>
    <tr>
      <td><img src="images/website_photos.png" alt="website photos, free image gallery" width="24" height="26" /> #9:</td>
		  <td><input type="file" name="image_9"></td>
	  </tr>
    <tr>
      <td><img src="images/website_photos.png" alt="website photos, free image gallery" width="24" height="26" /> #10:</td>
		  <td><input type="file" name="image_10"></td>
	  </tr>
  </table>
  </div>
  
<h4 align="center"><img src="images/free_websites.png" alt="free websites, website maker" width="741" height="8" /></h4>
  <h4 class="style6"><font color="#333333" size="3">&quot;F.A.Q.&quot; Page:</font></h4>
  <table>
    <tr>
      <td width="648">Would you like to add a &quot;Frequently Asked Questions&quot; page?</td>
		  <td width="118"><input type="radio" name="use_faq" value="1" onclick="change_visible(true, 'faq')" <?php if ($_POST) if ($use_faq) echo "checked"; ?>>
		    Yes 
		    <input type="radio" name="use_faq" value="0" onclick="change_visible(false, 'faq')"  <?php if ($_POST) {if (!$use_faq) echo "checked";} else echo "checked";?>>No</td>
	  </tr>
  </table>
  
<div style="display: <?php if ($_POST) if ($use_faq) echo "block"; else echo "none"; else echo "none"; ?>; padding-left: 10px" id="faq">
  <!--
	<table id=i repeat="template">
		<tr>
			<td>Question:</td>
			<td><input name=question_[i]></td>
			<td rowspan="2"><button type="remove">Remove this Q/A</button></td>
		</tr>
		<tr>
			<td>Answer:</td>
			<td><input name=answer_[i]></td>
		</tr>
	</table>
	<button type="add" template=i>Add another question</button>
	-->
  <div id="faq_repeat">
    <table>
      <tr>
        <td>Question:</td>
			    <td><input type="text" name="question_"></td>
			    <td rowspan="2"><button id="remove_button_faq">Remove this Q/A</button></td>
			  </tr>
      <tr>
        <td>Answer:</td>
			    <td><input name="answer_"></td>
			  </tr>
      </table>
	  </div>
		  <button id="add_button_faq">Add another question</button>
		  
	<script>
		new Ramil_Webforms($('faq_repeat'), 
		 {
		  removeButton: "remove_button_faq", 
		  addButton: "add_button_faq"
		});
	</script>
  </div>
  

  
<h4 align="center"><img src="images/free_websites.png" alt="website builder, free websites" width="741" height="8" /></h4>
  <h4 class="style6"><font color="#333333" size="3">&quot;Contact Us&quot; Page:</font></h4>
  <table>
    <tr>
      <td width="652">Would you like to add a &quot;Contact Us&quot; page?</td>
		  <td width="110"><input type="radio" name="use_contact_us" value="1" onclick="change_visible(true, 'contact_us')" <?php if ($_POST) if ($use_contact_us) echo "checked"; ?>>
		    Yes 
		    <input type="radio" name="use_contact_us" value="0" onclick="change_visible(false, 'contact_us')" <?php if ($_POST) {if (!$use_contact_us) echo "checked";} else echo "checked"; ?>>No</td>
	  </tr>
  </table>
  <div style="display: <?php if ($_POST) if ($use_contact_us) echo "block"; else echo "none"; else echo "none"; ?>; padding-left: 10px" id="contact_us">
  <table>
    <tr>
      <td width="282">Contact Us Text (Message shown above form):</td>
		  <td width="163"><textarea name="contact_us_text"><?php echo $_POST['contact_us_text']; ?></textarea></td>
	  <tr>
	    <tr>
	      <td>Email address to receive messages:</td>
		  <td><input type="text" name="contact_us_email" value="<?php echo $_POST['contact_us_email']; ?>"></td>
	  <tr>
	    <tr>
	      <td>Add a field to collect user's first & last name?</td>
		  <td><input type="radio" name="contact_us_use_names" value="1" <?php if ($_POST) if ($contact_us_use_names) echo "checked"; ?>>
		    Yes 
		    <input type="radio" name="contact_us_use_names" value="0" <?php if ($_POST) if (!$contact_us_use_names) echo "checked"; ?>>No</td>
	  </tr>
    <tr>
      <td>Add a field to collect user's address?</td>
		  <td><input type="radio" name="contact_us_use_address" value="1" <?php if ($_POST) if ($contact_us_use_address) echo "checked"; ?>>
		    Yes 
		    <input type="radio" name="contact_us_use_address" value="0" <?php if ($_POST) if ($contact_us_use_address) echo "checked"; ?>>No</td>
	  </tr>
    <tr>
      <td>Add a field to collect user's phone #?</td>
		  <td><input type="radio" name="contact_us_use_phone" value="1">
		    Yes 
		    <input type="radio" name="contact_us_use_phone" value="0" checked>No</td>
	  </tr>
    <tr>
      <td>Add a field to collect user's email address?</td>
		  <td><input type="radio" name="contact_us_use_email" value="1">
		    Yes 
		    <input type="radio" name="contact_us_use_email" value="0" checked>No</td>
	  </tr>
    <tr>
      <td>Add "How did you learn  about us" field?</td>
		  <td><input type="radio" name="contact_us_use_how_learn" value="1">
		    Yes 
		    <input type="radio" name="contact_us_use_how_learn" value="0" checked>No</td>
	  </tr>
  </table>
  </div>
  
<h4 align="center"><img src="images/free_websites.png" alt="website builder, free websites" width="741" height="8" /></h4>
  <div style="display: none; padding-left: 10px" id="google_ads">
    <table>
    <tr>
      <td>Paste code here:</td>
		  <td><textarea name="google_code" rows="6" cols="20"></textarea></td>
	  </tr>
  </table>
  </div>
  <font color="#00CC66"><strong>PLEASE BE PATIENT</strong></font> AS YOUR IMAGES ARE UPLOADED. THIS MAY TAKE A MOMENT.<br /> 
  <br />
  <input type="image" src="images/makewebsite.png" border="0" name="submit" alt="free websites, website builder">
    </form></td>
  </tr>
  <tr>
    <td height="29" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="27" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
    <td width="780" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td height="91" colspan="3" valign="middle" background="http://www.ezsitemaker.com/images/sitemaker.jpg"><br />
        <br />
          <table width="857" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="833"><div align="center"><a href="http://www.ezsitemaker.com/" class="websitemakertext">Free Website Maker</a> &nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="http://www.ezsitemaker.com/" class="websitemakertext">Make Your Own Website</a> &nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="http://www.ezsitemaker.com/" class="websitemakertext">Small Business Websites</a> &nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;<a href="http://www.ezsitemaker.com/" class="websitemakertext">Free Websites</a> &nbsp;&nbsp;| &nbsp;&nbsp;<a href="http://www.ezsitemaker.com/" class="websitemakertext">Website Builder</a> &nbsp;&nbsp;&nbsp;| &nbsp;&nbsp;<a href="http://www.ezsitemaker.com/" class="websitemakertext">Website Maker</a> </div></td>
      </tr>
    </table></td>
  </tr>
</table>	


<div id="abc" style="display: none"></div>

</body>
</html>
<?php
}
?>