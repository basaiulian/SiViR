<?php

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

    private $token;

    public $youtube;
    public $vimeo;
    public $instagram;

    // Constructor with DB
    public function __construct() {
		$database = new Database();
		$this->conn = $database->connect();
    }

    public function get_user_id(){
      return $this->id;
    }

    public function get_token(){
      return $this->token;
    }

    public function set_token($new_token){
      $this->token = $new_token;
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
  public function update() {
    // Create query
    $query = 'UPDATE ' . $this->table . '
                          SET admin = 1
                          WHERE id = :id AND admin != 2';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->id = htmlspecialchars(strip_tags($this->id));

    // Bind data
    $stmt->bindParam(':id', $this->id);

    // Execute query
    if($stmt->execute()) {
      return true;
    }

    // Print error if something goes wrong
    printf("Error: %s.\n", $stmt->error);

    return false;
}

  // Delete User
  public function delete() {
    // Create query
    $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id AND admin <> 2';

    // Prepare statement
    $stmt = $this->conn->prepare($query);

    // Clean data
    $this->id = htmlspecialchars(strip_tags($this->id));

    // Bind data
    $stmt->bindParam(':id', $this->id);

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

}

?>