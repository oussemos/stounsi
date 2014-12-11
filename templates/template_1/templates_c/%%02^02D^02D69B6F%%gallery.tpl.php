<?php /* Smarty version 2.6.19, created on 2011-07-22 16:22:44
         compiled from gallery.tpl */ ?>
<title><?php echo $this->_tpl_vars['company_name']; ?>
 | Gallery</title>

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
              <p><a href="index.html"><img src="<?php echo $this->_tpl_vars['logo']; ?>
" alt="Logo" width="240" border="0"></a></p>
          </div></td>
        </tr>
      </table>
    </div></td>
    <td width="175" bgcolor="#FFFFFF">&nbsp;</td>
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
        <td valign="top"><div align="left"><font color="#00CCCC" size="2" face="Century Gothic"><?php unset($this->_sections['outer']);
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
?>				
          <a href="<?php echo $this->_tpl_vars['Menu'][$this->_sections['outer']['index']][1]; ?>
" title="<?php echo $this->_tpl_vars['Menu'][$this->_sections['outer']['index']][0]; ?>
"><?php echo $this->_tpl_vars['Menu'][$this->_sections['outer']['index']][0]; ?>
</a><br><br>
          <?php endfor; else: ?>
          none
          <?php endif; ?></div></td>
        </tr>
    </table></td><td width="650" valign="top" bgcolor="#FFFFFF"><table width="650" border="0" align="center" cellpadding="10" cellspacing="0">
      <tr>
        <td width="610" height="42" valign="top" bgcolor="#FFFFFF"><div align="left"><b><font color="#333333" size="4" face="Century Gothic"> <font color="#0099FF"><font size="4">Gallery</font> </font></font></b></div>          </td>
      </tr>
      <tr>
        <td height="706" valign="top" bgcolor="#FFFFFF"><table width="610" border="0" align="center" cellpadding="0" cellspacing="8">
            <tr>
              <td width="274" valign="top" bgcolor="#FFFFFF">
               <div align="center">                 <?php if (! empty ( $this->_tpl_vars['gallery_1'] )): ?>               </div>
               <div class="article_wrapper">
				<h2 align="center"><img src="<?php echo $this->_tpl_vars['gallery_1']; ?>
" width="260">			</h2>
				</div>
			   <div align="center"><?php endif; ?></div></td>
              <td width="252" valign="top" bgcolor="#FFFFFF"><div align="center">
                <div align="center">                  <?php if (! empty ( $this->_tpl_vars['gallery_2'] )): ?> </div>
                <div class="article_wrapper">
                  <h2 align="center"><img src="<?php echo $this->_tpl_vars['gallery_2']; ?>
" alt=" " width="260"> </h2>
                </div>
                <div align="center"><?php endif; ?></div>
              </div></td>
            </tr>
            <tr>
              <td valign="top" bgcolor="#FFFFFF"><div align="center">
                <div align="center">                  <?php if (! empty ( $this->_tpl_vars['gallery_3'] )): ?> </div>
                <div class="article_wrapper">
                  <h2 align="center"><img src="<?php echo $this->_tpl_vars['gallery_3']; ?>
" alt=" " width="260"> </h2>
                </div>
                <div align="center"><?php endif; ?></div></div></td>
              <td valign="top" bgcolor="#FFFFFF"><div align="center">
                <div align="center">                  <?php if (! empty ( $this->_tpl_vars['gallery_4'] )): ?> </div>
                <div class="article_wrapper">
                  <h2 align="center"><img src="<?php echo $this->_tpl_vars['gallery_4']; ?>
" alt=" " width="260"> </h2>
                </div>
                <div align="center"><?php endif; ?></div></div></td>
            </tr>
            <tr>
              <td valign="top" bgcolor="#FFFFFF"><div align="center">
                <div align="center">                  <?php if (! empty ( $this->_tpl_vars['gallery_5'] )): ?> </div>
                <div class="article_wrapper">
                  <h2 align="center"><img src="<?php echo $this->_tpl_vars['gallery_5']; ?>
" alt=" " width="260"> </h2>
                </div>
                <div align="center"><?php endif; ?></div></div></td>
              <td valign="top" bgcolor="#FFFFFF"><div align="center">
                <div align="center">                  <?php if (! empty ( $this->_tpl_vars['gallery_6'] )): ?> </div>
                <div class="article_wrapper">
                  <h2 align="center"><img src="<?php echo $this->_tpl_vars['gallery_6']; ?>
" alt=" " width="260"> </h2>
                </div>
                <div align="center"><?php endif; ?></div></div></td>
            </tr>
            <tr>
              <td valign="top" bgcolor="#FFFFFF"><div align="center">
                <div align="center">                  <?php if (! empty ( $this->_tpl_vars['gallery_7'] )): ?> </div>
                <div class="article_wrapper">
                  <h2 align="center"><img src="<?php echo $this->_tpl_vars['gallery_7']; ?>
" alt=" " width="260"> </h2>
                </div>
                <div align="center"><?php endif; ?></div></div></td>
              <td valign="top" bgcolor="#FFFFFF"><div align="center">
                <div align="center">                  <?php if (! empty ( $this->_tpl_vars['gallery_8'] )): ?> </div>
                <div class="article_wrapper">
                  <h2 align="center"><img src="<?php echo $this->_tpl_vars['gallery_8']; ?>
" alt=" " width="260"> </h2>
                </div>
                <div align="center"><?php endif; ?></div></div></td>
            </tr>
            <tr>
              <td height="336" valign="top" bgcolor="#FFFFFF"><div align="center">
                <div align="center">                  <?php if (! empty ( $this->_tpl_vars['gallery_9'] )): ?> </div>
                <div class="article_wrapper">
                  <h2 align="center"><img src="<?php echo $this->_tpl_vars['gallery_9']; ?>
" alt=" " width="260"> </h2>
                </div>
                <div align="center"><?php endif; ?></div></div></td>
              <td valign="top" bgcolor="#FFFFFF"><div align="center">
                <div align="center">                  <?php if (! empty ( $this->_tpl_vars['gallery_10'] )): ?> </div>
                <div class="article_wrapper">
                  <h2 align="center"><img src="<?php echo $this->_tpl_vars['gallery_10']; ?>
" alt=" " width="260"> </h2>
                </div>
                <div align="center"><?php endif; ?></div></div></td>
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
                <?php echo $this->_tpl_vars['about_us_phone']; ?>
</font></p>
            <p align="left"><font color="#666666" size="2" face="Century Gothic"><strong>Address:</strong><br>
              <?php echo $this->_tpl_vars['about_us_address']; ?>
</font></p>
            <p align="left"><font color="#666666" size="2" face="Century Gothic"><strong>City:</strong><br>
              <?php echo $this->_tpl_vars['about_us_city']; ?>
</font></p>
            <p align="left"><font color="#666666" size="2" face="Century Gothic"><strong>State</strong><br>
              <?php echo $this->_tpl_vars['about_us_state']; ?>
</font></p>
            <p align="left"><font color="#666666" size="2" face="Century Gothic"><strong>Zip:</strong><br>
              <?php echo $this->_tpl_vars['about_us_zip']; ?>
</font></p>
            <p align="left"><font color="#666666" size="2" face="Century Gothic"><strong>Hours of Operation:</strong> <br>
              <?php echo $this->_tpl_vars['about_us_hours']; ?>
</font></p>
          </div></td>
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
   <?php if (( isset ( $this->_tpl_vars['remove_branding'] ) )): ?><?php else: ?>
  <tr>
    <td height="21" colspan="3"><div align="right"><font size="1" face="Arial, Helvetica, sans-serif"><span class="style2">created with <strong>freewebsit.es</strong></span> | <a href="http://freewebsit.es/">free websites</a> </font></div></td>
  </tr>
  <?php endif; ?>
</table>