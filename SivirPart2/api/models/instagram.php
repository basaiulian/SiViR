<?php

require_once 'models/user.php';
    // Instantiate DB & connect
require_once '../database.php';
require 'vendor/autoload.php';

use Phpfastcache\Helper\Psr16Adapter;

class InstagramModel{

    private $conn;
    private $table='instagram';

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

    public function makeRequestINSTAGRAM($keyword){

        $instagram = \InstagramScraper\Instagram::withCredentials('sivir_app', 'instascraper', new Psr16Adapter('Files'));
		$instagram->saveSession();
		$keyword = str_replace(" ","",$keyword);
		$result = $instagram->getPaginateMediasByTag($keyword);
        $medias = $result['medias'];

	    if ($result['hasNextPage'] === true) {
    		$result = $instagram->getPaginateMediasByTag($keyword, $result['maxId']);
			$medias = array_merge($medias, $result['medias']);
	}

        return $medias;

    }


}
