<?php

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once 'models/video.php';
require_once 'models/user.php';
require_once 'models/vimeo.php';
require_once 'models/youtube.php';
require_once '../config.php';
require_once '../functions.php';

$video = new VideoModel();

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

        if(!isset($_GET['types'])){
			$types='any';
		} else {
			$types = htmlspecialchars(strip_tags($_GET['types']));
        }
        
        if(!isset($_GET['order'])){
			$order='relevant';
		} else {
			$order = htmlspecialchars(strip_tags($_GET['order']));
		}

        $keyword = htmlspecialchars($_GET['keyword']);

<<<<<<< HEAD
        if(strstr($keyword, "youtube.com")){

            $youtube = new YoutubeModel();

            $keyword = $youtube->searchSpecificVideo($keyword);

            $keyword = strstr($keyword, ' ', true);

        } else if(strstr($keyword, "vimeo.com")){

            $videoId = preg_replace("/[^0-9]/", "", $keyword );

            $vimeo = new VimeoModel();
            
            $keyword = $vimeo->searchSpecificVideo($videoId);
        }

        
        $output = $video->searchVideo($keyword, $duration, $order, $types);

        $user = new UserModel();

        $user->insertKeyword($keyword);
=======
        $output = $video->searchVideo($keyword, $duration, $order, $types);
        
>>>>>>> 91b1c49fc81661ecee48688ae9983caf97121b99

        echo json_encode($output);

        break;
    
    case 'filteredSearchByType':

        if(!isset($_GET['keyword']))
        die();

        if(!isset($_GET['type']))
        die();

        $keyword = htmlspecialchars($_GET['keyword']);
        $type = htmlspecialchars($_GET['type']);

        $output = $video->filterByOneType($video->searchVideo($keyword), $type);

        echo json_encode($output);

        break;
    
    case 'filteredSearchByTwoTypes':

        if(!isset($_GET['keyword']))
        die();
    
        if(!isset($_GET['type1']))
        die();

        if(!isset($_GET['type2']))
        die();
    
        $keyword = htmlspecialchars($_GET['keyword']);
        $type1 = htmlspecialchars($_GET['type1']);
        $type2 = htmlspecialchars($_GET['type2']);
    
        $output = $video->filterByTwoTypes($video->searchVideo($keyword), $type1, $type2);
    
        echo json_encode($output);
    
        break;
    
    case 'filterByDescriptionSimilarity':
        if(!isset($_GET['keyword']))
        die();

<<<<<<< HEAD
        if(!isset($_GET['duration'])){
			$duration='short';
		} else {
			$duration = htmlspecialchars(strip_tags($_GET['duration']));
        }

        if(!isset($_GET['types'])){
			$types='any';
		} else {
			$types = htmlspecialchars(strip_tags($_GET['types']));
        }
        
        if(!isset($_GET['order'])){
			$order='relevant';
		} else {
			$order = htmlspecialchars(strip_tags($_GET['order']));
		}

=======
>>>>>>> 91b1c49fc81661ecee48688ae9983caf97121b99
        if(!isset($_GET['type1']))
        die();

        if(!isset($_GET['type2']))
        die();

        if(!isset($_GET['type3']))
        die();


        $keyword = htmlspecialchars($_GET['keyword']);
        $type1 = htmlspecialchars($_GET['type1']);
        $type2 = htmlspecialchars($_GET['type2']);
        $type3 = htmlspecialchars($_GET['type3']);

<<<<<<< HEAD
        $output = $video->filterByDescriptionSimilarity($video->filterByOneType($video->searchVideo($keyword, $duration, $order, $types), $type1), $video->filterByOneType($video->searchVideo($keyword, $duration, $order, $types), $type2), 
            $video->filterByOneType($video->searchVideo($keyword, $duration, $order, $types), $type3));
=======
        $output = $video->filterByDescriptionSimilarity($video->filterByType($video->searchVideo($keyword), $type1), $video->filterByType($video->searchVideo($keyword), $type2), 
            $video->filterByType($video->searchVideo($keyword), $type3));
>>>>>>> 91b1c49fc81661ecee48688ae9983caf97121b99

        echo json_encode($output);

        break;

    case 'filterByTitleSimilarity':
        if(!isset($_GET['keyword']))
        die();

<<<<<<< HEAD
        if(!isset($_GET['duration'])){
			$duration='short';
		} else {
			$duration = htmlspecialchars(strip_tags($_GET['duration']));
        }

        if(!isset($_GET['types'])){
			$types='any';
		} else {
			$types = htmlspecialchars(strip_tags($_GET['types']));
        }
        
        if(!isset($_GET['order'])){
			$order='relevant';
		} else {
			$order = htmlspecialchars(strip_tags($_GET['order']));
		}

=======
>>>>>>> 91b1c49fc81661ecee48688ae9983caf97121b99
        if(!isset($_GET['type1']))
        die();
    
        if(!isset($_GET['type2']))
        die();

        if(!isset($_GET['type3']))
        die();
    
        $keyword = htmlspecialchars($_GET['keyword']);
        $type1 = htmlspecialchars($_GET['type1']);
        $type2 = htmlspecialchars($_GET['type2']);
        $type3 = htmlspecialchars($_GET['type3']);

    
<<<<<<< HEAD
        $output = $video->filterByTitleSimilarity($video->filterByOneType($video->searchVideo($keyword, $duration, $order, $types), $type1), $video->filterByOneType($video->searchVideo($keyword, $duration, $order, $types), $type2), 
        $video->filterByOneType($video->searchVideo($keyword, $duration, $order, $types), $type3));
=======
        $output = $video->filterByTitleSimilarity($video->filterByType($video->searchVideo($keyword), $type1), $video->filterByType($video->searchVideo($keyword), $type2), 
        $video->filterByType($video->searchVideo($keyword), $type3));
>>>>>>> 91b1c49fc81661ecee48688ae9983caf97121b99
    
        echo json_encode($output);
    
        break;
        
	default:
		die();
		break;
}


?>