var reg_form_error_status = '';
var imgFile = new Array();
var imgObj = new Array();
function preload_thumbs() {
	imgObj = new Array();
	for (i = 0; i < imgFile.length; i++) {
		if(imgFile[i]){
			imgObj[i] = new Image(150, 150);
			imgObj[i].src = imgFile[i];
		}
	}
	 
}

var imgBegin = 0;
var selectedRadio = 0;
var selectedDesign = -1;
var imgCount = 0;
function select_radio(element) {
	selectedRadio = element.value;
}

function change_image(index) {
	imgBegin += index;

	if (imgBegin < 0)
		imgBegin = imgFile.length - 1;
	 	imgCount = imgFile.length;

	for (i = 0; i < ((imgCount >= 6) ? 6 : imgCount); i++) {
		var j = i + 1;
		var indx = (imgBegin + i) % imgFile.length;
		if (document.getElementById("icon" + j) == null)
			continue;
		document.getElementById("icon" + j).innerHTML = '<img src="' + imgObj[indx].src + '">';
		if (selectedDesign != -1) {
			if (indx == selectedDesign)
				document.getElementById("rbutton" + j).innerHTML = '<input type="radio" value="' + indx + '" name="design" onclick="javascript:select_radio(this)" checked>';
			else
				document.getElementById("rbutton" + j).innerHTML = '<input type="radio" value="' + indx + '" name="design" onclick="javascript:select_radio(this)">';
		} else {
			if (indx == selectedRadio)
				document.getElementById("rbutton" + j).innerHTML = '<input type="radio" value="' + indx + '" name="design" onclick="javascript:select_radio(this)" checked>';
			else
				document.getElementById("rbutton" + j).innerHTML = '<input type="radio" value="' + indx + '" name="design" onclick="javascript:select_radio(this)">';
		}
	}

}

function check_avalible() {
	var load_image = document.getElementById("ajax-loader");
		load_image.style.display = 'block';
		reg_form_error_status = '';
	var subdomain = document.getElementById("subdomain");

	var url = 'process.php';
	var params = 'type=sd_avail&subdomain=' + subdomain.value + '&ajax=1';

	$.get(url, params, function(resp) {
		if (resp == "ok"){
			subdomain.style.backgroundColor = "#4BB504";
			 
		}else{
			subdomain.style.backgroundColor = "#d02e48";
			reg_form_error_status += "Please provide valid subdomain name\n";
		}		
		load_image.style.display = 'none';
	});

}

function change_visible(isVisible, elementID) {
	// alert(isVisible)
	var item = document.getElementById(elementID);
	if (isVisible)
		item.style.display = 'block';
	else
		item.style.display = 'none';
}

function delsite(e) {
	e.preventDefault();
	if (confirm("Are you sure you want to delete site")) {
		// location.href = 'delsite.php';
		alert('asdasd');
	}
}

function validate_site_reg(frmele) {
	var error_msg = '';

	if (!$.trim($('#company_name').val()))
		error_msg += "company name is required\n";

	if (!$.trim($('#subdomain').val()))
		error_msg += "valid subdomain is required\n";

	if (!$.trim($('#password').val()))
		error_msg += "Please provide valid password\n";
	
	if ($.trim($('#cpassword').val()) != $.trim($('#password').val()))
		error_msg += "password do not match with confirm password\n";

	if (!$.trim($('#email').val()))
		error_msg += "Please provide valid email address\n";
	
	error_msg += reg_form_error_status;
	
	if (error_msg) {
		error_msg = "* Please correct these errors \n\n" + error_msg;
		alert(error_msg);
		return false;
	}
	return true;
}

function validatePWD(str){
	 
	var status = 0;
		if(str.match(/[0-9]+/)){
		    if(str.match(/[A-Z]+/)){
		        status = 1;
		    }
		}
		if(status){
		   return true;
		}else{
			return false;
		}
}
