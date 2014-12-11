<?php
session_start();
error_reporting(E_ALL & ~E_NOTICE);
include("config.php");

if (!isset($_SESSION['id']))
{
	header("Location: index.php");
	exit();
}

$query = mysql_query("SELECT * FROM sites WHERE id='".$_SESSION['id']."'");
if ($query)
{
	if (mysql_num_rows($query) > 0)
	{
		
		$result = mysql_fetch_array($query);
		$site_key =  $_SESSION['id'];
		$sub_query = mysql_query("SELECT * FROM faq WHERE site_id='".$_SESSION['id']."'");
		$custom_page_query = mysql_query("SELECT * FROM custom_page WHERE site_id = '".$_SESSION['id']."'");
	}
}
?>
<html>
<head>
  <title>FreeWebsit.es | Site Manager</title>
  <script src="js/prototype.js?<?php echo md5(microtime());?>" type="text/javascript"></script>
  <script src="js/scriptaculous.js?<?php echo md5(microtime());?>" type="text/javascript"></script>
  <script src="js/unittest.js?<?php echo md5(microtime());?>" type="text/javascript"></script>
  <script src="js/aim_new.js?<?php echo md5(microtime());?>" type="text/javascript"></script>
  <script type="text/javascript" src="js/webform.js"></script>

  <style type="text/css">
<!--
.edittext1 {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	font-style: normal;
	font-weight: normal;
	color: #5F5F5F;
}
.style1 {
	color: #005399;
	font-size: 18px;
}
.style2 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
body {
	background-color: #e4e5e0;
	margin-top: 15px;
}
.style4 {
	font-family: Arial, Helvetica, sans-serif;
	color: #0066FF;
	font-weight: bold;
}
.style5 {
	color: #5F5F5F;
	font-family: Arial, Helvetica, sans-serif;
}
.style7 {color: #0066FF; font-family: Arial, Helvetica, sans-serif; }
a:link {
	color: #FFFFFF;
}
a:visited {
	color: #FFFFFF;
}
a:hover {
	color: #FFFFFF;
}
a:active {
	color: #0066FF;
}
.style22 {	font-size: 10px;
	color: #a6cae0;
}
-->
  </style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-23758621-3']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body text="#5F5F5F">
<table width="831" border="0" align="center" cellpadding="0" cellspacing="0" class="edittext1">
  <tr>
    <td height="169" colspan="3" valign="top" bgcolor="#FFFFFF"><table width="882" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="413"><img src="images/website-logo.jpg" alt="free websites" width="413" height="154" border="0" usemap="#Map" /></td>
        <td width="469" valign="middle" background="images/website-login.jpg"><div align="center">
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td>
				<div align="right">
                <?php 
					if(isset($_SESSION['auth_email'])){
				?>
					<table width="414" height="133" border="0" align="right" cellpadding="0" cellspacing="0">
						<tr>
						  <td height="46" colspan="2"><div align="right"></div></td>
						  <td width="13">&nbsp;</td>
						</tr>
						<tr>
							<td colspan=2 align="right">
								<span style="color:#FFF">Welcome <b><?php echo $_SESSION['auth_email'];?></b>&nbsp;&nbsp; </span>							</td>
							<td>&nbsp;</td>
						</tr>
						<tr>
						  <td width="396" height="31" align="right" valign="bottom">
							<a   class="nav_link" href="edit.php">Edit site</a>
							<font color="#FFFFFF">-</font>							<a target="_blank" class="nav_link" href="http://freewebsit.es/user/<?php echo $_SESSION['subdomain'];?>/">View site</a>
							<font color="#FFFFFF">-</font>							<a   class="nav_link" id="delete_site" href="delsite.php?site_id=<?php echo $_SESSION['id'];?>">Delete site</a> <font color="#FFFFFF">-</font> <a href="logout.php">Logout</a></td>
						  <td width="5">&nbsp;</td>
						  <td>&nbsp;</td>
						</tr>
						<tr>
						  <td height="36" align="right" valign="bottom"><font color="#00549A" size="1" face="Arial, Helvetica, sans-serif"><strong>Your Website URL:</strong> http://freewebsit.es/user/<?php echo $_SESSION['subdomain'];?>/</font></td>
						  <td>&nbsp;</td>
						  <td>&nbsp;</td>
					    </tr>
					</table>
					
					<script type="text/javascript">
						 window.onload = function(){
							$('delete_site').observe('click',function(e){
								if(confirm('Are you sure you want to delete this site')){
									
								}else{
									e.preventDefault();
									e.stop();
								}
							});
						 }
						
					</script>
					
					<style type="text/css">
						a.nav_link{
							color: #FFF;						
						}
					</style>
					
				<?php }else{ ?>
				<form method="post" name="login_frm" action="index.php">
					<input type="hidden" name="formname" value="login" >
					  <table width="414" height="80" border="0" align="right" cellpadding="0" cellspacing="0">
						<tr>
						  <td height="31">&nbsp;</td>
						  <td>&nbsp;</td>
						  <td>&nbsp;</td>
						  <td>&nbsp;</td>
						</tr>
						<tr>
						  <td width="165" height="31"><div align="left">
							<input name="email" type="text">
						  </div></td>
						  <td width="163"><div align="left">
							<input type="password" name="password">
						  </div></td>
						  <td width="53" align="left">
							<div align="center">
							  <input type="image" src="images/websites-submit.gif" name="image">
							  </div></td>
						  <td width="20" align="left">&nbsp;</td>
						</tr>
						<tr>
						  <td height="18">&nbsp;</td>
						  <td><div align="left" class="style22">&nbsp;Forgot Password? </div></td>
						  <td>&nbsp;</td>
						  <td>&nbsp;</td>
						</tr>
						<tr>
						</tr>
					  </table>
				</form>
				<?php } ?>  
                </div></td>
              </tr>
            </table>
        </div></td>
      </tr>
    </table>
      <map name="Map" id="Map">
        <area shape="rect" coords="42,37,370,93" href="http://www.freewebsit.es/" alt="Free Websites, FreeWebsit.es, Webpages" />
      </map>
    </td>
  </tr>
  
  <tr>
    <td width="713" align="right" valign="top" bgcolor="#FFFFFF"><table width="694" border="0" align="right" cellpadding="21" cellspacing="0">
      <tr>
        <td width="668" height="1953" valign="top" bgcolor="#FFFFFF"><div align="left">
          <div align="left">
            <center>
              <h3 align="left" class="style1"> <img src="http://www.ezsitemaker.com/websitemaker/images/logo_maker.png" alt="logo maker, website maker"/>&nbsp; Website Manager </h3>
            </center>
            <table width="671" cellpadding="7">
              <tr>
                <td height="55" width="285" valign="top"><div align="left"><span class="style4">Account Information</span></div></td>
                <td>&nbsp;</td>
              </tr>
              <tr>
                <td width="285"><div align="left"><span class="style5">Site Name / Company Name:</span></div></td>
                <td width="349" bgcolor="#ffff99"><div id="company_name" align="left"><?php echo $result['name']; ?></div></td>
                <script>
new Ajax.InPlaceEditor($('company_name'), 
  'update.php', {
  okButton: true, 
  cancelButton: true,
  textBetweenControls: ' | ',
  textBeforeControls: ' ',
  ajaxOptions: {method: 'get'}
});
          </script>
              </tr>
              <tr>
                <td colspan="2" class="edittext1">&nbsp;</td>
                </tr>
              <tr>
                <td><div align="left" class="style5">Company Logo:</div></td>
                <td bgcolor="#FFFFFF">
					<div id="logo" align="center">
                  		<?php if(isset($result['logo'])) echo "<img src=\"".$result['logo']."\">"; else echo "&nbsp;"; ?>
				  	</div>
				</td>
                
				<script type="text/javascript">
				<!--
					function completeCallback(response) 
					{
							$("loading_image").remove();
							$("logo").innerHTML = response;
							$("logo").show();
							
					}
					 
					function inPlaceImgUpload(){
						 
						new Ajax.InPlaceEditor($('logo'), 
						  'update.php', {
						  onSubmit: function(resp)
						  {
								return AIM.submit($("logo-inplaceeditor"), {'onStart' : updStartCallback, 'onComplete' : updCompleteCallback})
						  },
						  onComplete: function()
						  {
						  },
						  inputeType: 'file',
						  iframeTarget:'logo-frame',
						  paramName: 'logo',
						  okText: 'update',
						  okButton: true, 
						  cancelButton: true,
						  textBetweenControls: ' | ',
						  textBeforeControls: ' ',
						  ajaxOptions: {method: 'post'}
					});
					 }
 					inPlaceImgUpload();
          		-->
          		</script>
          		</tr>
            </table>
            <div align="center"><br>
                <img src="images/smallbusinesswebsites.jpg" alt="small business websites, free websites for small businesses" width="624" height="8"><br>
                <br>
            </div>
            <table width="399" border="0" cellspacing="0" cellpadding="7">
              <tr>
                <td width="34" valign="middle"><div align="left"><img src="images/aboutus.png" alt="about us info" width="24" height="26"> </div></td>
                <td width="365" valign="middle"><div align="left" class="style4"><b>About Us  Page </b></div></td>
              </tr>
            </table>
            <br>
            <table width="667" cellpadding="7">
              <tr>
                <td width="397"><span class="style5">Would you like to add an "About us" page?</span></td>
                <td width="234" bgcolor="#DCE4F1">
					<div id="use_about_us"><div align="center"><?php if($result['use_about_us']) echo "Yes"; else echo "No"; ?></div></div>
				</td>
                <script>
new Ajax.InPlaceCollectionEditor(
  'use_about_us', 
  'update.php', {
  okButton: true, 
  cancelButton: true,
  textBetweenControls: ' | ',
  textBeforeControls: ' ',
  collection: [['Yes','Yes'],['No','No']],
  ajaxOptions: {method: 'get'},
   onComplete: function(resp,ele)
		  {
			if(resp.responseText.stripTags() == 'Yes' ){
				Effect.SlideDown('use_aboutus_content');
			}else{
				Effect.SlideUp('use_aboutus_content');
			}
		  }
});
          </script>
              </tr>
            </table>
            <div id="use_aboutus_content" style="padding-left: 10px;<?php echo ((!$result['use_about_us'])?'display:none;':'');?>" ><br>
              <table width="658" align="center" cellpadding="7">
                <tr>
                  <td width="27" align="center" valign="middle" class="style5"><div align="center"><img src="images/aboutus.png" alt="about us info" width="24" height="26"></div></td>
                  <td width="162" class="style5">About Us page text:</td>
                  <td width="373" bgcolor="#ffff99">
					<div id="about_us_text"><?php if (empty($result['about_us_text'])) echo "&nbsp;"; else echo $result['about_us_text']; ?></div>
				  </td>
                  <script>
new Ajax.InPlaceEditor($('about_us_text'), 
	  'update.php', {
	  okButton: true, 
	  cancelButton: true,
	  textBetweenControls: ' | ',
	  textBeforeControls: ' ',
	  ajaxOptions: {method: 'get'}
});
          </script>
                </tr>
                <tr>
                  <td align="center" valign="middle" class="style5"><div align="center"><img src="images/aboutus.png" alt="about us info" width="24" height="26"></div></td>
                  <td class="style5">Phone:</td>
                  <td bgcolor="#ffff99">
				  <div id="about_us_phone"><?php if (empty($result['about_us_phone'])) echo "&nbsp;"; else echo $result['about_us_phone']; ?></div></td>
                  <script>
new Ajax.InPlaceEditor($('about_us_phone'), 
	  'update.php', {
	  okButton: true, 
	  cancelButton: true,
	  textBetweenControls: ' | ',
	  textBeforeControls: ' ',
	  ajaxOptions: {method: 'get'}
});
          </script>
                </tr>
                <tr>
                  <td align="center" valign="middle" class="style5"><div align="center"><img src="images/aboutus.png" alt="about us info" width="24" height="26"></div></td>
                  <td class="style5">Address:</td>
                  <td bgcolor="#ffff99">
				  <div id="about_us_address"><?php if (empty($result['about_us_address'])) echo "&nbsp;"; else echo $result['about_us_address']; ?></div></td>
                  <script>
new Ajax.InPlaceEditor($('about_us_address'), 
	  'update.php', {
	  okButton: true, 
	  cancelButton: true,
	  textBetweenControls: ' | ',
	  textBeforeControls: ' ',
	  ajaxOptions: {method: 'get'}
});
          </script>
                </tr>
                <tr>
                  <td align="center" valign="middle" class="style5"><div align="center"><img src="images/aboutus.png" alt="about us info" width="24" height="26"></div></td>
                  <td class="style5">City:</td>
                  <td bgcolor="#ffff99">
				  <div id="about_us_city"><?php if (empty($result['about_us_city'])) echo "&nbsp;"; else echo $result['about_us_city']; ?></div></td>
                  <script>
new Ajax.InPlaceEditor($('about_us_city'), 
	  'update.php', {
	  okButton: true, 
	  cancelButton: true,
	  textBetweenControls: ' | ',
	  textBeforeControls: ' ',
	  ajaxOptions: {method: 'get'}
});
          </script>
                </tr>
                <tr>
                  <td align="center" valign="middle" class="style5"><div align="center"><img src="images/aboutus.png" alt="about us info" width="24" height="26"></div></td>
                  <td class="style5">State:</td>
                  <td bgcolor="#ffff99">
				  <div id="about_us_state"><?php if (empty($result['about_us_state'])) echo "&nbsp;"; else echo $result['about_us_state']; ?></div></td>
                  <script>
new Ajax.InPlaceEditor($('about_us_state'), 
	  'update.php', {
	  okButton: true, 
	  cancelButton: true,
	  textBetweenControls: ' | ',
	  textBeforeControls: ' ',
	  ajaxOptions: {method: 'get'}
});
          </script>
                </tr>
                <tr>
                  <td align="center" valign="middle" class="style5"><div align="center"><img src="images/aboutus.png" alt="about us info" width="24" height="26"></div></td>
                  <td class="style5">Zip:</td>
                  <td bgcolor="#ffff99">
				  <div id="about_us_zip"><?php if (empty($result['about_us_zip'])) echo "&nbsp;"; else echo $result['about_us_zip']; ?></div></td>
                  <script>
new Ajax.InPlaceEditor($('about_us_zip'), 
	  'update.php', {
	  okButton: true, 
	  cancelButton: true,
	  textBetweenControls: ' | ',
	  textBeforeControls: ' ',
	  ajaxOptions: {method: 'get'}
});
          </script>
                </tr>
                <tr>
                  <td align="center" valign="middle" class="style5"><div align="center"><img src="images/aboutus.png" alt="about us info" width="24" height="26"></div></td>
                  <td class="style5">Hours of operation:</td>
                  <td bgcolor="#ffff99">
				  <div id="about_us_hours"><?php if (empty($result['about_us_hours'])) echo "&nbsp;"; else echo $result['about_us_hours']; ?></div></td>
                  <script>
new Ajax.InPlaceEditor($('about_us_hours'), 
	  'update.php', {
	  okButton: true, 
	  cancelButton: true,
	  textBetweenControls: ' | ',
	  textBeforeControls: ' ',
	  ajaxOptions: {method: 'get'}
});
          </script>
                </tr>
              </table>
            </div>
            <div align="center"><br>
              <img src="images/smallbusinesswebsites.jpg" alt="small business websites, free websites for small businesses" width="624" height="8"><br>
            </div>
            <table width="399" border="0" cellspacing="0" cellpadding="7">
              <tr>
                <td width="34" valign="middle"><div align="left"><img src="images/website-testimonials.gif" alt="website testimonials, small business websites" width="24" height="26"> </div></td>
                <td width="365" valign="middle"><div align="left" class="style4"><b>Testimonials Page </b></div></td>
              </tr>
            </table>
            <br>
            <table width="670" cellpadding="7">
              <tr>
                <td width="396" class="style5">Would you like to add a customer testimonials page?</td>
                <td width="236" bgcolor="#DCE4F1"><div id="use_testmonials">
                  <div align="center">
                    <?php if($result['use_testimonials']) echo "Yes"; else echo "No"; ?>
                    </div>
                </div></td>
                <script>
new Ajax.InPlaceCollectionEditor(
  'use_testmonials', 
  'update.php', {
  okButton: true, 
  cancelButton: true,
  textBetweenControls: ' | ',
  textBeforeControls: ' ',
  collection: [['Yes','Yes'],['No','No']],
  ajaxOptions: {method: 'get'},
   onComplete: function(resp,ele)
		  {
			if(resp.responseText.stripTags() == 'Yes' ){
				Effect.SlideDown('use_testimonial_content');
			}else{
				Effect.SlideUp('use_testimonial_content');
			}
		  }	 
});
          </script>
              </tr>
            </table>
            <div id="use_testimonial_content" style="padding-left: 10px;<?php echo ((!$result['use_testimonials'])?'display:none;':'')?>"><br>
              <table  width="581" border="0" align="center" cellpadding="7">
                <tr>
                  <td valign="middle" class="edittext1">&nbsp;</td>
                  <td class="edittext1">&nbsp;</td>
                  <td bgcolor="#FFFFFF"><font size="2"><strong><span class="style7">Example:</span></strong></font><font color="#232323" size="2"> <span class="style5"><strong>&quot;Awesome Service!&quot; - Kim Edwards, Dallas, TX </strong></span></font> </td>
                </tr>
                <tr>
                  <td valign="middle" class="edittext1">&nbsp;</td>
                  <td class="edittext1">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td width="34" valign="middle" class="edittext1"><div align="left"><img src="images/website-testimonials.gif" alt="website testimonials, small business websites" width="24" height="26"></div></td>
                  <td width="110" class="style5">Testimonial 1:</td>
                  <td width="387" bgcolor="#ffff99">
					<div id="Testmonial_1"><?php if (empty($result['testimonail_1'])) echo "&nbsp;"; else echo $result['testimonail_1']; ?></div></td>
                  <script>
var test_m1 = new Ajax.InPlaceEditor($('Testmonial_1'), 
	  'update.php', {
	  okButton: true, 
	  cancelButton: true,
	  textBetweenControls: ' | ',
	  textBeforeControls: ' ',
	  ajaxOptions: {method: 'get'}
	  }
);
          </script>
                </tr>
                <tr>
                  <td width="34" valign="middle" class="edittext1"><div align="left"><img src="images/website-testimonials.gif" alt="website testimonials, small business websites" width="24" height="26"></div></td>
                  <td width="110" class="style5">Testimonial 2:</td>
                  <td bgcolor="#ffff99">
					<div id="Testmonial_2"><?php if (empty($result['testimonail_2'])) echo "&nbsp;"; else echo $result['testimonail_2']; ?></div>
				  </td>
                  <script>
new Ajax.InPlaceEditor($('Testmonial_2'), 
	  'update.php', {
	  okButton: true, 
	  cancelButton: true,
	  textBetweenControls: ' | ',
	  textBeforeControls: ' ',
	  ajaxOptions: {method: 'get'}
	 
});
          </script>
                </tr>
                <tr>
                  <td width="34" valign="middle" class="edittext1"><div align="left"><img src="images/website-testimonials.gif" alt="website testimonials, small business websites" width="24" height="26"></div></td>
                  <td width="110" class="style5">Testimonial 3:</td>
                  <td bgcolor="#ffff99">
				  <div id="Testmonial_3"><?php if (empty($result['testimonail_3'])) echo "&nbsp;"; else echo $result['testimonail_3']; ?></div>
				  </td>
                  <script>
new Ajax.InPlaceEditor($('Testmonial_3'), 
	  'update.php', {
	  okButton: true, 
	  cancelButton: true,
	  textBetweenControls: ' | ',
	  textBeforeControls: ' ',
	  ajaxOptions: {method: 'get'}
});
          </script>
                </tr>
                <tr>
                  <td width="34" valign="middle" class="edittext1"><div align="left"><img src="images/website-testimonials.gif" alt="website testimonials, small business websites" width="24" height="26"></div></td>
                  <td width="110" class="style5">Testimonial 4:</td>
                  <td bgcolor="#ffff99">
					<div id="Testmonial_4"><?php if (empty($result['testimonail_4'])) echo "&nbsp;"; else echo $result['testimonail_4']; ?></div></td>
                  <script>
new Ajax.InPlaceEditor($('Testmonial_4'), 
	  'update.php', {
	  okButton: true, 
	  cancelButton: true,
	  textBetweenControls: ' | ',
	  textBeforeControls: ' ',
	  ajaxOptions: {method: 'get'}
});
          </script>
                </tr>
                <tr>
                  <td width="34" valign="middle" class="edittext1"><div align="left"><img src="images/website-testimonials.gif" alt="website testimonials, small business websites" width="24" height="26"></div></td>
                  <td width="110" class="style5">Testimonial 5:</td>
                  <td bgcolor="#ffff99">
					<div id="Testmonial_5"><?php if (empty($result['testimonail_5'])) echo "&nbsp;"; else echo $result['testimonail_5']; ?></div>
				  </td>
                  <script>
new Ajax.InPlaceEditor($('Testmonial_5'), 
	  'update.php', {
	  okButton: true, 
	  cancelButton: true,
	  textBetweenControls: ' | ',
	  textBeforeControls: ' ',
	  ajaxOptions: {method: 'get'}
});
          </script>
                </tr>
                <tr>
                  <td width="34" valign="middle" class="edittext1"><div align="left"><img src="images/website-testimonials.gif" alt="website testimonials, small business websites" width="24" height="26"></div></td>
                  <td width="110" class="style5">Testimonial 6:</td>
                  <td bgcolor="#ffff99">
					<div id="Testmonial_6"><?php if (empty($result['testimonail_6'])) echo "&nbsp;"; else echo $result['testimonail_6']; ?></div></td>
                  <script>
new Ajax.InPlaceEditor($('Testmonial_6'), 
	  'update.php', {
	  okButton: true, 
	  cancelButton: true,
	  textBetweenControls: ' | ',
	  textBeforeControls: ' ',
	  ajaxOptions: {method: 'get'}
});
          </script>
                </tr>
              </table>
              <br></div>
              <div align="center"><br>
                <img src="images/smallbusinesswebsites.jpg" alt="small business websites, free websites for small businesses" width="624" height="8"><br>
                </div>
              <table width="399" border="0" cellspacing="0" cellpadding="7">
              <tr>
                <td width="34" valign="middle"><div align="left"><img src="images/website_photos.png" alt="photos" width="24" height="26" border="0"> </div></td>
                <td width="365" valign="middle"><div align="left" class="style4"><b>Image Gallery / Portfolio Page</b></div></td>
              </tr>
            </table>
            <br>
            <table width="670" cellpadding="7">
              <tr>
                <td width="396" class="style5">Would you like to use your free gallery?</td>
                <td width="236" bgcolor="#DCE4F1"><div id="use_gallery">
                  <div align="center">
                    <?php if($result['use_gallery']) echo "Yes"; else echo "No"; ?>
                    </div>
                </div></td>
                <script>
new Ajax.InPlaceCollectionEditor(
  'use_gallery', 
  'update.php', {
  okButton: true, 
  cancelButton: true,
  textBetweenControls: ' | ',
  textBeforeControls: ' ',
  collection: [['Yes','Yes'],['No','No']],
  ajaxOptions: {method: 'get'},
  onComplete: function(resp,ele)
		  {
			if(resp.responseText.stripTags() == 'Yes' ){
				Effect.SlideDown('use_gallery_content');
			}else{
				Effect.SlideUp('use_gallery_content');
			}
		  }	 
});
          </script>
              </tr>
            </table>
            <div id="use_gallery_content" style="padding-left: 10px;<?php echo ((!$result['use_gallery'])?'display:none;':'')?>"><br>
              <table width="463" border="0" align="center" cellpadding="7">
                <tr>
                  <td height="27" valign="middle" class="edittext1">&nbsp;</td>
                  <td valign="middle" class="edittext1">&nbsp;</td>
                  <td valign="middle" bgcolor="#FFFFFF"><div align="left" class="style7">&nbsp;<strong>&nbsp;Max Image Size:</strong> 3mb each </div></td>
                </tr>
                <tr>
                  <td valign="middle" class="edittext1">&nbsp;</td>
                  <td valign="middle" class="edittext1">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <tr>
                  <td width="28" valign="middle" class="edittext1"><div align="left"><img src="images/website_photos.png" alt="photos" width="24" height="26" border="0"></div></td>
                  <td width="27" valign="middle" class="style5"> <div align="left">1:</div></td>
                  <td width="358" bgcolor="#ffff99"><div id="image_1">
                    <font size="2">
                    <?php if (empty($result['gallery_1'])) echo "&nbsp;"; else echo $result['gallery_1']; ?>
                    </font></div></td>
                  <script>


                  
 function ajaxUploadGallery(a){
 
 }
 /*
var aim1 = new AIM($("image_1"), {onComplete :completeCallback_1});
 
	function completeCallback_1(response) 
	{
			//alert("completeCallback_1");
			$("gal_loading_image").remove();
			$("image_"+ind).innerHTML = response;
			$("image_"+ind).show();
	}
	 
			
	new Ajax.InPlaceEditor($('image_1'), 
		  'upload.php', {
		  onSubmit: function()
		  {
			aim1.submit()
			$('image_'+ind).hide();
			var loading_object;
			loading_object = $(document.createElement('img'));
			loading_object.id = "loading_image1";
		    loading_object.src = "images/ajax-loader.gif";
			$('image_'+ind).parentNode.insertBefore(loading_object, $('image_1'));
		  },
		  onComplete: function()
		  {
			$("loading_image1").hide();
		  },
		  inputeType: 'file',
		  iframeTarget: aim1.getFrameID(),
		  paramName: 'gallery_1',
		  okText: 'upload',
		  okButton: true, 
		  cancelButton: true,
		  textBetweenControls: ' | ',
		  textBeforeControls: ' ',
		  ajaxOptions: {method: 'get'}
	});
			
			*/
 
 
          </script>
                </tr>
                <tr>
                  <td valign="middle" class="edittext1"><div align="left"><img src="images/website_photos.png" alt="photos" width="24" height="26" border="0"></div></td>
                  <td valign="middle" class="style5"> <div align="left">2:</div></td>
                  <td bgcolor="#ffff99"><div id="image_2">
                    <font size="2">
                    <?php if (empty($result['gallery_2'])) echo "&nbsp;"; else echo $result['gallery_2']; ?>
                    </font></div></td>
                    
                  <script type="text/javascript">
                  /*
new Ajax.InPlaceEditor($('image_2'), 
	  'update.php', {
	  inputeType: 'file',
	  okText: 'upload',
	  okButton: true, 
	  cancelButton: true,
	  textBetweenControls: ' | ',
	  textBeforeControls: ' ',
	  ajaxOptions: {method: 'get'}
});*/
                  ajaxUploadGallery(2);
                  
          </script>
                </tr>
                <tr>
                  <td valign="middle" class="edittext1"><div align="left"><img src="images/website_photos.png" alt="photos" width="24" height="26" border="0"></div></td>
                  <td valign="middle" class="style5"> <div align="left">3:</div></td>
                  <td bgcolor="#ffff99"><div id="image_3">
                    <font size="2">
                    <?php if (empty($result['gallery_3'])) echo "&nbsp;"; else echo $result['gallery_3']; ?>
                    </font></div></td>
                  <script>
                  /*
new Ajax.InPlaceEditor($('image_3'), 
	  'update.php', {
	  inputeType: 'file',
	  okText: 'upload',
	  okButton: true, 
	  cancelButton: true,
	  textBetweenControls: ' | ',
	  textBeforeControls: ' ',
	  ajaxOptions: {method: 'get'}
});
                  */
                  ajaxUploadGallery(3);
          </script>
                </tr>
                <tr>
                  <td valign="middle" class="edittext1"><div align="left"><img src="images/website_photos.png" alt="photos" width="24" height="26" border="0"></div></td>
                  <td valign="middle" class="style5"> <div align="left">4:</div></td>
                  <td bgcolor="#ffff99"><div id="image_4">
                    <font size="2">
                    <?php if (empty($result['gallery_4'])) echo "&nbsp;"; else echo $result['gallery_4']; ?>
                    </font></div></td>
                  <script>
                  /*
new Ajax.InPlaceEditor($('image_4'), 
	  'update.php', {
	  inputeType: 'file',
	  okText: 'upload',
	  okButton: true, 
	  cancelButton: true,
	  textBetweenControls: ' | ',
	  textBeforeControls: ' ',
	  ajaxOptions: {method: 'get'}
});*/
                  ajaxUploadGallery(4);
          </script>
                </tr>
                <tr>
                  <td valign="middle" class="edittext1"><div align="left"><img src="images/website_photos.png" alt="photos" width="24" height="26" border="0"></div></td>
                  <td valign="middle" class="style5"> <div align="left">5:</div></td>
                  <td bgcolor="#ffff99"><div id="image_5">
                    <font size="2">
                    <?php if (empty($result['gallery_5'])) echo "&nbsp;"; else echo $result['gallery_5']; ?>
                    </font></div></td>
                  <script>
                  /*
new Ajax.InPlaceEditor($('image_5'), 
	  'update.php', {
	  inputeType: 'file',
	  okText: 'upload',
	  okButton: true, 
	  cancelButton: true,
	  textBetweenControls: ' | ',
	  textBeforeControls: ' ',
	  ajaxOptions: {method: 'get'}
});*/
                  ajaxUploadGallery(5);
          </script>
                </tr>
                <tr>
                  <td valign="middle" class="edittext1"><div align="left"><img src="images/website_photos.png" alt="photos" width="24" height="26" border="0"></div></td>
                  <td valign="middle" class="style5"> <div align="left">6:</div></td>
                  <td bgcolor="#ffff99"><div id="image_6">
                    <font size="2">
                    <?php if (empty($result['gallery_6'])) echo "&nbsp;"; else echo $result['gallery_6']; ?>
                    </font></div></td>
                  <script>
                  /*
new Ajax.InPlaceEditor($('image_6'), 
	  'update.php', {
	  inputeType: 'file',

	  okText: 'upload',
	  okButton: true, 
	  cancelButton: true,
	  textBetweenControls: ' | ',
	  textBeforeControls: ' ',
	  ajaxOptions: {method: 'get'}
});
                  */
                  ajaxUploadGallery(6);
          </script>
                </tr>
                <tr>
                  <td valign="middle" class="edittext1"><div align="left"><img src="images/website_photos.png" alt="photos" width="24" height="26" border="0"></div></td>
                  <td valign="middle" class="style5"> <div align="left">7:</div></td>
                  <td bgcolor="#ffff99"><div id="image_7">
                    <font size="2">
                    <?php if (empty($result['gallery_7'])) echo "&nbsp;"; else echo $result['gallery_7']; ?>
                    </font></div></td>
                  <script>
                  /*
new Ajax.InPlaceEditor($('image_7'), 
	  'update.php', {
	  inputeType: 'file',
	  okText: 'upload',
	  okButton: true, 
	  cancelButton: true,
	  textBetweenControls: ' | ',
	  textBeforeControls: ' ',
	  ajaxOptions: {method: 'get'}
});*/
                  ajaxUploadGallery(7);
          </script>
                </tr>
                <tr>
                  <td valign="middle" class="edittext1"><div align="left"><img src="images/website_photos.png" alt="photos" width="24" height="26" border="0"></div></td>
                  <td valign="middle" class="style5"> <div align="left">8:</div></td>
                  <td bgcolor="#ffff99"><div id="image_8">
                    <font size="2">
                    <?php if (empty($result['gallery_8'])) echo "&nbsp;"; else echo $result['gallery_8']; ?>
                    </font></div></td>
                  <script>
                  /*
new Ajax.InPlaceEditor($('image_8'), 
	  'update.php', {
	  inputeType: 'file',
	  okText: 'upload',
	  okButton: true, 
	  cancelButton: true,
	  textBetweenControls: ' | ',
	  textBeforeControls: ' ',
	  ajaxOptions: {method: 'get'}
});
                  */
ajaxUploadGallery(8);
          </script>
                </tr>
                <tr>
                  <td valign="middle" class="edittext1"><div align="left"><img src="images/website_photos.png" alt="photos" width="24" height="26" border="0"></div></td>
                  <td valign="middle" class="style5"> <div align="left">9:</div></td>
                  <td bgcolor="#ffff99"><div id="image_9">
                    <font size="2">
                    <?php if (empty($result['gallery_9'])) echo "&nbsp;"; else echo $result['gallery_9']; ?>
                    </font></div></td>
                  <script>
                  /*
new Ajax.InPlaceEditor($('image_9'), 
	  'update.php', {
	  inputeType: 'file',
	  okText: 'upload',
	  okButton: true, 
	  cancelButton: true,
	  textBetweenControls: ' | ',
	  textBeforeControls: ' ',
	  ajaxOptions: {method: 'get'}
});
                  */
                  ajaxUploadGallery(9);
          </script>
                </tr>
                <tr>
                  <td valign="middle" class="edittext1"><div align="left"><img src="images/website_photos.png" alt="photos" width="24" height="26" border="0"></div></td>
                  <td valign="middle" class="style5"> <div align="left">10:</div></td>
                  <td bgcolor="#ffff99"><div id="image_10">
                    <font size="2">
                    <?php if (empty($result['gallery_10'])) echo "&nbsp;"; else echo $result['gallery_10']; ?>
                    </font></div></td>
                  <script>
                  /*
new Ajax.InPlaceEditor($('image_10'), 
	  'update.php', {
	  inputeType: 'file',
	  okText: 'upload',
	  okButton: true, 
	  cancelButton: true,
	  textBetweenControls: ' | ',
	  textBeforeControls: ' ',
	  ajaxOptions: {method: 'get'}
});
*/
ajaxUploadGallery(10);
          </script>
                </tr>
              </table>
            </div>
            <h4 align="center"><b><img src="images/smallbusinesswebsites.jpg" alt="small business websites, free websites for small businesses" width="624" height="8"></b></h4>
            <table width="399" border="0" cellspacing="0" cellpadding="7">
              <tr>
                <td width="34" valign="middle"><div align="left"><img src="images/faq.png" alt="frequently asked questions" width="24" height="26" border="0"> </div></td>
                <td width="365" valign="middle"><div align="left" class="style4"><b>F.A.Q. Page </b></div></td>
              </tr>
            </table>
            <table width="670" cellpadding="7">
              <tr>
                <td width="397" class="style5">Would you like to add a F.A.Q. page?</td>
                <td width="235" bgcolor="#DCE4F1">
                <div id="use_faq">
                  <div align="center">
                    <?php if($result['use_faq']) echo "Yes"; else echo "No"; ?>
                    </div>
                </div></td>
                <script>
					new Ajax.InPlaceCollectionEditor(
					  'use_faq', 
					  'update.php', {
					  okButton: true, 
					  cancelButton: true,
					  textBetweenControls: ' | ',
					  textBeforeControls: ' ',
					  collection: [['Yes','Yes'],['No','No']],
					  ajaxOptions: {method: 'get'},
					onComplete: function(resp,ele)
							  {
								if(resp.responseText.stripTags() == 'Yes' ){
									Effect.SlideDown('use_faq_content');
								}else{
									Effect.SlideUp('use_faq_content');
								}
							  }	 
					});
          </script>
              </tr>
            </table>
             	
            <div id="use_faq_content" align="center" style="<?php echo ((!$result['use_faq'])?'display:none;':'')?>"><br>
					<form action="update.php" name="update_faq" method="post">
				<?php 
					 
					$ttl_faqs  = mysql_num_rows($sub_query);
					 
					$ttl_faqs += 1;
					
					 
					
					for($i=1;$i<=$ttl_faqs;$i++){
						$faq_result = mysql_fetch_assoc($sub_query);
						//$faq_result = mysql_data_seek($result, $i)
						if(isset($faq_result['id'])){
							$fa_id = $faq_result['id'];
							$fa_ques = $faq_result['q'];
							$fa_ans = $faq_result['a'];
						}else{
							$fa_id = $i;
							$fa_ques = '';
							$fa_ans = '';
							
						}
						$j = $i-1;
						 
				?>
				<div class="faq_data" id="faq_repeat_<?php echo $j?>">
					<div align="left"><em><br> 
					  What time do yasdou open on Saturdays?<br>
					  We open at 11:00 am on Saturdays.
					  </em><br>
					  <br>
					</div>
					<table cellpadding="7">
					  <tbody>
					  <tr>
						<td valign="middle" class="text"><div align="left">Question:</div></td>
								<td><input type="text" size="50" class="formfield" name="question[<?php echo $fa_id?>]" value="<?php echo $fa_ques;?>"></td>
								<td rowspan="2"><button onclick="respondToClick(this)"  id="remove_button_faq_<?php echo $j?>">Remove this Q/A</button></td>
						  </tr>
					  <tr>
						<td valign="middle" class="text"><div align="left">Answer:</div></td>
								<td><input size="50" class="formfield" name="answer[<?php echo $fa_id;?>]" value="<?php echo $fa_ans?>"></td>
						  </tr>
					  </tbody>
					  </table>
			  	</div>
			  	
			  	  
			  	<?php } 
			  		
			  	?>
			  	<div align="center">
			  		<button id="add_button_faq">Add Another Q / A</button>
			  		
			  			<input type="hidden" name="editorId" value="ins_faq">
			  			<input type="submit" value="Save" />
			  		
			  	</div>
			  	</form>
			  	<script type="text/javascript">
			  		//var rmv_buttons = [];
			  			 
			  		
					new Ramil_Webforms($('faq_repeat_<?php echo $j?>'), 
					 {
					  removeButton: 'remove_button_faq', 
					  addButton: "add_button_faq",
					  parentDataName:'faq_repeat',
					  cls_name: 'faq_data'
					   
					});
				 
					
				 


				function respondToClick(ele){
					var parent = ele.up('div.faq_data');
			        	if (parent) parent.remove();
				}
				
			 
					 
				</script>
			  	
			
    <?php
   	/*
	if ($sub_query)
	{
		echo "<div style=\"padding-center: 7px\">
				<table width=\"70%\" border=\"0\">
					<tr>
						<td><font color=\"#5F5F5F\"><b>Questions:</b></font></td>
						<td><b>Answers:</b></td>
					</tr>";
		
		//while($faq_result = mysql_fetch_array($sub_query))
		$faq_result = array();
		$faq_result['id'] = 1234;
		$faq_result['q'] = 'sdfasdf';
		$faq_result['a'] = 'sdfasdf';
		$faq_result_arr = array($faq_result);
		foreach($faq_result_arr as $faq_result)
		{
			echo "<tr>
					<td width=\"60%\"><div id=\"q_".$faq_result['id']."\">";
					if (empty($faq_result['q'])) 
						echo "<tr><font color=\"#00CC33\"></tr>"; 
					else 
						echo $faq_result['q'];
					echo "</div></td>
					<td><div id=\"a_".$faq_result['id']."\">";
					if (empty($faq_result['a'])) 
						echo "<font color=\"#00CC33\">* Click Here to Add New Q & A"; 
					else 
						echo $faq_result['a'];
					echo "</div></td> 
							<script>
							new Ajax.InPlaceEditor($('q_".$faq_result['id']."'), 
									  'update.php', {
									  okButton: true, 
									  cancelButton: true,
									  textBetweenControls: ' | ',
									  textBeforeControls: ' ',
									  ajaxOptions: {method: 'get'}
							});
							new Ajax.InPlaceEditor($('a_".$faq_result['id']."'), 
									  'update.php', {
									  okButton: true, 
									  cancelButton: true,
									  textBetweenControls: ' | ',
									  textBeforeControls: ' ',
									  ajaxOptions: {method: 'get'}
							});
							</script>
				</tr>";
		}
		
		echo "	</table>
			</div>";
	}
	*/
?>
                <br>
              <br>
             </div><br>
			 <div align="center"><img src="images/smallbusinesswebsites.jpg" alt="small business websites, free websites for small businesses" width="624" height="8"><br>
			    <br>
			    </div>
			 <table width="399" border="0" cellspacing="0" cellpadding="7">
              <tr>
                <td width="34" valign="middle"><div align="left"><img src="images/contactus.png" alt="contact us" width="24" height="26" border="0"> </div></td>
                <td width="365" valign="middle"><div align="left" class="style4"><b>Contact Us  Page </b></div></td>
              </tr>
            </table>
            <table width="668" cellpadding="7">
              <tr>
                <td width="396" class="style5">Would you like to add a Contact Us page?</td>
                <td width="236" bgcolor="#DCE4F1"><div id="use_contact_us">
                  <div align="center">
                    <?php if($result['use_conact_us']) echo "Yes"; else echo "No"; ?>
                    </div>
                </div></td>
                <script>
new Ajax.InPlaceCollectionEditor(
  'use_contact_us', 
  'update.php', {
  okButton: true, 
  cancelButton: true,
  textBetweenControls: ' | ',
  textBeforeControls: ' ',
  collection: [['Yes','Yes'],['No','No']],
  ajaxOptions: {method: 'get'},
onComplete: function(resp,ele)
		  {
			if(resp.responseText.stripTags() == 'Yes' ){
				Effect.SlideDown('use_contactus_content');
			}else{
				Effect.SlideUp('use_contactus_content');
			}
		  }	 

});
          </script>
              </tr>
            </table>
            <br>
            <div id="use_contactus_content" style="padding-left: 10px;<?php echo ((!$result['use_conact_us'])?'display:none;':'')?>" ><br>
              <table width="585" height="277" border="0" align="center" cellpadding="7">
                <tr>
                  <td width="298" height="40" class="style5">Contact Us text that will be shown at the top of your contact form:</td>
                  <td width="253" bgcolor="#ffff99">
					<div id="contact_us_text"><?php if (empty($result['contact_us_text'])) echo "&nbsp;"; else echo $result['contact_us_text']; ?></div></td>
                  <script>
new Ajax.InPlaceEditor($('contact_us_text'), 
	  'update.php', {
	  rows: 5,
	  okButton: true, 
	  cancelButton: true,
	  textBetweenControls: ' | ',
	  textBeforeControls: ' ',
	  ajaxOptions: {method: 'get'}
});
          </script>
                </tr>
                <tr>
                  <td class="style5">Email address to receive messages:</td>
                  <td bgcolor="#ffff99">
					<div id="contact_us_email"><?php if (empty($result['contact_us_email'])) echo "&nbsp;"; else echo $result['contact_us_email']; ?></div></td>
                  <script>
new Ajax.InPlaceEditor($('contact_us_email'), 
	  'update.php', {
	  okButton: true, 
	  cancelButton: true,
	  textBetweenControls: ' | ',
	  textBeforeControls: ' ',
	  ajaxOptions: {method: 'get'}
});
          </script>
                <tr>
                <tr>
                  <td class="style5">Add a field to collect user's first & last name?</td>
                  <td bgcolor="#ffff99"><div id="contact_us_use_names">
                    <?php if($result['contact_us_use_names']) echo "Yes"; else echo "No"; ?>
                  </div></td>
                  <script>
new Ajax.InPlaceCollectionEditor(
  'contact_us_use_names', 
  'update.php', {
  okButton: true, 
  cancelButton: true,
  textBetweenControls: ' | ',
  textBeforeControls: ' ',
  collection: [['Yes','Yes'],['No','No']],
  ajaxOptions: {method: 'get'} //override so we can use a static for the result
});
          </script>
                </tr>
                <tr>
                  <td class="style5">Add a field to collect user's address?</td>
                  <td bgcolor="#ffff99"><div id="contact_us_use_address">
                    <?php if($result['contact_us_use_address']) echo "Yes"; else echo "No"; ?>
                  </div></td>
                  <script>
new Ajax.InPlaceCollectionEditor(
  'contact_us_use_address', 
  'update.php', {
  okButton: true, 
  cancelButton: true,
  textBetweenControls: ' | ',
  textBeforeControls: ' ',
  collection: [['Yes','Yes'],['No','No']],
  ajaxOptions: {method: 'get'} 
});
          </script>
                </tr> 
                <tr>
                  <td class="style5">Add a field to collect user's phone #?</td>
                  <td bgcolor="#ffff99"><div id="contact_us_use_phone">
                    <?php if($result['contact_us_use_phone']) echo "Yes"; else echo "No"; ?>
                  </div></td>
                  <script>
new Ajax.InPlaceCollectionEditor(
  'contact_us_use_phone', 
  'update.php', {
  okButton: true, 
  cancelButton: true,
  textBetweenControls: ' | ',
  textBeforeControls: ' ',
  collection: [['Yes','Yes'],['No','No']],
  ajaxOptions: {method: 'get'} //override so we can use a static for the result
});
          </script>
                </tr>
                <tr>
                  <td class="style5">Add a field to collect user's email address?</td>
                  <td bgcolor="#ffff99"><div id="contact_us_use_email">
                    <?php if($result['contact_us_use_email']) echo "Yes"; else echo "No"; ?>
                  </div></td>
                  <script>
new Ajax.InPlaceCollectionEditor(
  'contact_us_use_email', 
  'update.php', {
  okButton: true, 
  cancelButton: true,
  textBetweenControls: ' | ',
  textBeforeControls: ' ',
  collection: [['Yes','Yes'],['No','No']],
  ajaxOptions: {method: 'get'} //override so we can use a static for the result
});
          </script>
                </tr>
                <tr>
                  <td class="style5">Add "How did you learn  about us?" field?</td>
                  <td bgcolor="#ffff99"><div id="contact_us_use_how_learn">
                    <?php if($result['contact_us_use_how_learn']) echo "Yes"; else echo "No"; ?>
                  </div></td>
                  <script>
new Ajax.InPlaceCollectionEditor(
  'contact_us_use_how_learn', 
  'update.php', {
  okButton: true, 
  cancelButton: true,
  textBetweenControls: ' | ',
  textBeforeControls: ' ',
  collection: [['Yes','Yes'],['No','No']],
  ajaxOptions: {method: 'get'} //override so we can use a static for the result
});
          </script>
                </tr>
              </table>
            </div>
            <h4><b><img src="images/smallbusinesswebsites.jpg" alt="small business websites, free websites for small businesses" width="624" height="8"></b><br>
            </h4>
            <div align="center" class="style4">
              <div align="left">
                <table width="560" border="0" cellspacing="0" cellpadding="7">
                  <tr>
                    <td width="33" valign="middle"><div align="left"><img src="images/check.png" alt="Saved!" width="24" height="26" border="0"> </div></td>
                    <td width="499" valign="middle"><div align="left" class="style4"><b>Your Changes Are Saved The Instant They Are Applied! </b></div></td>
                  </tr>
                </table>
              </div>
            </div>
              <div align="center">
              </div>
              <div style="padding-left: 10px"><br>
            </div>
          </div>
        </div></td>
      </tr>
    </table></td>
    <td width="161" valign="top" bgcolor="#F2F2F2"><p align="center">&nbsp;</p>
      <table width="135" border="0" align="center" cellpadding="4" cellspacing="0">
      <tr>
        <td width="127"><div align="left">
          <p align="left" class="style5"><a href="#" class="style2"></a><font size="2"><strong>* Your changes are saved the instant they are applied!</strong></font></p>
          <p class="style5"><font size="2">Edit any item in your site simply by clicking on the  box next to it and make your changes.</font></p>
          <p class="style5"><font size="2"><strong>To disable any page</strong> at any time, click on the "no" button next to the question asking if you'd like to add it. <font size="1"><em>(About Us, Testimonials, etc.)</em></font>. </font></p>
          <p class="style5"><font size="2">If you disable a page, it will instantly be taken off of your site, as well as the link to it displayed in your navigation menu.</font></p>
          <p class="style5"><font size="2"> <strong>To re-activate it</strong>, simply click on the "yes" button and your page (and the navigation link) will immediately be right back on your site. </font> </p>
        </div></td>
      </tr>
    </table></td>
    <td width="8" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  
  <tr>
    <td height="34" colspan="3" bgcolor="#232323"><div align="center"></div></td>
  </tr>
</table>
</body>
</html>