<META HTTP-EQUIV="REFRESH" CONTENT="15;URL=cozinha.php">
<?php

include_once('bd/bd.php');

$sql = "SELECT id, cliente, produtos, total, troco, status, formaPagamento, dataPedido, extract(hour from horaPedido), extract(minute from horaPedido) FROM pedidos WHERE status = 'Aberto'";
$consulta = mysqli_query($conexao, $sql);
$registro = mysqli_num_rows($consulta);



include_once('topo.php')
?>
<div class="container-fluid fadeIn">

    <?php
    print"<div class='row'>";
    print"<div class='col-lg-1'></div>";
    $contador = 0;
    while ($exibirRegistros = mysqli_fetch_array($consulta)) {
    $contador += 1;
    $id = $exibirRegistros[0];
    $cliente = $exibirRegistros[1];
    $produtos = $exibirRegistros[2];
    $total = $exibirRegistros[3];
    $entregador = $exibirRegistros[4];
    $status = $exibirRegistros[5];
    $formaPagamento = $exibirRegistros[6];
    $dataPedido = $exibirRegistros[7];
    $hora = $exibirRegistros[8];
    $minuto = $exibirRegistros[9];
   
    if ($contador>5){
        print"</div><div class='row'><div class='col-lg-1'></div>";
        $contador=1;
    }
    print" <div class='col-lg-2'><div class='list-group'>";
    print" <div class='list-group-item active'>";
    print" <center><div class='circulo'>$id</div></center>";
    print" <h4><span class='glyphicon glyphicon-user'></span> $cliente </h4>";
    print" <h4><span class='glyphicon glyphicon-credit-card'></span> R$: $total,00</h4>";
    print" <form method='POST' action='bd/alteraExibir.php'>";
    print" <input type='hidden' name='id' value='$id'>";
    print" <button type='submit' class='btn  btn-block btn-danger'>Pronto</button></form>";
    print" <br/><div style='text-align: right;'><span class='glyphicon glyphicon-time'></span> $hora:$minuto</div>";
    print"</div>";
   
    $teste = $produtos;
    $validou = explode(',', $teste);
    foreach ($validou as $valores){
        if($valores !=0){
     print"<article class='list-group-item'><p id='bio'><span class='glyphicon glyphicon-shopping-cart'></span> $valores</p></article>";   
    }}
    print" </div></div> ";
    }

    
    mysqli_close($conexao);
    ?>
 
</div> 
</body>
</html>
