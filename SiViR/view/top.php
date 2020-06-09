<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" />
	<title>SiViR</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="public/css/index_style.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

	<script>
		function getVote(int) {
  			var xmlhttp=new XMLHttpRequest();
  			xmlhttp.onreadystatechange=function() {
    			if (this.readyState==4 && this.status==200) {
      				document.getElementById("poll").innerHTML=this.responseText;
    			}
  			}
  			xmlhttp.open("GET","poll_vote.php?vote="+int,true);
  			xmlhttp.send();
		}
	</script>

</head>

<body>
	<div class="header">
		<a href="index.php" class="logo"><img src="public/img/logoF.png" /></a>

		<div class="header-right">
			<a href="view/user_guide.html" id="right-button"> User Guide </a>
			<a href="view/documentation.html" id="right-button"> Documentation </a>
		</div>
	</div>
