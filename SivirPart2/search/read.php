<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');//available for everyone
  header('Content-Type: application/json');

  include_once '../config/Database.php';
  include_once '../models/Search.php';

  $database = new Database();
  $db = $database->connect();

  $search = new Search($db);

  $result = $search->read();
  
  $num = $result->rowCount();

  // Check if any searches
  if($num > 0) {
    // User array
    $searches_arr = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
      extract($row);

      $search_item = array(
        'id' => $id,
        'user_id' => $user_id,
        'value' => $value,
        'created_at' => $created_at
      );

      // Push every item to "data"
      array_push($searches_arr, $search_item);

    }

    // Turn to JSON & output
    echo json_encode($searches_arr);

  } else {
    // No Posts
    echo json_encode(
      array('message' => 'No Searches Found')
    );
  }