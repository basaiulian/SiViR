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

  echo json_encode($num);
