<?php


if ($_POST) {
	$isOk = false;
	$haveErrors = false;
	$errors = array ();
	$image_errors = false;
	$custom_page_errors = false;
	if ($_POST ['formname'] != 'login') {
		
		/*  Get post variab;es */
		
		$design_template = $_POST ['design'];
		
		if (! preg_match ( "/^[0-9]$/i", $design_template ))
			$design_template = 1;
		
		$company_name = prepare_insert ( $_POST ['company_name'] );
		
		$subdomain = strtolower ( $_POST ['subdomain'] );
		
		if ($subdomain == "") {
			$errors [] = "Directory name is empty.";
		} else {
			if (! is_good_subdomain_name ( $subdomain )) {
				$errors [] = "Directory " . $subdomain . " contains unallowed symbols. Please don't use the following symbols: / \ \" ? * : | <>.";
				$haveErrors = true;
			} else {
				//already exist this subdomain?
				if (! is_free_subdomain ( $subdomain )) {
					$errors [] = "Directory " . $subdomain . " already exists.";
					$haveErrors = true;
				}
			}
		}
		
		$password = prepare_insert ( $_POST ['password'] );
		if (! preg_match ( "/[A-Z]/", $password ) || ! preg_match ( "/[0-9]/i", $password )) {
			$errors [] = "Password must contain one capitalized letter and one number.";
		}
		
		//upload logo
		$logo = $_FILES ['logo'];
		
		$email = prepare_insert ( $_POST ['email'] );
		
		$use_about_us = prepare_insert ( $_POST ['use_about_us'] );
		
		$about_us_text = prepare_insert ( $_POST ['about_us_text'] );
		
		$about_us_phone = prepare_insert ( $_POST ['about_us_phone'] );
		
		$about_us_address = prepare_insert ( $_POST ['about_us_address'] );
		
		$about_us_city = prepare_insert ( $_POST ['about_us_city'] );
		
		$about_us_state = prepare_insert ( $_POST ['about_us_state'] );
		
		$about_us_zip = prepare_insert ( $_POST ['about_us_zip'] );
		
		$about_us_hours = prepare_insert ( $_POST ['about_us_hours'] );
		
		$use_testmonials = prepare_insert ( $_POST ['use_testmonials'] );
		
		$testmonial_1 = prepare_insert ( $_POST ['Testmonial_1'] );
		
		$testmonial_2 = prepare_insert ( $_POST ['Testmonial_2'] );
		
		$testmonial_3 = prepare_insert ( $_POST ['Testmonial_3'] );
		
		$testmonial_4 = prepare_insert ( $_POST ['Testmonial_4'] );
		
		$testmonial_5 = prepare_insert ( $_POST ['Testmonial_5'] );
		
		$testmonial_6 = prepare_insert ( $_POST ['Testmonial_6'] );
		
		$use_gallery = prepare_insert ( $_POST ['use_gallery'] );
		
		$facebook_link = prepare_insert ( $_POST ['facebook_link'] );
		$twitter_link = prepare_insert ( $_POST ['twitter_link'] );
		$linkedin_link = prepare_insert ( $_POST ['linkedin_link'] );
		
		$use_faq = prepare_insert ( $_POST ['use_faq'] );
/*		
		foreach ( $_POST as $key => $value ) {
			if (strpos ( $key, "question_" ) !== false) {
				$number = substr ( $key, strlen ( "question_" ) );
				$faq [$number] ['question'] = prepare_insert ( $value );
			}
			if (strpos ( $key, "answer_" ) !== false) {
				$number = substr ( $key, strlen ( "answer_" ) );
				$faq [$number] ['answer'] = prepare_insert ( $value );
			}
		}
*/


		foreach ( $_POST ['question'] as $k => $q ) {
			if (isset($k) && isset($q) && isset($_POST['answer'][$k])) {
				$faq [$k] =array('question' => prepare_insert($q),'answer'=>prepare_insert($_POST['answer'][$k]));
			}
					
		}
		
		$use_contact_us = prepare_insert ( $_POST ['use_contact_us'] );
		
		$contact_us_text = prepare_insert ( $_POST ['contact_us_text'] );
		
		$contact_us_email = prepare_insert ( $_POST ['contact_us_email'] );
		
		$contact_us_use_names = prepare_insert ( $_POST ['contact_us_use_names'] );
		
		$contact_us_use_address = prepare_insert ( $_POST ['contact_us_use_address'] );
		
		$contact_us_use_phone = prepare_insert ( $_POST ['contact_us_use_phone'] );
		
		$contact_us_use_email = prepare_insert ( $_POST ['contact_us_use_email'] );
		
		$contact_us_use_how_learn = prepare_insert ( $_POST ['contact_us_use_how_learn'] );
		
		$use_service = (isset ( $_POST ['use_service'] ) ? prepare_insert ( $_POST ['use_service'] ) : '');
		
		$use_custom_page = (isset ( $_POST ['use_custom_page'] ) ? prepare_insert ( $_POST ['use_custom_page'] ) : '');
		
		foreach ( $_POST as $key => $value ) {
			if (strpos ( $key, "page_title_" ) !== false) {
				$number = substr ( $key, strlen ( "page_title_" ) );
				$custom_pages [$number] ['title'] = prepare_insert ( $value );
			}
			if (strpos ( $key, "page_text_" ) !== false) {
				$number = substr ( $key, strlen ( "page_text_" ) );
				$custom_pages [$number] ['text'] = prepare_insert ( $value );
			}
		}
		
		$use_google_ads = (isset ( $_POST ['use_google_ads'] ) ? prepare_insert ( $_POST ['use_google_ads'] ) : '');
		
		$google_code = (isset ( $_POST ['google_code'] ) ? prepare_insert ( $_POST ['google_code'] ) : '');
		
		/* Show errors */
		if (is_array ( $errors ))
			foreach ( $errors as $value )
				showError ( $value );
			
		/* If we haven't any errors */
		$isSubdomainCreated = false;
		//Create subdomain folder and all subfolder
		if (count ( $errors ) == 0) {
//print("<h1>".SUBDOMAINS_FOLDER . $subdomain."</h1>\n");
//			$mk = make_directories ( array (SUBDOMAINS_FOLDER . $subdomain, SUBDOMAINS_FOLDER . $subdomain . "/gallery", SUBDOMAINS_FOLDER . $subdomain . "/images" ) );
			$mk=true;
			foreach (array(SUBDOMAINS_FOLDER . $subdomain, SUBDOMAINS_FOLDER . $subdomain . "/gallery", SUBDOMAINS_FOLDER . $subdomain . "/images" ) as $i) {
			      if (mkdir($i,0755)) {
			      } else {
				  $mk=false;
			      }
			}

			if ($mk)
				$isSubdomainCreated = true;
			else {
				showError ( "Can't create directories" );
				$haveErrors = true;
				$isSubdomainCreated = false;
			}
		}
		//check subdomain
		if ($isSubdomainCreated == false && count ( $errors ) == 0) {
			showError ( "Couldn't create folders. <a href=\"javascript: history.back()\">Please try again</a>" );
			exit ();
		}
		//copy images into folders
		if ($isSubdomainCreated == true && count ( $errors ) == 0) {
			if ($logo ['size'] == 0)
				$logo = "";
			else {
				if ($logo ['size'] > $max_size) {
					$image_errors [] = "Size of Logo is large. Max size is " . ($max_size / 2024) . "Kb";
					$logo = "";
					$haveErrors = true;
				} else if (! is_good_extension ( $logo ['name'] )) {
					$image_errors [] = "Extension of Logo is not image extension. Please try again with an image file.";
					$logo = "";
					$haveErrors = true;
				} else {
					$uploaddir = SUBDOMAINS_FOLDER . $subdomain . "/images/";
					$uploadfile = $uploaddir . basename ( $logo ['name'] );
					
					if (! move_uploaded_file ( $logo ['tmp_name'], $uploadfile )) {
						$image_errors [] = "File " . $logo ['name'] . " has not been uploaded.";
						$logo = "";
						$haveErrors = true;
					} else
						$logo = basename($logo ['name']);
				}
			}
			
			if ($use_gallery) {
				$image_1 = $_FILES ['image_1'];
				if ($image_1 ['size'] == 0)
					$image_1 = "";
				else {
					if ($image_1 ['size'] > $max_size) {
						$image_errors [] = "Size of Image1 is large. Max size is " . ($max_size / 3024) . "Kb";
						$image_1 = "";
					} else if (! is_good_extension ( $image_1 ['name'] )) {
						$image_errors [] = "Extension of Image1 is not image extension. Upload only images.";
						$image_1 = "";
					} else {
						$uploaddir = SUBDOMAINS_FOLDER . $subdomain . "/gallery/";
						$uploadfile = $uploaddir . basename ( $image_1 ['name'] );
						
						if (! move_uploaded_file ( $image_1 ['tmp_name'], $uploadfile )) {
							$image_errors [] = "File " . $image_1 ['name'] . " has not been uploaded.";
							$image_1 = "";
						} else
							$image_1 = basename ( $image_1 ['name'] );
					
					}
				}
				
				$image_2 = $_FILES ['image_2'];
				//checking image_2
				if ($image_2 ['size'] == 0)
					$image_2 = "";
				else {
					if ($image_2 ['size'] > $max_size) {
						$image_errors [] = "Size of Image2 is large. Max size is " . ($max_size / 3024) . "Kb";
						$image_2 = "";
					} else if (! is_good_extension ( $image_2 ['name'] )) {
						$image_errors [] = "Extension of Image2 is not image extension. Upload only images.";
						$image_2 = "";
					} else {
						
						$uploaddir = SUBDOMAINS_FOLDER . $subdomain . "/gallery/";
						$uploadfile = $uploaddir . basename ( $image_2 ['name'] );
						
						if (! move_uploaded_file ( $image_2 ['tmp_name'], $uploadfile )) {
							$image_errors [] = "File " . $image_2 ['name'] . " has not been uploaded.";
							$image_2 = "";
						} else
							$image_2 = basename ( $image_2 ['name'] );
					}
				}
				
				$image_3 = $_FILES ['image_3'];
				//checking image_3
				if ($image_3 ['size'] == 0)
					$image_3 = "";
				else {
					if ($image_3 ['size'] > $max_size) {
						$image_errors [] = "Size of Image3 is large. Max size is " . ($max_size / 3024) . "Kb";
						$image_3 = "";
					} else if (! is_good_extension ( $image_3 ['name'] )) {
						$image_errors [] = "Extension of Image3 is not image extension. Upload only images.";
						$image_3 = "";
					} else {
						
						$uploaddir = SUBDOMAINS_FOLDER . $subdomain . "/gallery/";
						$uploadfile = $uploaddir . basename ( $image_3 ['name'] );
						
						if (! move_uploaded_file ( $image_3 ['tmp_name'], $uploadfile )) {
							$image_errors [] = "File " . $image_3 ['name'] . " has not been uploaded.";
							$image_3 = "";
						} else
							$image_3 = basename ( $image_3 ['name'] );
					}
				}
				
				$image_4 = $_FILES ['image_4'];
				//checking image_4
				if ($image_4 ['size'] == 0)
					$image_4 = "";
				else {
					if ($image_4 ['size'] > $max_size) {
						$image_errors [] = "Size of Image4 is large. Max size is " . ($max_size / 3024) . "Kb";
						$image_4 = "";
					} else if (! is_good_extension ( $image_4 ['name'] )) {
						$image_errors [] = "Extension of Image4 is not image extension. Upload only images.";
						$image_4 = "";
					} else {
						$uploaddir = SUBDOMAINS_FOLDER . $subdomain . "/gallery/";
						$uploadfile = $uploaddir . basename ( $image_4 ['name'] );
						
						if (! move_uploaded_file ( $image_4 ['tmp_name'], $uploadfile )) {
							$image_errors [] = "File " . $image_4 ['name'] . " has not been uploaded.";
							$image_4 = "";
						} else
							$image_4 = basename ( $image_4 ['name'] );
					}
				}
				
				$image_5 = $_FILES ['image_5'];
				//checking image_5
				if ($image_5 ['size'] == 0)
					$image_5 = "";
				else {
					if ($image_5 ['size'] > $max_size) {
						$image_errors [] = "Size of Image5 is large. Max size is " . ($max_size / 3024) . "Kb";
						$image_5 = "";
					} else if (! is_good_extension ( $image_5 ['name'] )) {
						$image_errors [] = "Extension of Image5 is not image extension. Upload only images.";
						$image_5 = "";
					} else {
						$uploaddir = SUBDOMAINS_FOLDER . $subdomain . "/gallery/";
						$uploadfile = $uploaddir . basename ( $image_5 ['name'] );
						
						if (! move_uploaded_file ( $image_5 ['tmp_name'], $uploadfile )) {
							$image_errors [] = "File " . $image_5 ['name'] . " has not been uploaded.";
							$image_5 = "";
						} else
							$image_5 = basename ( $image_5 ['name'] );
					}
				}
				
				$image_6 = $_FILES ['image_6'];
				//checking image_6
				if ($image_6 ['size'] == 0)
					$image_6 = "";
				else {
					if ($image_6 ['size'] > $max_size) {
						$image_errors [] = "Size of Image6 is large. Max size is " . ($max_size / 3024) . "Kb";
						$image_6 = "";
					} else if (! is_good_extension ( $image_6 ['name'] )) {
						$image_errors [] = "Extension of Image6 is not image extension. Upload only images.";
						$image_6 = "";
					} else {
						$uploaddir = SUBDOMAINS_FOLDER . $subdomain . "/gallery/";
						$uploadfile = $uploaddir . basename ( $image_6 ['name'] );
						
						if (! move_uploaded_file ( $image_6 ['tmp_name'], $uploadfile )) {
							$image_errors [] = "File " . $image_6 ['name'] . " has not been uploaded.";
							$image_6 = "";
						} else
							$image_6 = basename ( $image_6 ['name'] );
					}
				}
				
				$image_7 = $_FILES ['image_7'];
				//checking image_7
				if ($image_7 ['size'] == 0)
					$image_7 = "";
				else {
					if ($image_7 ['size'] > $max_size) {
						$image_errors [] = "Size of Image7 is large. Max size is " . ($max_size / 3024) . "Kb";
						$image_7 = "";
					} else if (! is_good_extension ( $image_7 ['name'] )) {
						$image_errors [] = "Extension of Image7 is not image extension. Upload only images.";
						$image_7 = "";
					} else {
						$uploaddir = SUBDOMAINS_FOLDER . $subdomain . "/gallery/";
						$uploadfile = $uploaddir . basename ( $image_7 ['name'] );
						
						if (! move_uploaded_file ( $image_7 ['tmp_name'], $uploadfile )) {
							$image_errors [] = "File " . $image_7 ['name'] . " has not been uploaded.";
							$image_7 = "";
						} else
							$image_7 = basename ( $image_7 ['name'] );
					}
				}
				
				$image_8 = $_FILES ['image_8'];
				//checking image_8
				if ($image_8 ['size'] == 0)
					$image_8 = "";
				else {
					if ($image_8 ['size'] > $max_size) {
						$image_errors [] = "Size of Image8 is large. Max size is " . ($max_size / 3024) . "Kb";
						$image_8 = "";
					} else if (! is_good_extension ( $image_8 ['name'] )) {
						$image_errors [] = "Extension of Image8 is not image extension. Upload only images.";
						$image_8 = "";
					} else {
						$uploaddir = SUBDOMAINS_FOLDER . $subdomain . "/gallery/";
						$uploadfile = $uploaddir . basename ( $image_8 ['name'] );
						
						if (! move_uploaded_file ( $image_8 ['tmp_name'], $uploadfile )) {
							$image_errors [] = "File " . $image_8 ['name'] . " has not been uploaded.";
							$image_8 = "";
						} else
							$image_8 = basename ( $image_8 ['name'] );
					}
				}
				
				$image_9 = $_FILES ['image_9'];
				//checking image_9
				if ($image_9 ['size'] == 0)
					$image_9 = "";
				else {
					if ($image_9 ['size'] > $max_size) {
						$image_errors [] = "Size of Image9 is large. Max size is " . ($max_size / 3024) . "Kb";
						$image_9 = "";
					} else if (! is_good_extension ( $image_9 ['name'] )) {
						$image_errors [] = "Extension of Image9 is not image extension. Upload only images.";
						$image_9 = "";
					} else {
						$uploaddir = SUBDOMAINS_FOLDER . $subdomain . "/gallery/";
						$uploadfile = $uploaddir . basename ( $image_9 ['name'] );
						
						if (! move_uploaded_file ( $image_9 ['tmp_name'], $uploadfile )) {
							$image_errors [] = "File " . $image_9 ['name'] . " was not been uploaded.";
							$image_9 = "";
						} else
							$image_9 = basename ( $image_9 ['name'] );
					}
				}
				
				$image_10 = $_FILES ['image_10'];
				//checking image_10
				if ($image_10 ['size'] == 0)
					$image_10 = "";
				else {
					if ($image_10 ['size'] > $max_size) {
						$image_errors [] = "Size of Image10 is large. Max size is " . ($max_size / 3024) . "Kb";
						$image_10 = "";
					} else if (! is_good_extension ( $image_10 ['name'] )) {
						$image_errors [] = "Extension of Image10 is not image extension. Upload only images.";
						$image_10 = "";
					} else {
						$uploaddir = SUBDOMAINS_FOLDER . $subdomain . "/gallery/";
						$uploadfile = $uploaddir . basename ( $image_10 ['name'] );
						
						if (! move_uploaded_file ( $image_10 ['tmp_name'], $uploadfile )) {
							$image_errors [] = "File " . $image_10 ['name'] . " was not been uploaded.";
							$image_10 = "";
						} else
							$image_10 = basename ( $image_10 ['name'] );
					}
				}
			}
			
			foreach ( $_FILES as $key => $value ) {
				if (strpos ( $key, "image_custom_page_" ) !== false) {
					$number = substr ( $key, strlen ( "image_custom_page_" ) );
					
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
					
					if ($value ['size'] == 0)
						$custom_pages [$number] ['image'] = "";
					else {
						if ($value ['size'] > $max_size) {
							$custom_page_errors [] = "Size of image is large. Max size is " . ($max_size / 3024) . "Kb";
							$custom_pages [$number] ['image'] = "";
						} else if (! is_good_extension ( $value ['name'] )) {
							$custom_page_errors [] = "Extension of image is not image extension. Upload only images.";
							$custom_pages [$number] ['image'] = "";
						} else {
							$uploaddir = SUBDOMAINS_FOLDER . $subdomain . "/images/";
							$uploadfile = $uploaddir . basename ( $value ['name'] );
							
							if (! move_uploaded_file ( $value ['tmp_name'], $uploadfile )) {
								$custom_page_errors [] = "File " . $value ['name'] . " was not been uploaded.";
								$custom_pages [$number] ['image'] = "";
							} else
								$custom_pages [$number] ['image'] = basename($value ['name']);
						}
					}
				}
			}
		}
		
		if (is_array ( $image_errors ))
			foreach ( $image_errors as $value )
				showError ( $value );
		if (is_array ( $custom_page_errors ))
			foreach ( $custom_page_errors as $value )
				showError ( $value );
		
		if (count ( $errors ) == 0) {
			//ID of site
			global $siteID;
			$siteID = md5 ( microtime () );
			
			$query [0] ['fields'] = "id";
			$query [0] ['date'] = $siteID;
			
			//design
			$query [1] ['fields'] = "design";
			$query [1] ['date'] = $design_template + 1;
			//name
			$query [2] ['fields'] = "name";
			$query [2] ['date'] = $company_name;
			//subdomain
			$query [3] ['fields'] = "subdomain";
			$query [3] ['date'] = $subdomain;
			//password
			$query [4] ['fields'] = "password";
			$query [4] ['date'] = md5 ( $password );
			//email
			$query [5] ['fields'] = "email";
			$query [5] ['date'] = $email;
			//use about us page
			$query [6] ['fields'] = "use_about_us";
			$query [6] ['date'] = $use_about_us;
			if ($use_about_us) {
				//about_us_text
				$query [50] ['fields'] = "about_us_text";
				$query [50] ['date'] = $about_us_text;
				//about_us_phone
				$query [51] ['fields'] = "about_us_phone";
				$query [51] ['date'] = $about_us_phone;
				//about_us_address
				$query [52] ['fields'] = "about_us_address";
				$query [52] ['date'] = $about_us_address;
				//about_us_city
				$query [53] ['fields'] = "about_us_city";
				$query [53] ['date'] = $about_us_city;
				//about_us_state
				$query [54] ['fields'] = "about_us_state";
				$query [54] ['date'] = $about_us_state;
				//about_us_zip
				$query [55] ['fields'] = "about_us_zip";
				$query [55] ['date'] = $about_us_zip;
				//about_us_hours
				$query [56] ['fields'] = "about_us_hours";
				$query [56] ['date'] = $about_us_hours;
			}
			//testmonials
			$query [7] ['fields'] = "use_testimonials";
			$query [7] ['date'] = $use_testmonials;
			if ($use_testmonials) {
				//testmonial_1
				$query [60] ['fields'] = "testimonail_1";
				$query [60] ['date'] = $testmonial_1;
				//testmonial_2
				$query [61] ['fields'] = "testimonail_2";
				$query [61] ['date'] = $testmonial_2;
				//testmonial_3
				$query [62] ['fields'] = "testimonail_3";
				$query [62] ['date'] = $testmonial_3;
				//testmonial_4
				$query [63] ['fields'] = "testimonail_4";
				$query [63] ['date'] = $testmonial_4;
				//testmonial_5
				$query [64] ['fields'] = "testimonail_5";
				$query [64] ['date'] = $testmonial_5;
				//testmonial_6
				$query [65] ['fields'] = "testimonail_6";
				$query [65] ['date'] = $testmonial_6;
			}
			//gallery
			$query [8] ['fields'] = "use_gallery";
			$query [8] ['date'] = $use_gallery;
			if ($use_gallery) {
				//image 1
				$query [70] ['fields'] = "gallery_1";
				$query [70] ['date'] = $image_1;
				//image 2
				$query [71] ['fields'] = "gallery_2";
				$query [71] ['date'] = $image_2;
				//image 3
				$query [72] ['fields'] = "gallery_3";
				$query [72] ['date'] = $image_3;
				//image 4
				$query [73] ['fields'] = "gallery_4";
				$query [73] ['date'] = $image_4;
				//image 5
				$query [74] ['fields'] = "gallery_5";
				$query [74] ['date'] = $image_5;
				//image6
				$query [75] ['fields'] = "gallery_6";
				$query [75] ['date'] = $image_6;
				//image 7
				$query [76] ['fields'] = "gallery_7";
				$query [76] ['date'] = $image_7;
				//image 8
				$query [78] ['fields'] = "gallery_8";
				$query [78] ['date'] = $image_8;
				//image 9
				$query [79] ['fields'] = "gallery_9";
				$query [79] ['date'] = $image_9;
				//image 10
				$query [80] ['fields'] = "gallery_10";
				$query [80] ['date'] = $image_10;
			}
			
			//faq
			$query [9] ['fields'] = "use_faq";
			$query [9] ['date'] = $use_faq;
			if ($use_faq) {
				$query_faq = "INSERT INTO faq VALUES";
				
				for($i = 0; $i < count ( $faq ); $i ++) {
					if ($i != 0)
						$query_faq .= ",";
					$query_faq .= " (NULL, '" . $faq [$i] ['question'] . "', '" . $faq [$i] ['answer'] . "', '" . $siteID . "')";
				}
				
				$result = mysql_query ( $query_faq );
				if (! $result) {
					$errors [] = "MySQL Error: " . mysql_error ();
					$haveErrors = true;
				}
			}
			
			//contact us
			$query [10] ['fields'] = "use_conact_us";
			$query [10] ['date'] = $use_contact_us;
			if ($use_contact_us) {
				//contact_us_text
				$query [90] ['fields'] = "contact_us_text";
				$query [90] ['date'] = $contact_us_text;
				//contact_us_email
				$query [91] ['fields'] = "contact_us_email";
				$query [91] ['date'] = $contact_us_email;
				//contact_us_use_names
				$query [92] ['fields'] = "contact_us_use_names";
				$query [92] ['date'] = $contact_us_use_names;
				//contact_us_use_address
				$query [93] ['fields'] = "contact_us_use_address";
				$query [93] ['date'] = $contact_us_use_address;
				//contact_us_use_phone
				$query [94] ['fields'] = "contact_us_use_phone";
				$query [94] ['date'] = $contact_us_use_phone;
				//contact_us_use_email
				$query [95] ['fields'] = "contact_us_use_email";
				$query [95] ['date'] = $contact_us_use_email;
				//contact_us_use_how_learn
				$query [96] ['fields'] = "contact_us_use_how_learn";
				$query [96] ['date'] = $contact_us_use_how_learn;
			}
			
			//service
			$query [11] ['fields'] = "use_service";
			$query [11] ['date'] = $use_service;
			if ($use_service) {
				$query [97] ['fields'] = "use_custom_page";
				$query [97] ['date'] = $use_custom_page;
				//custom pages
				if ($use_custom_page) {
					$query_custom_page = "INSERT INTO custom_page VALUES";
					
					for($i = 0; $i < count ( $custom_pages ); $i ++) {
						if ($i != 0)
							$query_custom_page .= ",";
						$query_custom_page .= " (NULL, '" . $siteID . "', '" . $custom_pages [$i] ['title'] . "', '" . $custom_pages [$i] ['text'] . "', '" . $custom_pages [$i] ['image'] . "')";
					}
					
					$result = mysql_query ( $query_custom_page );
					if (! $result) {
						$errors [] = "MySQL Error (INSER INTO custom_page): " . mysql_error ();
						$haveErrors = true;
					}
				}
			}
			
			//logo

			if ($logo != "") {
				$query [12] ['fields'] = "logo";
				$query [12] ['date'] = $logo;
			}
			
			//Google ads code
			$query [13] ['fields'] = "use_google_code";
			$query [13] ['date'] = $use_google_ads;
			if ($use_google_ads) {
				$query [14] ['fields'] = "google_code";
				$query [14] ['date'] = $google_code;
			}
			
			//facebook link code
			$query [15] ['fields'] = "facebook_link";
			$query [15] ['date'] = $facebook_link;
			
			//twitter link code
			$query [16] ['fields'] = "twitter_link";
			$query [16] ['date'] = $twitter_link;
			
			//linkedin link code
			$query [17] ['fields'] = "linkedin_link";
			$query [17] ['date'] = $linkedin_link;
			
			/*  Insert into table*/
			$str = "INSERT INTO sites (";
			$i = 0;
			
			foreach ( $query as $key1 => $value1 )
				foreach ( $value1 as $key2 => $value2 ) {
					if ($key2 == "fields") {
						if ($i != 0)
							$str .= ", ";
						
						$str .= $value2;
						$i ++;
					}
				}
			
			$str .= ") VALUES (";
			
			$i = 0;
			foreach ( $query as $key1 => $value1 )
				foreach ( $value1 as $key2 => $value2 ) {
					if ($key2 != "fields") {
						if ($i != 0)
							$str .= ", ";
						
						$str .= "'" . $value2 . "'";
						$i ++;
					}
				}
			
			$str .= ")";
			

			$result = mysql_query ( $str );
			if (! $result) {
				$errors [] = "MySQL Error: " . mysql_error ();
				$haveErrors = true;
			}
			
			//show errors
			foreach ( $errors as $key => $value )
				echo "<font size=\"3\" color=\"red\">" . $value . "</font><br />";
			
			if (! $haveErrors) {
				
				$site_id = mysql_insert_id ();
				
				$reg_confirmation_id = md5 ( time () );
				$sql_ins = "update sites set created_on=now(),is_active=0,confirm_reg_id = '" . $reg_confirmation_id . "' where id = '".$siteID."' ";
				mysql_query ( $sql_ins );
				
				$confirmation_link = $site_link . 'process.php?type=creg&id=' . $reg_confirmation_id;
				
				$from = SUPPORT_EMAIL;
				$to = $email;
				$subject = 'New Website Created - Confirm Email';
				$message = '<h3>Dear ' . $_POST ['company_name'] . ' </h3><br />';
				$message .= '<p>Thank you for creating your new website!';
				$message .= '<br /><p>Click below to activate your website and go to your website manager.</p>';
				$message .= '<br /><p><a href="' . $confirmation_link . '">Click here to confirm your account</a></p>';
				
				$message .= '<br /><p> 
										Your Account Details <br />
										<div> username : ' . $email . ' </div>
										<div> password : ' . $password . ' </div>;
										 
									</p>';
				$message .= '<br /><br /><br />';
				send_email ( $from, $to, $subject, $message );
				
				echo "<center><br />
						Congratulations! Your account has been successfully created , please check your email for confirmation link. <br />
						";
				$isCompleate = true;
			}
		}
		//}
	}
}

?>