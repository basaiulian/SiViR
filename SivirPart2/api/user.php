<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once 'models/user.php';
require_once '../config.php';

$user = new UserModel();

if(!isset($_POST['action']))
	die();

switch ($_POST['action']) {

	case 'login':
		if(!isset($_POST['username']) || !isset($_POST['password'])){
			die();
		}

		$username = htmlspecialchars($_POST['username']);
		$password = htmlspecialchars($_POST['password']);

		if($user->login($username, $password) == true){
			$admin = ($user->checkAdmin($username) == true) ? 'true' : 'false';
			$output = array('res' => 'success','admin' => $admin);
		}else{
			$output = array('res' => 'fail');
		}

		echo json_encode($output);
		break;

	case 'register':
		if(!isset($_POST['username']) || !isset($_POST['password']) || 
	    !isset($_POST['confirm_password']) || !isset($_POST['email'])){
			die();
		}

		$username = htmlspecialchars($_POST['username']);
		$password = htmlspecialchars($_POST['password']);
		$confirm_password = htmlspecialchars($_POST['confirm_password']);
		$email = htmlspecialchars($_POST['email']);

		if($password != $confirm_password){
			$output = array('error' => 'true', 'message' => 'Cele 2 parole nu corespund');
		}elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			$output = array('error' => 'true', 'message' => 'Adresa de email este invalida');
		}elseif($user->checkUsername($username) == false){
			$output = array('error' => 'true', 'message' => 'Exista deja un utilizator cu username-ul "'.$username.'"');
		}elseif($user->create($username, $password, $email) == false){
			$output = array('error' => 'true', 'message' => 'Contul nu a putut fi inregistrat');
		}else{
			$output = array('error' => 'false', 'message' => 'Contul a fost inregistrat cu succes');
		}

		echo json_encode($output);
		break;

	case 'getUsers':
		$output = array('users' => $user->read());
		echo json_encode($output);
		break;
	
	default:
		die();
		break;
}


?>