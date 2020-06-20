<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once 'models/instagram.php';
require_once '../config.php';

$instagram = new InstagramModel();

if(!isset($_POST['action']))
	die();

switch ($_POST['action']) {

    case 'search':
        if(!isset($_POST['keyword']))
        die();

        $keyword = htmlspecialchars($_POST['keyword']);

        $output = array('instagram_videos' => $instagram->makeRequestINSTAGRAM($keyword));

        // var_dump($output);

            echo $item->getType();

        print_r($output);

		break;
	
	default:
		die();
		break;
}


?>