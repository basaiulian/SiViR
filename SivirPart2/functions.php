<?php

function setPageTitle($title){
	define('PAGE_TITLE', $title);
}

function postRequest($url,$data){
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($data));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
}

function checkLogged(){
	if(!isset($_SESSION['username'])){
		header('Location: index.php?page=login');
		die();
	}
}

function checkAdminLogged(){
	if(!isset($_SESSION['admin'])){
		header('Location: index.php?page=login');
		die();
	}
}