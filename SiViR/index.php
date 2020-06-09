<?php
require_once 'model.php';
require_once 'controller.php';
require_once 'config.php'; 
require_once 'functions.php'; 

$controller = new Controller();
$model = new Model();
session_start();

//routing
if(isset($_REQUEST['page'])){
	
    if($_REQUEST['page']=='search'){

		$controller->empty();
		$controller->search();
	}

}
else{ //home page
	$controller->home();
}

?>


