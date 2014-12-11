<?php
session_start ();
error_reporting ( E_ALL & ~ E_NOTICE );
include ("config.php");


if ($_GET ['type'] != 'login' && $_GET ['type'] != 'sd_avail' && $_GET ['type'] != 'forgot_pwd' && $_GET ['type'] != 'creg') {
	if (! isset ( $_SESSION ['id'] )) {
		echo "Error. Go to login.php page and enter your email and password.";
		exit ();
	}
}

$type = (isset ( $_GET ['type'] ) ? $_GET ['type'] : '');
$response = '';
switch ($type) {
	case 'sd_avail' :
		$response = check_subdomain_avail ();
		break;
	case 'upd_design' :
		$response = update_site_template ();
		break;
	
	case 'upd_pwd' :
		$response = update_pwd ();
		break;
	case 'forgot_pwd' :
		$response = forgor_pwd ();
		break;
	case 'creg' :
		$response = confirm_account ();
		break;
	
	case 'edit_site' :
		$response = update_site_data ();
		break;
	case 'upload_logo' :
		$response = upload_site_data ( 'logo' );
		break;
	case 'upload_gallery' :
		$response = upload_site_data ( 'gallery' );
		break;
	case 'update_faq' :
		$response = update_faq ();
		break;
	case 'delete_site' :
		delete_site_data ();
		break;
	case 'logout' :
		logout_sitemaker ();
		break;
	case 'login' :
		login_sitemaker ();
		break;
	case 'rm_branding' :
		remove_branding ();
		break;
}

if (isset ( $_GET ['ajax'] )) {
	echo $response;
} else {
	return $response;
}

function tscandir($dir, $listDirectories = false, $skipDots = true) {
	$dirArray = array ();
	if ($handle = opendir ( $dir )) {
		while ( false !== ($file = readdir ( $handle )) ) {
			if (($file != "." && $file != "..") || $skipDots == true) {
				if ($listDirectories == false) {
					if (is_dir ( $file )) {
						continue;
					}
				}
				array_push ( $dirArray, basename ( $file ) );
			}
		}
		closedir ( $handle );
	}
	return $dirArray;
}

function remove_branding_org() {
	$site_id = $_SESSION ['id'];
	
	$sql = "select * from sites where id = '" . $site_id . "' and is_active = 1 ";
	$res_site = mysql_query ( $sql );
	
	if (! mysql_num_rows ( $res_site )) {
		echo "Invalid Site in access";
		exit ();
	}
	
	$row_site = mysql_fetch_array ( $res_site );
	
	$faq = array ();
	$faq_query = mysql_query ( "SELECT * FROM faq WHERE site_id='" . $site_id . "'" );
	if ($faq_query) {
		while ( $faq_result = mysql_fetch_array ( $faq_query ) ) {
			$faq [] = array ($faq_result ['q'], $faq_result ['a'] );
		}
	}
	
	$meny = array ();
	$query_custom_pages = mysql_query ( "SELECT * FROM custom_page WHERE site_id='" . $site_id . "'" );
	if ($query_custom_pages) {
		while ( $result_custom_pages = mysql_fetch_array ( $query_custom_pages ) ) {
			$meny [] = array ($result_custom_pages ['title'], $result_custom_pages ['title'] ); ///"<a href='".$result_custom_pages['title'].".html'>".$result_custom_pages['title']." us</a>";
		}
	}
	
	//print_r ( $row );
	$subdomain = $row_site ['subdomain'];
	$design = $row_site ['design'];
	 
	

	exec("rm -rf ../demo/$subdomain");

	rec_copy ( '../mk_package/', '../demo/' . $subdomain . '/' );
	
	
	exec("mkdir ../demo/$subdomain/template");
	exec("chmod 0755 ../demo/$subdomain/template");

	exec("mkdir ../demo/$subdomain/resources");
	exec("chmod 0755 ../demo/$subdomain/resources");


	rec_copy ( '../templates/template_' . $design, '../demo/' . $subdomain . '/template' );
 


	rec_copy ( SUBDOMAINS_FOLDER . $subdomain, '../demo/' . $subdomain . '/resources' );
	 
	 
	
	
	exec("touch ../demo/$subdomain/site_data.php");
	exec("chmod 0755 ../demo/$subdomain/site_data.php");

	exec("chmod -R 0755 ../demo/$subdomain/");

	 

	
	$fp = fopen ( '../demo/' . $subdomain . '/site_data.php', 'w' );
	fwrite ( $fp, '<?php 
					 	$site_data=\'' . my_json_encode ( $row_site ) . '\';
						$site_faq_list=\'' . my_json_encode ( $faq ) . '\';
						$site_custom_pages=\'' . my_json_encode ( $meny ) . '\';
				 ' );
	fclose ( $fp );
	 
	
	header ( "location: ../demo/" . $subdomain . '/index.php?page=index.html' );
}




function remove_branding() {
	$site_id = $_SESSION ['id'];
	
	$sql = "select * from sites where id = '" . $site_id . "' and is_active = 1 ";
	$res_site = mysql_query ( $sql );
	
	if (! mysql_num_rows ( $res_site )) {
		echo "Invalid Site in access";
		exit ();
	}
	
	$row_site = mysql_fetch_array ( $res_site );

	if($row_site['design']>0) {
	    mysql_query ( "UPDATE sites set design=".(-$row_site['design'])." WHERE id = '".$site_id."'" );
	  
	}
	
	header ( "location: ../user/" . $row_site['subdomain'] . '/index.html' );
}











function rec_copy($s,$d){
	//exec("rm -rf $d");
	exec("cp -rp $s $d");
}


function COPY_RECURSIVE_DIRS($dirsource, $dirdest)
{ // recursive function to copy
// all subdirectories and contents:
if(is_dir($dirsource))$dir_handle=opendir($dirsource);
mkdir($dirdest."/".$dirsource, 0750);
while($file=readdir($dir_handle))
{
if($file!="." && $file!="..")
{
if(!is_dir($dirsource."/".$file)) copy ($dirsource."/".$file, $dirdest."/".$dirsource."/".$file);
else COPY_RECURSIVE_DIRS($dirsource."/".$file, $dirdest);
}
}
closedir($dir_handle);
return true;
}


// removes files and non-empty directories
function rrmdir($dir) {
	
	if (is_dir ( $dir )) {
		$files = tscandir ( $dir );
		foreach ( $files as $file ) {
			if ($file != "." && $file != "..")
				rrmdir ( "$dir/$file" );
			else
				rmdir ( $dir );
		}
		
	} else if (file_exists ( $dir ))
		unlink ( $dir );
}

// copies files and non-empty directories
function rcopy($src, $dst) {
	if (file_exists ( $dst ))
		rrmdir ( $dst );
	if (is_dir ( $src )) {
		//chmod ( $src, 0755 );

		if (is_dir ( $dst )) {
			rrmdir ( $dst );
		}
		$files = tscandir ( $src );
		foreach ( $files as $file )
			if ($file != "." && $file != "..")
				rcopy ( "$src/$file", "$dst/$file" );
	} else if (file_exists ( $src ))
		copy ( $src, $dst );
}

function my_json_encode($row) {
	$json = "{";
	$keys = array_keys ( $row );
	$i = 1;
	foreach ( $keys as $key ) {
		if ($i > 1)
			$json .= ',';
		$json .= '"' . addslashes ( $key ) . '":"' . addslashes ( $row [$key] ) . '"';
		$i ++;
	}
	$json .= "}";
	return $json;
}

function logout_sitemaker() {
	if ($_SESSION ['id']) {
		session_unset ();
		session_destroy ();
	}
	header ( "Location: index.php" );
}

function update_site_template() {
	$user_id = $_SESSION ['id'];
	
	$template_id = $_POST ['template_id']+1;
	$output = array ();
	
	$sql = "update sites set design = $template_id where id = '$user_id' and (design>0 or design=0)";
	mysql_query ( $sql );
	
	if (mysql_affected_rows () >= 0) {
		$output ['status'] = 'success';
		$output ['message'] = 'Successfully updated your site design';
	} else {
	    $sql = "update sites set design = -$template_id where id = '$user_id' and design<0";
	    mysql_query ( $sql );


	    if (mysql_affected_rows() >= 0) {
		$output ['status'] = 'success';
		$output ['message'] = 'Successfully updated your site design';

	    } else {
		$output ['status'] = 'error';
		$output ['message'] = 'Unable to update your site design now,Please try again later.';
	    }
	}
	
	echo my_json_encode ( $output );
	exit ();

}

function update_pwd() {
	$user_id = $_SESSION ['id'];
	$output = array ();
	$c_pwd = $_POST ['current_pwd'];
	$n_pwd = $_POST ['new_pwd'];
	$cnf_pwd = $_POST ['confrim_pwd'];
	
	if (! $n_pwd || ! $cnf_pwd || ! $c_pwd) {
		$output ['status'] = 'error';
		$output ['message'] = 'All fields area mandatory ,Please provide valid inputs';
	} else {
		
		if ($n_pwd != $cnf_pwd) {
			$output ['status'] = 'error';
			$output ['message'] = '<b>New password</b> does not match with <b>confirm password</b>';
		} else {
			$output = array ();
			$sql = "select * from sites where id = '$user_id' and password = md5('$c_pwd') ";
			$res = mysql_query ( $sql );
			if (mysql_num_rows ( $res )) {
				$sql = "update sites set password = md5('$n_pwd') where id = '$user_id' ";
				mysql_query ( $sql );
				if (mysql_affected_rows () >= 0) {
					$output ['status'] = 'success';
					$output ['message'] = 'Successfully updated your password, please wait...';
				} else {
					$output ['status'] = 'error';
					$output ['message'] = 'unable to update your password now,Please try again later.';
				}
			} else {
				$output ['status'] = 'error';
				$output ['message'] = 'Invalid <b>Current password</b>';
			}
		}
	}
	
	echo my_json_encode ( $output );
	exit ();

}

function confirm_account() {
	
	$reg_confirmation_id = $_GET ['id'];
	$sql_ins = "update sites set modified_on=now(),is_active=1 where confirm_reg_id = '" . $reg_confirmation_id . "' and is_active = 0 ";
//	$sql_ins = "update sites set modified_on=now(),is_active=1 where confirm_reg_id = '" . $reg_confirmation_id . "'  ";
	mysql_query ( $sql_ins );
	
	$status = mysql_affected_rows ();
	if ($status < 0) {
		$_SESSION ['login_error_msg'] = "unable to update or invalid confirmation link";
	} else if ($status >= 0) {
	  $_SESSION ['login_error_msg'] = "Your account has been successfully confirmed  ";
	  $sql_ins = "SELECT id,email,subdomain FROM  sites where confirm_reg_id = '" . $reg_confirmation_id . "'  ";
	  ($q=mysql_query ( $sql_ins )) || die("Error in SQL");
	  

	      if(mysql_num_rows($q)>0) {
		$r= mysql_fetch_array($q);
		$_SESSION['id'] = $r['id'];
		$_SESSION ['auth_email'] = $r['email'];
		$_SESSION ['subdomain'] = $r['subdomain'];
		header("Location: index.php?page=edit");
		exit(0);
	      }

	}
	header ( "Location: index.php" );
	exit ();

}

function forgor_pwd() {
	$output = array ();
	$email_id = trim ( $_POST ['email_id'] );
	if (! valid_email ( $email_id )) {
		$output ['status'] = 'error';
		$output ['message'] = 'Please provide valid email address';
	} else {
		$sql = "select * from sites where email = '$email_id' limit 1 ";
		$res = mysql_query ( $sql );
		if (mysql_num_rows ( $res )) {
			$row = mysql_fetch_array ( $res );
			$user_id = $row ['id'];
			
			$newpwd = uniqid ( 'a' );
			$sql_upd = "update sites set password = md5('$newpwd') where id = '$user_id' ";
			mysql_query ( $sql_upd );
			
			if (mysql_affected_rows ()) {
				
				$from = SUPPORT_EMAIL;
				$to = $email_id;
				$subject = 'Password reset notification';
				$message = '<h3>Dear ' . $row ['name'] . ' </h3><br />';
				$message .= '<p>Your password has been reset to : <b>' . $newpwd . '</b></p>';
				send_email ( $from, $to, $subject, $message );
				
				$output ['status'] = 'success';
				$output ['message'] = 'Password sent - please check your email.';
			} else {
				$output ['status'] = 'error';
				$output ['message'] = 'unable to update your password';
			}
		} else {
			$output ['status'] = 'error';
			$output ['message'] = 'That email address is not in our records';
		}
	}
	echo my_json_encode ( $output );
	exit ();
}

function login_sitemaker() {
	$email = prepare_insert ( $_POST ['email'] );
	$password = prepare_insert ( $_POST ['password'] );
	
	$query = mysql_query ( "SELECT * FROM sites WHERE email='" . $email . "' AND password='" . md5 ( $password ) . "'  LIMIT 1" );
	if ($query) {
		$result = mysql_fetch_array ( $query );
		$count = mysql_num_rows ( $query );
		
		if ($result) {
			//registration is ok
			if ($count > 0) {
				
				if (! $result ['is_active']) {
					$haveErrors = true;
					$errors [] = "Email Confirmation is required";
					$_SESSION ['login_error_msg'] = "Email Confirmation is required.";
					header ( "Location: index.php" );
				} else {
					$_SESSION ['auth_email'] = $email;
					$_SESSION ['id'] = $result ['id'];
					$_SESSION ['subdomain'] = $result ['subdomain'];
					
					header ( "Location: index.php?page=edit" );
					$isOk = true;
				}
			} else {
				$haveErrors = true;
				$errors [] = "Invalid login credentials";
				$_SESSION ['login_error_msg'] = "Invalid login credentials";
				header ( "location:0;url=index.php" );
			}
		} else {
			$_SESSION ['login_error_msg'] = "Invalid login credentials";
			header ( "refresh:0;url=index.php" );
		}
	}
	
	echo $isOk;
	exit ();

}

// function to check if sub domain is available


function check_subdomain_avail() {
	$subdomain = $_GET ['subdomain'];
	$subdomain = strtolower ( $subdomain );
	
	if (isset ( $subdomain ) && empty ( $subdomain )) {
		return "failed";
		exit ();
	}
	if ($handle = opendir ( SUBDOMAINS_FOLDER )) {
		
		while ( false !== ($file = readdir ( $handle )) ) {
			if ($file != "." && $file != "..") {
				if ($file == $subdomain) {
					return "failed";
				}
			}
		}
		closedir ( $handle );
		return "ok";
	} else
		return "failed";

}

function delete_site_data() {
	
	mysql_query ( "DELETE FROM sites WHERE id='" . $_SESSION ['id'] . "'" );
	mysql_query ( "DELETE FROM faq WHERE site_id='" . $_SESSION ['id'] . "'" );
	mysql_query ( "DELETE FROM custom_page WHERE site_id='" . $_SESSION ['id'] . "'" );
	
	header ( "Location: process.php?type=logout" );
}

function upload_site_data($type) {
	
	$query = mysql_query ( "SELECT logo,subdomain FROM sites WHERE id='" . $_SESSION ['id'] . "'" );
	if ($query) {
		$result = mysql_fetch_array ( $query );
		if ($result) {
			$subdomain = $result ['subdomain'];
			$img_pathname = $result ['logo'];
		} else {
			$subdomain = "";
			$img_pathname = "";
		}
	}
	
	if (count ( $_FILES )) {
		foreach ( $_FILES as $key => $file ) {
			$image_name=md5 ( time () ) . "_" . basename($file ['name']);
			if ($type == 'logo') {
				$filename = SUBDOMAINS_FOLDER . $subdomain . "/images/" . $image_name;
			} else if ($type == 'gallery') {
				$filename = SUBDOMAINS_FOLDER . $subdomain . "/gallery/" . $image_name;
			}

			if (! copy ( $file ['tmp_name'], $filename )) {
				echo "Error. Can't upload file.".$filename;
			} else {
				//	echo "asdfasdf";
				$queryStr = "UPDATE sites SET " . $key . "='" . $image_name . "' WHERE id='" . $_SESSION ['id'] . "'";
				mysql_query ( $queryStr ) or die ( mysql_error () );
				echo "<img style='max-width:300px;' src=\"" . $filename . "\">";
			}
		}
	} else {
		if ($img_pathname == "") {
			echo "Click here to edit";
		} else {
			echo "<img style='max-width:300px;' src=\"" . $img_pathname . "\">";
		}
	}

}

function update_site_data() {
	$run_query = 1;
	$editorId = $_REQUEST ['editorId'];
	
	if (! isset ( $editorId ) || empty ( $editorId )) {
		echo "error...";
		exit(0);
	}
	
	$query = "";
	
	//question
	if (strpos ( $editorId, "q_" ) === 0) {
		$query = "UPDATE faq SET q = '" . prepare_insert ( $_REQUEST ['value'] ) . "' WHERE id='" . substr ( $editorId, strlen ( "q_" ) ) . "'";
	} //answer
	else if (strpos ( $editorId, "a_" ) === 0) {
		$query = "UPDATE faq SET a = '" . prepare_insert ( $_REQUEST ['value'] ) . "' WHERE id='" . substr ( $editorId, strlen ( "a_" ) ) . "'";
	} else if (strpos ( $editorId, "page_title_" ) === 0) {
		$query = "UPDATE custom_page SET title = '" . prepare_insert ( $_REQUEST ['value'] ) . "' WHERE id='" . substr ( $editorId, strlen ( "page_title_" ) ) . "'";
	} else if (strpos ( $editorId, "page_text_" ) === 0) {
		$query = "UPDATE custom_page SET text = '" . prepare_insert ( $_REQUEST ['value'] ) . "' WHERE id='" . substr ( $editorId, strlen ( "page_text_" ) ) . "'";
	} else {
		switch ($editorId) {
			case "company_name" :
				{
					$query = "UPDATE sites SET name = '" . prepare_insert ( $_REQUEST ['value'] ) . "' WHERE id='" . $_SESSION ['id'] . "'";
					break;
				}
			case "subdomain" :
				{
					$query = "UPDATE sites SET subdomain = '" . prepare_insert ( $_REQUEST ['value'] ) . "' WHERE id='" . $_SESSION ['id'] . "'";
					break;
				}
			case "use_about_us" :
				{
					if (prepare_insert ( $_REQUEST ['value'] ) == "Yes")
						$value = 1;
					else
						$value = 0;
					
					$query = "UPDATE sites SET use_about_us = '" . $value . "' WHERE id='" . $_SESSION ['id'] . "'";
					break;
				}
			case "about_us_text" :
				{
					$query = "UPDATE sites SET about_us_text = '" . prepare_insert ( $_REQUEST ['value'] ) . "' WHERE id='" . $_SESSION ['id'] . "'";
					break;
				}
			case "about_us_phone" :
				{
					$query = "UPDATE sites SET about_us_phone = '" . prepare_insert ( $_REQUEST ['value'] ) . "' WHERE id='" . $_SESSION ['id'] . "'";
					break;
				}
			case "about_us_address" :
				{
					$query = "UPDATE sites SET about_us_address = '" . prepare_insert ( $_REQUEST ['value'] ) . "' WHERE id='" . $_SESSION ['id'] . "'";
					break;
				}
			case "about_us_city" :
				{
					$query = "UPDATE sites SET about_us_city = '" . prepare_insert ( $_REQUEST ['value'] ) . "' WHERE id='" . $_SESSION ['id'] . "'";
					break;
				}
			case "about_us_state" :
				{
					$query = "UPDATE sites SET about_us_state = '" . prepare_insert ( $_REQUEST ['value'] ) . "' WHERE id='" . $_SESSION ['id'] . "'";
					break;
				}
			case "about_us_zip" :
				{
					$query = "UPDATE sites SET about_us_zip = '" . prepare_insert ( $_REQUEST ['value'] ) . "' WHERE id='" . $_SESSION ['id'] . "'";
					break;
				}
			case "about_us_hours" :
				{
					$query = "UPDATE sites SET about_us_hours = '" . prepare_insert ( $_REQUEST ['value'] ) . "' WHERE id='" . $_SESSION ['id'] . "'";
					break;
				}
			case "use_testmonials" :
				{
					if (prepare_insert ( $_REQUEST ['value'] ) == "Yes")
						$value = 1;
					else
						$value = 0;
					
					$query = "UPDATE sites SET use_testimonials = '" . $value . "' WHERE id='" . $_SESSION ['id'] . "'";
					break;
				}
			case "Testmonial_1" :
				{
					$query = "UPDATE sites SET testimonail_1 = '" . prepare_insert ( $_REQUEST ['value'] ) . "' WHERE id='" . $_SESSION ['id'] . "'";
					break;
				}
			case "Testmonial_2" :
				{
					$query = "UPDATE sites SET testimonail_2 = '" . prepare_insert ( $_REQUEST ['value'] ) . "' WHERE id='" . $_SESSION ['id'] . "'";
					break;
				}
			case "Testmonial_3" :
				{
					$query = "UPDATE sites SET testimonail_3 = '" . prepare_insert ( $_REQUEST ['value'] ) . "' WHERE id='" . $_SESSION ['id'] . "'";
					break;
				}
			case "Testmonial_4" :
				{
					$query = "UPDATE sites SET testimonail_4 = '" . prepare_insert ( $_REQUEST ['value'] ) . "' WHERE id='" . $_SESSION ['id'] . "'";
					break;
				}
			case "Testmonial_5" :
				{
					$query = "UPDATE sites SET testimonail_5 = '" . prepare_insert ( $_REQUEST ['value'] ) . "' WHERE id='" . $_SESSION ['id'] . "'";
					break;
				}
			case "Testmonial_6" :
				{
					$query = "UPDATE sites SET testimonail_6 = '" . prepare_insert ( $_REQUEST ['value'] ) . "' WHERE id='" . $_SESSION ['id'] . "'";
					break;
				}
			case "use_gallery" :
				{
					if (prepare_insert ( $_REQUEST ['value'] ) == "Yes")
						$value = 1;
					else
						$value = 0;
					
					$query = "UPDATE sites SET use_gallery = '" . $value . "' WHERE id='" . $_SESSION ['id'] . "'";
					break;
				}
			case "use_faq" :
				{
					if (prepare_insert ( $_REQUEST ['value'] ) == "Yes")
						$value = 1;
					else
						$value = 0;
					
					$query = "UPDATE sites SET use_faq = '" . $value . "' WHERE id='" . $_SESSION ['id'] . "'";
					//	echo $query; 
					break;
				}
			case "use_contact_us" :
				{
					if (prepare_insert ( $_REQUEST ['value'] ) == "Yes")
						$value = 1;
					else
						$value = 0;
					
					$query = "UPDATE sites SET use_conact_us = '" . $value . "' WHERE id='" . $_SESSION ['id'] . "'";
					break;
				}
			case "contact_us_text" :
				{
					$query = "UPDATE sites SET contact_us_text = '" . prepare_insert ( $_REQUEST ['value'] ) . "' WHERE id='" . $_SESSION ['id'] . "'";
					break;
				}
			case "contact_us_email" :
				{
					$query = "UPDATE sites SET contact_us_email = '" . prepare_insert ( $_REQUEST ['value'] ) . "' WHERE id='" . $_SESSION ['id'] . "'";
					break;
				}
			case "contact_us_use_names" :
				{
					if (prepare_insert ( $_REQUEST ['value'] ) == "Yes")
						$value = 1;
					else
						$value = 0;
					
					$query = "UPDATE sites SET contact_us_use_names = '" . $value . "' WHERE id='" . $_SESSION ['id'] . "'";
					break;
				}
			case "contact_us_use_address" :
				{
					if (prepare_insert ( $_REQUEST ['value'] ) == "Yes")
						$value = 1;
					else
						$value = 0;
					
					$query = "UPDATE sites SET contact_us_use_address = '" . $value . "' WHERE id='" . $_SESSION ['id'] . "'";
					break;
				}
			case "contact_us_use_phone" :
				{
					if (prepare_insert ( $_REQUEST ['value'] ) == "Yes")
						$value = 1;
					else
						$value = 0;
					
					$query = "UPDATE sites SET contact_us_use_phone = '" . $value . "' WHERE id='" . $_SESSION ['id'] . "'";
					break;
				}
			case "contact_us_use_email" :
				{
					if (prepare_insert ( $_REQUEST ['value'] ) == "Yes")
						$value = 1;
					else
						$value = 0;
					
					$query = "UPDATE sites SET contact_us_use_email = '" . $value . "' WHERE id='" . $_SESSION ['id'] . "'";
					break;
				}
			case "contact_us_use_how_learn" :
				{
					if (prepare_insert ( $_REQUEST ['value'] ) == "Yes")
						$value = 1;
					else
						$value = 0;
					
					$query = "UPDATE sites SET contact_us_use_how_learn = '" . $value . "' WHERE id='" . $_SESSION ['id'] . "'";
					break;
				}
			case "use_service" :
				{
					if (prepare_insert ( $_REQUEST ['value'] ) == "Yes")
						$value = 1;
					else
						$value = 0;
					
					$query = "UPDATE sites SET use_service = '" . $value . "' WHERE id='" . $_SESSION ['id'] . "'";
					break;
				}
			case "use_custom_page" :
				{
					if (prepare_insert ( $_REQUEST ['value'] ) == "Yes")
						$value = 1;
					else
						$value = 0;
					
					$query = "UPDATE sites SET use_custom_page = '" . $value . "' WHERE id='" . $_SESSION ['id'] . "'";
					break;
				}
			case "use_google_ads" :
				{
					if (prepare_insert ( $_REQUEST ['value'] ) == "Yes")
						$value = 1;
					else
						$value = 0;
					
					$query = "UPDATE sites SET use_google_ads = '" . $value . "' WHERE id='" . $_SESSION ['id'] . "'";
					break;
				}
			case "google_code" :
				{
					$query = "UPDATE sites SET google_code = '" . prepare_insert ( $_REQUEST ['value'] ) . "' WHERE id='" . $_SESSION ['id'] . "'";
					break;
				}
			case 'ins_faq' :
				{
					$query = "delete from faq WHERE site_id='" . $_SESSION ['id'] . "'";
					mysql_query ( $query );

					foreach ( $_POST ['question'] as $k => $q ) {
						if (isset($k) && isset($q)) {
							$query = "insert into faq 
												SET q = '" . prepare_insert ( $_POST ['question'] [$k] ) . "',
											    a = '" . prepare_insert ( $_POST ['answer'] [$k] ) . "',
											    site_id='" . $_SESSION ['id'] . "'";
							mysql_query ( $query );
						}
					
					}
					
					echo "FAQ Saved sucessfully";
					exit ();
					$run_query = 0;
					
					break;
				
				}
				break;
			case "facebook_link" :
				{
					$query = "UPDATE sites SET facebook_link = '" . prepare_insert ( $_REQUEST ['value'] ) . "' WHERE id='" . $_SESSION ['id'] . "'";
					break;
				}
			case "twitter_link" :
				{
					$query = "UPDATE sites SET twitter_link = '" . prepare_insert ( $_REQUEST ['value'] ) . "' WHERE id='" . $_SESSION ['id'] . "'";
					break;
				}
			case "linkedin_link" :
				{
					$query = "UPDATE sites SET linkedin_link = '" . prepare_insert ( $_REQUEST ['value'] ) . "' WHERE id='" . $_SESSION ['id'] . "'";
					break;
				}
			default :
				{
					echo "error... (in switch (" . $editorId . "))";
					exit ();
				}
		}
	}
	//echo $run_query;
	if ($run_query) {
		$result = mysql_query ( $query );
		if ($result)
			echo $_REQUEST ['value'];
		else
			echo "error... (in mysql)";
	} else {
		echo 0;
	}

}