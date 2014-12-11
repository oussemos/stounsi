<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>{$company_name} - | Home</title>
<script type="text/javascript" language="javascript" src="lytebox.js"></script>
<link rel="stylesheet" href="lytebox.css" type="text/css" media="screen" />
</head>
<body bgcolor="#003366" link="#FFFFFF" vlink="#FFFFFF" alink="#FFFFFF" topmargin="20">
<table width="1004" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="19" colspan="3" valign="top"><img src="images/freewebsitemaker.png" width="1004" height="20" alt="free websites, website maker"></td>
  </tr>
  <tr>
    <td height="50" colspan="2" valign="top" bgcolor="#FFFFFF"><div align="left">
      <table width="775" height="52" border="0" align="center" cellpadding="11" cellspacing="0">
        <tr>
          <td width="753" valign="middle"><div align="left">
              <p><strong><font color="#0099FF" size="6"><a href="index.html"><font face="Century Gothic"><img src="{$logo}" alt="{$company_name}" width="220" border="0"></font></a></font></strong></p>
          </div></td>
        </tr>
      </table>
    </div></td>
    <td valign="bottom" bgcolor="#FFFFFF"><div align="center"><script type="text/javascript">addthis_pub  = '50dollarlogos';</script>
    <br>
        <a href="http://www.addthis.com/bookmark.php" onMouseOver="return addthis_open(this, '', '[URL]', '[TITLE]')" onMouseOut="addthis_close()" onClick="return addthis_sendto()"><img src="http://s9.addthis.com/button1-addthis.gif" width="125" height="16" border="0"/></a><br>
        <br>
        <script type="text/javascript" src="http://s7.addthis.com/js/152/addthis_widget.js"></script></div></td>
  </tr>
  
  <tr>
    <td height="38" colspan="3" align="right" valign="middle" bgcolor="#3399CC"><div align="right"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif">{$about_us_phone}</font>&nbsp;&nbsp;&nbsp;</div></td>
  </tr>
  <tr>
    <td width="179" height="358" valign="top" bgcolor="#336699">
      <table width="143" border="0" align="center" cellpadding="13" cellspacing="0">
        <tr>
          <td width="117" valign="top"><div align="center"><font face="trebuchet MS">&nbsp;&nbsp;&nbsp;&nbsp;
                <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
          </font></div>
            
            <font face="trebuchet MS">
            <fb:like href="" layout="button_count" show_faces="false" width="30" font=""></fb:like>
            </font>            <div align="left"><font face="trebuchet MS"><br>
                <font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><font size="3">{section name=outer loop=$Menu} <a href="{$Menu[outer][1]}" title="{$Menu[outer][0]}">{$Menu[outer][0]}</a><br>
                <br>
                {sectionelse}
                none
          {/section}</font></font></div></td>
        </tr>
    </table></td>
    <td width="650" valign="top" bgcolor="#FFFFFF"><div align="center">
      <table width="650" height="100%" border="0" cellpadding="15" cellspacing="15">
        
        <tr>
          <td width="545" height="328" colspan="2" valign="top" bgcolor="#EFEFEF"><div align="left"><font color="#666666" size="2" face="trebuchet MS">            <font color="#336699" size="5" face="Arial, Helvetica, sans-serif">{$company_name}</font><br>
            <br>
                  <font face="Arial, Helvetica, sans-serif">{$about_us_text}</font></font></div></td>
          </tr>
      </table>
    </div></td>
    <td width="175" valign="top" bgcolor="#EBEBEB"><table width="147" height="19" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="147" height="19" align="left" valign="top"><div align="left">
          <div align="left">
            <p><font color="#666666" size="2" face="trebuchet MS"><br>
              <font face="Arial, Helvetica, sans-serif">                {$about_us_address}<br>
              {$about_us_city} {$about_us_state}&nbsp; {$about_us_zip}<br>
              <br>
              {$about_us_hours}</font></font><font face="Arial, Helvetica, sans-serif"><br>
              <br>
                <font color="#666666" size="2">{$about_us_phone}</font></font></p>
            <p> {if ($facebook_link)}<a href="{$facebook_link}"><img src="images/facebook.png" alt="Facebook Us!" border="0" /></a>&nbsp;{/if}
              {if ($twitter_link)}<a href="{$twitter_link}"><img src="images/twitter.png" alt="Follow Us!" border="0" /></a>&nbsp;{/if}
              {if ($linkedin_link)}<a href="{$linkedin_link}"><img src="images/linkedin.png" alt="LinkedIn" border="0" /></a>{/if}</p>
          </div>
        </div></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="32" colspan="3" valign="middle" bgcolor="#3399CC"><span class="style3"><span class="style4">&nbsp;&nbsp;<font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">&copy;  
            <script language="JavaScript" type="text/javascript">document.write((new Date()).getFullYear());</script>
{$company_name}. All rights reserved.</font></span></span> </td>
  </tr>{if (isset($remove_branding))}{else}
  <tr>    <td height="28" colspan="3" valign="middle"><div align="right"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif"><span class="style2">created with </span>YourDomain.com</font></div></td>  
  </tr>{/if}
</table>


<map name="Map">
<area shape="rect" coords="3,3,31,28" href="#"><area shape="rect" coords="39,3,65,27" href="#">
</map>
</body></html>