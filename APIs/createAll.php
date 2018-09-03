<?php
	if (isset($_POST['action'])) {
		switch ($_POST['action']) {
	        case 'createAndSign':
	            createAndSign();
	            break;
	    }
	}
	function create_proc(){
		$url = 'http://virtus.azi.com.br/virtus-rest/v1/protocolos/processo';
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_TIMEOUT, 5);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$data = curl_exec($ch);
		$data = json_decode($data, true);
		curl_close($ch);
		return $datadata["dados"][0];
	}

	function create_prot(){
		$url = "http://virtus.azi.com.br/virtus-rest/v1/protocolos";
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_TIMEOUT, 5);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$data = curl_exec($ch);
		$data = json_decode($data, true);
		curl_close($ch);
		return $data["dados"][0];
	}

	function create_catg(){
		$data = array("chave" => "JUNOESTAGI1", "titulo" => "MosqEstagio1", "descricao" => "Estágio PGE1");
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
		return 	$data["chave"];

	}

function uploadFile($prot,$proc,$categoria){
		$arq = "test1.pdf";
		$pathToSave = $_SERVER["DOCUMENT_ROOT"]."uploads/";
		$cFile = $arq;
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
			"nome:"."Test", 
			"mimetype:application/pdf", 
			"numeroprocesso:".$proc,
			"chavecategoria:".$categoria,
			"protocolodoc:".$prot,
			"accept:application/json",
		    "Content-Type:multipart/form-data",
			"file:"."@uploads/".$cFile.";type=application/pdf")
			
		);
		curl_setopt($ch, CURLOPT_TIMEOUT, 5);
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
		$result = curl_exec($ch);
		$result = json_decode($result, true);

		curl_close($ch);
		return $result["key"]; 
	}

	function createAndSign(){
		echo "Relatorio";
		$process = create_proc();
		$protocol = create_prot();
		$category = create_catg();
		$keyFile = uploadFile($process,$protocol,$category);
		$titulo = "Relatorio ";
		$desc = "Relatorio Atividade";
		$nomeori = "teste";
		/*$creatdoc = create_doc($protocol, $process, $titulo, $desc, $category, $nomeori, $keyFile);
		$sign = sign($protocol);*/
	}
	
?>