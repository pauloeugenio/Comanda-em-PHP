<?php
include_once('bd.php');

$cliente = $_POST['cliente'];
$produtos = $_POST['produtos'];
$total = $_POST['total'];
$troco = $_POST['troco'];
$status = $_POST['status'];
$formaPagamento = $_POST['formaPagamento'];

$sql = "insert into pedidos (cliente,produtos,total,troco,status,formaPagamento) values ('$cliente','$produtos','$total','$troco','$status','$formaPagamento')";
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
					alert(\"Pedido cadastrado com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../index.php'>
				<script type=\"text/javascript\">
					alert(\"Erro ao cadastrar Pedido.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conexao->close(); ?>



