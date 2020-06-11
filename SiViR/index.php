<?php
require_once 'D:\XAMPP\htdocs\SiViR\model\model.php';
require_once 'D:\XAMPP\htdocs\SiViR\controller\controller.php';
require_once 'D:\XAMPP\htdocs\SiViR\controller\config.php'; 
require_once 'D:\XAMPP\htdocs\SiViR\controller\functions.php'; 

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


