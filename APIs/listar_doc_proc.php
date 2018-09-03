
<?php

	
		$numprocesso = $_POST['numeroprocesso']);
		$url = 'http://virtus.azi.com.br/virtus-rest/v1/documentos/processo/'.$numeroprocesso;
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_TIMEOUT, 5);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$data = curl_exec($ch);
		curl_close($ch);
		echo $data;
	
?>