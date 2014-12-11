<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript"><!--
site_url="{$site_root}";
--></script>
<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/sendform.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>{$company_name} | Contact Us</title>

<body bgcolor="#333333" background="images/background.jpg" link="#009933" vlink="#009933" alink="#009933">
</head><br>
<table width="1004" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="11" colspan="3" valign="bottom"><img src="images/freewebsitemaker.png" width="1004" height="20" alt="free websites, website maker" /></td>
  </tr>
  <tr>
    <td height="50" colspan="2" valign="top" bgcolor="#FFFFFF"><div align="left">
        <table width="796" height="52" border="0" align="center" cellpadding="11" cellspacing="0">
          <tr>
            <td width="796" valign="middle"><div align="left">
                <p><strong><font color="#0099FF" size="6"><a href="index.html"><font face="Century Gothic"><img src="{$logo}" alt="{$company_name}" width="240" border="0" /></font></a></font></strong></p>
            </div></td>
          </tr>
        </table>
    </div></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td height="37" background="images/freewebsites2.jpg">&nbsp;</td>
    <td background="images/freewebsites2.jpg">&nbsp;</td>
    <td valign="middle" background="images/freewebsites2.jpg"><div align="center"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif">{$about_us_phone}</font></div></td>
  </tr>
  <tr>
    <td height="37" colspan="3"><img src="images/websitebuilder2.jpg" alt=" " width="1004" height="198" border="0" /></td>
  </tr>
  
  <tr>
    <td width="179" valign="top" bgcolor="#EBEBEB"><br>
      <table width="82%" border="0" align="center" cellpadding="11" cellspacing="0">
        <tr>
          <td valign="top"><div align="left"><font face="trebuchet MS"><font size="2" face="trebuchet MS">{section name=outer loop=$Menu} <a href="{$Menu[outer][1]}" title="{$Menu[outer][0]}">{$Menu[outer][0]}</a><br>
                  <br>
            {sectionelse}
            none
            {/section}</font></div></td>
        </tr>
      </table></td>
    <td width="650" valign="top" bgcolor="#FFFFFF"><table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="22" valign="top"><div align="left"></div></td>
        <td width="628" valign="top"><div align="center"><br>
          <table width="542" border="0" cellspacing="0" cellpadding="20">
            <tr>
              <td valign="top" bgcolor="#EBEBEB"><div align="left"><div id="center">
			<div align="left"><b><font color="#333333" size="4" face="Century Gothic"> <font color="#009933" face="trebuchet MS">Contact Us </font></font></b></div>
			<font color="#333333" size="2" face="trebuchet MS"><br />
			{*contact_us text*}
			{if !empty($contact_us_text)}			</font>
			<div class="article_wrapper">
				<h2><font color="#333333" size="2" face="trebuchet MS">{$contact_us_text}</font></h2>
				</div>
			<font color="#333333" size="2" face="trebuchet MS">{/if}
			
			{*email*}
			{if !empty($contact_us_email)} {/if} </font>
			<div id="ajax-loader" style="display: none">
				<font color="#333333" size="2" face="trebuchet MS"><img src="images/ajax-loader.gif">			    </font></div>
			<font color="#333333" size="2" face="trebuchet MS">{*show form to contact*}			</font>
			<div class="article_wrapper" id="contact_form"> <font color="#009933" size="3" face="trebuchet MS"><strong>Please fill out the short form below and we will respond to you promptly.</strong></font> <br>
			<form>
			  <table align="center">
			    <tr>
			      <td width="180" valign="top">
			        <p><font size="2" face="trebuchet MS"><strong>Message:</strong></font></p>							</td>
							  <td width="208">
							    <input type="hidden" id="to" name="to" value="{$contact_us_email}">
							    <textarea id="message" name="message" rows="6" cols="30"></textarea>							</td>
						  </tr>
			    {*name*}
			    {if !empty($contact_us_use_names)}
			    <tr>
			      <td>
			        <p align="left"><font face="trebuchet MS"><strong><font size="2">Your name:</font></strong></font></p>							</td>
							  <td>
							    <input type="text" id="name" name="name" />							</td>
						  </tr>
			    {else}
				  <input type="hidden" id="name" name="name" value="" />
			    {/if}
			    
			    {*address*}
			    {if !empty($contact_us_use_address)}
			    <tr>
			      <td>
			        <p align="left"><font face="trebuchet MS"><strong><font size="2">Your address:</font></strong></font></p>							</td>
							  <td>
							    <input type="text" id="address" name="address">							</td>
						  </tr>
			    {else}
				  <input type="hidden" id="address" name="address" value="" />

			    {/if}
			    
			    {*phone*}
			    {if !empty($contact_us_use_phone)}
			    <tr>
			      <td>
			        <p align="left"><font face="trebuchet MS"><strong><font size="2">Your phone number:</font></strong></font></p>							</td>
							  <td>
							    <input type="text" id="phone" name="phone">							</td>
						  </tr>
			    {else}
				  <input type="hidden" id="phone" name="phone" value="" />

			    {/if}
			    
			    {*email*}
			    {if !empty($contact_us_use_email)}
			    <tr>
			      <td>
			        <p align="left"><font face="trebuchet MS"><strong><font size="2">Your email:</font></strong></font></p>							</td>
							  <td>
							    <input type="text" id="email" name="email">							</td>
						  </tr>
			    {else}
				  <input type="hidden" id="email" name="email" value="" />

			    {/if}
			    
			    {*how learn*}
			    {if !empty($contact_us_use_how_learn)}
			    <tr>
			      <td>
			        <p align="left"><font face="trebuchet MS"><strong><font size="2">How did you learn about us?</font></strong></font></p>							</td>
							  <td>
							    <input type="text" id="how_learn" name="how_learn">							</td>
						  </tr>
			    {else}
				  <input type="hidden" id="how_learn" name="how_learn" value="" />

			    {/if}
			    
			    <tr>
			      <td align="center" colspan="2">
			        <input type="submit" value="Send" onclick="return sendForm(this)">							</td>
						  </tr>
			    </table>
				  </form>
			  </div></div>
              </div></td>
              </tr>
          </table>
          
          
          </div></td>
      </tr>
      <tr>
        <td height="19" valign="top"><p align="left">&nbsp;</p>          </td>
        <td valign="top">&nbsp;</td>
      </tr>
    </table></td>
    <td width="175" valign="top" bgcolor="#EBEBEB"><div align="center">
      <table width="87%" border="0" align="center" cellpadding="11" cellspacing="0">
        <tr>
          <td valign="top"><div align="left">
              <p align="left"><font color="#666666" size="2" face="trebuchet MS"><strong><font color="#009933"><br />
                Contact Us:</font></strong><br />
                {$about_us_address}<br />
                {$about_us_city} {$about_us_state}&nbsp; {$about_us_zip}<br />
                <br />
                <strong><font color="#009933">Hours:</font><br />
                  </strong>{$about_us_hours}</font><font face="trebuchet MS"><br />
                    <br />
                    <font color="#666666" size="2"><strong><font color="#009933">Call Us:<br />
                    </font></strong> {$about_us_phone}</font></font></p>
            <p> {if ($facebook_link)}<a href="{$facebook_link}"><img src="images/facebook.png" alt="Facebook Us!" border="0" /></a>&nbsp;{/if}
              {if ($twitter_link)}<a href="{$twitter_link}"><img src="images/twitter.png" alt="Follow Us!" border="0" /></a>&nbsp;{/if}
              {if ($linkedin_link)}<a href="{$linkedin_link}"><img src="images/linkedin.png" alt="LinkedIn" border="0" /></a>{/if}</p>
          </div></td>
        </tr>
      </table>
    </div></td>
  </tr>
  <tr>
    <td height="34" colspan="3" bgcolor="#666666">&nbsp;&nbsp;<font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">&copy;
        <script language="JavaScript" type="text/javascript">document.write((new Date()).getFullYear());</script>
{$company_name}. All rights reserved.</font></td>
  </tr>
  <tr>
    <td colspan="3"><div align="right">
      <div align="right">
        <div align="right">{if (isset($remove_branding))}{else}
          <div align="right">
            <div align="right"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif"><span class="style2">created with </span>YourDomain.com</font></div>
          </div>
          {/if} </div>
      </div>
    </div></td>
  </tr>
</table>
