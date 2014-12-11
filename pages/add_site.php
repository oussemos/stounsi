<?php
$isCompleate = false;
if($_POST){
	include_once('pages/process_addsite.php');	 
}

if(!$isCompleate){
?>

<script type="text/javascript">
<?php
	$imageCount = 0;
	if ($handle = opendir(BASE_FOLDER.'thumbs')) 
	{
		$templatesThumb=array();
		while (false !== ($file = readdir($handle))) 
		{
			if ($file != "." && $file != "..") 
			{
				list($font, $null) = split('\.', $file);
				$font = ucwords($font);
				$templatesThumb[]=$file;
				$imageCount++;
			}
		}
		closedir($handle);
		sort($templatesThumb);
		$j=0;
		foreach($templatesThumb as $thumb) {
		  echo "imgFile[$j] = \"".SITE_ROOT."thumbs/".$thumb."\";\n";
		  $j++;
		}
	}
?>
	preload_thumbs();
</script>

<!-- form name="formname" method="post" enctype="multipart/form-data" action="index.php?page=ps_addsite" onsubmit="return validate_site_reg(this)" -->
<form name="formname" method="post" enctype="multipart/form-data" action="index.php?page=ps_addsite" >
		<input type="hidden" name="formname" value="add_site" />
       	<h3 align="center" class="style7">
   		<font color="#CCCCCC" size="2" face="Century Gothic"></font><img src="../assets/images/websites.jpg" alt="" />
        		<font size="3" ></font>        </h3>
        <h4 class="button">Select Your Website Design Style:</h4>
  <table align="center" cellpadding="2">
    <tr>
<?php
	if ($imageCount >= 4)
	{
?>
        <td>
	      	<a href="javascript:change_image(-1)">
	      		<img src="../assets/images/websitemaker.gif" alt="" width="30" height="38" border="0" />
	      	</a>
        </td>
<?php 
	    for($im=1;$im<=4;$im++)
	    {	
?>
		<td>
		  <div id="icon<?php echo $im;?>"></div>
		</td>
		<td valign="top">
		  <div id="rbutton<?php echo $im;?>"></div>
		</td>
<?php 
	    } 
?>
		<td>
			<a href="javascript:change_image(1)"><img src="../assets/images/websitebuilder.gif" alt="" width="30" height="38" border="0" /></a>
		</td>
  <?php
	}
	else
	{
		for ($i=0; $i<$imageCount; $i++)
		{
			echo "<td>
					<div id=\"icon".($i+1)."\"></div>
				</td>
				<td valign=\"top\">
					<div id=\"rbutton".($i+1)."\"></div>
				</td>";
		}
	}
?>
    </tr>
  </table>
  
<div align="left">
  
  <p align="center"><img src="../assets/images/free_websites.png" alt="" width="741" height="8" />  </p>
</div>
  <p align="left"><br />
    <font color="#027E91" class="button">Enter Account Information :</font></p>
  <table width="738" cellpadding="8">
    <tr>
      <td width="268" class="text"><div align="left">Site Name / Company Name:</div></td>
      <td width="242"><input id="company_name" name="company_name" type="text" class="choosefilebutton" value="<?php if ($_POST) echo $company_name; ?>" size="30" /></td>
    </tr>
    <tr>
      <td class="text"><div align="left">Subdomain:</div></td>
      <td><input name="subdomain" type="text" class="formfield" id="subdomain" onkeyup="check_avalible()" value="<?php if ($_POST) echo $subdomain; ?>" size="30" /></td>
      <td width="147">&nbsp;</td>
      <td width="5"><div id="ajax-loader" style="display: none"><img src="../assets/images/ajax-loader.gif" /></div></td>
    </tr>
    <tr>
      <td class="text"><div align="left">(dev.cherni.tn/user/<span class="style8">subdomain</span>)</div></td>
      <td><font color="#836D7B"><img src="../assets/images/domainavailability.png" alt="domain availability" width="97" height="23" /></font></td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
    <tr>
      <td colspan="2" class="text"><div align="left" class="style23"><span class="style26"><span class="style31">*Password must contain: </span><br />
            <span class="style29">&nbsp; &nbsp;ONE NUMBER + </span> <span class="style29"><br />
&nbsp; &nbsp;ONE CAPITALIZED LETTER</span></span></div></td>
    </tr>
    <tr>
      <td class="text"><div align="left">Password: &nbsp;&nbsp;( Ex: <span class="style23">Password1 </span>)</div></td>
      <td>
      	<input name="password" id="password" type="password" class="formfield" value="<?php echo (isset($_POST['password'])?$_POST['password']:''); ?>" size="30" />
      	<span class="field_validate"></span>
      </td>
    </tr>
    
    <tr>
      <td class="text"><div align="left">Confirm Password: &nbsp;&nbsp;</div></td>
      <td>
      	<input name="cpassword" id="cpassword" type="password" class="formfield" value="<?php echo (isset($_POST['cpassword'])?$_POST['cpassword']:''); ?>" size="30" />
      	<span class="field_validate"></span>
      </td>
    </tr>
    
    <tr>
      <td class="text"><div align="left">Email:&nbsp; ( This will be your username )</div></td>
      <td><input name="email" id="email" type="text" class="formfield" value="<?php echo (isset($_POST['email'])?$_POST['email']:''); ?>" size="30" /></td>
    </tr>
  </table>
  <p align="center"><img src="../assets/images/free_websites.png" alt="" width="741" height="8" /></p>
  <h4 class="button">&quot;About Us&quot; Page:</h4>
  <table width="769">
    <tr>
      <td width="638" class="text">Would you like to add an "About Us" page?</td>
		  <td width="119"><input type="radio" name="use_about_us" value="1" onclick="change_visible(true, 'about_us')" <?php if ($_POST) if ($use_about_us) echo "checked='checked'"; ?> />
		    Yes 
		    <input type="radio" name="use_about_us" value="0" onclick="change_visible(false, 'about_us')" <?php if ($_POST) {if (!$use_about_us) echo "checked='checked'";} else echo "checked='checked'"; ?> />No</td>
    </tr>
  </table>
  
  <script type="text/javascript">
<!--
	  $('#password').keyup(function(){
			if(validatePWD($(this).val())){
		  		$(this).removeClass('invalid_fdata');
			}else{
				$(this).addClass('invalid_fdata');
			}
		});
		$('#cpassword').keyup(function(){
  	  		if($(this).val() == $('#password').val()){
  	  	  	  	if(validatePWD($(this).val())){
  			  		$(this).removeClass('invalid_fdata');
  				}else{
  					$(this).addClass('invalid_fdata');
  				}
  	  	  	}else{
  	  	  	  	$(this).addClass('invalid_fdata');
  	  	  	}
  	  	});
--></script>
  
<div style="display:none;padding-left: 10px" id="about_us">
	  <table cellpadding="7">
	    <tr>
	      <td valign="top" class="text">About us text:</td>
			  <td><textarea name="about_us_text" cols="70" rows="7" class="formfield"><?php echo (isset($_POST['about_us_text'])?$_POST['about_us_text']:''); ?></textarea></td>
	    </tr>
	    <tr>
	      <td valign="middle" class="text"><div align="left">Phone:</div></td>
			  <td><input name="about_us_phone" type="text" class="formfield" value="<?php echo (isset($_POST['about_us_phone'])?$_POST['about_us_phone']:'');  ?>" size="30" /></td>
	    </tr>
	    <tr>
	      <td valign="middle" class="text"><div align="left">Address:</div></td>
			  <td><input name="about_us_address" type="text" class="formfield" value="<?php echo (isset($_POST['about_us_phone'])?$_POST['about_us_address']:''); ?>" size="30" /></td>
	    </tr>
	    <tr>
	      <td valign="middle" class="text"><div align="left">City:</div></td>
			  <td><input name="about_us_city" type="text" class="formfield" value="<?php echo (isset($_POST['about_us_phone'])?$_POST['about_us_city']:''); ?>" size="30" /></td>
	    </tr>
	    <tr>
	      <td valign="middle" class="text"><div align="left">State:</div></td>
			  <td><input name="about_us_state" type="text" class="formfield" value="<?php echo (isset($_POST['about_us_state'])?$_POST['about_us_state']:''); ?>" size="30" /></td>
	    </tr>
	    <tr>
	      <td valign="middle" class="text"><div align="left">Zip:</div></td>
			  <td><input name="about_us_zip" type="text" class="formfield" value="<?php echo (isset($_POST['about_us_zip'])?$_POST['about_us_zip']:''); ?>" size="30" /></td>
	    </tr>
	    <tr>
	      <td valign="middle" class="text"><div align="left">Hours of operation:</div></td>
			  <td><input name="about_us_hours" type="text" class="formfield" value="<?php echo (isset($_POST['about_us_hours'])?$_POST['about_us_hours']:''); ?>" size="30" /></td>
	    </tr>
	  </table>
  </div>
  
<h4 align="center"><img src="../assets/images/free_websites.png" alt="free websites, free" width="741" height="8" /></h4>
  <h4 class="button">&quot;Testimonials&quot; Page:</h4>
  <table width="776">
    <tr>
      <td width="637" class="text">Would you like to add a &quot;Customer Testimonials&quot; page?</td>
		  <td width="127"><input type="radio" name="use_testmonials" value="1" onclick="change_visible(true, 'testmonials')" <?php if ($_POST) if ($use_testmonials) echo "checked='checked'"; ?> />
		    Yes 
		    <input type="radio" name="use_testmonials" value="0" onclick="change_visible(false, 'testmonials')" <?php if ($_POST) {if (!$use_testmonials) echo "checked='checked'";} else echo "checked='checked'"; ?> />No</td>
    </tr>
  </table>
  <div style="display: <?php if ($_POST) if ($use_testmonials) echo "block"; else echo "none"; else echo "none"; ?>; padding-left: 10px" id="testmonials"><em><br />
    &quot;Fabulous Service! I Love It!&quot; - Customer's Name - Company Name or State</em> <br />
    <br />
    <table cellpadding="7">
    	<?php 
    		for($t=1;$t<=6;$t++){
    	?>
	    	<tr>
	      		<td valign="middle" class="text">
	      			<div align="left">Testimonial #<?php echo $t?>:</div>
	      		</td>
			  	<td>
			  		<input name="Testmonial_<?php echo $t;?>" type="text" class="formfield" value="<?php echo (isset($_POST['Testmonial_'.$t])?$_POST['Testmonial_'.$t]:''); ?>" size="70" />
			  	</td>
		    </tr>
	  <?php } ?>
  	</table>
  <p align="center"><br />
  </p>
  </div>
  
  <p align="center"><img src="../assets/images/free_websites.png" alt="" width="741" height="8" /></p>
<div id="choise-logo-block">
    <div>
      <span class="style6"><img src="../assets/images/logo_maker.png" alt="" width="27" height="27" />&nbsp;</span>
      <span class="button">Company Logo: </span>
      <span><input name="logo" type="file" class="choosefilebutton" /></span>
    </div>
<br />
    <div >
      <div style="width:300px; display: inline">
	<b>DON'T HAVE A LOGO YET?</b><br />You can add it later or make one now:
      </div>
      <div style="width:300px; display: inline"><a href="/logomaker/index.php" target="_blank"><img src="../assets/images/logodesignmaker.png" alt="" width="161" height="38" border="0" />&nbsp;</a>      </div>
    </div>

</div>  


  <div align="center"><img src="../assets/images/free_websites.png" alt="" width="741" height="8" /></div>
  <h4 class="button">&quot;Gallery&quot; Page:</h4>
  <table>
    <tr>
      <td width="643" class="text">Would you like to use your free &quot;Gallery&quot;?</td>
		  <td width="120"><input type="radio" name="use_gallery" value="1" onclick="change_visible(true, 'gallery')" <?php if ($_POST) if ($use_gallery) echo "checked='checked'"; ?> />
		    Yes 
		    <input type="radio" name="use_gallery" value="0" onclick="change_visible(false, 'gallery')" <?php if ($_POST) {if (!$use_gallery) echo "checked='checked'";} else echo "checked='checked'"; ?> />No</td>
    </tr>
  </table>
  <div style="display: <?php if ($_POST) if ($use_gallery) echo "block"; else echo "none"; else echo "none"; ?>; padding-left: 10px" id="gallery">
  <p class="style6">Website Gallery | Upload Your Photos </p>
  <table cellpadding="7">
  <?php for($g=1;$g<=10;$g++){?>
    <tr>
      <td class="text">
      	<img src="../assets/images/website_photos.png" alt="" width="24" height="26" /> 
      	<?php echo $g;?>
      </td>
	  <td class="text"><input name="image_<?php echo $g;?>" type="file" class="choosefilebutton" /></td>
	</tr>
	<?php } ?>
    
  </table>
  </div>
  
<h4 align="center"><img src="../assets/images/free_websites.png" alt="" width="741" height="8" /></h4>
  <h4 class="button">&quot;F.A.Q.&quot; Page:</h4>
  <table>
    <tr>
      <td width="648" class="text">Would you like to add a &quot;Frequently Asked Questions&quot; page?</td>
		  <td width="118"><input type="radio" name="use_faq" value="1" onclick="change_visible(true, 'faq')" <?php if ($_POST) if ($use_faq) echo "checked='checked'"; ?> />
		    Yes 
		    <input type="radio" name="use_faq" value="0" onclick="change_visible(false, 'faq')"  <?php if ($_POST) {if (!$use_faq) echo "checked='checked'";} else echo "checked='checked'";?> />No</td>
    </tr>
  </table>
<div>  

<div id="faq_item_template" style="display: none;">
	            <table cellpadding="7">
						  <tbody>
						  <tr>
							<td valign="middle" class="text"><div align="left">Question:</div></td>
									<td><input type="text" size="50" class="formfield" name="question[SLNO]" value="" /></td>
									<td rowspan="2"><button onclick="remove_faq_block(this)" slno="SLNO" class="remove_button_faq">Remove this Q/A</button></td>
						    </tr>
						  <tr>
							<td valign="middle" class="text"><div align="left">Answer:</div></td>
									<td><input size="50" class="formfield" name="answer[SLNO]" value="" /></td>
						    </tr>
						  </tbody>
		    </table>
</div>

<div style="display: <?php if ($_POST) if ($use_faq) echo "block"; else echo "none"; else echo "none"; ?>; padding-left: 10px" id="faq">
  
  <div id="faq_repeat">
    <div align="left"><em><br /> 
      What time do you open on Saturdays?<br />
      We open at 11:00 am on Saturdays.
      </em><br />
      <br />
    </div>
<div class="faq_item">
	            <table cellpadding="7">
						  <tbody>
						  <tr>
							<td valign="middle" class="text"><div align="left">Question:</div></td>
									<td><input type="text" size="50" class="formfield" name="question[0]" value="" /></td>
									<td rowspan="2">&nbsp;</td>
						    </tr>
						  <tr>
							<td valign="middle" class="text"><div align="left">Answer:</div></td>
									<td><input size="50" class="formfield" name="answer[0]" value="" /></td>
						    </tr>
						  </tbody>
		    </table>
</div>
	  </div>
		  <button id="add_button_faq" onclick="add_faq(); return false;">Add Another Q / A</button>
  </div>

<script type="text/javascript">
<!--
function add_faq(){
					var ttl_faq_items = $('.faq_item').length;
					var faq_new_item_blck = $('#faq_item_template').html().replace(/SLNO/g,ttl_faq_items);
						if(ttl_faq_items){
							$('.faq_item:last').after('<div class="faq_item">'+faq_new_item_blck+'</div>');
						}else{
							$('#faq_content_header').after('<div class="faq_item">'+faq_new_item_blck+'</div>');
						}
				}

                function remove_faq_block(ele){
                    var slno = $(ele).attr('slno');
                    $('.faq_item:eq('+slno+')').remove();
                }
-->
</script>
</div>  
<h4 align="center"><img src="../assets/images/free_websites.png" alt="" width="741" height="8" /></h4>
  <h4 class="button">&quot;Contact Us&quot; Page:</h4>
  <table>
    <tr>
      <td width="652" class="text">Would you like to add a &quot;Contact Us&quot; page?</td>
		  <td width="110"><input type="radio" name="use_contact_us" value="1" onclick="change_visible(true, 'contact_us')" <?php if ($_POST) if ($use_contact_us) echo "checked='checked'"; ?> />
		    Yes 
		    <input type="radio" name="use_contact_us" value="0" onclick="change_visible(false, 'contact_us')" <?php if ($_POST) {if (!$use_contact_us) echo "checked='checked'";} else echo "checked='checked'"; ?> />No</td>
    </tr>
  </table>
  <div style="display:none; padding-left: 10px" id="contact_us">
  <table cellpadding="7">
    <tr>
      <td width="364" valign="top" class="text"><div align="left">Contact Us Text (Message shown above form):</div></td>
		  <td width="438"><textarea name="contact_us_text" cols="60" rows="5" class="formfield"><?php echo (isset($_POST['contact_us_text'])?$_POST['contact_us_text']:''); ?></textarea></td>
    </tr>
    <tr>
	      <td valign="middle" class="text"><div align="left">Email address to receive messages:</div></td>
		  <td><input name="contact_us_email" type="text" class="formfield" value="<?php echo (isset($_POST['contact_us_email'])?$_POST['contact_us_email']:''); ?>" size="30" /></td>
    </tr>
    <tr>
	      <td valign="middle" class="text"><div align="left">Add a field to collect user's first &amp; last name?</div></td>
		  <td><input name="contact_us_use_names" type="radio" value="1" checked="checked" <?php if ($_POST) if ($contact_us_use_names) echo "checked='checked'"; ?> />
		    Yes 
		    <input name="contact_us_use_names" type="radio" value="0" <?php if ($_POST) if (!$contact_us_use_names) echo "checked='checked'"; ?> />No</td>
    </tr>
    <tr>
      <td valign="middle" class="text"><div align="left">Add a field to collect user's address?</div></td>
		  <td><input name="contact_us_use_address" type="radio" value="1" checked="checked" <?php if ($_POST) if ($contact_us_use_address) echo "checked='checked'"; ?> />
		    Yes 
		    <input name="contact_us_use_address" type="radio" value="0" <?php if ($_POST) if ($contact_us_use_address) echo "checked='checked'"; ?> />No</td>
    </tr>
    <tr>
      <td valign="middle" class="text"><div align="left">Add a field to collect user's phone #?</div></td>
		  <td><input name="contact_us_use_phone" type="radio" value="1" checked="checked" />
		    Yes 
		    <input type="radio" name="contact_us_use_phone" value="0" />
		    No</td>
    </tr>
    <tr>
      <td valign="middle" class="text"><div align="left">Add a field to collect user's email address?</div></td>
		  <td><input name="contact_us_use_email" type="radio" value="1" checked="checked" />
		    Yes 
		    <input type="radio" name="contact_us_use_email" value="0" />No</td>
    </tr>
    <tr>
      <td valign="middle" class="text"><div align="left">Add "How did you learn  about us?" field?</div></td>
		  <td><input name="contact_us_use_how_learn" type="radio" value="1" checked="checked" />
		    Yes 
		    <input type="radio" name="contact_us_use_how_learn" value="0" />No</td>
    </tr>
  </table>
  </div>
  
<h4 align="center">
	<img src="../assets/images/free_websites.png" alt="" width="741" height="8" />
</h4>
<table width="738" cellpadding="8">
    <tr>
      <td width="268" valign="middle" class="text">
      	<div align="left"><img src="../assets/images/facebook.png" alt="Facebook" width="24" height="26">&nbsp;Facebook Profile Link (Optional)</div>
      </td>
      <td width="242">
      	<input id="facebook_link" name="facebook_link" type="text"  style="padding:5px;width: 300px" value="<?php if ($_POST) echo $facebook_link; ?>" size="30" />
      </td>
    </tr>
    <tr>
      <td width="268" valign="middle" class="text">
      	<div align="left"><img src="../assets/images/twitter.png" alt="Twitter" width="24" height="26"> Twitter Profile Link (Optional)</div>
      </td>
      <td width="242">
      	<input id="twitter_link" name="twitter_link" type="text" style="padding:5px;width: 300px" value="<?php if ($_POST) echo $twitter_link; ?>" size="30" />
      </td>
    </tr>
    <tr>
      <td width="268" valign="middle" class="text">
      	<div align="left"><img src="../assets/images/linkedin.png" alt="Facebook" width="24" height="26"> LinkedIn Profile Link (Optional) </div>
      </td>
      <td width="242">
      	<input id="linkedin_link" name="linkedin_link" type="text" style="padding:5px;width: 300px" value="<?php if ($_POST) echo $linkedin_link; ?>" size="30" />
      </td>
    </tr>
    
</table>    

<h4 align="center">
	<img src="../assets/images/free_websites.png" alt="" width="741" height="8" />
</h4>
<br />
  <div style="display: none; padding-left: 10px" id="google_ads">
    <table>
    <tr>
      <td>Paste code here:</td>
		  <td><textarea name="google_code" rows="6" cols="20"></textarea></td>
	  </tr>
  </table>
  </div>
  <span class="style19"><strong>PLEASE BE PATIENT</strong> AS YOUR IMAGES ARE UPLOADED </span><br /> 
  <br />
  <input type="image" src="../assets/images/makewebsite.png" value="add_site" border="0" name="submit" alt="" />
</form>
<?php } ?>