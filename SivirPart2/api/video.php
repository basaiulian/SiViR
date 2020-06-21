<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once 'models/video.php';
require_once '../config.php';
require_once '../functions.php';

$video = new VideoModel();

if(!isset($_GET['action']))
	die();

switch ($_GET['action']) {

    case 'search':
        if(!isset($_GET['keyword']))
        die();

        $keyword = htmlspecialchars($_GET['keyword']);

        $output = $video->searchVideo($keyword);

        echo json_encode($output);

		break;
	
	default:
		die();
		break;
}


?>