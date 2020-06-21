<<<<<<< HEAD
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

		if(!isset($_GET['duration'])){
			$duration='short';
		} else {
			$duration = htmlspecialchars(strip_tags($_GET['duration']));
		}

		if(!isset($_GET['order'])){
			$order='relevance';
		} else {
			$order = htmlspecialchars(strip_tags($_GET['order']));
		}

		$keyword = htmlspecialchars(strip_tags($_GET['keyword']));

		$output = $youtube->searchVideo($keyword, $duration, $order);

		echo json_encode($output);

		break;
	
	default:
		die();
		break;
}

=======
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

>>>>>>> 21703d6f516610406a9a819560dcf27dfa959f80
?>