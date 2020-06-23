<?php

class VideoModel
{
	/*type of video (youtube, vimeo or instagram)*/
	public $type;

	/*video url*/
	public $video_src;

	public $video_id;
	
	public $title;
	
	public $description;
	
	public $thumbnail;
	
	/* author or channel */
	public $author;

	function __construct($type = "", $video_src = "", $video_id = "", $title = "", $description = "", $thumbnail = "", $author = "")
	{
		$this->type = $type;
		$this->video_src = $video_src;
		$this->video_id = $video_id;
		$this->title = $title;
		$this->description = $description;
		$this->thumbnail = $thumbnail;
		$this->author = $author;
	}

	static function filterByOneType($videos, $type){
		$filteredVideos = array();
		foreach($videos as $video){
			if($video->type == $type){
				array_push($filteredVideos, $video);
			}
		}
		shuffle($filteredVideos);
		return $filteredVideos;
	}

	static function filterByTwoTypes($videos, $type1, $type2){
		$filteredVideos = array();
		foreach($videos as $video){
			if($video->type == $type1 || $video->type == $type2 ){
				array_push($filteredVideos, $video);
			}
		}
		shuffle($filteredVideos);
		return $filteredVideos;
	}

	static function filterByDescriptionSimilarity($videos1, $videos2, $videos3){
		$filteredVideos = array();

		foreach($videos1 as $video1){
			foreach($videos2 as $video2){
				$similarity = similar_text($video1->description, $video2->description, $percent);
<<<<<<< HEAD
				if($percent>35){
=======
				if($percent>30){
>>>>>>> 91b1c49fc81661ecee48688ae9983caf97121b99
					array_push($filteredVideos, $video1);
					array_push($filteredVideos, $video2);
					shuffle($filteredVideos);
				}
			}
		}
		$video3_no=0;
		foreach($videos3 as $video3){
<<<<<<< HEAD
			if($video3_no == 15){
=======
			if($video3_no == 35){
>>>>>>> 91b1c49fc81661ecee48688ae9983caf97121b99
				break;
			}
			$video3_no++;
			foreach($filteredVideos as $video4){
				$similarity = similar_text($video3->description, $video4->description, $percent);
<<<<<<< HEAD
				if($percent>35){
=======
				if($percent>30){
>>>>>>> 91b1c49fc81661ecee48688ae9983caf97121b99
					array_push($filteredVideos, $video3);
					array_push($filteredVideos, $video4);
					shuffle($filteredVideos);
				}
			}
		}

		return $filteredVideos;
	}

	static function filterByTitleSimilarity($videos1, $videos2, $videos3){
		$filteredVideos = array();
		foreach($videos1 as $video1){
			foreach($videos2 as $video2){
				$similarity = similar_text($video1->title, $video2->title, $percent);
<<<<<<< HEAD
				if($percent>35){
=======
				if($percent>30){
>>>>>>> 91b1c49fc81661ecee48688ae9983caf97121b99
					array_push($filteredVideos, $video1);
					array_push($filteredVideos, $video2);
					shuffle($filteredVideos);
				}
			}
		}

		$video3_no=0;
		foreach($videos3 as $video3){
<<<<<<< HEAD
			if($video3_no == 15){
=======
			if($video3_no == 35){
>>>>>>> 91b1c49fc81661ecee48688ae9983caf97121b99
				break;
			}
			$video3_no++;
			foreach($filteredVideos as $video4){
				$similarity = similar_text($video3->title, $video4->title, $percent);
<<<<<<< HEAD
				if($percent>35){
=======
				if($percent>30){
>>>>>>> 91b1c49fc81661ecee48688ae9983caf97121b99
					array_push($filteredVideos, $video3);
					array_push($filteredVideos, $video4);
					shuffle($filteredVideos);
				}
			}
		}
		return $filteredVideos;
	}

	static function searchVideo($keyword, $duration, $order, $types){
<<<<<<< HEAD

		$data = array(
			'action' => 'search',
			'keyword' => $keyword,
			'order' => $order,
			'duration' => $duration,
			'types' => $types
);

switch($types){

   case "any" :
/* get videos from instagram */
$instagram_url = 'http://localhost/sivir/api/instagram.php';
$instagram_response = getRequest($instagram_url, $data);
$instagram_res = json_decode($instagram_response);

/* get videos from youtube */
$youtube_url = 'http://localhost/sivir/api/youtube.php';
$youtube_response = getRequest($youtube_url, $data);
$youtube_res = json_decode($youtube_response);

/* get videos from vimeo */
$vimeo_url = 'http://localhost/sivir/api/vimeo.php';
$vimeo_response = getRequest($vimeo_url, $data);
$vimeo_res = json_decode($vimeo_response);

$res = array_merge($instagram_res, $vimeo_res, $youtube_res);
   break;

   case "youtube" :

	   /* get videos from youtube */
	   $youtube_url = 'http://localhost/sivir/api/youtube.php';
	   $youtube_response = getRequest($youtube_url, $data);
	   $youtube_res = json_decode($youtube_response);

	   $res = array_merge(array(),$youtube_res);
		   break;
		   case "instagram" :

			   /* get videos from instagram */
			   $instagram_url = 'http://localhost/sivir/api/instagram.php';
			   $instagram_response = getRequest($instagram_url, $data);
			   $instagram_res = json_decode($instagram_response);
	   
			   $res = array_merge(array(),$instagram_res);
				   break;
				   case "vimeo" :

					   /* get videos from vimeo */
					   $vimeo_url = 'http://localhost/sivir/api/vimeo.php';
					   $vimeo_response = getRequest($vimeo_url, $data);
					   $vimeo_res = json_decode($vimeo_response);
			   
					   $res = array_merge(array(),$vimeo_res);
						   break;

}

=======

        $data = array(
                     'action' => 'search',
					 'keyword' => $keyword,
					 'order' => $order,
					 'duration' => $duration,
					 'types' => $types
        );

		switch($types){

			case "any" :
		/* get videos from instagram */
        $instagram_url = 'http://localhost/sivir/api/instagram.php';
        $instagram_response = getRequest($instagram_url, $data);
		$instagram_res = json_decode($instagram_response);
>>>>>>> 91b1c49fc81661ecee48688ae9983caf97121b99



<<<<<<< HEAD
// $res = array_merge($youtube_res,array());
shuffle($res);
=======
		$res = array_merge($instagram_res, $vimeo_res, $youtube_res);
			break;

			case "youtube" :
		
				/* get videos from youtube */
				$youtube_url = 'http://localhost/sivir/api/youtube.php';
				$youtube_response = getRequest($youtube_url, $data);
				$youtube_res = json_decode($youtube_response);
		
				$res = array_merge(array(),$youtube_res);
					break;
					case "instagram" :
		
						/* get videos from instagram */
						$instagram_url = 'http://localhost/sivir/api/instagram.php';
						$instagram_response = getRequest($instagram_url, $data);
						$instagram_res = json_decode($instagram_response);
				
						$res = array_merge(array(),$instagram_res);
							break;
							case "vimeo" :
		
								/* get videos from vimeo */
								$vimeo_url = 'http://localhost/sivir/api/vimeo.php';
								$vimeo_response = getRequest($vimeo_url, $data);
								$vimeo_res = json_decode($vimeo_response);
						
								$res = array_merge(array(),$vimeo_res);
									break;
	
		}


		

		// $res = array_merge($youtube_res,array());
		shuffle($res);
>>>>>>> 91b1c49fc81661ecee48688ae9983caf97121b99

return $res;
}

	function toArray(){
		$res = array(
					'type' => $this->type,
					'video_src' => $this->video_src,
					'video_id' => $this->video_id,
					'title' => $this->title,
					'description' => $this->description,
					'thumbnail' => $this->thumbnail,
					'author' => $this->author,
		);

		return $res;
	}

}
?>