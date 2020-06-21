<<<<<<< HEAD
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

        if(!isset($_GET['duration'])){
			$duration='short';
		} else {
			$duration = htmlspecialchars(strip_tags($_GET['duration']));
		}
        
        if(!isset($_GET['order'])){
            $order = 'relevance';
        } else {
            $order = htmlspecialchars(strip_tags($_GET['order']));
        }

        $keyword = htmlspecialchars($_GET['keyword']);

        $output = $video->searchVideo($keyword, $duration, $order);

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

        $output = $video->filterByDescriptionSimilarity($video->filterByType($video->searchVideo($keyword), $type1), $video->filterByType($video->searchVideo($keyword), $type2), 
            $video->filterByType($video->searchVideo($keyword), $type3));

        echo json_encode($output);

        break;

    case 'filterByTitleSimilarity':
        if(!isset($_GET['keyword']))
        die();

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

    
        $output = $video->filterByTitleSimilarity($video->filterByType($video->searchVideo($keyword), $type1), $video->filterByType($video->searchVideo($keyword), $type2), 
        $video->filterByType($video->searchVideo($keyword), $type3));
    
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


>>>>>>> 21703d6f516610406a9a819560dcf27dfa959f80
?>