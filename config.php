<?php

/*
	*	@Author: WebsiteMakerScript.com
	*	@email: support@WebsiteMakerScript.com
	    Input the information below between lines 9-22. If you do not know your direct path, please contact your hosting company.
	*/

define('BASE_FOLDER','/var/www/');

global $site_link;
$site_link = 'http://dev.cherni.tn/';
define('SITE_ROOT','http://dev.cherni.tn/');

global $subdomains_link;
$subdomains_link = 'http://dev.cherni.tn/subdomains/';
define('SUBDOMAINS_ROOT','http://dev.cherni.tn/subdomains/');

define('SUBDOMAINS_FOLDER','/var/www/subdomains/');


define('SUPPORT_EMAIL','email@yourdomain.com');


/* Database setting */

$host = "localhost";
$user = "debian-sys-maint"; //user name
$password = "0DGJFU7PsD94KNO7"; //password
$db = "stounsi"; //database

// DO NOT EDIT BENEATH THIS LINE!

//try connecting
($res = mysql_connect ( $host, $user, $password )) || die("Cannot connect to database");

//try select database
($res = mysql_select_db ( $db )) || die("Cannot select database");








if (! function_exists ( "stripos" )) {
	function stripos($str, $needle, $offset = 0) {
		return strpos ( strtolower ( $str ), strtolower ( $needle ), $offset );
	} /* endfunction stripos */
} /* endfunction exists stripos */

if (! function_exists ( "strripos" )) {
	function strripos($haystack, $needle, $offset = 0) {
		if (! is_string ( $needle ))
			$needle = chr ( intval ( $needle ) );
		if ($offset < 0) {
			$temp_cut = strrev ( substr ( $haystack, 0, abs ( $offset ) ) );
		} else {
			$temp_cut = strrev ( substr ( $haystack, 0, max ( (strlen ( $haystack ) - $offset), 0 ) ) );
		}
		if (($found = stripos ( $temp_cut, strrev ( $needle ) )) === FALSE)
			return FALSE;
		$pos = (strlen ( $haystack ) - ($found + $offset + strlen ( $needle )));
		
		return $pos;
	} /* endfunction strripos */
} /* endfunction exists strripos */

/* Image setting */

//max size of image (bytes)
$max_size = 3000 * 3000; //2000Kb


$pages = array ("index.html", "about_us.html", "contact_us.html", "testimonials.html", "gallery.html", "faq.html" );

function is_good_extension($filename) {
	//image extension
	$image_extensions = array ("jpg", "jpeg", "bmp", "gif", "png" );
	
	$file_ext = substr ( strtolower ( substr ( $filename, strripos ( $filename, '.' ) ) ), 1 );
	
	if (! in_array ( $file_ext, $image_extensions ))
		return false;
	return true;
}

//prepare to insert data
function prepare_insert($data) {
	$data = trim ( $data );
	if (get_magic_quotes_gpc ())
		$data = stripslashes ( $data );
	
	return mysql_real_escape_string ( $data );
}

//prepare to show in browes
function prepare_show($data) {
	$data = stripslashes ( $data );
	$data = htmlspecialchars ( $data, ENT_QUOTES );
	return nl2br ( $data );
}

function is_free_subdomain($subdomain) {
	$query = mysql_query ( "SELECT COUNT(id) AS cnt FROM sites WHERE subdomain='" . $subdomain . "'" );
	if ($query) {
		$result = mysql_fetch_array ( $query );
		$count = $result ['cnt'];
		if ($count > 0 || $subdomain == "")
			return false;
		return true;
	} else
		return false;
}

function rmkdir($path, $mode = 0755) {
	$path = rtrim ( preg_replace ( array ("/\\\\/", "/\/{2,}/" ), "/", $path ), "/" );
	$e = explode ( "/", ltrim ( $path, "/" ) );
	if (substr ( $path, 0, 1 ) == "/") {
		$e [0] = "/" . $e [0];
	}
	$c = count ( $e );
	$cp = $e [0];
	for($i = 1; $i < $c; $i ++) {
		//echo $cp."<br/>";
		if (! @mkdir ( $cp, $mode )) {
			if (! is_dir ( $cp )) {
				echo "it was not dir<br>";
				return false;
			}
		}
		$cp .= "/" . $e [$i];
	}
	return is_dir ( $path ) || @mkdir ( $path, $mode );
}

function make_directories($directories) {
	if (! is_array ( $directories ))
		return false;
	
	for($i = 0; $i < count ( $directories ); $i ++) {
		$res = rmkdir ( $directories [$i], $mode = 0755 );
		if (! $res)
			return false;
	}
	
	return true;
}

function showError($message) {
	echo "<center><font size=\"3\" color=\"red\">" . $message . "</font></center><br/>";
}

function is_good_subdomain_name($subdomain) {
	$bad_symbols = array ('?', '*', '"', ':', '/', '\\', '<', '>', '|' );
	
	foreach ( $bad_symbols as $key => $value )
		if (strpos ( $subdomain, $value ) !== false)
			return false;
	
	return true;
}

function send_email($from, $to, $subject, $message) {
	$from_header = "From: $from\r\n";
	$from_header .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
	
	@mail ( $to, $subject, $message, $from_header );
}

function valid_email($email) {
	if (eregi ( "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$", $email )) {
		return TRUE;
	} else {
		return FALSE;
	}
}
?>