<?php

session_start();

// Instantiate DB & connect
require_once '../database.php';

class UserModel {
    // DB stuff
    private $conn;
    private $table = 'users';

    // User Properties
    public $id;
    public $username;
    public $email;
    public $password;
    public $admin;
    public $updated_at;
    public $created_at;

    // Video Properties
    public $type;
    public $video_src;
    public $video_id;
    public $title;
    public $description;
    public $thumbnail;
    public $author;

    private $token;

    public $youtube;
    public $vimeo;
    public $instagram;

    // Constructor with DB
    public function __construct() {
		$database = new Database();
		$this->conn = $database->connect();
    }

    // Get Users
    public function read() {
      // Create query
      $query = 'SELECT * FROM users';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      $users_arr = array();

      while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $user_item = array(
          'id' => $id,
          'username' => $username,
          'email' => $email,
          'password' => $password,
          'admin' => $admin,
          'updated_at' => $updated_at,
          'created_at' => $created_at
        );

        // Push every item to "data"
        array_push($users_arr, $user_item);
      
      }

      return $users_arr;
    }

    public function count(){
      // Create query
      $query = 'SELECT COUNT(*) FROM users';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

    // Get Single User
  public function login($username,$password) {
	    // Create query
		$query = 'SELECT * FROM users WHERE username = ? AND password = md5(?) LIMIT 0,1';

		// Prepare statement
		$stmt = $this->conn->prepare($query);

		// Bind username&password
		$stmt->bindParam(1, $username);
		$stmt->bindParam(2, $password);

		// Execute query
		$stmt->execute();

		if($stmt->rowCount()>0){
			return true;
		}

		return false;
	}

    // Create User
  public function create($username, $password, $email) {
      // Create query
      $query = 'INSERT INTO ' . $this->table . ' SET username = :username, email = :email, password = md5(:password)';

      // $this->insertVideo('username','','','','','','','');

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Clean data
      $username = htmlspecialchars(strip_tags($username));
      $email = htmlspecialchars(strip_tags($email));
      $password = htmlspecialchars(strip_tags($password));

      // Bind data
      $stmt->bindParam(':username', $username);
      $stmt->bindParam(':email', $email);
      $stmt->bindParam(':password', $password);

      // Execute query
      if($stmt->execute()) {
        return true;
      }

      return false;
  }

  // Update User
  public function update($username) {
    // Create query
    $query = 'UPDATE ' . $this->table . '
                          SET admin = 1
                          WHERE username = ? AND admin != 2';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Bind data
    $stmt->bindParam(1, $username);

    // Execute query
    if($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);

    return false;
}

  // Delete User
  public function delete($username) {
    // Create query
    $query = 'DELETE FROM ' . $this->table . ' WHERE username = ? AND admin <> 2';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Bind data
    $stmt->bindParam('1', $username);

    // Execute query
    if($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);

    return false;
  }

  function checkUsername($username){
    // Create query
    $query = 'SELECT * FROM users WHERE username = ? LIMIT 0,1';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Bind username&password
    $stmt->bindParam(1, $username);

    // Execute query
    $stmt->execute();

    if($stmt->rowCount()>0){
      return false;
    }

    return true;
  }

  function checkAdmin($username){
    // Create query
    $query = 'SELECT * FROM users WHERE username = ? and admin>"0" LIMIT 1';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Bind username&password
    $stmt->bindParam(1, $username);

    // Execute query
    $stmt->execute();

    if($stmt->rowCount()>0){
      return true;
    }

    return false;
  }

  public function insertVideo($username,$type,$video_src,$video_id,$title,$description,$thumbnail,$author)
    {

     $query = 'INSERT INTO favourite SET
        username = :username,
        type = :type,
        video_src = :video_src,
        video_id = :video_id,
        title = :title,
        description = :description,
        thumbnail = :thumbnail,
        author = :author
    ';

      $username = $_SESSION['username'];

    $stmt = $this->conn->prepare($query);

    $username = htmlspecialchars(strip_tags($username));
    $type = htmlspecialchars(strip_tags($type));
    $video_src = htmlspecialchars(strip_tags($video_src));
    $video_id = htmlspecialchars(strip_tags($video_id));
    $title = htmlspecialchars(strip_tags($title));
    $description = htmlspecialchars(strip_tags($description));
    $thumbnail = htmlspecialchars(strip_tags($thumbnail));
    $author = htmlspecialchars(strip_tags($author));


    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":type", $type);
    $stmt->bindParam(":video_src", $video_src);
    $stmt->bindParam(":video_id", $video_id);
    $stmt->bindParam(":title", $title);
    $stmt->bindParam(":description", $description);
    $stmt->bindParam(":thumbnail", base64_decode($thumbnail));
    $stmt->bindParam(":author", $author);

    if($username!=''){
      if($stmt->execute()){
          return false;
      }
    }

    return true;
        
    }

    // Get Favourites
    public function getFavourites() {

      // Create query
      $query = 'SELECT * FROM favourite WHERE username=? ORDER BY created_at DESC';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      $username = $_SESSION['username'];

      $stmt->bindParam(1, $username);

      // Execute query
      $stmt->execute();

      $users_arr = array();

      while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);

        $user_item = array(
          'username' => $username,
          'type' => $type,
          'video_src' => $video_src,
          'video_id' => $video_id,
          'title' => $title,
          'description' => $description,
          'thumbnail' => $thumbnail,
          'author' => $author
        );

        // Push every item to "data"
        array_push($users_arr, $user_item);
      
      }

      return $users_arr;
    }

}

?>