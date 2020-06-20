<?php

class LoginController{

	private $username;
	private $password;
	private $error;

	function __construct(){
		$this->username = isset($_POST['username'])?$_POST['username']:'';
		$this->password = isset($_POST['password'])?$_POST['password']:'';
	}

	function loadContent(){
		if(isset($_POST['login'])){
			if($this->login() == true){
					header('Location: index.php');
					die();
			}
		}
		include 'views/login.php';
	}

	function login(){
		if($this->validate() == true){
			$_SESSION['username'] = $this->username;
			return true;
		}
		else{
			$this->error = 'Username sau parola incorecta';
		}
		return false;
	}

	function validate(){
		$url = 'http://localhost/sivir/api/user.php';
		$data = array(
					'action' => 'login',
					'username' => $this->username,
					'password' => $this->password
		);

		$res = postRequest($url, $data);

		if(strlen($res)>0){
			$res = json_decode($res, true);
			if($res['res'] == 'success'){

				if($res['admin'] == 'true')
					$_SESSION['admin'] = true;

				return true;
			}
		}

		return false;
	}
}

?>