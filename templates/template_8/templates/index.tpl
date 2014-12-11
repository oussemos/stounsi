<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title>{$company_name} - | Home</title>
<script type="text/javascript" language="javascript" src="lytebox.js"></script>
<link rel="stylesheet" href="lytebox.css" type="text/css" media="screen" />
</head>
<body bgcolor="#333333" background="images/backgd4.jpg" link="#C55600" vlink="#C55600" alink="#C55600" topmargin="20">
<table width="1004" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="19" colspan="3" valign="top"><img src="images/header4.png" alt=" " width="1004" height="218" border="0"></td>
  </tr>
  <tr>
    <td height="37" bgcolor="#7D3602">&nbsp;</td>
    <td colspan="2" valign="middle" bgcolor="#7D3602"><div align="right"><font color="#FFFFFF" size="4" face="Century Gothic">{$company_name}</font><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><strong>&nbsp;&nbsp;&nbsp;&nbsp;</strong></font></div></td>
  </tr>
  
  

  
  <tr>
    <td width="179" height="358" valign="top" bgcolor="#EBEBEB"><table width="143" border="0" align="center" cellpadding="13" cellspacing="0">
      <tr>
        <td width="115" valign="top"><div align="center"><font face="trebuchet MS">&nbsp;&nbsp;&nbsp;&nbsp;
                  <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
          </font></div>
            <font face="trebuchet MS">
            <fb:like href="" layout="button_count" show_faces="false" width="30" font=""></fb:like>
            </font>
            <div align="left"><font face="trebuchet MS"><br>
                <font color="#00CCCC" size="2" face="trebuchet MS"><font color="#333333" face="Century Gothic">{section name=outer loop=$Menu} <a href="{$Menu[outer][1]}" title="{$Menu[outer][0]}">{$Menu[outer][0]}</a><br>
                <br>
                  {sectionelse}
                  none
                  {/section}</font></font></div></td>
      </tr>
    </table></td>
    <td width="650" valign="top" bgcolor="#FFFFFF"><div align="center">
      <table width="650" border="0" cellspacing="15" cellpadding="15">
        <tr>
          <td valign="top" background="images/companyinfo2.jpg"><div align="center"><strong><font color="#0099FF" size="6"><a href="index.html"><font face="Century Gothic"><img src="{$logo}" alt="{$company_name}" width="220" border="0"></font></a></font></strong></div></td>
          </tr>
        <tr>
          <td height="92" valign="top" bgcolor="#EFEFEF"><div align="left"><font color="#666666" size="2" face="Century Gothic">            {$about_us_text}</font></div></td>
          </tr>
      </table>
    </div></td>
    <td width="175" valign="top" bgcolor="#EBEBEB"><table width="87%" border="0" align="center" cellpadding="11" cellspacing="0">
      <tr>
        <td valign="top"><p><font color="#666666" size="2" face="trebuchet MS"> <font face="Century Gothic">{$about_us_address}<br>
          {$about_us_city} {$about_us_state}&nbsp; {$about_us_zip}<br>
          <strong><font color="#009933"><br>
            </font> <font color="#C75701">{$about_us_hours}</font></strong></font></font><font face="Century Gothic"><br>
              <br>
              <font color="#7D3602" size="2"><strong>{$about_us_phone}</strong></font></font></p>
            <p> {if ($facebook_link)}<a href="{$facebook_link}"><img src="images/facebook.png" alt="Facebook Us!" border="0" /></a>&nbsp;{/if}
              {if ($twitter_link)}<a href="{$twitter_link}"><img src="images/twitter.png" alt="Follow Us!" border="0" /></a>&nbsp;{/if}
              {if ($linkedin_link)}<a href="{$linkedin_link}"><img src="images/linkedin.png" alt="LinkedIn" border="0" /></a>{/if}</p></td>
      </tr>
    </table></td>
  </tr>
  <tr>
    <td height="32" colspan="3" valign="middle" bgcolor="#7D3602"><span class="style3"><span class="style4">&nbsp;&nbsp;<font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">&copy;  
            <script language="JavaScript" type="text/javascript">document.write((new Date()).getFullYear());</script>
{$company_name}. All rights reserved.</font></span></span> </td>
  </tr>{if (isset($remove_branding))}{else}
  <tr>    <td height="28" colspan="3" valign="middle"><div align="right">
    <div align="right"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif"><span class="style2">created with </span></font><font size="1" face="Arial, Helvetica, sans-serif"><strong><font color="#FFFFFF">YourDomain.com</font></strong></font></div>
  </div></td>  
  </tr>{/if}
</table>


<map name="Map">
<area shape="rect" coords="3,3,31,28" href="#"><area shape="rect" coords="39,3,65,27" href="#">
</map>
</body></html>