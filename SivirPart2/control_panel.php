<?php
include_once 'config/Database.php';
include_once 'models/User.php';
session_start();

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://localhost/sivirAPI/user/count.php",
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

$json_count_result = json_decode($response, true);


curl_close($curl);

$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://localhost/sivirAPI/user/read.php",
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

$user_count=(int)$json_count_result;

echo'
    <table border="1">
    <tr>
      <th>ID</th>
      <th>Username</th>
      <th>Email</th>
      <th>Admin</th>
      <th>Updated at</th>
      <th>Created at</th>
    </tr>';

$i=0;
while($user_count>0){
    echo'
      <tr>
      <td>'.$json_result[$i]['id'].'</td>
      <td>'.$json_result[$i]['username'].'</td>
      <td>'.$json_result[$i]['email'].'</td>
      <td>'.$json_result[$i]['admin'].'</td>
      <td>'.$json_result[$i]['updated_at'].'</td>
      <td>'.$json_result[$i]['created_at'].'</td>
    </tr>';

    $i++;
    $user_count--;
}
    echo '</table>';


    

echo
'<form method="post">
    <input type="text" name="id" placeholder="ID" /><br/>
    <input type="submit" name="delete" id="delete_button" value="Delete User" /><br/>
    <input type="submit" name="promote" id="promote_button" value="Promote User" /><br/>
</form>';




function deleteUserById()
{
$curl = curl_init();

$id = $_POST['id'];

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://localhost/sivirAPI/user/delete.php",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "DELETE",
  CURLOPT_POSTFIELDS =>"{\r\n    \"id\": \"".$id."\"\r\n}",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json"
  ),
));

$response = curl_exec($curl);

curl_close($curl);
}

function updateUserById(){

$curl = curl_init();

$id = $_POST['id'];

curl_setopt_array($curl, array(
  CURLOPT_URL => "http://localhost/sivirAPI/user/update.php",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "PUT",
  CURLOPT_POSTFIELDS =>"{\r\n    \"id\": \"".$id."\",\r\n    \"1\": \"1\"\r\n}",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json"
  ),
));

$response = curl_exec($curl);

curl_close($curl);

}

if(array_key_exists('delete',$_POST)){
  deleteUserById();
  echo "<meta http-equiv='refresh' content='0'>";
  exit;
}

if(array_key_exists('promote',$_POST)){
  updateUserById();
  echo "<meta http-equiv='refresh' content='0'>";
  exit;
}

