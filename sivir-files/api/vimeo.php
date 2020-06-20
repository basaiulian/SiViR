<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once 'models/vimeo.php';
require_once '../config.php';

$vimeo = new VimeoModel();

if(!isset($_GET['action']))
	die();

switch ($_GET['action']) {

    case 'search':
        if(!isset($_GET['keyword']))
        die();

        $keyword = htmlspecialchars($_GET['keyword']);

        $output = $vimeo->searchVideo($keyword);

        echo json_encode($output);

		break;
	
	default:
		die();
		break;
}


?>