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

        if(!isset($_GET['duration'])){
			$duration='short';
		} else {
			$duration = htmlspecialchars(strip_tags($_GET['duration']));
        }
        
        if(!isset($_GET['order'])){
			$order='short';
		} else {
			$order = htmlspecialchars(strip_tags($_GET['order']));
		}

        $keyword = htmlspecialchars($_GET['keyword']);

        $output = $vimeo->searchVideo($keyword, $duration, $order);

        echo json_encode($output);

		break;
	
	default:
		die();
		break;
}


?>