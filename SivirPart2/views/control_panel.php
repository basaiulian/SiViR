<?php
setPageTitle('Control Panel');
include('top.php'); 
?>

<link rel="stylesheet" type="text/css" href="public/css/control_panel_style.css" />

<div id="manage_users">
  <form method="post">
    <input type="text" id="username_input" name="username" placeholder="Username" /><br/>
    <input type="submit" name="delete" id="deleteBtn" onClick="window.location.reload();" value="Delete User" /><br/>
    <input type="submit" name="promote" id="promoteBtn" onClick="window.location.reload();" value="Promote User" /><br/>
    <input type="submit" name="view_searches" id="demoteBtn" onClick="window.location.reload();" value="Demote User" /><br/>
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

<script type="text/javascript" src="public/js/control_panel.js"></script>
<?php include('bottom.php'); ?>