<?php
include_once('bd.php');
$telefoneCliente = $_POST['telefoneCliente'];
$nomecliente = $_POST['nomeCliente'];
$enderecoCliente = $_POST['enderecoCliente'];
$complementoCliente = $_POST['complementoCliente'];

$sql = "insert into clientes (telefoneCliente,nomeCliente,enderecoCliente,complementoCliente) values ('$telefoneCliente','$nomecliente','$enderecoCliente','$complementoCliente')";
$salvar = mysqli_query($conexao,$sql);


$linhas = mysqli_affected_rows($conexao);




?>


<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conexao) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../index.php'>
				<script type=\"text/javascript\">
					alert(\"Cliente cadastrado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../index.php'>
				<script type=\"text/javascript\">
					alert(\"Erro ao cadastrar Cliente.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conexao->close(); ?>




   
