<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="js/sendform.js"></script>
<script type="text/javascript" src="js/prototype.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>{$company_name} | Frequently Asked Questions</title>

<body bgcolor="#333333" background="images/backgd5.jpg" link="#1A5BB9" vlink="#1A5BB9" alink="#1A5BB9" topmargin="20">
</head><br>

<table width="1004" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="19" colspan="3" valign="top"><img src="images/header5.png" alt=" " width="1004" height="218" border="0" /></td>
  </tr>
  <tr>
    <td height="37" bgcolor="#0E4392">&nbsp;</td>
    <td colspan="2" valign="middle" bgcolor="#0E4392"><div align="right"><font color="#FFFFFF" size="4" face="Century Gothic">{$company_name}</font><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><strong>&nbsp;&nbsp;&nbsp;&nbsp;</strong></font></div></td>
  </tr>
  
  
  
  

  <tr>
    <td width="179" valign="top" bgcolor="#EBEBEB"><br>
      <table width="143" border="0" align="center" cellpadding="13" cellspacing="0">
        <tr>
          <td width="115" valign="top"><div align="center"><font face="trebuchet MS">&nbsp;&nbsp;&nbsp;&nbsp;
                    <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
            </font></div>
              <font face="trebuchet MS">
              <fb:like href="" layout="button_count" show_faces="false" width="30" font=""></fb:like>
              </font>
              <div align="left"><font face="trebuchet MS"><br />
                  <font color="#00CCCC" size="2" face="trebuchet MS"><font color="#333333" face="Century Gothic">{section name=outer loop=$Menu} <a href="{$Menu[outer][1]}" title="{$Menu[outer][0]}">{$Menu[outer][0]}</a><br />
                  <br />
                    {sectionelse}
                    none
                    {/section}</font></font></div></td>
        </tr>
      </table></td>
    <td width="650" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="10" cellspacing="0">
      <tr>
        <td width="577" valign="top" bgcolor="#FFFFFF"><div align="left"><b><font color="#333333" size="4" face="Century Gothic"> <font color="#009933" face="trebuchet MS">&nbsp;&nbsp;&nbsp;</font></font></b><font color="#333333" size="4" face="Century Gothic"><font color="#009933" face="trebuchet MS"><font color="#1A5BB9" face="Century Gothic">Frequently Asked Questions</font></font></font> </div></td>
      </tr>
      <tr>
        <td valign="top" bgcolor="#FFFFFF"><table width="603" border="0" align="center" cellpadding="30" cellspacing="0">
            <tr>
              <td width="543" valign="top" bgcolor="#F5F5F5"><div align="left">
                {section name=outer loop=$FAQ}			
				<div class="article_wrapper">					
				  <p><font color="#009933" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#1A5BB9" face="Century Gothic">Q. {$FAQ[outer][0]}</font></strong></font></p>
				  <p><font color="#666666" size="2" face="Century Gothic"><strong>A.</strong> {$FAQ[outer][1]}</font></p>
				</div>
				<br />
			{sectionelse}
				<font color="#666666" size="3" face="Arial, Helvetica, sans-serif">Coming Soon!</font>			{/section}
                </div></td>
            </tr>
          </table>
          <p>&nbsp;</p>          </td>
      </tr>
    </table></td>
    <td width="175" valign="top" bgcolor="#EBEBEB"><div align="center">
      <table width="87%" border="0" align="center" cellpadding="11" cellspacing="0">
        <tr>
          <td valign="top"><p><font color="#666666" size="2" face="trebuchet MS"> <font face="Century Gothic">{$about_us_address}<br />
            {$about_us_city} {$about_us_state}&nbsp; {$about_us_zip}<br />
            <strong><font color="#009933"><br />
              </font> <font color="#1A5BB9">{$about_us_hours}</font></strong></font></font><font face="Century Gothic"><br />
                <br />
                <font color="#209FF8" size="2"><strong>{$about_us_phone}</strong></font></font></p>
              <p> {if ($facebook_link)}<a href="{$facebook_link}"><img src="images/facebook.png" alt="Facebook Us!" border="0" /></a>&nbsp;{/if}
                {if ($twitter_link)}<a href="{$twitter_link}"><img src="images/twitter.png" alt="Follow Us!" border="0" /></a>&nbsp;{/if}
                {if ($linkedin_link)}<a href="{$linkedin_link}"><img src="images/linkedin.png" alt="LinkedIn" border="0" /></a>{/if}</p></td>
        </tr>
      </table>
    </div></td>
  </tr>
  <tr>
    <td height="36" colspan="3" bgcolor="#21A1F8">&nbsp;&nbsp;<font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">&copy;
        <script language="JavaScript" type="text/javascript">document.write((new Date()).getFullYear());</script>
{$company_name}. All rights reserved.</font></td>
  </tr>
   {if (isset($remove_branding))}{else}
  <tr>
    <td height="18" colspan="3"><div align="right">
      <div align="right"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif"><span class="style2">created with </span>YourDomain.com</font></div>
    </div></td>
  </tr>
  {/if}
</table>
