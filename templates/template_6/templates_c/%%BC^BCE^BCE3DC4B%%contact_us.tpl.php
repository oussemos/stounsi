<?php /* Smarty version 2.6.19, created on 2011-10-16 01:54:50
         compiled from contact_us.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<script type="text/javascript"><!--
site_url="<?php echo $this->_tpl_vars['site_root']; ?>
";
--></script>
<script type="text/javascript" src="js/prototype.js"></script>
<script type="text/javascript" src="js/sendform.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title><?php echo $this->_tpl_vars['company_name']; ?>
 | Contact Us</title>

<body bgcolor="#333333" background="images/backgd3.jpg" link="#FF6600" vlink="#FF6600" alink="#FF6600" topmargin="20">
</head><br>
<table width="1004" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="19" colspan="3" valign="top"><img src="images/freewebsitemaker.png" width="1004" height="20" alt="free websites, website maker" /></td>
  </tr>
  <tr>
    <td height="50" colspan="2" valign="top" bgcolor="#FFFFFF"><div align="left">
        <table width="775" height="52" border="0" align="center" cellpadding="11" cellspacing="0">
          <tr>
            <td width="753" valign="middle"><div align="left">
                <p><strong><font color="#0099FF" size="6"><a href="index.html"><font face="Century Gothic"><img src="<?php echo $this->_tpl_vars['logo']; ?>
" alt="<?php echo $this->_tpl_vars['company_name']; ?>
" width="220" border="0" /></font></a></font></strong></p>
            </div></td>
          </tr>
        </table>
    </div></td>
    <td valign="bottom" bgcolor="#FFFFFF"><div align="center">
        <script type="text/javascript">addthis_pub  = '50dollarlogos';</script>
        <br />
        <a href="http://www.addthis.com/bookmark.php" onmouseover="return addthis_open(this, '', '[URL]', '[TITLE]')" onmouseout="addthis_close()" onclick="return addthis_sendto()"><img src="http://s9.addthis.com/button1-addthis.gif" alt="!" width="125" height="16" border="0"/></a><br />
        <br />
        <script type="text/javascript" src="http://s7.addthis.com/js/152/addthis_widget.js"></script>
    </div></td>
  </tr>
  <tr>
    <td height="37" bgcolor="#FF6600">&nbsp;</td>
    <td colspan="2" valign="middle" bgcolor="#FF6600"><div align="right"><font color="#FFFFFF" size="4" face="trebuchet MS"><?php echo $this->_tpl_vars['about_us_phone']; ?>
</font><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><strong>&nbsp;&nbsp;&nbsp;&nbsp;</strong></font></div></td>
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
              </font>
              <div align="left"><font face="trebuchet MS"><br />
                  <font color="#00CCCC" size="2" face="trebuchet MS"><font color="#333333" size="2" face="Verdana, Arial, Helvetica, sans-serif"><?php unset($this->_sections['outer']);
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
</a><br />
                  <br />
                    <?php endfor; else: ?>
                    none
                    <?php endif; ?></font></font></div></td>
        </tr>
      </table></td>
    <td width="650" valign="top" bgcolor="#FFFFFF"><table width="650" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="22" valign="top"><div align="left"></div></td>
        <td width="628" valign="top"><div align="center"><br>
          <table width="542" border="0" cellspacing="0" cellpadding="20">
            <tr>
              <td valign="top" bgcolor="#EBEBEB"><div align="left"><div id="center">
			<div align="left"><b><font color="#333333" size="4" face="Century Gothic"> <font color="#288384" face="trebuchet MS">Contact Us </font></font></b></div>
			<font color="#333333" size="2" face="trebuchet MS"><br />
						<?php if (! empty ( $this->_tpl_vars['contact_us_text'] )): ?>			</font>
			<div class="article_wrapper">
				<h2><font color="#333333" size="2" face="trebuchet MS"><?php echo $this->_tpl_vars['contact_us_text']; ?>
</font></h2>
				</div>
			<font color="#333333" size="2" face="trebuchet MS"><?php endif; ?>
			
						<?php if (! empty ( $this->_tpl_vars['contact_us_email'] )): ?> <?php endif; ?> </font>
			<div id="ajax-loader" style="display: none">
				<font color="#333333" size="2" face="trebuchet MS"><img src="images/ajax-loader.gif">			    </font></div>
			<font color="#333333" size="2" face="trebuchet MS">			</font>
			<div class="article_wrapper" id="contact_form"> <font color="#FF6600" size="3" face="trebuchet MS"><strong>Please fill out the short form below and we will respond to you promptly.</strong></font> <br>
			<form>
			  <table align="center">
			    <tr>
			      <td width="180" valign="top">
			        <p><font size="2" face="trebuchet MS"><strong>Message:</strong></font></p>							</td>
							  <td width="208">
							    <input type="hidden" id="to" name="to" value="<?php echo $this->_tpl_vars['contact_us_email']; ?>
">
							    <textarea id="message" name="message" rows="6" cols="30"></textarea>							</td>
						  </tr>
			    			    <?php if (! empty ( $this->_tpl_vars['contact_us_use_names'] )): ?>
			    <tr>
			      <td>
			        <p align="left"><font face="trebuchet MS"><strong><font size="2">Your name:</font></strong></font></p>							</td>
							  <td>
							    <input type="text" id="name" name="name" />							</td>
						  </tr>
			    <?php else: ?>
				  <input type="hidden" id="name" name="name" value="" />
			    <?php endif; ?>
			    
			    			    <?php if (! empty ( $this->_tpl_vars['contact_us_use_address'] )): ?>
			    <tr>
			      <td>
			        <p align="left"><font face="trebuchet MS"><strong><font size="2">Your address:</font></strong></font></p>							</td>
							  <td>
							    <input type="text" id="address" name="address">							</td>
						  </tr>
			    <?php else: ?>
				  <input type="hidden" id="address" name="address" value="" />

			    <?php endif; ?>
			    
			    			    <?php if (! empty ( $this->_tpl_vars['contact_us_use_phone'] )): ?>
			    <tr>
			      <td>
			        <p align="left"><font face="trebuchet MS"><strong><font size="2">Your phone number:</font></strong></font></p>							</td>
							  <td>
							    <input type="text" id="phone" name="phone">							</td>
						  </tr>
			    <?php else: ?>
				  <input type="hidden" id="phone" name="phone" value="" />

			    <?php endif; ?>
			    
			    			    <?php if (! empty ( $this->_tpl_vars['contact_us_use_email'] )): ?>
			    <tr>
			      <td>
			        <p align="left"><font face="trebuchet MS"><strong><font size="2">Your email:</font></strong></font></p>							</td>
							  <td>
							    <input type="text" id="email" name="email">							</td>
						  </tr>
			    <?php else: ?>
				  <input type="hidden" id="email" name="email" value="" />

			    <?php endif; ?>
			    
			    			    <?php if (! empty ( $this->_tpl_vars['contact_us_use_how_learn'] )): ?>
			    <tr>
			      <td>
			        <p align="left"><font face="trebuchet MS"><strong><font size="2">How did you learn about us?</font></strong></font></p>							</td>
							  <td>
							    <input type="text" id="how_learn" name="how_learn">							</td>
						  </tr>
			    <?php else: ?>
				  <input type="hidden" id="how_learn" name="how_learn" value="" />

			    <?php endif; ?>
			    
			    <tr>
			      <td align="center" colspan="2">
			        <input type="submit" value="Send" onclick="return sendForm(this)">							</td>
						  </tr>
			    </table>
				  </form>
			  </div></div>
              </div></td>
              </tr>
          </table>
          
          
          </div></td>
      </tr>
      <tr>
        <td height="19" valign="top"><p align="left">&nbsp;</p>          </td>
        <td valign="top">&nbsp;</td>
      </tr>
    </table></td>
    <td width="175" valign="top" bgcolor="#EBEBEB"><div align="center">
      <table width="147" height="19" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <td width="147" height="19" align="left" valign="top"><div align="left">
              <div align="left">
                <p><font color="#666666" size="2" face="trebuchet MS"><br />
                      <strong><font color="#FF6600" face="Verdana, Arial, Helvetica, sans-serif">Contact Us:</font></strong><font face="Verdana, Arial, Helvetica, sans-serif"><br />
                        <?php echo $this->_tpl_vars['about_us_address']; ?>
<br />
                        <?php echo $this->_tpl_vars['about_us_city']; ?>
 <?php echo $this->_tpl_vars['about_us_state']; ?>
&nbsp; <?php echo $this->_tpl_vars['about_us_zip']; ?>
<br />
                        <br />
                        <strong><font color="#FF6600">Hours:</font><br />
                      </strong><?php echo $this->_tpl_vars['about_us_hours']; ?>
</font></font><font face="Verdana, Arial, Helvetica, sans-serif"><br />
                            <br />
                            <font color="#666666" size="2"><strong><font color="#FF6600">Call Us:</font><font color="#009933"><br />
                            </font></strong> <?php echo $this->_tpl_vars['about_us_phone']; ?>
</font></font></p>
                <p> <?php if (( $this->_tpl_vars['facebook_link'] )): ?><a href="<?php echo $this->_tpl_vars['facebook_link']; ?>
"><img src="images/facebook.png" alt="Facebook Us!" border="0" /></a>&nbsp;<?php endif; ?>
                  <?php if (( $this->_tpl_vars['twitter_link'] )): ?><a href="<?php echo $this->_tpl_vars['twitter_link']; ?>
"><img src="images/twitter.png" alt="Follow Us!" border="0" /></a>&nbsp;<?php endif; ?>
                  <?php if (( $this->_tpl_vars['linkedin_link'] )): ?><a href="<?php echo $this->_tpl_vars['linkedin_link']; ?>
"><img src="images/linkedin.png" alt="LinkedIn" border="0" /></a><?php endif; ?></p>
              </div>
          </div></td>
        </tr>
      </table>
    </div></td>
  </tr>
  <tr>
    <td height="34" colspan="3" bgcolor="#6E3D36">&nbsp;&nbsp;<font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">&copy;
        <script language="JavaScript" type="text/javascript">document.write((new Date()).getFullYear());</script>
<?php echo $this->_tpl_vars['company_name']; ?>
. All rights reserved.</font></td>
  </tr>
  <tr>
    <td colspan="3"><div align="right">
      <div align="right">
        <div align="right"><?php if (( isset ( $this->_tpl_vars['remove_branding'] ) )): ?><?php else: ?>
          <div align="right"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif"><span class="style2">created with</span><strong> ProWebWizard.com</strong></font></div>
          <?php endif; ?> </div>
      </div>
    </div></td>
  </tr>
</table>