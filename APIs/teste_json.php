
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="estilo.css">

	<script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>		
</head>
<body>

<center>
	<div class="formulario">

		<form method="POST" action="criarcategoria.php">
			<label> Chave da Categoria </label>
			<input type="text" name="chave">
			<br />
			<label> Titulo da Categoria </label>
			<input type="text" name="titulo">
			<br />
			<label> Descricao </label>
			<input type="text" name="descricao">
			<input type="submit" value="Enviar">
		</form>

		<div> -------------- </div> <br />
		<form action="get_proc.php" method="get">
			<label> Gerar Numero de Processo </label>
			<button type="submit"> Gerar </button>
		</form>
		
		<div> -------------- </div> <br />
			<form action="create_protocolo.php" method="get">
				<label> Gerar Numero de Protocolo </label>
				<button type="submit"> Gerar </button>
			</form>

		<div> -------------- </div> <br />
		<form method="post" action="enviar_arq.php" enctype="multipart/form-data">
			<label> Arquivo </label>
			<input type="file" id="file" name="file" value="" />
			<br>
			<label> Nome arquivo </label>
			<input type="text" name="nome">
			<br>
			<label> Numero processo </label>
			<input type="number" name="numeroprocesso">
			<br>
			<label> Chave da Categoria </label>
			<input type="text" name="chavecategoria">
			<br>
			<label> Numero Protocolo </label>
			<input type="number" name="protocolodoc">
			<br>
			<button type="submit" accesskey="S" name="sbmSalvar" class="infraButton"><span class="infraTeclaAtalho"></span>Enviar</button>
		</form>
		<div> -------------- </div> <br />
		<form action="get_categoria.php" method="get">
			<button id="button" type="submit"> Consultar Categoria</button>
		</form> <!---
		<script type="text/javascript">
			$(document).ready(function(){
			    $('#button').click(function(){
			        var clickBtnValue = $(this).val();
			        var ajaxurl = 'createAll.php',
			        data =  {"action": clickBtnValue};
			        alert(clickBtnValue);			
			        $.post(	ajaxurl, data)
			          .done(function(data){
			          	alert(data);
			          })
			          .fail(function(error){
			          	alert("Olha"+error["name"]);	
			          });
			    });
			});
		</script> --->
		<div> -------------- </div> <br />
		<form method="POST" action="create_doc.php">
			<label> Inserir Documento </label>
			<br />
			<label> Numero Protocolo </label>
			<input type="text" name="protocolo">
			<br>
			<label> Numero processo </label>
			<input type="text" name="numeroprocesso">
			<br>
			<label> Titulo </label>
			<input type="text" name="titulo">
			<br>
			<label> Descrição </label>
			<input type="text" name="descricao">
			<br />
			<label> Chave da Categoria </label>
			<input type="text" name="chaveCategoria">
			<br>
			<label> Nome Original </label>
			<input type="text" name="nomeOriginal">
			<br />
			<label> Chave do Arquivo </label>
			<input type="text" name="chaveDeRecuperacaoDoDiretorio">
			<input type="submit" ><span class="infraTeclaAtalho">E</span>nviar
		</form>
		<div> -------------- </div> <br />
		<form action="get_doc_proc.php" method="post">
			<label> Numero do Processo </label>
			<input type="number" name="numeroprocesso">
			<button type="submit"> Consultar Documento Por Processos</button>
		</form>

		<div> -------------- </div> <br />
		<form action="get_doc_prot.php" method="post">
			<label> Numero do Protocolo </label>
			<input type="number" name="numeroprotocolo">
			<button type="submit"> Consultar Documento Por Protocolo</button>
		</form>

		<div> -------------- </div> <br />
		<div> -------------- </div> <br />

	</div>
</center>
</body>
</html>
