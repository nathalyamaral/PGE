
<?php

	$url = 'http://virtus.azi.com.br/virtus-rest/v1/protocolos/processo';
	$ch = curl_init($url);
	curl_setopt($ch, CURLOPT_TIMEOUT, 5);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$data = curl_exec($ch);
	$data = json_decode($data, true);
	curl_close($ch);
	print "<pre>";
	print_r($data["dados"][0]);
	print "</pre>";	
?>