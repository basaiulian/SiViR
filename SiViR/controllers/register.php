<?php

class RegisterController{

	private $username;
	private $password;
	private $confirm_password;
	private $email;
	private $error;

	function __construct(){
		$this->username = isset($_POST['username'])?$_POST['username']:'';
		$this->password = isset($_POST['password'])?$_POST['password']:'';
		$this->confirm_password = isset($_POST['confirm_password'])?$_POST['confirm_password']:'';
		$this->email = isset($_POST['email'])?$_POST['email']:'';
	}

	function loadContent(){
		if(isset($_POST['register'])){
			if($this->register() == true){
					header('Location: index.php?page=login&register_success=true');
					die();
			}
		}
		include 'views/register.php';
	}

	function register(){
		$url = 'http://localhost/sivir/api/user.php';
		$data = array(
					'action' => 'register',
					'username' => $this->username,
					'password' => $this->password,
					'confirm_password' => $this->confirm_password,
					'email' => $this->email
		);

		$res = postRequest($url, $data);

		if(strlen($res)>0){
			$res = json_decode($res, true);

			if($res['error'] == 'false'){
				return true;
			}else{
				$this->error = $res['message'];
			}
		}

		return false;
	}
}

?>