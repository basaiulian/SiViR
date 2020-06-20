<?php


require_once 'C:\Users\basai\vendor\vimeo\vimeo-api\autoload.php';
require_once 'models/user.php';
    // Instantiate DB & connect
require_once '../database.php';



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

    public function makeRequestVIMEO($keyword){

        $vimeo = new \Vimeo\Vimeo(CLIENT_ID, CLIENT_SECRET, TOKEN);

        //   $order="relevant";
        // if(strcmp(strtoupper($order),"VIEWCOUNT")===0){
        //     $order="plays";
        // } else if(strcmp(strtoupper($order),"RELEVANCE")===0){
        //     $order="relevant";
        // } else if(strcmp(strtoupper($order),"DATE")===0){
        //     $order="date";
        // }

       
        $keyword = str_replace("#","",$keyword);
       /* $videos = $vimeo->request('/videos?query=' . $keyword . '&filter=content_rating&filter_content_rating=language');*/
        $videos = $vimeo->request('/videos?query=' . $keyword .'&filter=featured');
       /* $videos = $vimeo->request('/videos?query=' . $keyword . '&filter=duration&min_duration=0:5:00&max_duration=0:6:00');*/
        $videos = $videos['body'];
        if(is_array($videos) && $videos['total'] >=1 ) {
        $video_count = $videos['total'];
        $response = $videos['data'];

        $response=htmlspecialchars(json_encode($response));

        } else {
            $response = (array) null; //array gol
        }
        
            $videos = array();

        return $response;

    }


}
