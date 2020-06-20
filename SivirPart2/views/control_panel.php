<?php
setPageTitle('Control Panel');
include('top.php'); 
?>

<link rel="stylesheet" type="text/css" href="public/css/control_panel_style.css" />

<div id="manage_users">
  <form method="post" action="searches_control_panel.php">
    <input type="text" id="id_input" name="id" placeholder="ID" /><br/>
    <input type="submit" name="delete" id="btn" value="Delete User" /><br/>
    <input type="submit" name="promote" id="btn" value="Promote User" /><br/>
    <input type="submit" name="view_searches" id="btn" value="View User\'s Searches" /><br/>
  </form>
</div>

<table border="1">
    <tr>
      <th>ID</th>
      <th>Username</th>
      <th>Email</th>
      <th>Admin</th>
      <th>Updated at</th>
      <th>Created at</th>
    </tr>

<?php 

$i = 0;
foreach($this->users as $user){
    echo'
      <tr>
      <td>'.$user['id'].'</td>
      <td>'.$user['username'].'</td>
      <td>'.$user['email'].'</td>
      <td>'.$user['admin'].'</td>
      <td>'.$user['updated_at'].'</td>
      <td>'.$user['created_at'].'</td>
    </tr>';

    $i++;
} 

?>

</table>
<?php  ?>

<?php include('bottom.php'); ?>