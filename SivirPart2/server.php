<?php
session_start();

if (isset($_POST['login_user'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $curl = curl_init();

  curl_setopt_array($curl, array(
    CURLOPT_URL => 'http://localhost/sivirAPI/user/read_single.php?username='.$username.'&password='.$password.'',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
      "Content-Type: application/json"
    ),
  ));
  
  $response = curl_exec($curl);

  $json_result = json_decode($response, true);
         
  
  curl_close($curl);

  if (strpos($response, 'null') !== false) {
    echo "No user found";
} else {

  if(strcmp($json_result['admin'],"1")==0 || strcmp($json_result['admin'],"2")==0){
    $_SESSION['username'] = $username;
    $_SESSION['success'] = "You are now logged in";
    header('location: adminAfterLOGIN.php');
  } else {

  $_SESSION['username'] = $username;
  $_SESSION['success'] = "You are now logged in";
  header('location: afterLOGIN.php');
  }
  }
}


if (isset($_POST['register_user'])) {
  $username = $_POST['username'];
  $password = $_POST['password_1'];
  $email = $_POST['email'];

   //verificare daca s au introdus corect

  echo $username;
  echo " ";

  echo $password;
  echo " ";

  echo $email;
  echo " ";

  $curl = curl_init();

  
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://localhost/sivirAPI/user/create.php",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>"{\r\n    \"username\": \"" .$username. "\",\r\n    \"email\": \"" .$email. "\",\r\n    \"password\" :\"" .$password. "\"\r\n}",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json"
  ),
));

  $response = curl_exec($curl);
  
  curl_close($curl);

  if (strpos($response, 'User Created') === false) {
    echo "No user created";
} else {
  $_SESSION['username'] = $username;
  $_SESSION['success'] = "You are now logged in";
  header('location: afterLOGIN.php');
  }
}

?>