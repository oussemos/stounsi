$(function() {

	$("#company_name").editable("process.php?type=edit_site", {
		indicator : '<img src="img/indicator.gif">',
		data : "",
		submitdata : {
			_method : "get"
		},
		type : "text",
		submit : "OK",
		style : "inherit",
		cancel : 'Cancel',
		submitdata : function() {
			var newValue = $.trim($('input[name="value"]', $(this)).val());
			return {
				id : '',
				editorId : 'company_name',
				value : newValue
			};
		}
	});

	$("#logo").editable("process.php?type=upload_logo", {
		name : 'logo',
		indicator : "<img src='img/indicator.gif'>",
		type : 'ajaxupload',
		submit : 'Upload',
		cancel : 'Cancel',
		tooltip : "Click to upload..."
	});

	$('#use_about_us').editable("process.php?type=edit_site", {
		indicator : '<img src="img/indicator.gif">',
		data : "{'Yes':'Yes','No':'No'}",
		submitdata : {
			_method : "get"
		},
		type : "select",
		submit : "OK",
		style : "inherit",
		cancel : 'Cancel',
		submitdata : function() {
			var newValue = $.trim($('select[name="value"]', $(this)).val());
			return {
				id : '',
				editorId : 'use_about_us',
				value : newValue
			};
		},
		callback : function(value, settings) {
			if (value == 'No') {
				$('#use_aboutus_content').slideUp();
			} else {
				$('#use_aboutus_content').slideDown();
			}
		}
	}).css('text-align', 'center');

	$("#about_us_text").editable("process.php?type=edit_site", {
		indicator : '<img src="img/indicator.gif">',
		data : "",
		submitdata : {
			_method : "get"
		},
		type : "textarea",
		submit : "OK",
		style : "inherit",
		cancel : 'Cancel',
		submitdata : function() {
			var newValue = $.trim($('textarea[name="value"]', $(this)).val());
			return {
				id : '',
				editorId : 'about_us_text',
				value : newValue
			};
		}
	});

	$("#about_us_phone").editable("process.php?type=edit_site", {
		indicator : '<img src="img/indicator.gif">',
		data : "",
		submitdata : {
			_method : "get"
		},
		type : "text",
		submit : "OK",
		style : "inherit",
		cancel : 'Cancel',
		submitdata : function() {
			var newValue = $.trim($('input[name="value"]', $(this)).val());
			return {
				id : '',
				editorId : 'about_us_phone',
				value : newValue
			};
		}
	});

	$("#about_us_address").editable("process.php?type=edit_site", {
		indicator : '<img src="img/indicator.gif">',
		data : "",
		submitdata : {
			_method : "get"
		},
		type : "text",
		submit : "OK",
		style : "inherit",
		cancel : 'Cancel',
		submitdata : function() {
			var newValue = $.trim($('input[name="value"]', $(this)).val());
			return {
				id : '',
				editorId : 'about_us_address',
				value : newValue
			};
		}
	});

	$("#about_us_city").editable("process.php?type=edit_site", {
		indicator : '<img src="img/indicator.gif">',
		data : "",
		submitdata : {
			_method : "get"
		},
		type : "text",
		submit : "OK",
		style : "inherit",
		cancel : 'Cancel',
		submitdata : function() {
			var newValue = $.trim($('input[name="value"]', $(this)).val());
			return {
				id : '',
				editorId : 'about_us_city',
				value : newValue
			};
		}
	});
	$("#about_us_state").editable("process.php?type=edit_site", {
		indicator : '<img src="img/indicator.gif">',
		data : "",
		submitdata : {
			_method : "get"
		},
		type : "text",
		submit : "OK",
		style : "inherit",
		cancel : 'Cancel',
		submitdata : function() {
			var newValue = $.trim($('input[name="value"]', $(this)).val());
			return {
				id : '',
				editorId : 'about_us_state',
				value : newValue
			};
		}
	});
	$("#about_us_zip").editable("process.php?type=edit_site", {
		indicator : '<img src="img/indicator.gif">',
		data : "",
		submitdata : {
			_method : "get"
		},
		type : "text",
		submit : "OK",
		style : "inherit",
		cancel : 'Cancel',
		submitdata : function() {
			var newValue = $.trim($('input[name="value"]', $(this)).val());
			return {
				id : '',
				editorId : 'about_us_zip',
				value : newValue
			};
		}
	});
	$("#about_us_hours").editable("process.php?type=edit_site", {
		indicator : '<img src="img/indicator.gif">',
		data : "",
		submitdata : {
			_method : "get"
		},
		type : "text",
		submit : "OK",
		style : "inherit",
		cancel : 'Cancel',
		submitdata : function() {
			var newValue = $.trim($('input[name="value"]', $(this)).val());
			return {
				id : '',
				editorId : 'about_us_hours',
				value : newValue
			};
		}
	});

	$('#use_testmonials').editable("process.php?type=edit_site", {
		indicator : '<img src="img/indicator.gif">',
		data : "{'Yes':'Yes','No':'No'}",
		submitdata : {
			_method : "get"
		},
		type : "select",
		submit : "OK",
		style : "inherit",
		cancel : 'Cancel',
		submitdata : function() {
			var newValue = $.trim($('select[name="value"]', $(this)).val());
			return {
				id : '',
				editorId : 'use_testmonials',
				value : newValue
			};
		},
		callback : function(value, settings) {

			if (value == 'No') {
				$('#use_testimonial_content').slideUp();
			} else {
				$('#use_testimonial_content').slideDown();
			}
		}
	}).css('text-align', 'center');

	$(".edit_testimonails").editable("process.php?type=edit_site", {
		indicator : '<img src="img/indicator.gif">',
		data : "",
		submitdata : {
			_method : "get"
		},
		type : "textarea",
		submit : "OK",
		style : "inherit",
		cancel : 'Cancel',
		submitdata : function() {

			var newValue = $.trim($('textarea[name="value"]', $(this)).val());
			return {
				id : '',
				editorId : ($(this).attr('id')),
				value : newValue
			};
		}
	});

	$('#use_gallery').editable("process.php?type=edit_site", {
		indicator : '<img src="img/indicator.gif">',
		data : "{'Yes':'Yes','No':'No'}",
		submitdata : {
			_method : "get"
		},
		type : "select",
		submit : "OK",
		style : "inherit",
		cancel : 'Cancel',
		submitdata : function() {
			var newValue = $.trim($('select[name="value"]', $(this)).val());
			return {
				id : '',
				editorId : 'use_gallery',
				value : newValue
			};
		},
		callback : function(value, settings) {

			if (value == 'No') {
				$('#use_gallery_content').slideUp();
			} else {
				$('#use_gallery_content').slideDown();
			}
		}
	}).css('text-align', 'center');

	$("#gallery_1").editable("process.php?type=upload_gallery", {
		name : 'gallery_1',
		indicator : "<img src='img/indicator.gif'>",
		type : 'ajaxupload',
		submit : 'Upload',
		cancel : 'Cancel',
		tooltip : "Click to upload..."
	});
	$("#gallery_2").editable("process.php?type=upload_gallery", {
		name : 'gallery_2',
		indicator : "<img src='img/indicator.gif'>",
		type : 'ajaxupload',
		submit : 'Upload',
		cancel : 'Cancel',
		tooltip : "Click to upload..."
	});
	$("#gallery_3").editable("process.php?type=upload_gallery", {
		name : 'gallery_3',
		indicator : "<img src='img/indicator.gif'>",
		type : 'ajaxupload',
		submit : 'Upload',
		cancel : 'Cancel',
		tooltip : "Click to upload..."
	});
	$("#gallery_4").editable("process.php?type=upload_gallery", {
		name : 'gallery_4',
		indicator : "<img src='img/indicator.gif'>",
		type : 'ajaxupload',
		submit : 'Upload',
		cancel : 'Cancel',
		tooltip : "Click to upload..."
	});
	$("#gallery_5").editable("process.php?type=upload_gallery", {
		name : 'gallery_5',
		indicator : "<img src='img/indicator.gif'>",
		type : 'ajaxupload',
		submit : 'Upload',
		cancel : 'Cancel',
		tooltip : "Click to upload..."
	});
	$("#gallery_6").editable("process.php?type=upload_gallery", {
		name : 'gallery_6',
		indicator : "<img src='img/indicator.gif'>",
		type : 'ajaxupload',
		submit : 'Upload',
		cancel : 'Cancel',
		tooltip : "Click to upload..."
	});
	$("#gallery_7").editable("process.php?type=upload_gallery", {
		name : 'gallery_7',
		indicator : "<img src='img/indicator.gif'>",
		type : 'ajaxupload',
		submit : 'Upload',
		cancel : 'Cancel',
		tooltip : "Click to upload..."
	});
	$("#gallery_8").editable("process.php?type=upload_gallery", {
		name : 'gallery_8',
		indicator : "<img src='img/indicator.gif'>",
		type : 'ajaxupload',
		submit : 'Upload',
		cancel : 'Cancel',
		tooltip : "Click to upload..."
	});
	$("#gallery_9").editable("process.php?type=upload_gallery", {
		name : 'gallery_9',
		indicator : "<img src='img/indicator.gif'>",
		type : 'ajaxupload',
		submit : 'Upload',
		cancel : 'Cancel',
		tooltip : "Click to upload..."
	});
	$("#gallery_10").editable("process.php?type=upload_gallery", {
		name : 'gallery_10',
		indicator : "<img src='img/indicator.gif'>",
		type : 'ajaxupload',
		submit : 'Upload',
		cancel : 'Cancel',
		tooltip : "Click to upload..."
	});

	$('#use_faq').editable("process.php?type=edit_site", {
		indicator : '<img src="img/indicator.gif">',
		data : "{'Yes':'Yes','No':'No'}",
		submitdata : {
			_method : "get"
		},
		type : "select",
		submit : "OK",
		style : "inherit",
		cancel : 'Cancel',
		submitdata : function() {
			var newValue = $.trim($('select[name="value"]', $(this)).val());
			return {
				id : '',
				editorId : 'use_faq',
				value : newValue
			};
		},
		callback : function(value, settings) {

			if (value == 'No') {
				$('#use_faq_content').slideUp();
			} else {
				$('#use_faq_content').slideDown();
			}
		}
	}).css('text-align', 'center');

	$('#use_contact_us').editable("process.php?type=edit_site", {
		indicator : '<img src="img/indicator.gif">',
		data : "{'Yes':'Yes','No':'No'}",
		submitdata : {
			_method : "get"
		},
		type : "select",
		submit : "OK",
		style : "inherit",
		cancel : 'Cancel',
		submitdata : function() {
			var newValue = $.trim($('select[name="value"]', $(this)).val());
			return {
				id : '',
				editorId : 'use_contact_us',
				value : newValue
			};
		},
		callback : function(value, settings) {

			if (value == 'No') {
				$('#use_contactus_content').slideUp();
			} else {
				$('#use_contactus_content').slideDown();
			}
		}
	}).css('text-align', 'center');

	$("#contact_us_text").editable("process.php?type=edit_site", {
		indicator : '<img src="img/indicator.gif">',
		data : "",
		submitdata : {
			_method : "get"
		},
		type : "textarea",
		submit : "OK",
		style : "inherit",
		cancel : 'Cancel',
		submitdata : function() {
			var newValue = $.trim($('textarea[name="value"]', $(this)).val());
			return {
				id : '',
				editorId : 'contact_us_text',
				value : newValue
			};
		}
	});

	$("#contact_us_email").editable("process.php?type=edit_site", {
		indicator : '<img src="img/indicator.gif">',
		data : "",
		submitdata : {
			_method : "get"
		},
		type : "text",
		submit : "OK",
		style : "inherit",
		cancel : 'Cancel',
		submitdata : function() {
			var newValue = $.trim($('input[name="value"]', $(this)).val());
			return {
				id : '',
				editorId : 'contact_us_email',
				value : newValue
			};
		}
	});

	$("#contact_us_use_names").editable("process.php?type=edit_site", {
		indicator : '<img src="img/indicator.gif">',
		data : "{'Yes':'Yes','No':'No'}",
		submitdata : {
			_method : "get"
		},
		type : "select",
		submit : "OK",
		style : "inherit",
		cancel : 'Cancel',
		submitdata : function() {
			var newValue = $.trim($('select[name="value"]', $(this)).val());
			return {
				id : '',
				editorId : 'contact_us_use_names',
				value : newValue
			};
		}
	});

	$("#contact_us_use_address").editable("process.php?type=edit_site", {
		indicator : '<img src="img/indicator.gif">',
		data : "{'Yes':'Yes','No':'No'}",
		submitdata : {
			_method : "get"
		},
		type : "select",
		submit : "OK",
		style : "inherit",
		cancel : 'Cancel',
		submitdata : function() {
			var newValue = $.trim($('select[name="value"]', $(this)).val());
			return {
				id : '',
				editorId : 'contact_us_use_address',
				value : newValue
			};
		}
	});

	$("#contact_us_use_phone").editable("process.php?type=edit_site", {
		indicator : '<img src="img/indicator.gif">',
		data : "{'Yes':'Yes','No':'No'}",
		submitdata : {
			_method : "get"
		},
		type : "select",
		submit : "OK",
		style : "inherit",
		cancel : 'Cancel',
		submitdata : function() {
			var newValue = $.trim($('select[name="value"]', $(this)).val());
			return {
				id : '',
				editorId : 'contact_us_use_phone',
				value : newValue
			};
		}
	});

	$("#contact_us_use_email").editable("process.php?type=edit_site", {
		indicator : '<img src="img/indicator.gif">',
		data : "{'Yes':'Yes','No':'No'}",
		submitdata : {
			_method : "get"
		},
		type : "select",
		submit : "OK",
		style : "inherit",
		cancel : 'Cancel',
		submitdata : function() {
			var newValue = $.trim($('select[name="value"]', $(this)).val());
			return {
				id : '',
				editorId : 'contact_us_use_email',
				value : newValue
			};
		}
	});

	$("#contact_us_use_how_learn").editable("process.php?type=edit_site", {
		indicator : '<img src="img/indicator.gif">',
		data : "{'Yes':'Yes','No':'No'}",
		submitdata : {
			_method : "get"
		},
		type : "select",
		submit : "OK",
		style : "inherit",
		cancel : 'Cancel',
		submitdata : function() {
			var newValue = $.trim($('select[name="value"]', $(this)).val());
			return {
				id : '',
				editorId : 'contact_us_use_how_learn',
				value : newValue
			};
		}
	});

	$("#facebook_link,#twitter_link,#linkedin_link").editable("process.php?type=edit_site", {
		indicator : "<img src='img/indicator.gif'>",
		tooltip : "Click to edit...",
		style : "inherit",
		submit : "OK",
		cancel : 'Cancel',
		submitdata : {
			_method : "get"
		},
		submitdata : function() {
			var newValue = $.trim($('input[name="value"]', $(this)).val());
			return {
				id : '',
				editorId : $(this).attr('id'),
				value : newValue
			};
		}
	});

});