<?php
session_start();

if (isset($_POST['login_user'])) {
  $username = $_POST['username'];
  $password = $_POST['password'];

   //verificare daca s au introdus

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
  
  curl_close($curl);
  echo $response;

// if (count($errors) == 0) {
  //   $password = md5($password);
  //   $query = "SELECT * FROM useri WHERE username='$username' AND password='$password'";
  //   $results = mysqli_query($db, $query);
  //   if (mysqli_num_rows($results) == 1) {
  //     $_SESSION['username'] = $username;
  //    /* $_SESSION['success'] = "You are now logged in";*/
  //     header('location: afterLOGIN.php');
  //   }else {
  //     array_push($errors, "Wrong username/password combination");
  //   }
  // }

}

?>