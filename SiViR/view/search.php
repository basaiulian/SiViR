<?php include('top_search.php');
require_once 'controller.php';
$controller = new Controller();
?>

<head>
<link rel="stylesheet" type="text/css" href="public/css/search_style.css" />
</head>

<div class="goto-index">
	<div class="search-again">
		<a href="index.php" id="search-again-button">Search again</a>
	</div>
</div>

	<?php
	$author = $_POST['author-criteria'];
	$keyword = $_POST['search'];
	?>

	<div id="youtube-title">
	<img src="public/img/yt_color.png">
	</div>

	<div id="youtube_videos">
		<?php
		$youtube_ok=0;
		if (!is_array( $data['youtube_results'] ) || count( $data['youtube_results'] ) < 1	) {
			echo "No result";
		} else {
			$counter1 = 0;
			$counter2 = 0;
		    
			if (strcmp(strtoupper($author), null) != 0) {
				foreach ($data['youtube_results']['items'] as $item) {
			
					if (isset($item['id']['videoId'])) {

						if (strcmp(strtoupper($author), strtoupper($item['snippet']['channelTitle'])) == 0 && $counter1 < 5) {

							$url = 'https://www.youtube.com/embed/' . $item['id']['videoId'];
							$title = $item['snippet']['title'];
							
							$counter1 = $counter1 + 1;
							

		?>

							
							<div class="youtube-video">
								<iframe width="280" height="150" src="<?= $url ?>" frameborder="0" allowfullscreen></iframe>
							</div>
								
						<?php   }
					}
				}
			} else {

				foreach ($data['youtube_results']['items'] as $item) {

					if (isset($item['id']['videoId'])) { 

						if ($counter1 < 5) {
							$url = 'https://www.youtube.com/embed/' . $item['id']['videoId'];
							$title = $item['snippet']['title'];

							$counter1 = $counter1 + 1;
							$source ='youtube';
							$controller->insert($title,$url,$source);

						?>


							<div class="youtube-video" >
								<iframe width="312" height="410" src="<?= $url ?>" frameborder="0" allowfullscreen></iframe>
							</div>

		<?php   }	
					}
				}
			}
			
		}

		?>
	</div>


	<div id="vimeo-title">
	<img src="public/img/vimeo_color.png">
	</div>


	<div id="vimeo_videos">
		<?php
		if (!is_array( $data['vimeo_results'] ) || count( $data['vimeo_results'] ) < 1	) {
			echo "No result";
		} else {
			$counter2 = 0;
			foreach ($data['vimeo_results'] as $item) {

				if ($counter2 < 5) {
					$new_video_uri = str_replace('/videos/', '', $item['uri']);

					$title=$item['name'];

					echo '<body>
					  <iframe class="vimeo-video" src="https://player.vimeo.com/video/' . $new_video_uri . '" width="312" height="310" frameborder="0" title="{video_title}" webkitallowfullscreen mozallowfullscreen allowfullscreen ></iframe>
					</body>
					<br/>';

					$new_url = 'https://www.vimeo.com/'.$new_video_uri.'';
					$source ='vimeo';
					$controller->insert($title,$new_url,$source);
					

					$counter2 = $counter2 + 1;
				} else break;
			}
		}
		?>



	</div>


	<div id="instagram-title">
	<img src="public/img/insta_color.png">
	</div>

	<div id="instagram_videos">
		<?php 																					
		 if (!is_array( $data['instagram_results'] ) || count( $data['instagram_results'] ) < 1	) {
		 	echo "No result";
		 } else {
		 	 $counter3 = 0;
		 	foreach ($data['instagram_results'] as $item) {
		 			if($counter3<5){
		 			$media_type = $item->getType();
		 			$media_link = $item->getLink();
		 			$media_title = $item->getCaption();
		 			if(strcmp($media_type,"video")==0){

		 				$account = $item->getOwner();
		 				$title=$account->getUsername();
		 				echo $title;

		 				$source ='instagram';
						$controller->insert($media_title,$media_link,$source);

		 				echo '<iframe class="instagram-video" src="'.$media_link.'/embed/" width="312" height="410" frameborder="0" scrolling="no" allowtransparency="true"></iframe>';

		 				$counter3 = $counter3 + 1;
		 			}
		 		}
				
		 	}
		 }
		 ?>
	</div>


	<!-- RSS FEED -->

	<?php
		$URL = "http://".$_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		$str = "<?xml version='1.0'  encoding='UTF-8' ?>\n";
		$str .= "<rss version='2.0'>\n";
		
		$str .= "<channel>\n";
		$str .= "<title>Sivir</title>\n";
		$str .= "<description>Similar Video Retriever</description>\n";
		$str .= "<language>en-US</language>\n";
		$str .= "<link>$URL</link>\n";

		$conn = mysqli_connect("127.0.0.1", "root", "","sivir");

		$results = mysqli_query($conn,"SELECT * FROM RESULTS");

		// $stmt = $mysqli->prepare("SELECT * FROM RESULTS");
		// $stmt->execute();
		// $results = $stmt->get_result();

		while($row = mysqli_fetch_object($results)){
			$str .= "<item>";
			$str .= "<title>$row->TITLE</title>";
			$str .= "<link>$row->LINK</link>";
			$str .= "<source>$row->SOURCE</source>";
			$str .= "</item>";
		}

		$str .="</channel>";
		$str .="</rss>";

		file_put_contents("my_rss.xml",$str);
	?>
	
	

<?php include('bottom.php'); ?>