<?php

class LogoutController{
	function loadContent(){
    	unset($_SESSION['username']);

    	if(isset($_SESSION['admin']))
    		unset($_SESSION['admin']);
    	
    	header('Location: index.php?page=login');
	}
}

?>