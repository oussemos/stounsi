<title>{$company_name} | About Us</title><body bgcolor="#333333" background="images/backgd2.jpg" link="#0099FF" vlink="#0099FF" alink="#0099FF" topmargin="20"><br>
<table width="1004" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="19" colspan="3" valign="top"><img src="images/header.png" alt=" " width="1004" height="249"></td>
  </tr>
  <tr>
    <td height="37" background="images/freewebsites2.jpg">&nbsp;</td>
    <td colspan="2" valign="middle" background="images/freewebsites2.jpg"><div align="right"><font color="#FFFFFF" size="4" face="trebuchet MS">CALL US TODAY!<strong> &nbsp;</strong>{$about_us_phone}</font><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><strong>&nbsp;&nbsp;&nbsp;&nbsp;</strong></font></div></td>
  </tr>
  
  <tr>
    <td width="179" valign="top" bgcolor="#EBEBEB"><br>
      <table width="143" border="0" align="center" cellpadding="13" cellspacing="0">
        <tr>
          <td width="117" valign="top"><div align="center"><font face="trebuchet MS">&nbsp;&nbsp;&nbsp;&nbsp;
                  <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
            </font></div>
              
            <font face="trebuchet MS">
              <fb:like href="" layout="button_count" show_faces="false" width="30" font=""></fb:like>
            <div align="left"><br>
                <font color="#00CCCC" size="2" face="trebuchet MS">{section name=outer loop=$Menu} <a href="{$Menu[outer][1]}" title="{$Menu[outer][0]}">{$Menu[outer][0]}</a><br>
                <br>
              {sectionelse}
              none
              {/section}</div>
            </font></td>
        </tr>
      </table></td>
    <td width="650" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="10" cellspacing="0">
      <tr>
        <td width="577" valign="top"><div align="left"><b><font color="#333333" size="4" face="Century Gothic"> <font color="#009933" face="trebuchet MS">&nbsp;&nbsp;About Us</font></font></b></div></td>
      </tr>
      <tr>
        <td valign="top"><table width="610" border="0" align="center" cellpadding="15" cellspacing="0">
            <tr>
              <td width="580" valign="top" bgcolor="#F5F5F5"><div align="left"><font color="#666666" size="2" face="trebuchet MS">{$about_us_text}</font></div></td>
            </tr>
          </table>
          <p align="left">&nbsp;</p></td>
      </tr>
    </table></td>
    <td width="175" valign="top" bgcolor="#EBEBEB"><div align="center">
      <table width="87%" border="0" align="center" cellpadding="11" cellspacing="0">
        <tr>
          <td valign="top"><div align="left">
            <p><font color="#666666" size="2" face="trebuchet MS"><strong><font color="#009933">Contact Us:</font></strong><br>
              {$about_us_address}<br>
              {$about_us_city} {$about_us_state}&nbsp; {$about_us_zip}<br>
  <br>
  <strong><font color="#009933">Hours:</font><br>
</strong>{$about_us_hours}</font><font face="trebuchet MS"><br>
  <br>
  <font color="#666666" size="2"><strong><font color="#009933">Call Us:</font></strong><br> 
  {$about_us_phone}</font></font></p>
            <p> {if ($facebook_link)}<a href="{$facebook_link}"><img src="images/facebook.png" alt="Facebook Us!" border="0" /></a>&nbsp;{/if}
              {if ($twitter_link)}<a href="{$twitter_link}"><img src="images/twitter.png" alt="Follow Us!" border="0" /></a>&nbsp;{/if}
              {if ($linkedin_link)}<a href="{$linkedin_link}"><img src="images/linkedin.png" alt="LinkedIn" border="0" /></a>{/if}</p>
            </div></td>
        </tr>
      </table>
    </div></td>
  </tr>
  <tr>
    <td height="35" colspan="3" bgcolor="#666666">&nbsp;&nbsp;<font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">&copy;
        <script language="JavaScript" type="text/javascript">document.write((new Date()).getFullYear());</script>
{$company_name}. All rights reserved.</font></td>
  </tr>
  <tr>
    <td colspan="3"><div align="right">
      <div align="right">
      	 {if (isset($remove_branding))}{else}
        <div align="right"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif"><span class="style2">created with</span></font><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif"><span class="style2"> YourDomain.com </span></font></div>
        {/if}      </div>
    </div></td>
  </tr>
</table>
