<?php

include_once('bd/bd.php');
//Exibir a quantidade de pedidos
$sql = "SELECT COUNT(id) FROM pedidos WHERE 1";
$consulta = mysqli_query($conexao, $sql);
while ($exibirRegistros = mysqli_fetch_array($consulta)) {
$totalPedidos = $exibirRegistros[0];
}


//Exibir a quantidade de Clientes
$sql2 = "SELECT COUNT(id) FROM clientes WHERE 1";
$consulta2 = mysqli_query($conexao, $sql2);
while ($exibirRegistros = mysqli_fetch_array($consulta2)) {
$totalClientes = $exibirRegistros[0];
}


//Exibir a quantidade de Produtos
$sql3 = "SELECT COUNT(id) FROM produto WHERE 1";
$consulta3 = mysqli_query($conexao, $sql3);
while ($exibirRegistros = mysqli_fetch_array($consulta3)) {
$totalProdutos = $exibirRegistros[0];
}

  include_once('topo.php')                 
?>



<div class="container fadeIn ">
    
    
    
    <div class="col-lg-4">
        <div class="list-group">
            <a href=javascript:void(0);" onclick="carregar('pedidos.php')" class="list-group-item bg-primary branco"><center><span class="glyphicon glyphicon-edit" style="font-size:48px;"></span><br/>NOVO PEDIDO</center></a>
            <article class="list-group-item"><p id="bio">descricao</p></article>
            <article class="list-group-item"><p id="bio">descricao</p></article>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="list-group">
            <a href=javascript:void(0);" onclick="carregar('clientes.php')" class="list-group-item bg-success branco"><span class="badge"><?php print"$totalClientes"; ?></span><center><span class="glyphicon glyphicon-user" style="font-size:48px;"></span><br/>CLIENTES</center></a>
            <article class="list-group-item"><p id="bio">descricao</p></article>
            <article class="list-group-item"><p id="bio">descricao</p></article>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="list-group">
            <a href="#" class="list-group-item bg-light"><span class="badge"><?php print"$totalProdutos"; ?></span><center><span class="glyphicon glyphicon-tags" style="font-size:48px;"></span><br/>PRODUTOS</center></a>
            <article class="list-group-item"><p id="bio">descricao</p></article>
            <article class="list-group-item"><p id="bio">descricao</p></article>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="list-group">
            <a href=javascript:void(0);" onclick="carregar('pedidos.php')" class="list-group-item bg-warning "><center><span class="glyphicon glyphicon-shopping-cart preto" style="font-size:48px;"></span><br/>PEDIDOS</center></a>
            <article class="list-group-item"><p id="bio">descricao</p></article>
            <article class="list-group-item"><p id="bio">descricao</p></article>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="list-group">              <a href="#" class="list-group-item bg-danger branco"><span class="badge"><?php print"$totalPedidos"; ?></span><center><span class="glyphicon glyphicon-cutlery" style="font-size:48px;"></span><br/>COZINHA</center></a>
            <article class="list-group-item"><p id="bio">descricao</p></article>
            <article class="list-group-item"><p id="bio">descricao</p></article>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="list-group">
            <a href="#" class="list-group-item active"><center><span class="glyphicon glyphicon-send" style="font-size:48px;"></span><br/>ENTREGAS</center></a>
            <article class="list-group-item"><p id="bio">descricao</p></article>
            <article class="list-group-item"><p id="bio">descricao</p></article>
        </div>
    </div>
    </div> 
    
   
    


</body>
</html>
