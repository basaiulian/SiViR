	<?php 
	function render($view, $data = null){
		include('view/'.$view.'.php');
	}

	function getApiRequest($url,$data){
			$ch = curl_init();
			$data = http_build_query($data);
			$getUrl = $url."?".$data;
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($ch, CURLOPT_URL, $getUrl);
			curl_setopt($ch, CURLOPT_TIMEOUT, 80);
			 
			$response = curl_exec($ch);
			 
			if(curl_error($ch)){
				return array('error' => 'true','Request Error' => curl_error($ch));
			}
			else
			{
				$file=fopen("response.txt","w");
				fwrite($file, $response); 
				fclose($file);
				return json_decode($response, true);
			}

			curl_close($ch);
	}