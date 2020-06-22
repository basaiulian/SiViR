<?php 
if(defined('PAGE_TITLE')) 
	$title = 'SiViR - '.PAGE_TITLE;
else
	$title = 'SiViR';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title><?=$title?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="public/css/index_style.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	</script>

</head>

<body>
	<div class="header">
		<a href="index.php" class="logo"><img src="public/img/logoF.png" /></a>

		<div class="header-right">
			<?php if(!isset($_SESSION['username'])){ ?>

			<a href="index.php?page=login" id="right-button"> Login </a>
			<a href="index.php?page=register" id="right-button"> Register </a>
			<a href="user_guide.html" target="_blank" id="right-button"> User Guide </a>
			<a href="documentation.html" target="_blank" id="right-button"> Documentation </a>
			<?php } 
			
			elseif(isset($_SESSION['admin'])){ ?>
			<span class="welcome_message">[Admin] Welcome, <?php echo $_SESSION['username']; ?> ! </span>
		    <a href="index.php?page=favourites" id="right-button"> Favourites </a>
		    <a href="index.php?page=control_panel" id="right-button"> Control Panel </a>
		    <a href="index.php?page=logout" >Logout</a> 
			<?php } 
			else{ ?>

			<span class="welcome_message"> Welcome, <?php echo $_SESSION['username']; ?> ! </span>
	        <a href="index.php?page=favourites" id="right-button"> Favourites </a>
            <a href="user_guide.html" id="right-button" target="_blank"> User Guide </a>
            <a href="documentation.html" id="right-button" target="_blank"> Documentation </a>
			<a href="index.php?page=logout" id="right-button"> Logout </a>
			<?php } ?>
		</div>
	</div>
