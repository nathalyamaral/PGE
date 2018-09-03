		
<?php

	$data = array(
	);
	$ch = curl_init('http://virtus.azi.com.br/virtus-rest/v1/documentos');
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		"protocolo:".$_POST["protocolo"], 
		"numeroProcesso:".$_POST["numeroprocesso"], 
		"titulo:".$_POST["titulo"],
		"descricao".$_POST["descricao"],
		"chaveCategoria:".$_POST["chaveCategoria"],
		"nomeOriginal:".$_POST["nomeOriginal"],
		"tipoMeio: DIGITAL",
		"formato: application/pdf",
		"chaveDeRecuperacaoDoDiretorio: ".$_POST["chaveDeRecuperacaoDoDiretorio"],
		"versao: 1.0",
	    "accept: application/json",
	    "Content-Type: application/json")
	);

	curl_setopt($ch, CURLOPT_TIMEOUT, 5);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
	$result = curl_exec($ch);

	curl_close($ch);
	echo $result; 

?>