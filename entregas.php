<META HTTP-EQUIV="REFRESH" CONTENT="15;URL=entregas.php">
<?php

include_once('bd/bd.php');
$sql = " SELECT ped.id, ped.cliente, ped.formaPagamento, ped.total, cli.nomeCliente, cli.enderecoCliente, cli.complementoCliente, cli.telefoneCliente, ped.produtos, ped.troco FROM
pedidos ped, clientes cli WHERE ped.cliente = cli.nomeCliente AND ped.status = 'Pronto' ORDER BY ped.id ASC";
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
$formaPagamento = $exibirRegistros[2];
$total = $exibirRegistros[3];
$nomeCliente = $exibirRegistros[4];
$enderecoCliente = $exibirRegistros[5];
$complementoCliente = $exibirRegistros[6];
$telefoneCliente = $exibirRegistros[7];
$produtos = $exibirRegistros[8];
$troco = $exibirRegistros[9];
    

    if ($contador>5){
        print"</div><div class='row'><div class='col-lg-1'></div>";
        $contador=1;
    }
    print" <div class='col-lg-2'><div class='list-group'>";
    print" <div class='list-group-item active'>";
    print" <h4><b>Pedido: $id </b></h4>$cliente<br/>$telefoneCliente <br/>Total R$: $total,00 - $formaPagamento <br/>Troco: R$: $troco,00";
    print" <br/><button type='button' class='btn  btn-warning'><span class='glyphicon glyphicon-print'></span></button></div>";
    print" <article class='list-group-item'><p id='bio'>$produtos</p></article>";   
    print" <article class='list-group-item'><p id='bio'>$enderecoCliente, $complementoCliente</p></article>";
    
   
    print" </div></div> ";
    
}
print" </div>";
    
    mysqli_close($conexao);
    ?>
            
       