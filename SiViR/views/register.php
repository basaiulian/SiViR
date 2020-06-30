<?php 
setPageTitle('Register'); 
include('top.php') 
?>

<link rel="stylesheet" type="text/css" href="public/css/register_style.css">

<div class="headerlogin">
  <h2>Register</h2>
</div>

<form method="post" action="index.php?page=register">
  <div class="input-group">
    <label>Username</label>
    <input type="text" name="username">
  </div>
  <div class="input-group">
    <label>Email</label>
    <input type="email" name="email"> 
  </div>
  <div class="input-group">
    <label>Password</label>
    <input type="password" name="password">
  </div>
  <div class="input-group">
    <label>Confirm password</label>
    <input type="password" name="confirm_password">
  </div>
  <div class="input-group">
    <button type="submit" class="btn" name="register">Register</button>
  </div>
  <br>
  <?php if(isset($this->error)){ ?>
  <p style="color: red;text-align: center;"><?php echo $this->error; ?></p>
  <?php } ?>
  <br>
  <p>
    Already a member? <a href="index.php?page=login">Sign in</a>
  </p>
</form>

<?php include('bottom.php'); ?>