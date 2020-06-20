<?php

require_once 'config.php'; 
require_once 'functions.php'; 
require_once 'database.php'; 

session_start();

//routing
if(isset($_REQUEST['page'])){

	switch ($_REQUEST['page']) {

		case 'login':
	    	require_once 'controllers/login.php';
	    	$controller = new LoginController();
	    	$controller->loadContent();
			break;

		case 'logout':
	    	require_once 'controllers/logout.php';
	    	$controller = new LogoutController();
	    	$controller->loadContent();
	    	break;

		case 'register':
	    	require_once 'controllers/register.php';
	    	$controller = new RegisterController();
	    	$controller->loadContent();
	    	break;

		case 'control_panel':
			checkAdminLogged();
	    	require_once 'controllers/control_panel.php';
	    	$controller = new ControlPanelController();
	    	$controller->loadContent();
	    	break;
		
		default:
			require_once 'views/404.php';
			break;
	}
}
else{
	require_once 'controllers/home.php';
	$controller = new HomeController();
	$controller->loadContent();
}

?>


