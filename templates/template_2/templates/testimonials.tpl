
<body bgcolor="#333333" background="images/background.jpg" link="#009933" vlink="#009933" alink="#009933"><br>
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
    <td valign="bottom" bgcolor="#FFFFFF"><div align="center"><script type="text/javascript">addthis_pub  = '50dollarlogos';</script>
    <br>
        <a href="http://www.addthis.com/bookmark.php" onMouseOver="return addthis_open(this, '', '[URL]', '[TITLE]')" onMouseOut="addthis_close()" onClick="return addthis_sendto()"><img src="http://s9.addthis.com/button1-addthis.gif" width="125" height="16" border="0"/></a><br>
        <br>
        <script type="text/javascript" src="http://s7.addthis.com/js/152/addthis_widget.js"></script></div></td>
  </tr>
  <tr>
    <td height="37" background="images/freewebsites2.jpg">&nbsp;</td>
    <td background="images/freewebsites2.jpg">&nbsp;</td>
    <td valign="middle" background="images/freewebsites2.jpg"><div align="center"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif">{$about_us_phone}</font></div></td>
  </tr>
  <tr>
    <td height="37" colspan="3"><strong><font color="#0099FF" size="6"><a href="index.html"><font face="Century Gothic"><img src="images/websitebuilder2.jpg" alt=" " width="1004" height="198" border="0"></font></a></font></strong></td>
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
        <td width="577" valign="top" bgcolor="#FFFFFF"><div align="left"><b><font color="#333333" size="4" face="Century Gothic"> <font color="#009933" face="trebuchet MS">&nbsp;&nbsp;&nbsp;Customer Testimonials</font></font></b></div></td>
      </tr>
      <tr>
        <td height="302" valign="top" bgcolor="#FFFFFF"><table width="609" border="0" align="center" cellpadding="15" cellspacing="12">
            <tr>
              <td valign="top" bgcolor="#FFFFFF"><div align="left"><font color="#666666" size="2" face="trebuchet MS"><strong>{$testimonail_1}</strong></font></div></td>
            </tr>
            <tr>
              <td valign="top" bgcolor="#FFFFFF"><div align="left"><font size="2" face="trebuchet MS"><font color="#666666">{$testimonail_2}</font></font></div></td>
            </tr>
            <tr>
              <td valign="top" bgcolor="#FFFFFF"><div align="left"><font size="2" face="trebuchet MS"><font color="#666666"><strong>{$testimonail_3}</strong></font></font></div></td>
            </tr>
            <tr>
              <td valign="top" bgcolor="#FFFFFF"><div align="left"><font size="2" face="trebuchet MS"><font color="#666666">{$testimonail_4}</font></font></div></td>
            </tr>
            <tr>
              <td valign="top" bgcolor="#FFFFFF"><div align="left"><font size="2" face="trebuchet MS"><font color="#666666"><strong>{$testimonail_5}</strong></font></font></div></td>
            </tr>
            <tr>
              <td width="555" height="47" valign="top" bgcolor="#FFFFFF"><div align="left">
                <p><font size="2" face="trebuchet MS"><font color="#666666">{$testimonail_6}</font></font></p>
                </div></td>
            </tr>
          </table>          </td>
      </tr>
    </table></td>
    <td width="175" valign="top" bgcolor="#EBEBEB"><div align="center">
      <table width="87%" border="0" align="center" cellpadding="11" cellspacing="0">
        <tr>
          <td valign="top"><p><font color="#666666" size="2" face="trebuchet MS"><strong><font color="#009933">Contact Us:</font></strong><br>
            {$about_us_address}<br>
            {$about_us_city} {$about_us_state}&nbsp; {$about_us_zip}<br>
  <br>
  <strong><font color="#009933">Hours:<br>
  </font> </strong>{$about_us_hours}</font><font face="trebuchet MS"><br>
  <br>
  <font color="#666666" size="2"><strong><font color="#009933">Call Us:<br>
  </font></strong> {$about_us_phone}</font></font></p>
            <p> {if ($facebook_link)}<a href="{$facebook_link}"><img src="images/facebook.png" alt="Facebook Us!" border="0" /></a>&nbsp;{/if}
              {if ($twitter_link)}<a href="{$twitter_link}"><img src="images/twitter.png" alt="Follow Us!" border="0" /></a>&nbsp;{/if}
            {if ($linkedin_link)}<a href="{$linkedin_link}"><img src="images/linkedin.png" alt="LinkedIn" border="0" /></a>{/if}</p></td>
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
    <td height="21" colspan="3"><div align="right"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif"><span class="style2">created with </span>YourDomain.com</font></div></td>
  </tr>
</table>
