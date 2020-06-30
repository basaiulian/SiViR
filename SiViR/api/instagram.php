<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once 'models/instagram.php';
require_once 'models/video.php';
require_once '../config.php';

$instagram = new InstagramModel();

if(!isset($_GET['action']))
    die();

switch ($_GET['action']) {

    case 'search':
        if(!isset($_GET['keyword']))
            die();

        $keyword = htmlspecialchars(strip_tags($_GET['keyword']));

        $output = $instagram->searchVideo($keyword);

        echo json_encode($output);

        break;
    
    default:
        die();
        break;
}

?>