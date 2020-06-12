<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');//available for everyone
  header('Content-Type: application/json');

  include_once '../config/Database.php';
  include_once '../models/User.php';

  // Instantiate DB & connect
  $database = new Database();
  $db = $database->connect();

  // Instantiate user object
  $user = new User($db);

  // Get username and password from URL
  $user->username = isset($_GET['username']) ? $_GET['username'] : die();
  $user->password = isset($_GET['password']) ? $_GET['password'] : die();
  
  // Get post 
  $user->read_single();

  // Create array
  $user_arr = array(
      'id' => $user->id,
      'username' => $user->username,
      'email' => $user->email,
      'password' => $user->password,
      'admin' => $user->admin,
      'updated_at' => $user->updated_at,
      'created_at' => $user->created_at,
  );

  // Create JSON
  print_r(json_encode($user_arr)); //print array

  ?>