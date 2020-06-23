<?php

require_once 'models/vendor/autoload.php';
// Instantiate DB & connect
require_once '../database.php';
require_once 'models/video.php';

class YouTubeModel{
    private $conn;
    private $api_key;

    private $region_codes_arr = array(
        "Romania" => "RO",
        "United Kingdom" => "UK",
        "United States" => "US"
    );

    public function __construct(){
        $database = new Database();
        $this->conn = $database->connect();
        $this->api_key = YOUTUBE_API_KEY;

    }

    public function insertUserVideo($username, $video_id){

        $query = 'INSERT INTO youtube SET
            username = :username,
            video_id = :video_id
        ';

        $stmt = $this->conn->prepare($query);

        $username = htmlspecialchars(strip_tags($username));
        $video_id = htmlspecialchars(strip_tags($video_id));

        $stmt->bindParam(":video_id", $video_id);
        $stmt->bindParam(":username", $username);

        if( $stmt->execute()){
            return false;
        }

        return true;
    }

    public function deleteUserVideo($username, $video_id){
        $query = 'DELETE FROM youtube WHERE
            video_id = :video_id AND
            username = :username
        ';
        $stmt = $this->conn->prepare($query);

        $video_id = htmlspecialchars(strip_tags($video_id));
        $username = htmlspecialchars(strip_tags($username));

        $stmt->bindParam(":video_id", $video_id);
        $stmt->bindParam(":username", $username);

        if( $stmt->execute()){
            return false;
        }

        return true;

    }

    public function getUserVideos($username){
        $query = 'SELECT * FROM  WHERE username = :username';
        
        $stmt = $this->conn->prepare($query);

        $username = htmlspecialchars(strip_tags($username));

        $stmt->bindParam(":username", $username);

        $data = array('statusCode' => '404',
             'videos' => array());

        if($stmt->execute()){
            $data['statusCode'] = '200';
            $i=0;
            while($row = $stmt->fetch()){
                $data['videos'][$index] = $row['video_url'];
                $i++;
            }
        } else{
            $data['statusCode'] = '300';
        }

        $response = json_decode($data);

        return $response;
    }

    public function searchVideo($keyword, $duration, $order){

        $response = [];
    
        $maxResults = 50;

        $url = 'https://www.googleapis.com/youtube/v3/search';

        $data = array(
                     'part' => 'snippet', 
                     'q' => $keyword,
                     'order' => $order,
                     'type' => 'video',
                     'videoDuration' => $duration,
                     'maxResults' => $maxResults, 
                     'key' => $this->api_key 
        );


        $response = getRequest($url, $data);

        $json_result = json_decode($response, true);

        $res = array();

        if($json_result['items'] && count($json_result['items'])>0){
            foreach ($json_result['items'] as $video) {
                if(!isset($video['id']['videoId'])){
                    continue;
                }

                $type = 'youtube';
                $video_src = 'https://www.youtube.com/embed/'.$video['id']['videoId'];
                $video_id = $video['id']['videoId'];
                $title = htmlspecialchars($video['snippet']['title']);
                $description = htmlspecialchars($video['snippet']['description']);
                $thumbnail = $video['snippet']['thumbnails']['medium']['url'];
                $author = htmlspecialchars($video['snippet']['channelTitle']);

                $video = new VideoModel($type, $video_src, $video_id, $title, $description, $thumbnail, $author);

                $video = $video->toArray();

                array_push($res, $video);
            }
        }

        return $res;
    }

    public function searchSpecificVideo($keyword){

        $response = [];

        $title = " ";
    
        $maxResults = 50;

        $url = 'http://www.youtube.com/oembed';

        $data = array(
                     'url' => $keyword, 
                     'format' => 'json'
        );

        $response = getRequest($url, $data);

        $json_result = json_decode($response, true);

        $title = $json_result['title'];

        if($title == " "){
            die();
        } else {
            return $title;
        }

    }
    
}