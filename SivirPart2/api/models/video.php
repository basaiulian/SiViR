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

	static function filterByType($videos, $type){

	}

	static function filterByTitle($videos, $title){

	}

	static function filterByAuthor($videos, $author){

	}

	static function searchVideo($keyword){

        $data = array(
                     'action' => 'search',
                     'keyword' => $keyword
        );

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

		$res = array_merge($youtube_res, $instagram_res, $vimeo_res);
		shuffle($res);

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