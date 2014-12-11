<?php /* Smarty version 2.6.19, created on 2011-10-17 13:49:38
         compiled from gallery.tpl */ ?>
<title><?php echo $this->_tpl_vars['company_name']; ?>
 | Gallery</title>

<body bgcolor="#333333" background="images/backgd5.jpg" link="#1A5BB9" vlink="#1A5BB9" alink="#1A5BB9" topmargin="20"><br>
<table width="1004" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="19" colspan="3" valign="top"><img src="images/header5.png" alt=" " width="1004" height="218" border="0"></td>
  </tr>
  <tr>
    <td height="37" bgcolor="#0E4392">&nbsp;</td>
    <td colspan="2" valign="middle" bgcolor="#0E4392"><div align="right"><font color="#FFFFFF" size="4" face="Century Gothic"><?php echo $this->_tpl_vars['company_name']; ?>
</font><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><strong>&nbsp;&nbsp;&nbsp;&nbsp;</strong></font></div></td>
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
              </font>
              <div align="left"><font face="trebuchet MS"><br>
                  <font color="#00CCCC" size="2" face="trebuchet MS"><font color="#333333" face="Century Gothic"><?php unset($this->_sections['outer']);
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
                    <?php endif; ?></font></font></div></td>
        </tr>
      </table></td>
    <td width="650" valign="top" bgcolor="#FFFFFF"><table width="650" border="0" align="center" cellpadding="10" cellspacing="0">
      <tr>
        <td width="610" height="42" valign="top" bgcolor="#FFFFFF"><div align="left"><b><font color="#333333" size="4" face="Century Gothic"> <font color="#0099FF"><font color="#009933" size="4" face="trebuchet MS">&nbsp;&nbsp;&nbsp;</font></font></font></b><font color="#333333" size="4" face="Century Gothic"><font color="#0099FF"><font color="#009933" size="4" face="trebuchet MS"><font color="#1A5BB9" face="Century Gothic">Gallery</font></font></font></font> &nbsp;</div>          </td>
      </tr>
      <tr>
        <td height="706" valign="top" bgcolor="#FFFFFF"><table width="610" border="0" align="center" cellpadding="0" cellspacing="8">
            <tr>
              <td width="274" valign="top" bgcolor="#FFFFFF">
               <div align="center">                 <?php if (! empty ( $this->_tpl_vars['gallery_1'] )): ?>               </div>
               <div class="article_wrapper">
				<h2 align="center"><img src="<?php echo $this->_tpl_vars['gallery_1']; ?>
" width="260" border="0">			</h2>
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
    <td width="175" valign="top" bgcolor="#EBEBEB"><div align="center">
      <table width="87%" border="0" align="center" cellpadding="11" cellspacing="0">
        <tr>
          <td valign="top"><p><font color="#666666" size="2" face="trebuchet MS"> <font face="Century Gothic"><?php echo $this->_tpl_vars['about_us_address']; ?>
<br>
            <?php echo $this->_tpl_vars['about_us_city']; ?>
 <?php echo $this->_tpl_vars['about_us_state']; ?>
&nbsp; <?php echo $this->_tpl_vars['about_us_zip']; ?>
<br>
            <strong><font color="#009933"><br>
              </font> <font color="#1A5BB9"><?php echo $this->_tpl_vars['about_us_hours']; ?>
</font></strong></font></font><font face="Century Gothic"><br>
                <br>
                <font color="#209FF8" size="2"><strong><?php echo $this->_tpl_vars['about_us_phone']; ?>
</strong></font></font></p>
              <p> <?php if (( $this->_tpl_vars['facebook_link'] )): ?><a href="<?php echo $this->_tpl_vars['facebook_link']; ?>
"><img src="images/facebook.png" alt="Facebook Us!" border="0" /></a>&nbsp;<?php endif; ?>
                <?php if (( $this->_tpl_vars['twitter_link'] )): ?><a href="<?php echo $this->_tpl_vars['twitter_link']; ?>
"><img src="images/twitter.png" alt="Follow Us!" border="0" /></a>&nbsp;<?php endif; ?>
                <?php if (( $this->_tpl_vars['linkedin_link'] )): ?><a href="<?php echo $this->_tpl_vars['linkedin_link']; ?>
"><img src="images/linkedin.png" alt="LinkedIn" border="0" /></a><?php endif; ?></p></td>
        </tr>
      </table>
    </div></td>
  </tr>
  <tr>
    <td height="35" colspan="3" bgcolor="#21A1F8">&nbsp;&nbsp;<font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">&copy;
        <script language="JavaScript" type="text/javascript">document.write((new Date()).getFullYear());</script>
    <?php echo $this->_tpl_vars['company_name']; ?>
. All rights reserved.</font></td>
  </tr>
   <?php if (( isset ( $this->_tpl_vars['remove_branding'] ) )): ?><?php else: ?>
  <tr>
    <td height="21" colspan="3"><div align="right"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif"><span class="style2">created with</span><strong> ProWebWizard.com</strong></font></div></td>
  </tr>
  <?php endif; ?>
</table>