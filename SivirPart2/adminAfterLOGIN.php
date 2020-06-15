<?php include('top_admin.php'); ?>

<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Home</title>

  <link rel="stylesheet" type="text/css" href="css/home.css" />
</head>
<body>


<div class="content">
  	<!-- notification message -->
  	<?php if (isset($_SESSION['success'])) : ?>
      <div class="error success" >
      	<h3>
          <?php 
          	echo $_SESSION['success']; 
          	unset($_SESSION['success']);
          ?>
      	</h3>
      </div>
  	<?php endif ?>

    <!-- logged in user information -->
    <?php  if (isset($_SESSION['username'])) : ?>
     
    	<p>Welcome [ADMIN] <strong><?php echo $_SESSION['username']; ?></strong></p>
    	
    <?php endif ?>
</div>

<div class="topnav">
    <div class="search-container">
        <form action="index.php?page=search" method="post">
            <input type="text" id="search-by-name" placeholder="Search your videos..." name="search">
            <button id="submit-button" type="submit" name="search_form"><i class="fa fa-search"></i></button>

            <div class="criteria">

                <div class="author-criteria">
                    <input type="text" class="author-input" placeholder="Youtube Channel" id="author-text"
                        name="author-criteria">
                </div>

                <div class="order-criteria">
                    <select id="order" value="Any" name="order-criteria">
                        <option class="order-option" value="relevance"> Order by </option>
                        <option class="order-option" value="relevance"> Relevance </option>
                        <option class="order-option" value="date"> Date </option>
                        <option class="order-option" value="viewCount"> View count </option>
                    </select>

                </div>

        </form>
    </div>
</div>
		
    <div class="sources">
    <div id="insta">
        <img id=insta_img src="img/insta_color.png" />
    </div>
    <div id="yt">
        <img id=yt_img src="img/yt_color.png" />
    </div>
    <div id="vimeo">
        <img id=vimeo_img src="img/vimeo_color.png" />
    </div>
</body>
</html>


<?php include('bottom.php'); ?>