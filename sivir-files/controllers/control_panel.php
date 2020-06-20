<?php

class ControlPAnelController{

	private $users;
	
	function loadContent(){
		$url = 'http://localhost/sivir/api/user.php';
		$data = array(
					'action' => 'getUsers'
		);

		$res = postRequest($url, $data);

		if(strlen($res)>0){
			$res = json_decode($res, true);
			$this->users = $res['users'];
		}

    	include 'views/control_panel.php';
	}
}

?>