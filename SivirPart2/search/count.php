<?php 
  // Headers
  header('Access-Control-Allow-Origin: *');//available for everyone
  header('Content-Type: application/json');

  include_once '../config/Database.php';
  include_once '../models/Search.php';

  $database = new Database();
  $db = $database->connect();

  $search = new Search($db);

  $search->id = isset($_GET['id']) ? $_GET['id'] : die();

  $result = $search->get_searches();
  
  $num = $result->rowCount();

  echo json_encode($num);
