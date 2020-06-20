<?php
    require '../vendor/autoload.php';
    require_once 'C:\Users\basai\vendor\vimeo\vimeo-api\autoload.php';
    use Phpfastcache\Helper\Psr16Adapter;
    // echo '<p>Buna ziua</p>';
    // //instagram

	// 	$instagram = \InstagramScraper\Instagram::withCredentials('sivir_app', 'instascraper', new Psr16Adapter('Files'));
	// 	$instagram->saveSession();
    //     // $keyword = str_replace(" ","",$keyword);
    //     $keyword="dogs";
	// 	$result = $instagram->getPaginateMediasByTag($keyword);
	// 	$medias = $result['medias'];

	// if ($result['hasNextPage'] === true) {
    // 		$result = $instagram->getPaginateMediasByTag($keyword, $result['maxId']);
	// 		$medias = array_merge($medias, $result['medias']);
    // }
    
    // echo $medias;
    // var_dump($medias);

    // $vimeo = new \Vimeo\Vimeo(CLIENT_ID, CLIENT_SECRET, TOKEN);

        //   $order="relevant";
        // if(strcmp(strtoupper($order),"VIEWCOUNT")===0){
        //     $order="plays";
        // } else if(strcmp(strtoupper($order),"RELEVANCE")===0){
        //     $order="relevant";
        // } else if(strcmp(strtoupper($order),"DATE")===0){
        //     $order="date";
        // }

       
    //     $keyword = str_replace("#","",$keyword);
    //    /* $videos = $vimeo->request('/videos?query=' . $keyword . '&filter=content_rating&filter_content_rating=language');*/
    //     $videos = $vimeo->request('/videos?query=' . $keyword .'&filter=featured');
    //    /* $videos = $vimeo->request('/videos?query=' . $keyword . '&filter=duration&min_duration=0:5:00&max_duration=0:6:00');*/
    //     $videos = $videos['body'];
    //     if(is_array($videos) && $videos['total'] >=1 ) {
    //     $video_count = $videos['total'];
    //     $response = $videos['data'];
    //     var_dump($response);
    //     } else {
    //         $response = (array) null; //array gol
    //     }

        // $json_result = json_decode($response, true);


        $url = 'http://localhost/sivir/api/instagram.php';
		$data = array(
					'action' => 'search',
					'keyword' => 'cars'
		);

		$res = postRequest($url, $data);

		if(strlen($res)>0){
			
            echo $res;
		}
        


