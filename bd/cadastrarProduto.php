<?php
include_once('bd.php');

$nome = $_POST['nome'];
$descricao = $_POST['descricao'];
$tamanho = $_POST['tamanho'];
$preco = $_POST['preco'];

$sql = "insert into produto (nome,descricao,tamanho,preco) values ('$nome','$descricao','$tamanho','$preco')";
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
					alert(\"Produto cadastrado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../index.php'>
				<script type=\"text/javascript\">
					alert(\"Erro ao cadastrar produto.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conexao->close(); ?>
