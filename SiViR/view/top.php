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
  			var xml_http_request=new XMLHttpRequest();
  			xml_http_request.onreadystatechange=function() { // called at readyState change
    			if (this.readyState==4 && this.status==200) { // request finished and response ready && status OK
      				document.getElementById("poll").innerHTML=this.responseText;
    			}
  			}
  			xml_http_request.open("GET","poll_vote.php?vote="+int,true); // initialize newly-created request or re-initialize one
			  												    // GET method, url, true for async
  			xml_http_request.send(); //sends the request to the server
		}
	</script>

</head>

<body>
	<div class="header">
		<a href="index.php" class="logo"><img src="public/img/logoF.png" alt="SiViR logo" /></a>

		<div class="header-right">
			<a href="view/user_guide.html" id="right-button"> User Guide </a>
			<a href="view/documentation.html" id="right-button"> Documentation </a>
		</div>
	</div>
