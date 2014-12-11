

function sendForm(F)
{
	$("contact_form").hide();
	$("ajax-loader").show();

	
	

	var form_message = escape($("message").value);
	var form_name = escape($("name").value);
	var form_address = $("address").value;
	form_address = escape(form_address);
//	form_address = "";
	var form_phone = escape($("phone").value);
//	var form_phone = "";
	var form_email = escape($("email").value);
	var form_how_learn = escape($("how_learn").value);
	var form_to = escape($("to").value);
	
	var params = {message: form_message, 
				name: form_name, 
				address: form_address, 
				phone: form_phone, 
				email: form_email, 
				how_learn: form_how_learn,
				to: form_to};



	var url = site_url+'/mail.php';
	
	var ajax = new Ajax.Updater(
									'contact_form',
                                    url, 
									{
									method: 'post',
                                    parameters: params,
									onComplete: function (response) 
										{
											$("ajax-loader").hide();
										    if (response.responseText == "ok")
											{
												$("contact_form").innerHTML = "<p color=\"green\">Message Sent!</p>";
												$("contact_form").show();
											}
											else
											{
												$("contact_form").innerHTML = "<p color=\"red\">Please try again.</p>";
												$("contact_form").show();
											}
										},
									onFailure: function ()
										{
											$("ajax-loader").hide();
											$("contact_form").innerHTML = "<p color=\"red\">Please try again.</p>";
											$("contact_form").show();
										}
									}
                                );
	return false;
}