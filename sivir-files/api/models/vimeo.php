<?php

require_once '../vendor/vimeo/vimeo-api/autoload.php';
    // Instantiate DB & connect
require_once '../database.php';
require_once 'models/video.php';


class VimeoModel{

    private $conn;
    private $table='vimeo';

    public $video_id;
    public $username;


    public function __construct(){

        $database = new Database();
        $this->conn = $database->connect();
        // $this->username=$_SESSION['username'];
    }


   public function create($current_video_id){

        $query = 'INSERT INTO ' . $this->table . ' SET
            username = :username,
            video_id = :video_id
            
        ';
        $stmt = $this->conn->prepare($query);

        $this->video_id = htmlspecialchars(strip_tags($this->video_id));
        $this->username = htmlspecialchars(strip_tags($this->username));

        $stmt->bindParam(":video_id", $this->video_id);
        $stmt->bindParam(":username", $this->username);

        $stmt->execute();

        return $stmt;

    }

    public function searchVideo($keyword){

        $vimeo = new \Vimeo\Vimeo(CLIENT_ID, CLIENT_SECRET, TOKEN);

        $keyword = str_replace("#","",$keyword);
        $videos = $vimeo->request('/videos?query=' . $keyword .'&filter=featured');
        $videos = $videos['body'];
        if(is_array($videos) && $videos['total'] >=1 ) {
        $video_count = $videos['total'];
        $response = $videos['data'];

        // $response=htmlspecialchars(json_encode($response));

        } else {
            $response = (array) null; //array gol
        }

        $res = array();

        foreach($response as $item){

            $new_video_uri = str_replace('/videos/', '', $item['uri']);
            $type ='vimeo';
            $video_src=$item['link'];
            $video_id=$item['uri'];
            $title=$item['name'];
            $description=$item['description'];
            $thumbnail='';
            $author=$item['name'];

            $video = new VideoModel($type, $video_src, $video_id, $title, $description, $thumbnail, $author);

            $video = $video->toArray();

            array_push($res, $video);
        }
        
        return $res;

    }


}