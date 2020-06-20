<?php

require_once '../autoload.php';
require_once 'models/user.php';
    // Instantiate DB & connect
require_once '../database.php';

class YouTube{
    private $conn;
    private $table='youtube';

    public $video_id;
    public $username;

    private $response;

    private $region_codes_arr = array(
        "Romania" => "RO",
        "United Kingdom" => "UK",
        "United States" => "US"
    );

    public function __construct(){
        $database = new Database();
        $this->conn = $database->connect();
        $this->username=$_SESSION;
    }

    public function create($current_video_id){

        $query = 'INSERT INTO ' . $this->table . ' SET
            user_id = :user_id,
            video_id = :video_id
            
        ';
        $stmt = $this->conn->prepare($query);

        $this->video_id = htmlspecialchars(strip_tags($this->video_id));
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));

        // $this->user_id='1';

        $stmt->bindParam(":video_id", $this->video_id);
        $stmt->bindParam(":user_id", $this->user_id);

        $stmt->execute();

        return $stmt;

    }

    public function delete(){
        $query = 'DELETE FROM ' . $this->table . ' WHERE
            video_id = :video_id AND
            user_id = :user_id
        ';
        $stmt = $this->conn->prepare($query);

        $this->video_id = htmlspecialchars(strip_tags($this->video_id));
        $this->user_id = htmlspecialchars(strip_tags($this->user_id));

        $stmt->bindParam(":video_id", $this->video_id);
        $stmt->bindParam(":user_id", $this->user_id);

        $stmt->execute();

        return $stmt;

    }

    public function getVideos($username){
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

    public function makeRequest($keyword, $order){

        $response = [];
    
        $maxResults = 50;
        $key = 'AIzaSyBr2BuPDgKEE7Ufsg8knoqKZHm4bDcMexk';
        
        // durata
        // autor

		$url = 'https://www.googleapis.com/youtube/v3/search';

        $curl = curl_init();

        curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://www.googleapis.com/youtube/v3/search?order='.$order.'&part=snippet&q='.$keyword.'&maxResults='.$maxResults.'&key='.$key,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        $json_result = json_decode($response, true);

        $results_count = 30;
        
        // user = 

        $i=0;
        while($results_count>0){
            $current_video_id = $json_result['items'][$i]['id']['videoId'];
            $i++;
            $results_count--;
            $this->create($current_video_id);
        }

       
    }
    
}