<script type="text/javascript" src="../assets/js/jquery.jeditable.js"></script>
<script type="text/javascript" src="../assets/js/jquery.jeditable.ajaxupload.js"></script>
<script type="text/javascript" src="../assets/js/jquery.ajaxfileupload.js"></script>
<script type="text/javascript" src="../assets/js/edit_site.js"></script>
<?php
global $nobanner;
$query = mysql_query("SELECT * FROM sites WHERE id='".$_SESSION['id']."'");
if ($query)
{
	if (mysql_num_rows($query) > 0)
	{
		
		$result = mysql_fetch_array($query);
		$site_key =  $_SESSION['id'];
		$sub_query = mysql_query("SELECT * FROM faq WHERE site_id='".$_SESSION['id']."'");
		$custom_page_query = mysql_query("SELECT * FROM custom_page WHERE site_id = '".$_SESSION['id']."'");
		$site_template = abs($result['design']);
		$nobanner=($result['design']>0)?false:true;
	}
}
?> 
<table width="831" border="0" align="center" cellpadding="0" cellspacing="0" class="edittext1" >
 
  
  <tr>
    <td width="713" align="right" valign="top" bgcolor="#FFFFFF">
<table width="694" border="0" align="right" cellpadding="0" cellspacing="0" >
      <tr>
        <td width="668" valign="top" bgcolor="#FFFFFF"><div align="left">
          <div align="left">
            <center>
              <h3 align="left" class="style1"> <img src="../assets/images/logo_maker.png" alt="logo maker, website maker"/>&nbsp; Website Manager </h3>
            </center>
            
            <style type="text/css">
				.gray_overview_box{
					border: 1px solid #ccc;padding:5px 10px;font-size: 13px;color:#787878;
					padding:12px;	
				}
            	.graybutton{
					display:block;padding:8px;color: #454545;text-decoration: none;border:1px solid #ccc;clear:both;margin:10px;
					-moz-border-radius:5px;
					background: -webkit-gradient(linear, left top, left bottom, from(#FFFFFF), to(#DADADA));
					background:-moz-linear-gradient(top, #FFF, #DADADA);
					filter:  progid:DXImageTransform.Microsoft.gradient(startColorstr='#FFFFFF', endColorstr='#DADADA');	
					font-size: 12px;
					text-align: center;
					margin:5px 0px;
            	}
 
            </style>
            
            <table width="640" cellpadding="0" cellspacing="0" style="margin: 0px 10px;">
            	<tr>
            		<td width="50%">
            			<div class="gray_overview_box" style="border-right: 1px solid #e3e3e3;-moz-border-radius:5px 0px 0px 5px">
            				<p>Register, manage, and forward my own domain to use with my website (<b>mydomain.com</b>) here. <b style="color: #118F00;font-size: 14px;">$15</b></p>
            				<a class="graybutton" href="https://www.hover.com/freewebsites" target="_blank">SEARCH &amp; ORDER MY DOMAIN</a>
            			</div>
            		</td>
<?php if (!$nobanner) { ?>
            		<td >
            			<div class="gray_overview_box" style="border-left: none;-moz-border-radius:0px 5px 5px 0px">
            				<p>Remove the branding from the bottom of my website. <b style="color: green;font-size: 14px;">$10</b></p>
            				<a class="graybutton" href="https://yourpaypalcodehere-see installation guide">REMOVE "CREATED WITH..."</a>
<!-- process.php?type=rm_branding -->
            			</div>
            		</td>
<?php } ?>
            	</tr>
            </table>
            <br />
            <table width="671" cellpadding="0">
              <tr>
                <td  width="285" valign="top"><div align="left"><span class="style4">Account Information</span></div></td>
                <td>&nbsp;</td>
              </tr>
              
             
              <tr>
              	<td colspan="2">
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
              		 <h4 class="button">Update Website Design:</h4>
					  <table align="center" cellpadding="2">
					    <tr>
					  <?php
					  	$imageCount = 4;
						if ($imageCount >= 4)
						{
					?>
					        <td>
						      	<a href="javascript:change_image(-1)">
						      		<img src="../assets/images/websitemaker.gif" alt="" width="30" height="38" border="0" />
						      	</a>
					        </td>
					        <?php for($im=1;$im<=3;$im++){?>
							<td>
							  <div id="icon<?php echo $im;?>"></div>
							</td>
							<td valign="top">
							  <div id="rbutton<?php echo $im;?>"></div>		</td>
							<td>
							<?php } ?>
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
					  <div id="site_design_upd" align="center" style="background: #ffffe0;padding:10px;"></div>
              	</td>
              </tr>
               <tr>
              	<td colspan="2">&nbsp;</td>
              </tr>
              <tr>
                <td width="285"><div align="left"><span class="style5">Site Name / Company Name:</span></div></td>
                <td width="349" bgcolor="#ffff99"><span class="editable" id="company_name" align="left"><?php echo $result['name']; ?></span></td>
              </tr>
              <tr>
                <td colspan="2" class="edittext1">&nbsp;</td>
                </tr>
              <tr>
                <td><div align="left" class="style5">Company Logo:</div></td>
                <td bgcolor="#FFFFFF">
					<div id="logo" class="ajaxupload"  align="center">
                  		<?php if(isset($result['logo'])) echo "<img style='max-width:300px;' src=\"".$subdomains_link.$result['subdomain']."/images/".$result['logo']."\">"; else echo "click to edit"; ?>
				  	</div>
				</td>
            </tr>
            </table>
            <div align="center"><br>
                <img src="../assets/images/smallbusinesswebsites.jpg" alt="" width="624" height="8"><br>
                <br>
            </div>
            <table width="399" border="0" cellspacing="0" cellpadding="7">
              <tr>
                <td width="34" valign="middle"><div align="left"><img src="../assets/images/aboutus.png" alt="about us info" width="24" height="26"> </div></td>
                <td width="365" valign="middle"><div align="left" class="style4"><b>About Us  Page </b></div></td>
              </tr>
            </table>
            <br>
            <table width="667" cellpadding="7">
              <tr>
                <td width="397"><span class="style5">Would you like to add an "About us" page?</span></td>
                <td width="234" bgcolor="#DCE4F1">
					<div id="use_about_us"><div align="center"><?php if($result['use_about_us']) echo "Yes"; else echo "No"; ?></div></div>
				</td>
              </tr>
            </table>
            <div id="use_aboutus_content" style="padding-left: 10px;<?php echo ((!$result['use_about_us'])?'display:none;':'');?>" ><br>
              <table width="658" align="center" cellpadding="7">
                <tr>
                  <td width="27" align="center" valign="middle" class="style5"><div align="center"><img src="../assets/images/aboutus.png" alt="about us info" width="24" height="26"></div></td>
                  <td width="162" class="style5">About Us page text:</td>
                  <td width="373" bgcolor="#ffff99">
					<div id="about_us_text"><?php if (empty($result['about_us_text'])) echo "click to edit"; else echo $result['about_us_text']; ?></div>
				  </td>
                  
                </tr>
                
                <tr>
                  <td align="center" valign="middle" class="style5"><div align="center"><img src="../assets/images/aboutus.png" alt="about us info" width="24" height="26"></div></td>
                  <td class="style5">Phone:</td>
                  <td bgcolor="#ffff99">
				  <div id="about_us_phone"><?php if (empty($result['about_us_phone'])) echo "click to edit"; else echo $result['about_us_phone']; ?></div></td>
                </tr>
                <tr>
                  <td align="center" valign="middle" class="style5"><div align="center"><img src="../assets/images/aboutus.png" alt="about us info" width="24" height="26"></div></td>
                  <td class="style5">Address:</td>
                  <td bgcolor="#ffff99">
				  <div id="about_us_address"><?php if (empty($result['about_us_address'])) echo "click to edit"; else echo $result['about_us_address']; ?></div></td>
                </tr>
                <tr>
                  <td align="center" valign="middle" class="style5"><div align="center"><img src="../assets/images/aboutus.png" alt="about us info" width="24" height="26"></div></td>
                  <td class="style5">City:</td>
                  <td bgcolor="#ffff99">
				  <div id="about_us_city"><?php if (empty($result['about_us_city'])) echo "click to edit"; else echo $result['about_us_city']; ?></div></td>
                </tr>
                <tr>
                  <td align="center" valign="middle" class="style5"><div align="center"><img src="../assets/images/aboutus.png" alt="about us info" width="24" height="26"></div></td>
                  <td class="style5">State:</td>
                  <td bgcolor="#ffff99">
				  <div id="about_us_state"><?php if (empty($result['about_us_state'])) echo "click to edit"; else echo $result['about_us_state']; ?></div></td>
                </tr>
                <tr>
                  <td align="center" valign="middle" class="style5"><div align="center"><img src="../assets/images/aboutus.png" alt="about us info" width="24" height="26"></div></td>
                  <td class="style5">Zip:</td>
                  <td bgcolor="#ffff99">
				  <div id="about_us_zip"><?php if (empty($result['about_us_zip'])) echo "click to edit"; else echo $result['about_us_zip']; ?></div></td>
                </tr>
                <tr>
                  <td align="center" valign="middle" class="style5"><div align="center"><img src="../assets/images/aboutus.png" alt="about us info" width="24" height="26"></div></td>
                  <td class="style5">Hours of operation:</td>
                  <td bgcolor="#ffff99">
				  <div id="about_us_hours"><?php if (empty($result['about_us_hours'])) echo "click to edit"; else echo $result['about_us_hours']; ?></div></td>
                </tr>
              </table>
            </div>
            <div align="center"><br>
              <img src="../assets/images/smallbusinesswebsites.jpg" alt="" width="624" height="8"><br>
            </div>
            <table width="399" border="0" cellspacing="0" cellpadding="7">
              <tr>
                <td width="34" valign="middle"><div align="left"><img src="../assets/images/website-testimonials.gif" alt="" width="24" height="26"> </div></td>
                <td width="365" valign="middle"><div align="left" class="style4"><b>Testimonials Page </b></div></td>
              </tr>
            </table>
            <br>
            <table width="670" cellpadding="7">
              <tr>
                <td width="396" class="style5">Would you like to add a customer testimonials page?</td>
                <td width="236" bgcolor="#DCE4F1"><div id="use_testmonials">
                  <div align="center"><?php echo (($result['use_testimonials'])?"Yes":"No"); ?></div>
                </div>
                </td>
              </tr>
            </table>
            
            <div id="use_testimonial_content" style="padding-left: 10px;<?php echo (!($result['use_testimonials'])?'display:none;':'')?>"><br>
              <table  width="581" border="0" align="center" cellpadding="7">
                <tr>
                  <td valign="middle" class="edittext1">&nbsp;</td>
                  <td class="edittext1">&nbsp;</td>
                  <td bgcolor="#FFFFFF"><font size="2"><strong><span class="style7">Example:</span></strong></font><font color="#232323" size="2"> <span class="style5"><strong>&quot;Awesome Service!&quot; - Kim Edwards, Dallas, TX </strong></span></font> </td>
                </tr>
                <tr>
                  <td valign="middle" class="edittext1">&nbsp;</td>
                  <td class="edittext1">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                <?php 
                	for($t=1;$t<=6;$t++){
                ?>
                <tr>
                  <td width="34" valign="middle" class="edittext1"><div align="left"><img src="../assets/images/website-testimonials.gif" alt="" width="24" height="26"></div></td>
                  <td width="110" class="style5">Testimonial <?php echo $t;?>:</td>
                  <td width="387" bgcolor="#ffff99">
					<div id="Testmonial_<?php echo $t;?>" class="edit_testimonails"><?php if (empty($result['testimonail_'.$t])) echo "click to edit"; else echo $result['testimonail_'.$t]; ?></div></td>
                </tr>
                <?php } ?>
            </table>
            </div>
            <div align="center"><br>
                <img width="624" height="8" alt="" src="../assets/images/smallbusinesswebsites.jpg"><br>
                </div>
            <table width="399" cellspacing="0" cellpadding="7" border="0">
              <tbody><tr>
                <td width="34" valign="middle"><div align="left"><img width="24" height="26" border="0" alt="photos" src="../assets/images/website_photos.png"> </div></td>
                <td width="365" valign="middle"><div align="left" class="style4"><b>Image Gallery / Portfolio Page</b></div></td>
              </tr>
            </tbody>
            </table>
            <br />
            <table width="670" cellpadding="7">
              <tbody><tr>
                <td width="396" class="style5">Would you like to use your free gallery?</td>
                <td width="236" bgcolor="#DCE4F1">
                <div id="use_gallery" title="Click to edit" style="background-color: transparent;">
                  <?php if($result['use_gallery']) echo "Yes"; else echo "No"; ?>
                </div>
                </td>
              </tr>
            </tbody></table>    
            <div id="use_gallery_content" style="padding-left: 10px;<?php echo ((!$result['use_gallery'])?'display:none;':'')?>"><br>
              <table width="463" border="0" align="center" cellpadding="7">
                <tr>
                  <td height="27" valign="middle" class="edittext1">&nbsp;</td>
                  <td valign="middle" class="edittext1">&nbsp;</td>
                  <td valign="middle" bgcolor="#FFFFFF"><div align="left" class="style7">&nbsp;<strong>&nbsp;Max Image Size:</strong> 3mb each </div></td>
                </tr>
                <tr>
                  <td valign="middle" class="edittext1">&nbsp;</td>
                  <td valign="middle" class="edittext1">&nbsp;</td>
                  <td>&nbsp;</td>
                </tr>
                  <?php 
                	for($g=1;$g<=10;$g++){
                ?>
                <tr>
                  <td width="28" valign="middle" class="edittext1"><div align="left"><img src="../assets/images/website_photos.png" alt="photos" width="24" height="26" border="0"></div></td>
                  <td width="27" valign="middle" class="style5"> <div align="left"><?php echo $g;?>:</div></td>
                  <td width="358" bgcolor="#ffff99">
                  <div class="upld_gallery" id="gallery_<?php echo $g;?>" >
                    <font size="2">
                    <?php if (empty($result['gallery_'.$g])) echo "Click here to add"; else echo  "<img style='max-width:300px;' src=\"".$subdomains_link.$result['subdomain']."/gallery/".$result['gallery_'.$g]."\">"; ?>
                    
                    </font></div>
                   </td>
                 </tr>
               <?php } ?>
              </table>
            </div>
            <h4 align="center"><b><img src="../assets/images/smallbusinesswebsites.jpg" alt="" width="624" height="8"></b></h4>
            <table width="399" border="0" cellspacing="0" cellpadding="7">
              <tr>
                <td width="34" valign="middle"><div align="left"><img src="../assets/images/faq.png" alt="" width="24" height="26" border="0"> </div></td>
                <td width="365" valign="middle"><div align="left" class="style4"><b>F.A.Q. Page </b></div></td>
              </tr>
            </table>
            <table width="670" cellpadding="7">
              <tr>
                <td width="397" class="style5">Would you like to add a F.A.Q. page?</td>
                <td width="235" bgcolor="#DCE4F1">
                <div id="use_faq">
                  <div align="center">
                    <?php if($result['use_faq']) echo "Yes"; else echo "No"; ?>
                    </div>
                </div></td>
              </tr>
            </table>
            
            <div id="faq_item_template" style="display: none;">
	            <table cellpadding="7">
						  <tbody>
						  <tr>
							<td valign="middle" class="text"><div align="left">Question:</div></td>
									<td><input type="text" size="50" class="formfield" name="question[SLNO]" value=""></td>
									<td rowspan="2"><button onclick=remove_faq_block(this) slno="SLNO" class="remove_button_faq">Remove this Q/A</button></td>
							  </tr>
						  <tr>
							<td valign="middle" class="text"><div align="left">Answer:</div></td>
									<td><input size="50" class="formfield" name="answer[SLNO]" value=""></td>
							  </tr>
						  </tbody>
				</table>
			</div>
             	
            <div id="use_faq_content" align="center" style="<?php echo ((!$result['use_faq'])?'display:none;':'')?>"><br>
            
					<div class="faq_data" >
						<div align="left"><em><br> 
						  What time do you open on Saturdays?<br>
						  We open at 11:00 am on Saturdays.
						  </em><br>
						  <br>
						</div>
				<form id="faq_content_frm" onsubmit="return false;">		
					<div id="faq_content_header"></div>	
				<?php 
					 
					$ttl_faqs  = mysql_num_rows($sub_query);
					 
					$ttl_faqs += 1;
					
					 
					
					for($i=1;$i<$ttl_faqs;$i++){
						$faq_result = mysql_fetch_assoc($sub_query);
						//$faq_result = mysql_data_seek($result, $i)
						if(isset($faq_result['id'])){
							$fa_id = $faq_result['id'];
							$fa_ques = $faq_result['q'];
							$fa_ans = $faq_result['a'];
						}else{
							$fa_id = $i;
							$fa_ques = '';
							$fa_ans = '';
							
						}
						$j = $i-1;
						 
				?>
				<div class="faq_item" >
					<table cellpadding="7">
					  <tbody>
					  <tr>
						<td valign="middle" class="text"><div align="left">Question:</div></td>
								<td><input type="text" size="50" class="formfield" name="question[<?php echo $fa_id?>]" value="<?php echo $fa_ques;?>"></td>
								<td rowspan="2"><button onclick=remove_faq_block(this) class="remove_button_faq" slno="<?php echo $j?>" >Remove this Q/A</button></td>
						  </tr>
					  <tr>
						<td valign="middle" class="text"><div align="left">Answer:</div></td>
								<td><input size="50" class="formfield" name="answer[<?php echo $fa_id;?>]" value="<?php echo $fa_ans?>"></td>
						  </tr>
					  </tbody>
					  </table>
			  	</div>
			  	
			  	  
			  	<?php } 
			  		
			  	?>
			  	<input type="hidden" name="editorId" value="ins_faq" />
			  	</form>
			  	</div>
			  	<br />
			  	<div align="right">
			  		<span id="faq_response" style="display: none;font-size: 13px;color: #cd0000;background: #fffff0;padding:5px;"></span>
			  		<button id="add_button_faq">Add new Q&A</button>
			  		<input type="hidden" name="editorId" value="ins_faq">
			  		<input type="button" onclick="save_faq()" value="Save Q&A" />
			  	</div>
			  	
                <br>
              <br>
             </div><br>
             
             
             
             <script type="text/javascript">
             	$('#add_button_faq').click(function(){
					var ttl_faq_items = $('.faq_item').length;
					var faq_new_item_blck = $('#faq_item_template').html().replace(/SLNO/g,ttl_faq_items);
						if(ttl_faq_items){
							$('.faq_item:last').after('<div class="faq_item">'+faq_new_item_blck+'</div>');
						}else{
							$('#faq_content_header').after('<div class="faq_item">'+faq_new_item_blck+'</div>');
						}
				});
                function remove_faq_block(ele){
                    var slno = $(ele).attr('slno');
                    $('.faq_item:eq('+slno+')').remove();
                }

                function save_faq(){
                	var ttl_faq_items = $('.faq_item').length;
                	if(ttl_faq_items == 0)
                    	return false;
                	else{
                		var faq_data = $('#faq_content_frm').serialize();
                		var url = 'process.php?type=edit_site';
                		$('#faq_response').html('Please wait...').show();
                		$.post(url,faq_data,function(resp){
                    		$('#faq_response').html(resp).show();
                        });
                	}	
                }
             </script>
             <style type="text/css">
             .faq_item{
				margin:5px 0px;
				background: #f7f7f7;
				border-bottom:1px dotted #e3e3e3;
             }
             .social_links form input{
				width: 60%;
             }
             </style>
             
             
             
             
			 <div align="center"><img src="../assets/images/smallbusinesswebsites.jpg" alt="" width="624" height="8"><br>
			    <br>
			    </div>
			 <table width="399" border="0" cellspacing="0" cellpadding="7">
              <tr>
                <td width="34" valign="middle"><div align="left"><img src="../assets/images/contactus.png" alt="contact us" width="24" height="26" border="0"> </div></td>
                <td width="365" valign="middle"><div align="left" class="style4"><b>Contact Us  Page </b></div></td>
              </tr>
            </table>
            <table width="660" cellpadding="7">
              <tr>
                <td width="396" class="style5">Would you like to add a Contact Us page?</td>
                <td width="236" bgcolor="#DCE4F1">
                 <div id="use_contact_us">
                  <div align="center">
                    <?php if($result['use_conact_us']) echo "Yes"; else echo "No"; ?>
                    </div>
                  </div>
                </td>
              </tr>
            </table>
            <br>
            <div id="use_contactus_content" style="padding-left: 10px;<?php echo ((!$result['use_conact_us'])?'display:none;':'')?>" ><br>
              <table width="660" height="277" border="0" align="center" cellpadding="7">
                <tr>
                  <td width="298" valign="top" height="40" class="style5">Contact Us text that will be shown at the top of your contact form:</td>
                  <td width="253" bgcolor="#ffff99">
					<div id="contact_us_text"><?php if (empty($result['contact_us_text'])) echo "click to edit"; else echo $result['contact_us_text']; ?></div></td>
                </tr>
                <tr>
                  <td class="style5">Email address to receive messages:</td>
                  <td bgcolor="#ffff99">
					<div id="contact_us_email"><?php if (empty($result['contact_us_email'])) echo "click to edit"; else echo $result['contact_us_email']; ?></div></td>
                <tr>
                <tr>
                  <td class="style5">Add a field to collect user's first & last name?</td>
                  <td bgcolor="#ffff99"><div id="contact_us_use_names">
                    <?php if($result['contact_us_use_names']) echo "Yes"; else echo "No"; ?>
                  </div></td>
                </tr>
                <tr>
                  <td class="style5">Add a field to collect user's address?</td>
                  <td bgcolor="#ffff99"><div id="contact_us_use_address">
                    <?php if($result['contact_us_use_address']) echo "Yes"; else echo "No"; ?>
                  </div></td>
                </tr> 
                <tr>
                  <td class="style5">Add a field to collect user's phone #?</td>
                  <td bgcolor="#ffff99"><div id="contact_us_use_phone">
                    <?php if($result['contact_us_use_phone']) echo "Yes"; else echo "No"; ?>
                  </div></td>
                </tr>
                <tr>
                  <td class="style5">Add a field to collect user's email address?</td>
                  <td bgcolor="#ffff99"><div id="contact_us_use_email">
                    <?php if($result['contact_us_use_email']) echo "Yes"; else echo "No"; ?>
                  </div></td>
                </tr>
                <tr>
                  <td class="style5">Add "How did you learn  about us?" field?</td>
                  <td bgcolor="#ffff99"><div id="contact_us_use_how_learn">
                    <?php if($result['contact_us_use_how_learn']) echo "Yes"; else echo "No"; ?>
                  </div></td>
                </tr>
              </table>
            </div>
            <div align="center"><img src="../assets/images/smallbusinesswebsites.jpg" alt="" width="624" height="8"><br>
			    <br>
			    </div>
			 <table class="social_links" width="100%" border="0" cellspacing="3" cellpadding="7">
              <tr>
                <td width="300" valign="middle">
                	<div align="left">
                		<img src="../assets/images/facebook.png" alt="Facebook" width="24" height="26" border="0"> <span style="top: -8px;position: relative;font-weight: bold;">Facebook Profile Link</span> 
                	</div>
                </td>
                <td valign="middle" bgcolor="#ffff99" align="left" style="padding-right: 30px;">
                		<div id="facebook_link"><?php if($result['facebook_link']) echo $result['facebook_link']; else echo "Click to edit"; ?></div>
                	</div>
                </td>
              </tr>
           
              <tr>
                <td width="300" valign="middle">
                	<div align="left">
                		<img src="../assets/images/twitter.png" alt="Twitter" width="24" height="26" border="0"> <span style="top: -8px;position: relative;font-weight: bold;">Twitter Profile Link</span>   
                	</div>
                </td>
                <td valign="middle" bgcolor="#ffff99" align="left" style="padding-right: 30px;" >
                		<div id="twitter_link"><?php if($result['twitter_link']) echo $result['twitter_link']; else echo "Click to edit"; ?></div>
                	</div>
                </td>
              </tr>
           
              <tr>
                <td width="300" valign="middle">
                	<div align="left">
                		<img src="../assets/images/linkedin.png" alt="Linked In" width="24" height="26" border="0"> <span style="top: -8px;position: relative;font-weight: bold;">LinkedIn Profile Link</span> 
                	</div>
                </td>
               <td valign="middle" bgcolor="#ffff99" align="left" style="padding-right: 30px;" >
                	<div id="linkedin_link"><?php if($result['linkedin_link']) echo $result['linkedin_link']; else echo "Click to edit"; ?></div>
                </td>
              </tr>









            </table>
            <br>
            <h4><b><img src="../assets/images/smallbusinesswebsites.jpg" alt="" width="624" height="8"></b><br>
            </h4>
            <div align="center" class="style4">
              <div align="left">
                <table width="560" border="0" cellspacing="0" cellpadding="7">
                  <tr>
                    <td width="33" valign="middle"><div align="left"><img src="../assets/images/check.png" alt="Saved!" width="24" height="26" border="0"> </div></td>
                    <td width="499" valign="middle"><div align="left" class="style4"><b>Your Changes Are Saved The Instant They Are Applied! </b></div></td>
                  </tr>
                </table>
              </div>
            </div>
              <div align="center">
              </div>
              <div style="padding-left: 10px"><br>
            </div>
          </div>
        </div></td>
      </tr>


              <tr>
              	<td colspan="2" align="left" style="background: #fffff0;padding:10px;">
              		<span  class="style4" style="font-weight: bold;">Update Password</span>
              		<form id="update_pwd" action="process.php?type=upd_pwd" method="post">
              			<div class="form_response" style="display: none;"></div>
	              		<table style="font-size: 12px;" width="50%" >
	              			<tr>
	              				<td><span class="style4">Current Password</span></td>
	              				<td align="right">
	              					<input type="password" name="current_pwd" value="" />
	              				</td>
	              			</tr>
	              			<tr>
	              				<td><span  class="style4">New Password</span></td>
	              				<td align="right">
	              					<input type="password" name="new_pwd" value="" />
	              				</td>
	              			</tr>
	              			<tr>
	              				<td><span  class="style4">Confirm Password</span></td>
	              				<td align="right">
	              					<input type="password" name="confrim_pwd" value="" />
	              				</td>
	              			</tr>
	              			<tr>
	              				<td colspan="2" align="right">
	              					<input type="submit" value="Update" >
	              				</td>
	              			</tr>
	              		</table>
              		</form>
              		<script type="text/javascript">
              			var selectedDesign = <?php echo $site_template-1?>;
              			$('#update_pwd').submit(function(){
              				$('#update_pwd .form_response').removeClass('error_msg').html('Please wait...');
                  			$.post($(this).attr('action'),$(this).serialize(),function(resp){
                      			if(resp.status=='error'){
                          			$('#update_pwd .form_response').addClass('error_msg').html(resp.message).show();
                          		}else{
                          			$('#update_pwd .form_response').addClass('success_msg').html(resp.message).show();
                          			window.setTimeout(function(){
                          				location.href = location.href;
                              		},2000);
                              		
                              	}
                      		},'json');
                  			return false;
                  		});
                  		$(function(){
                  			change_image(selectedDesign);
                  			$('#site_design_upd').hide();
                  			
                  			$('input[name="design"]').live('click',function(){
                  				$('#site_design_upd').html("Please wait...").show();
                      			$.post('process.php?type=upd_design','template_id='+$(this).val(),function(resp){
                          			if(resp.status == 'error'){
                              			alert(resp.message);
                              		}else{
                                  		$('#site_design_upd').html(resp.message).fadeOut(2000);
                                  	}
                          		},'json');
                      		});
                  			$('input[name="design"]').live('mouseenter',function(){
                      			$(this).css('cursor','pointer');
                      		});
                      	});
              		</script>
              		<style type="text/css">
              			.error_msg{
							color: #cd0000;
							padding:5px;
							font-size: 12px;
              			}
              			.success_msg{
							color:green;
              				padding:10px;
              				font-size:12px;
              			}
              			.design_box{
							cursor: pointer;
              			}
              		</style>
              	</td>
              </tr>




    </table></td>
    <td width="180" valign="top" >
	    <div style="background:#F2F2F2;padding:0px 10px;">
			    <p align="center">
   	      <div id="ws_statistics" style="font-size: 16px;padding:20px 10px;">
			        		<div style="color: #2794CF;font-size: 16px;"> Visitor Statistics</div>
       		  <!-- div align="center" style="color: #82C47C;font-size: 19px;margin: 5px;"><?php echo $result['visits']; ?></div -->

<?php
$q = mysql_query("SELECT count(*) FROM `LOGS` JOIN sites ON LOGS.user=sites.subdomain WHERE sites.id='".$_SESSION['id']."'");
$a = mysql_fetch_row($q);
$all_hits=$a[0];


$q = mysql_query("SELECT count(*) FROM `LOGS` JOIN sites ON LOGS.user=sites.subdomain WHERE sites.id='".$_SESSION['id']."' and `tow` BETWEEN DATE_SUB(NOW(), INTERVAL 7 DAY) AND NOW()");
$a = mysql_fetch_row($q);

$week_hits=$a[0];

$q = mysql_query("SELECT count(*) FROM `LOGS` JOIN sites ON LOGS.user=sites.subdomain WHERE sites.id='".$_SESSION['id']."' and `tow` BETWEEN DATE_SUB(NOW(), INTERVAL 1 MONTH) AND NOW()");

$a = mysql_fetch_row($q);

$month_hits=$a[0];



    
?>
			        		
       		  <a class="graybutton" style="color:#009F00"><font color="#333333">THIS WEEK:</font> <b><?php echo $week_hits;?></b></a>
       		  <a class="graybutton" style="color:#009F00" ><font color="#333333">THIS MONTH:</font> <b><?php echo $month_hits;?></b></a>
       		  <a class="graybutton" style="color:#009F00"><font color="#333333">ALL TIME:</font> <b><?php echo $all_hits;?></b></a>        	</div>
			        
			    </p>
			    <hr />
			      <table width="135" border="0" align="center" cellpadding="4" cellspacing="0">
			      <tr>
			        <td >
			        
			        <div align="left" >
			          <p align="left" class="style5"><a href="#" class="style2"></a><font size="2"><strong>* Your changes are saved the instant they are applied!</strong></font></p>
			          <p class="style5"><font size="2">Edit any item in your site simply by clicking on the  box next to it and make your changes.</font></p>
			          <p class="style5"><font size="2"><strong>To disable any page</strong> at any time, click on the "no" button next to the question asking if you'd like to add it. <font size="1"><em>(About Us, Testimonials, etc.)</em></font>. </font></p>
			          <p class="style5"><font size="2">If you disable a page, it will instantly be taken off of your site, as well as the link to it displayed in your navigation menu.</font></p>
			          <p class="style5"><font size="2"> <strong>To re-activate it</strong>, simply click on the "yes" button and your page (and the navigation link) will immediately be right back on your site.</font></p>
			          </div></td>
			      </tr>
	    		</table>
	    </div>		
    </td>
    <td width="8" valign="top" bgcolor="#FFFFFF">&nbsp;</td>
  </tr>
</table>
<style type="text/css">
textarea{
	height: 100px !important;
}
.ajaxupload img{
	max-width: 300px;
}
</style>