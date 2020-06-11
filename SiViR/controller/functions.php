	<?php 
	function render($view, $data = null){
		include('view/'.$view.'.php');
	}

	function getApiRequest($url,$data){
			$ch = curl_init(); //initialize a cURL session
			$data = http_build_query($data);
			$getURL = $url."?".$data;
			//setting options for cURL transfer
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
			curl_setopt($ch, CURLOPT_FOLLOWLOCATION, TRUE);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
			curl_setopt($ch, CURLOPT_URL, $getURL);
			curl_setopt($ch, CURLOPT_TIMEOUT, 80);
			 
			$response = curl_exec($ch); //performing a cURL session
			 
			if(curl_error($ch)){ // returning an string containing the last error from the current session
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