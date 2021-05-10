<?php

include_once('bd/bd.php');

$sql = "SELECT * FROM produto";
$consulta = mysqli_query($conexao, $sql);
$registro = mysqli_num_rows($consulta);




?>
<?php include_once('topo.php')?>
<h1>
    <form method="get" action="">
        Filtrar por pedido: <input type="text" name="filtro" class="campo" required autofocus>
        <input type="submit" value="Pesquisa" class="btn"><br/>
    <?php
    print "$registro registors encontrados.";
    
    print "<br/><br/>";
    
    
    while($exibirRegistros = mysqli_fetch_array($consulta)){
        
        $id = $exibirRegistros[0];
        $nome = $exibirRegistros[1];
        $descricao = $exibirRegistros[2];
        $preco = $exibirRegistros[3];
        
        print "<article>";
        print "$id<br>";
        print "$nome<br>";
        print "$descricao<br>";
        print "$preco<br>";
        
        print "</article>";
    }
    mysqli_close($conexao);
    ?>
    
    
</h1>