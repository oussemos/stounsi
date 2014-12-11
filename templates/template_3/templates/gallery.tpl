<title>{$company_name} | Gallery</title>

<body bgcolor="#003366" link="#FFFFFF" vlink="#FFFFFF" alink="#FFFFFF"><br>
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
    <td width="175" bgcolor="#FFFFFF">&nbsp;</td>
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
            </font>            <div align="left"><font size="3" face="trebuchet MS"><br>
                <font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><font size="3">{section name=outer loop=$Menu} <a href="{$Menu[outer][1]}" title="{$Menu[outer][0]}">{$Menu[outer][0]}</a><br>
                <br>
              {sectionelse}
              none
            {/section}</font></font></div></td>
        </tr>
    </table></td>
    <td width="650" valign="top" bgcolor="#FFFFFF"><table width="650" border="0" align="center" cellpadding="10" cellspacing="0">
      <tr>
        <td width="610" height="42" valign="top" bgcolor="#FFFFFF"><div align="left"><b><font color="#333333" size="4" face="Century Gothic"> <font color="#0099FF"><font color="#009933" size="4" face="trebuchet MS">&nbsp;&nbsp;&nbsp;<font color="#336699" size="5" face="Arial, Helvetica, sans-serif">Gallery</font></font> </font></font></b>&nbsp;</div>          </td>
      </tr>
      <tr>
        <td height="706" valign="top" bgcolor="#FFFFFF"><table width="610" border="0" align="center" cellpadding="0" cellspacing="8">
            <tr>
              <td width="274" valign="top" bgcolor="#FFFFFF">
               <div align="center">{*image 1*}
                 {if !empty($gallery_1)}               </div>
               <div class="article_wrapper">
				<h2 align="center"><img src="{$gallery_1}" width="260" border="0">			</h2>
				</div>
			   <div align="center">{/if}</div></td>
              <td width="252" valign="top" bgcolor="#FFFFFF"><div align="center">
                <div align="center">{*image 2*}
                  {if !empty($gallery_2)} </div>
                <div class="article_wrapper">
                  <h2 align="center"><img src="{$gallery_2}" alt=" " width="260"> </h2>
                </div>
                <div align="center">{/if}</div>
              </div></td>
            </tr>
            <tr>
              <td valign="top" bgcolor="#FFFFFF"><div align="center">
                <div align="center">{*image 3*}
                  {if !empty($gallery_3)} </div>
                <div class="article_wrapper">
                  <h2 align="center"><img src="{$gallery_3}" alt=" " width="260"> </h2>
                </div>
                <div align="center">{/if}</div></div></td>
              <td valign="top" bgcolor="#FFFFFF"><div align="center">
                <div align="center">{*image 4*}
                  {if !empty($gallery_4)} </div>
                <div class="article_wrapper">
                  <h2 align="center"><img src="{$gallery_4}" alt=" " width="260"> </h2>
                </div>
                <div align="center">{/if}</div></div></td>
            </tr>
            <tr>
              <td valign="top" bgcolor="#FFFFFF"><div align="center">
                <div align="center">{*image 5*}
                  {if !empty($gallery_5)} </div>
                <div class="article_wrapper">
                  <h2 align="center"><img src="{$gallery_5}" alt=" " width="260"> </h2>
                </div>
                <div align="center">{/if}</div></div></td>
              <td valign="top" bgcolor="#FFFFFF"><div align="center">
                <div align="center">{*image 6*}
                  {if !empty($gallery_6)} </div>
                <div class="article_wrapper">
                  <h2 align="center"><img src="{$gallery_6}" alt=" " width="260"> </h2>
                </div>
                <div align="center">{/if}</div></div></td>
            </tr>
            <tr>
              <td valign="top" bgcolor="#FFFFFF"><div align="center">
                <div align="center">{*image 7*}
                  {if !empty($gallery_7)} </div>
                <div class="article_wrapper">
                  <h2 align="center"><img src="{$gallery_7}" alt=" " width="260"> </h2>
                </div>
                <div align="center">{/if}</div></div></td>
              <td valign="top" bgcolor="#FFFFFF"><div align="center">
                <div align="center">{*image 8*}
                  {if !empty($gallery_8)} </div>
                <div class="article_wrapper">
                  <h2 align="center"><img src="{$gallery_8}" alt=" " width="260"> </h2>
                </div>
                <div align="center">{/if}</div></div></td>
            </tr>
            <tr>
              <td height="336" valign="top" bgcolor="#FFFFFF"><div align="center">
                <div align="center">{*image 9*}
                  {if !empty($gallery_9)} </div>
                <div class="article_wrapper">
                  <h2 align="center"><img src="{$gallery_9}" alt=" " width="260"> </h2>
                </div>
                <div align="center">{/if}</div></div></td>
              <td valign="top" bgcolor="#FFFFFF"><div align="center">
                <div align="center">{*image 10*}
                  {if !empty($gallery_10)} </div>
                <div class="article_wrapper">
                  <h2 align="center"><img src="{$gallery_10}" alt=" " width="260"> </h2>
                </div>
                <div align="center">{/if}</div></div></td>
            </tr>
          </table>          </td>
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
   {if (isset($remove_branding))}{else}
  <tr>
    <td height="21" colspan="3"><div align="right"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif"><span class="style2">created with </span>YourDomain.com</font></div></td>
  </tr>
  {/if}
</table>
