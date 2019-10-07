<?php 
	$tempfile = $_FILES['audio_data']['tmp_name'];
	$tempID = $_FILES["audio_data"]["name"];
	$temp = explode("&", $tempID);
	$filename = "/opt/lampp/htdocs/wtlab109/voice/".$temp[0];
	move_uploaded_file($tempfile, $filename);

	$host = "tcp://127.0.0.1:12345";
	$fp = stream_socket_client($host, $errno, $error, 20); 
	if (!$fp)
		echo "$error ($errno)"; 
	else{
		fwrite ($fp, $tempID);
		while (!feof($fp)){	
			$tempResult = fgets ($fp);
			$result = explode("*", $tempResult);
			setcookie("score", $result[0], time() + 1*24*60*60*1000,"/wtlab109");
			setcookie("result", $result[1], time() + 1*24*60*60*1000,"/wtlab109");
	  	}
	  	fclose ($fp);
	}
?>

