<?php
	include_once("bd.php");
	$id = mysqli_real_escape_string($conexao, $_POST['id']);
	
	$result_produto = "DELETE FROM produto WHERE id = '$id'";
	
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
					alert(\"Excluido com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../index.php'>
				<script type=\"text/javascript\">
					alert(\"Erro ao excluir produto.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conexao->close(); ?>



