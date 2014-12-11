<?php
include("config.php");
require 'libs/Smarty.class.php';


$user = prepare_insert($_GET['user']);
$page = prepare_insert($_GET['page']);

if (!isset($user) || empty($user))	header("Location: ".SITE_ROOT."index.php");
	
if (($pos = strpos($user, "/")) !== false)
{
	$userName = substr($user, 0, $pos);
	$query = mysql_query("SELECT design FROM sites WHERE subdomain='".$userName."' LIMIT 1");
	if ($query)
	{
		//site doesn't exist
		if (mysql_num_rows($query) == 0)
		{
			//redirect to main page
			header("Location: ".SITE_ROOT."index.php");
			exit();
		}
		if($result = mysql_fetch_array($query)) 
		{
		    if ($result['design']>0) {
			header("Location: ".SITE_ROOT."templates/template_".$result['design']."/templates/".substr($user, $pos)."/".$page);
		    } else {
//			header("Location: ".SITE_ROOT."templates/template_".abs($result['design']).".nobanner/templates/".substr($user, $pos)."/".$page);
			header("Location: ".SITE_ROOT."templates/template_".abs($result['design'])."/templates/".substr($user, $pos)."/".$page);
		    }
		}
	}
}
else
{

  if (!isset($page) || empty($page)) {	
    $page = "index.html"; 
  }

	mysql_query("UPDATE sites SET visits=visits+1 WHERE subdomain='".prepare_insert($user)."'");

	mysql_query("INSERT INTO LOGS (ip,sess,tow,user) values ('".prepare_insert($_SERVER['REMOTE_ADDR'])."','".prepare_insert(session_id())."',now(),'".prepare_insert($user)."')");
/*
CREATE TABLE LOGS (
ip bigint( 21 ) ,
sess VARCHAR( 40 ) NOT NULL ,
tow datetime,
user varchar( 50 ) ,
PRIMARY KEY (ip, sess, user ) ,
KEY ( tow ),
KEY ( user )
) 
*/


// Base path
$base_path=SUBDOMAINS_ROOT.$user."/";

	$file_name = substr($page, 0, strripos($page, '.'));
	$smarty = new Smarty();
	if (!in_array($page, $pages))
	{
		$query = mysql_query("SELECT * FROM custom_page WHERE title='".$file_name."' AND site_id=(SELECT id FROM sites WHERE subdomain='".$user."' LIMIT 1) LIMIT 1");
		if ($query)
		{
			while ($result = mysql_fetch_array($query))
			{
				$smarty->assign("title", prepare_show($result['title']));
				$smarty->assign("text", prepare_show($result['text']));
				$smarty->assign("image", $base_path.prepare_show($result['image']));
			}
		}
	}


	$query = mysql_query("SELECT * FROM sites WHERE subdomain='".$user."' LIMIT 1");
	if ($query)
	{
		//site doesn't exist
		if (mysql_num_rows($query) == 0)
		{
			//redirect to main page
			header("Location: ".SITE_ROOT."index.php");
			exit();
		}
		while ($result = mysql_fetch_array($query))
		{
			$templateID = $result['design'];
			if($templateID<0) {$smarty->assign("remove_branding", true);}
			$smarty->template_dir = BASE_FOLDER."templates/template_".abs($templateID)."/templates";
			$smarty->compile_dir = BASE_FOLDER."templates/template_".abs($templateID)."/templates_c";
			$smarty->cache_dir = BASE_FOLDER."templates/template_".abs($templateID)."/cache";
			$smarty->config_dir = BASE_FOLDER."templates/template_".abs($templateID)."/configs";

/*
			if($templateID>0) {
			  $smarty->template_dir = BASE_FOLDER."templates/template_".$templateID."/templates";
			  $smarty->compile_dir = BASE_FOLDER."templates/template_".$templateID."/templates_c";
			  $smarty->cache_dir = BASE_FOLDER."templates/template_".$templateID."/cache";
			  $smarty->config_dir = BASE_FOLDER."templates/template_".$templateID."/configs";
			} else {			  
			  $smarty->template_dir = BASE_FOLDER."templates/template_".abs($templateID).".nobanner/templates";
			  $smarty->compile_dir = BASE_FOLDER."templates/template_".abs($templateID).".nobanner/templates_c";
			  $smarty->cache_dir = BASE_FOLDER."templates/template_".abs($templateID).".nobanner/cache";
			  $smarty->config_dir = BASE_FOLDER."templates/template_".abs($templateID).".nobanner/configs";

			}
*/			


			$smarty->assign("company_name", prepare_show($result['name']));
			if ($result['logo']!='' or $result['logo'] != null) {
			  $smarty->assign("logo", $base_path."images/".prepare_show($result['logo']));

			} else {
			  $smarty->assign("logo", "");

			}
			
			$smarty->assign("site_root", SITE_ROOT);
			$smarty->assign("use_about_us", prepare_show($result['use_about_us']));
			$smarty->assign("about_us_text", prepare_show($result['about_us_text']));
			$smarty->assign("about_us_phone", prepare_show($result['about_us_phone']));
			$smarty->assign("about_us_address", prepare_show($result['about_us_address']));
			$smarty->assign("about_us_city", prepare_show($result['about_us_city']));
			$smarty->assign("about_us_state", prepare_show($result['about_us_state']));
			$smarty->assign("about_us_zip", prepare_show($result['about_us_zip']));
			$smarty->assign("about_us_hours", prepare_show($result['about_us_hours']));
			$smarty->assign("use_testimonials", prepare_show($result['use_testimonials']));
			$smarty->assign("testimonail_1", prepare_show($result['testimonail_1']));
			$smarty->assign("testimonail_2", prepare_show($result['testimonail_2']));
			$smarty->assign("testimonail_3", prepare_show($result['testimonail_3']));
			$smarty->assign("testimonail_4", prepare_show($result['testimonail_4']));
			$smarty->assign("testimonail_5", prepare_show($result['testimonail_5']));
			$smarty->assign("testimonail_6", prepare_show($result['testimonail_6']));
			$smarty->assign("use_gallery", prepare_show($result['use_gallery']));

			for ($i=1;$i<=10;$i++) {
			  if ($result['gallery_'.$i]!='' or $result['gallery_'.$i] != null) {
			    $smarty->assign('gallery_'.$i, $base_path."gallery/".prepare_show($result['gallery_'.$i]));
			  } else {
			    $smarty->assign('gallery_'.$i, "");
			  }
			}

			$smarty->assign("use_faq", prepare_show($result['use_faq']));
			$smarty->assign("use_conact_us", prepare_show($result['use_conact_us']));
			$smarty->assign("contact_us_text", prepare_show($result['contact_us_text']));
			$smarty->assign("contact_us_email", prepare_show($result['contact_us_email']));
			$smarty->assign("contact_us_use_names", prepare_show($result['contact_us_use_names']));
			$smarty->assign("contact_us_use_address", prepare_show($result['contact_us_use_address']));
			$smarty->assign("contact_us_use_phone", prepare_show($result['contact_us_use_phone']));
			$smarty->assign("contact_us_use_email", prepare_show($result['contact_us_use_email']));
			$smarty->assign("contact_us_use_how_learn", prepare_show($result['contact_us_use_how_learn']));
			$smarty->assign("use_service", prepare_show($result['use_service']));
			$smarty->assign("use_custom_page", prepare_show($result['use_custom_page']));
			$smarty->assign("use_google_code", prepare_show($result['use_google_code']));
			$smarty->assign("google_code", prepare_show($result['google_code']));

			$smarty->assign("facebook_link", prepare_show($result['facebook_link']));
			$smarty->assign("twitter_link", prepare_show($result['twitter_link']));
			$smarty->assign("linkedin_link", prepare_show($result['linkedin_link']));


			
			$faq = array();
			
			$faq_query = mysql_query("SELECT * FROM faq WHERE site_id='".$result['id']."'");
			if ($faq_query)
			{
				while ($faq_result = mysql_fetch_array($faq_query))
				{
					$faq[] = array($faq_result['q'], $faq_result['a']);
				}
			}
			$smarty->assign("FAQ", $faq);
			
			$meny = array();
			$meny[] = array('Home', 'index.html'); 
			if ($result['use_about_us'])
				$meny[] = array('About us', 'about_us.html'); 
			if ($result['use_testimonials'])
				$meny[] = array('Testimonials', 'testimonials.html');
			if ($result['use_gallery'])
				$meny[] = array('Gallery', 'gallery.html');
			if ($result['use_faq'])
				$meny[] = array('FAQ', 'faq.html');
			if ($result['use_conact_us'])
				$meny[] = array('Contact us', 'contact_us.html');
				
			$query_custom_pages = mysql_query("SELECT * FROM custom_page WHERE site_id=".$result['id']);
			if ($query_custom_pages)
			{
				while ($result_custom_pages = mysql_fetch_array($query_custom_pages))
				{
					$meny[] = array($result_custom_pages['title'], $result_custom_pages['title']); ///"<a href='".$result_custom_pages['title'].".html'>".$result_custom_pages['title']." us</a>";
				}
			}
			
			$smarty->assign("Menu", $meny);
			
			$smarty->display($file_name.".tpl");
		}
	}
}

?>