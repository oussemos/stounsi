<title>{$company_name} | Gallery</title>

<body bgcolor="#CCCCCC" link="#0099FF" vlink="#0099FF" alink="#0099FF"><br>
<table width="1004" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="11" colspan="3" valign="bottom" bgcolor="#FFFFFF"><img src="images/freewebsitemaker.jpg" width="1004" height="11" alt="free websites, website maker"></td>
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
    <td height="37" background="images/freewebsites.jpg" bgcolor="#0099FF">&nbsp;</td>
    <td background="images/freewebsites.jpg" bgcolor="#0099FF">&nbsp;</td>
    <td valign="middle" background="images/freewebsites.jpg" bgcolor="#0099FF"><div align="center"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif">{$about_us_phone}</font></div></td>
  </tr>
  <tr>
    <td width="179" valign="top" bgcolor="#EBEBEB"><br>
      <table width="143" border="0" align="center" cellpadding="13" cellspacing="0">
        <tr>
          <td width="117" valign="top"><div align="center">&nbsp;&nbsp;&nbsp;&nbsp;
                  <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
            </div>
              <fb:like href="" layout="button_count" show_faces="false" width="30" font=""></fb:like>
              <div align="left"><br>
                  <font color="#00CCCC" size="2" face="Century Gothic">{section name=outer loop=$Menu} <a href="{$Menu[outer][1]}" title="{$Menu[outer][0]}">{$Menu[outer][0]}</a><br>
                  <br>
                {sectionelse}
                none
                {/section}</div></td>
        </tr>
      </table></td>
    <td width="650" valign="top" bgcolor="#FFFFFF"><table width="650" border="0" align="center" cellpadding="10" cellspacing="0">
      <tr>
        <td width="610" height="42" valign="top" bgcolor="#FFFFFF"><div align="left"><b><font color="#333333" size="4" face="Century Gothic"> <font color="#0099FF"><font size="4">Gallery</font> </font></font></b></div>          </td>
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
      <table width="87%" border="0" align="center" cellpadding="11" cellspacing="0">
        <tr>
          <td valign="top"><div align="left">
              <p align="left"><font color="#666666" size="2" face="Century Gothic"><strong><font color="#0099FF"><br>
                COMPANY INFO:</font></strong><br>
                <br>
                <strong>Phone: </strong><br>
                {$about_us_phone}</font></p>
            <p align="left"><font color="#666666" size="2" face="Century Gothic"><strong>Address:</strong><br>
              {$about_us_address}</font></p>
            <p align="left"><font color="#666666" size="2" face="Century Gothic"><strong>City:</strong><br>
              {$about_us_city}</font></p>
            <p align="left"><font color="#666666" size="2" face="Century Gothic"><strong>State</strong><br>
              {$about_us_state}</font></p>
            <p align="left"><font color="#666666" size="2" face="Century Gothic"><strong>Zip:</strong><br>
              {$about_us_zip}</font></p>
            <p align="left"><font color="#666666" size="2" face="Century Gothic"><strong>Hours of Operation:</strong> <br>
              {$about_us_hours}</font></p>
          </div></td>
        </tr>
      </table>
    </div></td>
  </tr>
  <tr>
    <td height="35" colspan="3" bgcolor="#333333">&nbsp;&nbsp;<font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">&copy;
        <script language="JavaScript" type="text/javascript">document.write((new Date()).getFullYear());</script>
    {$company_name}. All rights reserved.</font></td>
  </tr>
   {if (isset($remove_branding))}{else}
  <tr>
    <td height="21" colspan="3"><div align="right"><font size="1" face="Arial, Helvetica, sans-serif"><span class="style2">created with</span><strong> yourdomain.com</strong></font></div></td>
  </tr>
  {/if}
</table>
