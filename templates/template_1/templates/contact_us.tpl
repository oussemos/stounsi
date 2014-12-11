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

<body bgcolor="#CCCCCC" link="#0099FF" vlink="#0099FF" alink="#0099FF">
</head><br>
<table width="1004" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="11" colspan="3" valign="bottom" bgcolor="#FFFFFF"><img src="images/freewebsitemaker.jpg" width="1004" height="11" alt="free websites, website maker" /></td>
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
    <td height="37" background="images/freewebsites.jpg" bgcolor="#0099FF">&nbsp;</td>
    <td background="images/freewebsites.jpg" bgcolor="#0099FF">&nbsp;</td>
    <td valign="middle" background="images/freewebsites.jpg" bgcolor="#0099FF"><div align="center"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif">{$about_us_phone}</font></div></td>
  </tr>
  
  <tr>
    <td width="179" valign="top" bgcolor="#EBEBEB"><br>
      <table width="82%" border="0" align="center" cellpadding="11" cellspacing="0">
        <tr>
          <td valign="top"><div align="left"><font color="#00CCCC" size="2" face="Century Gothic">{section name=outer loop=$Menu} <a href="{$Menu[outer][1]}" title="{$Menu[outer][0]}">{$Menu[outer][0]}</a><br>
                  <br>
            {sectionelse}
            none
            {/section}</div></td>
        </tr>
      </table></td>
    <td width="650" valign="top" bgcolor="#FFFFFF"><table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="22" valign="top"><div align="left"></div></td>
        <td width="628" valign="top"><div align="center"><br>
          <table width="542" border="0" cellspacing="0" cellpadding="20">
            <tr>
              <td valign="top" bgcolor="#EBEBEB"><div align="left"><div id="center">
			<font color="#333333" size="2" face="Arial, Helvetica, sans-serif">{*contact_us text*}
			{if !empty($contact_us_text)}			</font>
			<div class="article_wrapper">
				<h2><font color="#333333" size="2" face="Arial, Helvetica, sans-serif">{$contact_us_text}</font></h2>
				</div>
			<font color="#333333" size="2" face="Arial, Helvetica, sans-serif">{/if}
			
			{*email*}
			{if !empty($contact_us_email)}			</font><font color="#333333" size="2" face="Arial, Helvetica, sans-serif">{/if}			</font>
			<div id="ajax-loader" style="display: none">
				<font color="#333333" size="2" face="Arial, Helvetica, sans-serif"><img src="images/ajax-loader.gif">			    </font></div>
			<font color="#333333" size="2" face="Arial, Helvetica, sans-serif">{*show form to contact*}			</font>
			<div class="article_wrapper" id="contact_form"> <font size="3" face="Arial, Helvetica, sans-serif"><strong>Please fill out the short form below and we will respond to you promptly.</strong></font> <br>
			<form>
			  <table align="center">
			    <tr>
			      <td width="180" valign="top">
			        <p><font size="2" face="Arial, Helvetica, sans-serif"><strong>Message:</strong></font></p>							</td>
							  <td width="208">
							    <input type="hidden" id="to" name="to" value="{$contact_us_email}">
							    <textarea id="message" name="message" rows="6" cols="30"></textarea>							</td>
						  </tr>
			    {*name*}
			    {if !empty($contact_us_use_names)}
			    <tr>
			      <td>
			        <p align="left"><strong><font size="2" face="Arial, Helvetica, sans-serif">Your name:</font></strong></p>							</td>
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
			        <p align="left"><strong><font size="2" face="Arial, Helvetica, sans-serif">Your address:</font></strong></p>							</td>
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
			        <p align="left"><strong><font size="2" face="Arial, Helvetica, sans-serif">Your phone number:</font></strong></p>							</td>
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
			        <p align="left"><strong><font size="2" face="Arial, Helvetica, sans-serif">Your email:</font></strong></p>							</td>
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
			        <p align="left"><strong><font size="2" face="Arial, Helvetica, sans-serif">How did you learn about us?</font></strong></p>							</td>
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
            <p><font color="#666666" size="2" face="Century Gothic"><br>
                <strong>{$testimonail_1}</strong></font></p>
            <p><font color="#666666" size="2" face="Century Gothic">{$testimonail_2}</font></p>
            <p><font color="#666666" size="2" face="Century Gothic"><strong>{$testimonail_3}</strong></font></p>
            <p><font color="#666666" size="2" face="Century Gothic">{$testimonail_4}</font></p>
            <p><font color="#666666" size="2" face="Century Gothic"><strong>{$testimonail_5}</strong></font></p>
            <p><font color="#666666" size="2" face="Century Gothic">{$testimonail_6}</font></p>
            <p>&nbsp;</p>
          </div></td>
        </tr>
      </table>
    </div></td>
  </tr>
  <tr>
    <td height="34" colspan="3" bgcolor="#333333">&nbsp;&nbsp;<font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">&copy;
        <script language="JavaScript" type="text/javascript">document.write((new Date()).getFullYear());</script>
{$company_name}. All rights reserved.</font></td>
  </tr>
  <tr>
    <td colspan="3" bgcolor="#CCCCCC"><div align="right">
      <div align="right">
        <div align="right"><font size="1" face="Arial, Helvetica, sans-serif"><span class="style2">created with <strong>yourdomain.com</strong></span></font></div>
      </div>
    </div></td>
  </tr>
</table>
