<body link="#333333"><table width="882" height="154" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td width="413" height="154">
			<img src="../assets/images/website-logo.jpg" alt="" width="413" height="154" border="0" usemap="#Map" />		</td>
		<td width="469" valign="middle" background="../assets/images/website-login.jpg">
		<div align="center">
		<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td valign="bottom">
				<div align="right">
				<?php
				if (isset ( $_SESSION ['auth_email'] )) {
					?>
					<table width="414" height="135" border="0" align="right"
					cellpadding="0" cellspacing="0">
					
					<tr>
						<td height="85" colspan=2 align="right"><br><br><br>
						<span style="color: #333">Welcome <b><?php echo $_SESSION ['auth_email']; ?></b>						</span> &nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
					  <td height="50" align="right">
							<a class="nav_link" href="index.php?page=edit">Edit site</a> 
							<font color="#333333">-</font> 
							<a target="_blank" class="nav_link" href="../user/<?php echo $_SESSION ['subdomain']; ?>/">View site</a> 
							<font color="#333333">-</font> 
							<a class="nav_link" id="delete_site" href="process.php?type=delete_site">Delete site</a> - 
							<a class="nav_link" href="process.php?type=logout">Logout</a><br>
							<br>
						  <font color="#FFFFFF" size="1" face="Arial, Helvetica, sans-serif"><strong>Your Website URL:</strong> http://dev.cherni.tn/user/<?php echo $_SESSION['subdomain'];?>/</font>						</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
				</table>
				
				<script type="text/javascript">
					$('#delete_site').click(function(e){
						e.preventDefault();
						if(confirm('Are you sure you want to delete this site ?')){
							location.href = $(this).attr('href');
						}
					});
				</script>
				
				<?php
				} else {
				?>
				<form method="post" name="login_frm" action="process.php?type=login">
					<input type="hidden" name="formname" value="login" />
					<div align="center">
					<?php 
						if(isset($_SESSION['login_error_msg'])){
							echo '<span style="color:#333">'.$_SESSION['login_error_msg'].'</span>';
							unset($_SESSION['login_error_msg']);
						}
					?>
					</div>
				<table width="414" height="80" border="0" align="right"
					cellpadding="0" cellspacing="0">
					<tr>
						<td height="31" align="left" valign="bottom"><font size="2">Email:</font></td>
						<td valign="bottom"><font size="2">Password:</font></td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
					<tr>
						<td width="165" height="31">
							<div align="left"><input name="email" type="text" /></div>
						</td>
						<td width="163">
							<div align="left"><input type="password" name="password" /></div>
						</td>
						<td width="53" align="left">
							<div align="center">
								<input type="image" src="../assets/images/websites-submit.gif" name="image" />
							</div>
						</td>
						<td width="20" align="left">&nbsp;</td>
					</tr>
					<tr>
						<td height="18">&nbsp;</td>
						<td>
						<div align="left" class="style22">&nbsp;
						<a id="forgot_pwdfrm_link" href="#forgot_pwdfrm" title="Forgot Password ?"><font color="#333333">Forgot Password?</font></a> </div>
						</td>
						<td>&nbsp;</td>
						<td>&nbsp;</td>
					</tr>
				</table>
				</form>
				
				
				<div style="display: none;">
					<div id="forgot_pwdfrm" style="width:400px;height:100px;overflow:auto;">
						<form onsubmit="return false;" action="process.php?type=forgot_pwd" method="post">
							<fieldset>
								<legend>Forgor Your Password ?</legend>
								<input type="text" name="email_id" value="Enter your email address..." size="40" /> 
								<input type="submit" value="Submit" />	
							</fieldset>
						</form>
						<div class="form_response" ></div>
					</div>
				</div>
				
				
				<script type="text/javascript">
					$("#forgot_pwdfrm_link").fancybox({
						'titlePosition'		: 'inside',
						'transitionIn'		: 'none',
						'transitionOut'		: 'none'
					});

					$("#forgot_pwdfrm form").submit(function(){
						$.post($(this).attr('action'),$(this).serialize(),function(resp){
							if(resp.status == 'error'){
								$("#forgot_pwdfrm .form_response").addClass('error_msg');
							}else{
								$("#forgot_pwdfrm .form_response").addClass('success_msg');
							}
							$("#forgot_pwdfrm .form_response").html(resp.message);
						},'json');
						return false; 
					});
				</script>
				
				
				<?php
				}
				?>
				</div>
			  </td>
			</tr>
		</table>
		</div>
		</td>
	</tr>
</table>
<map name="Map" id="Map">
	<area shape="rect" coords="42,11,374,125" href="index.php" alt="Home" />
</map>