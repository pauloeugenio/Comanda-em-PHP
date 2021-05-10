<?php
	include_once("bd.php");
	$id = mysqli_real_escape_string($conexao, $_POST['id']);
	$nomeCliente = mysqli_real_escape_string($conexao, $_POST['nomeCliente']);
	$telefoneCliente = mysqli_real_escape_string($conexao, $_POST['telefoneCliente']);
	$enderecoCliente = mysqli_real_escape_string($conexao, $_POST['enderecoCliente']);
	$complementoCliente = mysqli_real_escape_string($conexao, $_POST['complementoCliente']);
	echo "$id - $nomeCliente - $enderecoCliente - $complementoCliente - $telefoneCliente";
	$result_cliente = "UPDATE clientes SET nomeCliente = '$nomeCliente',telefoneCliente = '$telefoneCliente', enderecoCliente = '$enderecoCliente', complementoCliente = '$complementoCliente' WHERE id = '$id'";
	
	$resultado_clientes = mysqli_query($conexao, $result_cliente);	
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
					alert(\"Alterado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../index.php'>
				<script type=\"text/javascript\">
					alert(\"Erro ao alterar informações.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conexao->close(); ?>



