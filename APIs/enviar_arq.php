<?php
	$pathToSave = $_SERVER["DOCUMENT_ROOT"]."uploads/";
	$cFile = '';
	/*Checa se a pasta existe - caso negativo ele cria*/
	if (!file_exists($pathToSave)) {
	    mkdir($pathToSave);
	}

	if ($_FILES) { // Verificando se existe o envio de arquivos.

	    if ($_FILES['file']) { // Verifica se o campo não está vazio.
	        $dir = $pathToSave; // Diretório que vai receber o arquivo.
	        $tmpName = $_FILES['file']['tmp_name']; // Recebe o arquivo temporário.
	        $name = $_FILES['file']['name']; // Recebe o nome do arquivo.
	        // move_uploaded_file( $arqTemporário, $nomeDoArquivo )
	        if (move_uploaded_file($tmpName, $dir.$name)) { // move_uploaded_file irá realizar o envio do arquivo.        
	            echo('Arquivo adicionado com sucesso.');
				$cFile = $name;
	        } else {
	            echo('Erro ao adicionar arquivo.');
	        }    
    	}  
	}
	$data = array(
	);
	//arq[0]' => new cURLFile($arq, $pdf, $basename1)
	$ch = curl_init('http://virtus.azi.com.br/virtus-rest/v1/arquivos');
	curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($ch, CURLOPT_HTTPHEADER, array(
		"nome:".$_POST["nome"], 
		"mimetype:application/pdf", 
		"numeroprocesso:".$_POST["numeroprocesso"],
		"chavecategoria:".$_POST["chavecategoria"],
		"protocolodoc:".$_POST["protocolodoc"],
		"accept:application/json",
	    "Content-Type:multipart/form-data",
		"file:"."@uploads/".$cFile.";type=application/pdf")
		
	);

	curl_setopt($ch, CURLOPT_TIMEOUT, 5);
	curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
	$result = curl_exec($ch);
	$result = json_decode($result, true);

	curl_close($ch);
	echo $result["key"]; 
?>
