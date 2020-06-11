<?php include('top_search.php');
require_once 'D:\XAMPP\htdocs\SiViR\controller\controller.php';
$controller = new Controller();
?>

<head>
<meta charset="utf-8" />
<title>SiViR</title>
<link rel="stylesheet" type="text/css" href="public/css/search_style.css" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
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
							$source ='youtube';
							$controller->insert($title,$url,$source);
							

		?>

							
							<div class="youtube-video">
								<iframe width="312" height="410" src="<?= $url ?>" frameborder="0" allowfullscreen></iframe>
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
		$rss_string = "<?xml version='1.0'  encoding='UTF-8' ?>\n";
		$rss_string .= "<rss version='2.0'>\n";
		
		$rss_string .= "<channel>\n";
		$rss_string .= "<title>Sivir</title>\n";
		$rss_string .= "<description>Similar Video Retriever</description>\n";
		$rss_string .= "<language>en-US</language>\n";
		$rss_string .= "<link>$URL</link>\n";

		$connection = mysqli_connect("127.0.0.1", "root", "","sivir");

		
		//$results = mysqli_query($conn,"SELECT * FROM RESULTS");
		$sql="SELECT * FROM RESULTS";
		$stmt = $connection->prepare($sql);
		$stmt->execute();
		$rss_results = $stmt->get_result();

		while($row = mysqli_fetch_object($rss_results)){
			$rss_string .= "<item>";
			$rss_string .= "<title>$row->TITLE</title>";
			$rss_string .= "<link>$row->LINK</link>";
			$rss_string .= "<source>$row->SOURCE</source>";
			$rss_string .= "</item>";
		}

		$rss_string .="</channel>";
		$rss_string .="</rss>";

		file_put_contents("my_rss.xml",$rss_string);
	?>
	
	<!-- CSV EXPORT -->
	<?php
		$connection = mysqli_connect("127.0.0.1", "root", "","sivir");
		
		//$results = mysqli_query($conn,"SELECT * FROM RESULTS");
		$sql="SELECT * FROM RESULTS";
		$stmt = $connection->prepare($sql);
		$stmt->execute();
		$csv_results = $stmt->get_result();
		$csv_string = "";
		
		while($row = mysqli_fetch_object($csv_results)){
			$csv_string .= $row->TITLE;
			$csv_string .= ",";
			$csv_string .= $row->LINK;
			$csv_string .= ",";
			$csv_string .= $row->SOURCE;
			$csv_string .= "\n";
		}

		file_put_contents("my_csv.csv",$csv_string);
	?>
	

	
<?php include('bottom.php'); ?>