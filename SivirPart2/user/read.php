<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');//available for everyone
  header('Content-Type: application/json');

  include_once '../config/Database.php';
  include_once '../models/User.php';

  $database = new Database();
  $db = $database->connect();

  $user = new User($db);

  $result = $user->read();
  
  $num = $result->rowCount();

  // Check if any users
  if($num > 0) {
    // User array
    $users_arr = array();

    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
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

    // Turn to JSON & output
    echo json_encode($users_arr);

  } else {
    // No Posts
    echo json_encode(
      array('message' => 'No Users Found')
    );
  }