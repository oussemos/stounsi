<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript" src="js/sendform.js"></script>
<script type="text/javascript" src="js/prototype.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>{$company_name} | Frequently Asked Questions</title>

<body bgcolor="#003366" link="#FFFFFF" vlink="#FFFFFF" alink="#FFFFFF">
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
                <p><strong><font color="#0099FF" size="6"><a href="index.html"><font face="Century Gothic"><img src="{$logo}" alt="{$company_name}" width="220" border="0" /></font></a></font></strong></p>
            </div></td>
          </tr>
        </table>
    </div></td>
    <td bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
  <tr>
    <td height="37" bgcolor="#3399CC">&nbsp;</td>
    <td bgcolor="#3399CC">&nbsp;</td>
    <td valign="middle" bgcolor="#3399CC"><div align="center"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif">{$about_us_phone}</font></div></td>
  </tr>
  
  <tr>
    <td width="179" valign="top" bgcolor="#336699"><br>
      <table width="143" border="0" align="center" cellpadding="13" cellspacing="0">
        <tr>
          <td width="117" valign="top"><div align="center"><font face="trebuchet MS">&nbsp;&nbsp;&nbsp;&nbsp;
                  <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
            </font></div>
              
            <font face="trebuchet MS">
              <fb:like href="" layout="button_count" show_faces="false" width="30" font=""></fb:like>
            </font>            <div align="left"><font face="trebuchet MS"><br />
                <font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif">{section name=outer loop=$Menu} <a href="{$Menu[outer][1]}" title="{$Menu[outer][0]}">{$Menu[outer][0]}</a><br />
                <br />
              {sectionelse}
              none
            {/section}</font></div></td>
        </tr>
    </table></td>
    <td width="650" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="10" cellspacing="0">
      <tr>
        <td width="577" valign="top" bgcolor="#FFFFFF"><div align="left"><b><font color="#333333" size="4" face="Century Gothic"> <font color="#009933" face="trebuchet MS">&nbsp;&nbsp;&nbsp;<font color="#336699" size="5" face="Arial, Helvetica, sans-serif">Frequently Asked Questions</font> </font></font></b></div></td>
      </tr>
      <tr>
        <td valign="top" bgcolor="#FFFFFF"><table width="603" border="0" align="center" cellpadding="30" cellspacing="0">
            <tr>
              <td width="543" valign="top" bgcolor="#F5F5F5"><div align="left">
                {section name=outer loop=$FAQ}			
				<div class="article_wrapper">					
				  <p><font color="#009933" size="2" face="Arial, Helvetica, sans-serif"><strong><font color="#3399CC" size="4">Q. {$FAQ[outer][0]}</font></strong></font></p>
				  <p><font color="#666666" size="4" face="Arial, Helvetica, sans-serif"><strong>A.</strong> {$FAQ[outer][1]}</font></p>
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
      <table width="147" height="19" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="147" height="19" align="left" valign="top"><div align="left">
              <div align="left">
                <p><font color="#666666" size="2" face="trebuchet MS"><br />
                      <font face="Arial, Helvetica, sans-serif"> {$about_us_address}<br />
                        {$about_us_city} {$about_us_state}&nbsp; {$about_us_zip}<br />
                        <br />
                        {$about_us_hours}</font></font><font face="Arial, Helvetica, sans-serif"><br />
                          <br />
                          <font color="#666666" size="2">{$about_us_phone}</font></font></p>
                <p> {if ($facebook_link)}<a href="{$facebook_link}"><img src="images/facebook.png" alt="Facebook Us!" border="0" /></a>&nbsp;{/if}
                  {if ($twitter_link)}<a href="{$twitter_link}"><img src="images/twitter.png" alt="Follow Us!" border="0" /></a>&nbsp;{/if}
                  {if ($linkedin_link)}<a href="{$linkedin_link}"><img src="images/linkedin.png" alt="LinkedIn" border="0" /></a>{/if}</p>
              </div>
          </div></td>
        </tr>
      </table>
    </div></td>
  </tr>
  <tr>
    <td height="36" colspan="3" bgcolor="#3399CC">&nbsp;&nbsp;<font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">&copy;
        <script language="JavaScript" type="text/javascript">document.write((new Date()).getFullYear());</script>
{$company_name}. All rights reserved.</font></td>
  </tr>
   {if (isset($remove_branding))}{else}
  <tr>
    <td height="18" colspan="3"><div align="right"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif"><span class="style2">created with </span>YourDomain.com</font></div></td>
  </tr>
  {/if}
   
</table>
