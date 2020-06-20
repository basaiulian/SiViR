<?php 
setPageTitle('Login');
include('top.php') 
?>

<link rel="stylesheet" type="text/css" href="public/css/login_style.css">
<link rel="stylesheet" type="text/css" href="public/css/home_style.css" />

<div class="headerlogin ">
    <h2>Login</h2>
</div>
   
<form method="post" action="index.php?page=login">
  <?php if(isset($_GET['register_success'])){ ?>
  <br>
  <p style="color: green;text-align: center;">Contul dvs. a fost inregistrat cu succes. <br>
  Va rugam sa va autentificati!
  </p>
  <br>
  <?php } ?>
  <div class="input-group">
    <label>Username</label>
    <input id="username_input" type="text" name="username" required>
  </div>
  <div class="input-group">
    <label>Password</label>
    <input id="password_input" type="password" name="password" required>
  </div>
  <div class="input-group">
    <button type="submit" class="btn" name="login">Login</button>
  </div>
  <?php if(isset($this->error)){ ?>
  <br>
  <p style="color: red;text-align: center;"><?php echo $this->error; ?></p>
  <br>
  <?php } ?>
  <p>
    Not yet a member? <a href="index.php?page=register">Sign up</a>
  </p>
</form>

<?php include('bottom.php'); ?>