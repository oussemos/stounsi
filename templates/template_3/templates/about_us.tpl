<title>{$company_name} | About Us</title><body bgcolor="#003366" link="#FFFFFF" vlink="#FFFFFF" alink="#FFFFFF"><br>
<table width="1004" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="11" colspan="3" valign="bottom"><img src="images/freewebsitemaker.png" width="1004" height="20" alt="free websites, website maker"></td>
  </tr>
  <tr>
    <td height="50" colspan="2" valign="top" bgcolor="#FFFFFF"><div align="left">
      <table width="796" height="52" border="0" align="center" cellpadding="11" cellspacing="0">
        <tr>
          <td width="796" valign="middle"><div align="left">
              <p><strong><font color="#0099FF" size="6"><a href="index.html"><font face="Century Gothic"><img src="{$logo}" alt="{$company_name}" width="220" border="0"></font></a></font></strong></p>
          </div></td>
        </tr>
      </table>
    </div></td>
    <td width="175" valign="bottom" bgcolor="#FFFFFF"><div align="center"><script type="text/javascript">addthis_pub  = '50dollarlogos';</script>
    <br>
        <a href="http://www.addthis.com/bookmark.php" onMouseOver="return addthis_open(this, '', '[URL]', '[TITLE]')" onMouseOut="addthis_close()" onClick="return addthis_sendto()"><img src="http://s9.addthis.com/button1-addthis.gif" width="125" height="16" border="0"/></a><br>
        <br>
        <script type="text/javascript" src="http://s7.addthis.com/js/152/addthis_widget.js"></script></div></td>
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
          <td width="117" valign="top"><div align="center"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif">&nbsp;&nbsp;&nbsp;&nbsp;
                  <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
            </font></div>
              
              <font color="#FFFFFF" face="Arial, Helvetica, sans-serif">
              <fb:like href="" layout="button_count" show_faces="false" width="30" font=""></fb:like>
              </font>            <div align="left"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><br>
                <font color="#FFFFFF" size="3" face="Arial, Helvetica, sans-serif">{section name=outer loop=$Menu} <a href="{$Menu[outer][1]}" title="{$Menu[outer][0]}">{$Menu[outer][0]}</a><br>
                <br>
              {sectionelse}
              none
            {/section}</font></div></td>
        </tr>
      </table></td>
    <td width="650" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="10" cellspacing="0">
      <tr>
        <td width="577" valign="top"><div align="left"><b><font color="#333333" size="4" face="Century Gothic"> <font color="#009933" face="trebuchet MS">&nbsp;&nbsp;<font color="#336699" size="5" face="Arial, Helvetica, sans-serif">About Us</font></font></font></b></div></td>
      </tr>
      <tr>
        <td valign="top"><table width="610" border="0" align="center" cellpadding="15" cellspacing="0">
            <tr>
              <td width="580" valign="top" bgcolor="#F5F5F5"><div align="left"><font color="#666666" size="2" face="Arial, Helvetica, sans-serif">{$about_us_text}</font></div></td>
            </tr>
          </table>
          <p align="left">&nbsp;</p></td>
      </tr>
    </table></td>
    <td valign="top" bgcolor="#EBEBEB"><div align="center">
      <table width="147" height="19" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="147" height="19" align="left" valign="top"><div align="left">
              <div align="left">
                <p><font color="#666666" size="2" face="trebuchet MS"><br>
                      <font face="Arial, Helvetica, sans-serif"> {$about_us_address}<br>
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
      </table>
    </div></td>
  </tr>
  <tr>
    <td height="35" colspan="3" bgcolor="#3399CC">&nbsp;&nbsp;<font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">&copy;
        <script language="JavaScript" type="text/javascript">document.write((new Date()).getFullYear());</script>
{$company_name}. All rights reserved.</font></td>
  </tr>
  <tr>
    <td colspan="3"><div align="right">
      <div align="right">
      	 {if (isset($remove_branding))}{else}
        <div align="right"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif"><span class="style2">created with </span>YourDomain.com</font></div>
        {/if}      </div>
    </div></td>
  </tr>
</table>
