
<?php
$API_key    = 'AIzaSyBsJWG7SlouFUGS9wqj4DvC1wAXcW0cZrA';
$keyword = $_REQUEST['search'];
$keyword_1 = str_replace(" ","+",$keyword);

$author = $_REQUEST['author-criteria'];
echo $author;

$maxResults = 10;
echo 'https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&q='.$keyword_1.'&forUsername='.$author.'&maxResults='.$maxResults.'&key='.$API_key.'';
$videoList = json_decode(file_get_contents('https://www.googleapis.com/youtube/v3/search?order=date&part=snippet&q='.$keyword_1.'&forUsername='.$author.'&maxResults='.$maxResults.'&key='.$API_key.''));

?>


<!DOCTYPE html>
<html lang="en">
<head>
		<meta charset="utf-8"/>
		<title>SiViR-Home</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" type="text/css" href="search_style.css"/>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		
</head>
<body>
		
		<div class="header">
		  <a href="index.html" class="logo"><img src="logoF.png"/></a>
		  <div class="header-right">
		    <a class="active" href="index.html">Home</a>
		    <a href="#profile">My profile</a>
		    <a href="#favourites">My favourites</a>
		    <a href="register.html">Logout</a>
		    <a href="#about">About</a>
		  </div>
		</div>

		<div class="goto-index">
 			<div class="search-again">
    			<a href="index.html" id="search-again-button">Search again</a>
  			</div>
		</div>

		<div class="row">
			<?php
			foreach($videoList->items as $item){
    //Embed video
    if(isset($item->id->videoId)){
		echo '<div class="youtube-video">
				<h2>'. $item->snippet->title .'</h2>
                <iframe width="280" height="150" src="https://www.youtube.com/embed/'.$item->id->videoId.'" frameborder="0" allowfullscreen></iframe>
            </div>';
    }
}

			?>
		</div>
		 





	
</body>
</html>