
<body bgcolor="#333333" background="images/backgd2.jpg" link="#0099FF" vlink="#0099FF" alink="#0099FF" topmargin="20"><br>
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
    <td height="21" colspan="3"><div align="right"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif"><span class="style2">created with </span></font><font size="1" face="Arial, Helvetica, sans-serif"> <strong><font color="#FFFFFF">ProWebsiteWizard.com</font></strong></font></div></td>
  </tr>
</table>
