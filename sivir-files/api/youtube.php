<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once 'models/youtube.php';
require_once '../config.php';
require_once '../functions.php';

$youtube = new YoutubeModel();

if(!isset($_GET['action']))
	die();

switch ($_GET['action']) {

	case 'search':
		if(!isset($_GET['keyword']))
			die();

		$keyword = htmlspecialchars(strip_tags($_GET['keyword']));

		$output = $youtube->searchVideo($keyword);

		echo json_encode($output);

		break;
	
	default:
		die();
		break;
}

?>