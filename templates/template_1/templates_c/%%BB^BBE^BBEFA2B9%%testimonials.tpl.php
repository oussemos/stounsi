<?php /* Smarty version 2.6.19, created on 2011-07-22 07:07:35
         compiled from testimonials.tpl */ ?>

<body bgcolor="#CCCCCC" link="#0099FF" vlink="#0099FF" alink="#0099FF"><br><table width="1004" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="11" colspan="3" valign="bottom" bgcolor="#FFFFFF"><img src="images/freewebsitemaker.jpg" width="1004" height="11" alt="free websites, website maker"></td>
  </tr>
  <tr>
    <td height="50" colspan="2" valign="top" bgcolor="#FFFFFF"><div align="left">
        <table width="796" height="52" border="0" align="center" cellpadding="11" cellspacing="0">
          <tr>
            <td width="796" valign="middle"><div align="left">
                <p><strong><font color="#0099FF" size="6"><a href="index.html"><font face="Century Gothic"><img src="<?php echo $this->_tpl_vars['logo']; ?>
" alt="<?php echo $this->_tpl_vars['company_name']; ?>
" width="240" border="0"></font></a></font></strong></p>
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
    <td height="37" background="images/freewebsites.jpg" bgcolor="#0099FF">&nbsp;</td>
    <td background="images/freewebsites.jpg" bgcolor="#0099FF">&nbsp;</td>
    <td valign="middle" background="images/freewebsites.jpg" bgcolor="#0099FF"><div align="center"><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><?php echo $this->_tpl_vars['about_us_phone']; ?>
</font></div></td>
  </tr>
  
  <tr>
    <td width="179" valign="top" bgcolor="#EBEBEB"><br>
      <table width="82%" border="0" align="center" cellpadding="11" cellspacing="0">
      <tr>
        <td valign="top"><div align="center">&nbsp;&nbsp;&nbsp;&nbsp;
            <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
          </div>
            <fb:like href="" layout="button_count" show_faces="false" width="30" font=""></fb:like><br>
        <div align="left"><font color="#00CCCC" size="2" face="Century Gothic"><?php unset($this->_sections['outer']);
$this->_sections['outer']['name'] = 'outer';
$this->_sections['outer']['loop'] = is_array($_loop=$this->_tpl_vars['Menu']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['outer']['show'] = true;
$this->_sections['outer']['max'] = $this->_sections['outer']['loop'];
$this->_sections['outer']['step'] = 1;
$this->_sections['outer']['start'] = $this->_sections['outer']['step'] > 0 ? 0 : $this->_sections['outer']['loop']-1;
if ($this->_sections['outer']['show']) {
    $this->_sections['outer']['total'] = $this->_sections['outer']['loop'];
    if ($this->_sections['outer']['total'] == 0)
        $this->_sections['outer']['show'] = false;
} else
    $this->_sections['outer']['total'] = 0;
if ($this->_sections['outer']['show']):

            for ($this->_sections['outer']['index'] = $this->_sections['outer']['start'], $this->_sections['outer']['iteration'] = 1;
                 $this->_sections['outer']['iteration'] <= $this->_sections['outer']['total'];
                 $this->_sections['outer']['index'] += $this->_sections['outer']['step'], $this->_sections['outer']['iteration']++):
$this->_sections['outer']['rownum'] = $this->_sections['outer']['iteration'];
$this->_sections['outer']['index_prev'] = $this->_sections['outer']['index'] - $this->_sections['outer']['step'];
$this->_sections['outer']['index_next'] = $this->_sections['outer']['index'] + $this->_sections['outer']['step'];
$this->_sections['outer']['first']      = ($this->_sections['outer']['iteration'] == 1);
$this->_sections['outer']['last']       = ($this->_sections['outer']['iteration'] == $this->_sections['outer']['total']);
?> <a href="<?php echo $this->_tpl_vars['Menu'][$this->_sections['outer']['index']][1]; ?>
" title="<?php echo $this->_tpl_vars['Menu'][$this->_sections['outer']['index']][0]; ?>
"><?php echo $this->_tpl_vars['Menu'][$this->_sections['outer']['index']][0]; ?>
</a><br>
          <br>
          <?php endfor; else: ?>
          none
          <?php endif; ?><br>
          <br>
          <img src="images/followus.jpg" alt="Follow Us!" width="68" height="30" border="0" usemap="#Map">
          <map name="Map">
            <area shape="rect" coords="3,3,31,28" href="#">
            <area shape="rect" coords="39,3,65,27" href="#">
          </map>
        </div></td></tr>
    </table></td>
    <td width="650" valign="top" bgcolor="#FFFFFF"><table width="100%" border="0" align="center" cellpadding="10" cellspacing="0">
      <tr>
        <td width="577" valign="top" bgcolor="#FFFFFF"><div align="left"><b><font color="#333333" size="4" face="Century Gothic"> <font color="#0099FF">Customer Testimonials</font></font></b></div></td>
      </tr>
      <tr>
        <td height="302" valign="top" bgcolor="#FFFFFF"><table width="466" border="0" align="center" cellpadding="15" cellspacing="12">
            <tr>
              <td valign="top" bgcolor="#F5F5F5"><div align="left"><font color="#666666" size="2" face="Century Gothic"><?php echo $this->_tpl_vars['testimonail_1']; ?>
</font></div></td>
            </tr>
            <tr>
              <td valign="top" bgcolor="#F5F5F5"><div align="left"><font size="2"><font color="#666666" face="Century Gothic"><?php echo $this->_tpl_vars['testimonail_2']; ?>
</font></font></div></td>
            </tr>
            <tr>
              <td valign="top" bgcolor="#F5F5F5"><div align="left"><font size="2"><font color="#666666" face="Century Gothic"><?php echo $this->_tpl_vars['testimonail_3']; ?>
</font></font></div></td>
            </tr>
            <tr>
              <td valign="top" bgcolor="#F5F5F5"><div align="left"><font size="2"><font color="#666666" face="Century Gothic"><?php echo $this->_tpl_vars['testimonail_4']; ?>
</font></font></div></td>
            </tr>
            <tr>
              <td valign="top" bgcolor="#F5F5F5"><div align="left"><font size="2"><font color="#666666" face="Century Gothic"><?php echo $this->_tpl_vars['testimonail_5']; ?>
</font></font></div></td>
            </tr>
            <tr>
              <td width="519" height="47" valign="top" bgcolor="#F5F5F5"><div align="left">
                <p><font size="2"><font color="#666666" face="Century Gothic"><?php echo $this->_tpl_vars['testimonail_6']; ?>
</font><font color="#666666" face="Century Gothic"></font></font></p>
                </div></td>
            </tr>
          </table>
          </td>
      </tr>
    </table></td>
    <td width="175" valign="top" bgcolor="#EBEBEB"><div align="center">
      <table width="87%" border="0" align="center" cellpadding="11" cellspacing="0">
        <tr>
          <td valign="top">&nbsp;</td>
        </tr>
      </table>
    </div></td>
  </tr>
  <tr>
    <td height="35" colspan="3" bgcolor="#333333">&nbsp;&nbsp;<font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">&copy;
        <script language="JavaScript" type="text/javascript">document.write((new Date()).getFullYear());</script>
<?php echo $this->_tpl_vars['company_name']; ?>
. All rights reserved.</font></td>
  </tr>
  <tr>
    <td height="21" colspan="3"><div align="right"><font size="1" face="Arial, Helvetica, sans-serif"><span class="style2">created with <strong>freewebsit.es</strong></span> | <a href="http://freewebsit.es/">free websites</a> </font></div></td>
  </tr>
</table>