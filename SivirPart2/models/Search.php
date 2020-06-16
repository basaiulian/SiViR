<?php
class Search{
    // DB stuff
    private $conn;
    private $table = 'searches';

    // Search Properties
    public $id;
    public $user_id;
    public $value;
    public $created_at;

    // Constructor with DB
    public function __construct($db){
        $this->conn = $db;
    }

    // Get Searches
    public function read(){
        // Create query
        $query = 'SELECT * FROM '.$this->table.'';

        // Prepare statement
        $stmt = $this->conn->prepare($query);

        // Execute query
        $stmt->execute();

        return $stmt;
    }

    // Get Specific User's searches
    public function get_searches() {
      // Create query
      $query = 'SELECT * FROM searches where user_id = ?';
      
      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Bind ID
      $stmt->bindParam(1, $this->id);

      // Execute query
      $stmt->execute();

      return $stmt;
    }
}