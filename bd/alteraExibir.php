<?php
include_once('bd.php');

$id = $_POST['id'];

$sql = "UPDATE pedidos SET status = 'Pronto' WHERE id = '$id'";
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
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../cozinha.php'>
				";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../index.php'>
				<script type=\"text/javascript\">
					alert(\"Erro.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conexao->close(); ?>




   
