<?php /* Smarty version 2.6.19, created on 2011-10-14 12:06:26
         compiled from index.tpl */ ?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<title><?php echo $this->_tpl_vars['company_name']; ?>
 - | Home</title>
<script type="text/javascript" language="javascript" src="lytebox.js"></script>
<link rel="stylesheet" href="lytebox.css" type="text/css" media="screen" />
</head>
<body bgcolor="#333333" background="images/background.jpg" link="#009933" vlink="#009933" alink="#009933" topmargin="20">
<table width="1004" border="0" align="center" cellpadding="0" cellspacing="0">
  <tr>
    <td height="19" colspan="3" valign="top"><img src="images/freewebsitemaker.png" width="1004" height="20" alt="free websites, website maker"></td>
  </tr>
  <tr>
    <td height="50" colspan="2" valign="top" bgcolor="#FFFFFF"><div align="left">
      <table width="775" height="52" border="0" align="center" cellpadding="11" cellspacing="0">
        <tr>
          <td width="753" valign="middle"><div align="left">
              <p><strong><font color="#0099FF" size="6"><a href="index.html"><font face="Century Gothic"><img src="<?php echo $this->_tpl_vars['logo']; ?>
" alt="<?php echo $this->_tpl_vars['company_name']; ?>
" width="220" border="0"></font></a></font></strong></p>
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
    <td colspan="2" valign="middle" background="images/freewebsites2.jpg">      
    <div align="right"><font color="#FFFFFF" size="4" face="trebuchet MS">CALL US TODAY!<strong> &nbsp;</strong><?php echo $this->_tpl_vars['about_us_phone']; ?>
</font><font color="#FFFFFF" face="Arial, Helvetica, sans-serif"><strong>&nbsp;&nbsp;&nbsp;&nbsp;</strong></font></div></td>
  </tr>
  <tr>
    <td height="119" colspan="3" align="center" valign="top"><img src="images/websitebuilder2.jpg" width="1004" height="198" border="0"></td>
  </tr>
  
  <tr>
    <td width="179" height="358" valign="top" bgcolor="#EBEBEB">
      <table width="143" border="0" align="center" cellpadding="13" cellspacing="0">
        <tr>
          <td width="117" valign="top"><div align="center"><font face="trebuchet MS">&nbsp;&nbsp;&nbsp;&nbsp;
                <script src="http://connect.facebook.net/en_US/all.js#xfbml=1"></script>
          </font></div>
            
            <font face="trebuchet MS">
            <fb:like href="" layout="button_count" show_faces="false" width="30" font=""></fb:like>
            <div align="left"><br>
              <font color="#00CCCC" size="2" face="trebuchet MS"><?php unset($this->_sections['outer']);
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
          <?php endif; ?></div>
          </font></td>
        </tr>
    </table></td>
    <td width="650" valign="top" bgcolor="#FFFFFF"><div align="center">
      <table width="650" border="0" cellspacing="15" cellpadding="15">
        <tr>
          <td width="383" valign="top" background="images/companyinfo2.jpg" bgcolor="#EFEFEF">&nbsp;</td>
          <td width="162" valign="top">&nbsp;</td>
        </tr>
        <tr>
          <td height="265" colspan="2" valign="top" bgcolor="#EFEFEF"><div align="left"><font color="#666666" size="2" face="trebuchet MS">            <?php echo $this->_tpl_vars['about_us_text']; ?>
</font></div></td>
          </tr>
      </table>
    </div></td>
    <td width="175" valign="top" bgcolor="#EBEBEB"><table width="147" height="19" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <td width="147" height="19" align="left" valign="top"><div align="left">
          <div align="left">
            <p><font color="#666666" size="2" face="trebuchet MS"><br>
                <strong><font color="#009933">Contact Us:</font></strong><br>
                <?php echo $this->_tpl_vars['about_us_address']; ?>
<br>
              <?php echo $this->_tpl_vars['about_us_city']; ?>
 <?php echo $this->_tpl_vars['about_us_state']; ?>
&nbsp; <?php echo $this->_tpl_vars['about_us_zip']; ?>
<br>
              <br>
              <strong><font color="#009933">Hours:</font><br>
</strong><?php echo $this->_tpl_vars['about_us_hours']; ?>
</font><font face="trebuchet MS"><br>
              <br>
                <font color="#666666" size="2"><strong><font color="#009933">Call Us:<br>
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
    </table></td>
  </tr>
  <tr>
    <td height="32" colspan="3" valign="middle" bgcolor="#666666"><span class="style3"><span class="style4">&nbsp;&nbsp;<font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif">&copy;  
            <script language="JavaScript" type="text/javascript">document.write((new Date()).getFullYear());</script>
<?php echo $this->_tpl_vars['company_name']; ?>
. All rights reserved.</font></span></span> </td>
  </tr><?php if (( isset ( $this->_tpl_vars['remove_branding'] ) )): ?><?php else: ?>
  <tr>    <td height="28" colspan="3" valign="middle"><div align="right"><font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif"><span class="style2">created with</span><strong> ProWebWizard.com</strong></font></div></td>  
  </tr><?php endif; ?>
</table>


<map name="Map">
<area shape="rect" coords="3,3,31,28" href="#"><area shape="rect" coords="39,3,65,27" href="#">
</map>
</body></html>