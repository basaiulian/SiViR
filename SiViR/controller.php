<?php
require_once 'model.php';
require_once 'C:\Users\basai\vendor\vimeo\vimeo-api\autoload.php';

require 'vendor/autoload.php';
use Phpfastcache\Helper\Psr16Adapter;

class Controller
{
	public $model;

	function __construct()
	{
		$this->model = new Model();
	}

	function home()
	{
		render('home');
	}

	function empty(){
		$empty = $this->model->emptyTable();
	}

	function insert($title,$link,$source){
		$title = $this->model->insertRow($title,$link,$source);
	}

	function titles()
	{
		$users = $this->model->getTitle();
		echo implode('<br>', $users);
	}

	function search()
	{	$order = $_POST['order-criteria'];

		if (isset($_POST['search_form'])) {
			$keyword = $_POST['search'];
			$maxResults = 50;
			$youtube_order=$order;

			$url = 'https://www.googleapis.com/youtube/v3/search';

			$dataArray = array(
				'order' => $youtube_order,
				'part' => 'snippet',
				'q' => $keyword,
				'maxResults' => $maxResults,
				'key' => API_KEY
			);

			$response = getApiRequest($url, $dataArray);
			$ok=1;
		} else {
			$response = [];
		}
		
		$data['youtube_results'] = $response;
		
		//vimeo
		$vimeo_order="relevant";
		if(strcmp(strtoupper($order),"VIEWCOUNT")===0){
			$vimeo_order="plays";
		} else if(strcmp(strtoupper($order),"RELEVANCE")===0){
			$vimeo_order="relevant";
		} else if(strcmp(strtoupper($order),"DATE")===0){
			$vimeo_order="date";
		}

		$vimeo = new \Vimeo\Vimeo(CLIENT_ID, CLIENT_SECRET, TOKEN);
		$keyword = $_POST['search'];
		$keyword = str_replace("#","",$keyword);
		$videos = $vimeo->request('/videos?query=' . $keyword . '&sort='.$vimeo_order.'');
		$videos = $videos['body'];
		if(is_array($videos) && $videos['total'] >=1 ) {
		$video_count = $videos['total'];
		$video_array = $videos['data'];
		} else {
			$video_array = (array) null; //array gol
		}
		
			$videos = array();
		$data['vimeo_results'] = $video_array;


		//instagram

		$instagram = \InstagramScraper\Instagram::withCredentials('sivir_app', 'instascraper', new Psr16Adapter('Files'));
		$instagram->saveSession();
		//$instagram->login();
		$keyword = str_replace(" ","",$keyword);
		$result = $instagram->getPaginateMediasByTag($keyword);
		$medias = $result['medias'];

	if ($result['hasNextPage'] === true) {
    		$result = $instagram->getPaginateMediasByTag($keyword, $result['maxId']);
			$medias = array_merge($medias, $result['medias']);
	}

		$data['instagram_results'] = $medias;
		render('search', $data);
		

}

}