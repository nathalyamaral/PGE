
<?php

	$data = array("chave" => $_POST["chave"], "titulo" => $_POST["titulo"], "descricao" => $_POST["descricao"]);
	$data_string = json_encode($data);

	$ch = curl_init('http://virtus.azi.com.br/virtus-rest/v1/categorias');
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
	    'Content-Type: application/json',
	    'Content-Length: ' . strlen($data_string))
	);
	curl_setopt($ch, CURLOPT_TIMEOUT, 5);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

	$result = curl_exec($ch);

	curl_close($ch);	
	echo $data["chave"];

?>

