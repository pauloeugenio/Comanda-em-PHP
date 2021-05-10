<?php
	include_once("bd.php");
	$id = mysqli_real_escape_string($conexao, $_POST['id']);
	$nome = mysqli_real_escape_string($conexao, $_POST['nome']);
	$descricao = mysqli_real_escape_string($conexao, $_POST['descricao']);
	$tamanho = mysqli_real_escape_string($conexao, $_POST['tamanho']);
	$preco = mysqli_real_escape_string($conexao, $_POST['preco']);
	echo "$id - $nome - $descricao - $tamanho - $preco";
	$result_produto = "UPDATE produto SET nome = '$nome',descricao = '$descricao', tamanho = '$tamanho', preco = '$preco' WHERE id = '$id'";
	
	$resultado_clientes = mysqli_query($conexao, $result_produto);	
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



