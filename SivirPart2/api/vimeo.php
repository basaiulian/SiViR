<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once 'models/vimeo.php';
require_once '../config.php';

$vimeo = new VimeoModel();

if(!isset($_POST['action']))
	die();

switch ($_POST['action']) {

    case 'search':
        if(!isset($_POST['keyword']))
        die();

        $keyword = htmlspecialchars($_POST['keyword']);

		$output = array('vimeo_videos' => $vimeo->makeRequestVIMEO($keyword));
		// echo json_encode($output);
		break;
	
	default:
		die();
		break;
}


?>