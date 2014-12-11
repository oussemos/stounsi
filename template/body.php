<?php
$page = (isset ( $_GET ['page'] ) ? $_GET ['page'] : 'panel');
switch ($page) {
	case 'home' :
		include_once ('pages/add_site.php');
		break;
	case 'edit' :
		include_once ('pages/edit_site.php');
		break;
	
	case 'panel' :
	default :
		include_once ('pages/my_panel.php');
		break;
}
?>