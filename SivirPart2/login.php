
<?php include('top_login.php') ?>
<?php include('server.php') ?>

<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="css/login_style.css">
  <link rel="stylesheet" type="text/css" href="css/home_style.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>


<div class="headerlogin ">
    <h2>Login</h2>
  </div>
   
  <form method="post" action="login.php">
    <div class="input-group">
      <label>Username</label>
      <input id="username_input" type="text" name="username" >
    </div>
    <div class="input-group">
      <label>Password</label>
      <input id="password_input" type="password" name="password">
    </div>
    <div class="input-group">
      <button type="submit" class="btn" name="login_user">Login</button>
    </div>
    <p>
      Not yet a member? <a href="register.php">Sign up</a>
    </p>
  </form>
 

  

<?php include('bottom.php'); ?>