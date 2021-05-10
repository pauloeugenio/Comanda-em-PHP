<?php
include_once('./bd/bd.php');
$sql = "SELECT * FROM clientes";
$consulta = mysqli_query($conexao, $sql);

$sql1 = "SELECT * FROM produto";
$consulta1 = mysqli_query($conexao, $sql1);

?>
<?php include_once('topo.php')?>




<!---------------------- MODAL ADICIONAR ITENS ----------------------------------------------->

<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8 ">
        <section>


            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Adicionar Itens</h4>
                        </div>
                        <div class="modal-body">
                            <label>Nome Produto</label><br>
                            <select class="form-control" id="txtProduto" name="produto" required="">
                                <option class="active">Produto</option>
                                <?php
                                $teste = 0;
                                while ($exibirRegistros = mysqli_fetch_array($consulta1)) {

                                    $id = $exibirRegistros[0];
                                    $nome = $exibirRegistros[1];
                                    $descricao = $exibirRegistros[2];
                                    $tamanho = $exibirRegistros[3];
                                    $preco = $exibirRegistros[4];

                                    print "<option value='$preco'>$nome</option>";
                                }
                                ?>

                            </select>

                            <label>Quantidade</label>
                            <input class="form-control" type="number" id="txtQuantidade" name="quantidade" required="">
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
                            <button class="btn btn-success" type="submit" onclick="criartabela()">Adicionar</button>
                        </div>
                    </div>
                </div>
            </div>


        </section>
    </div>
    <div class="col-sm-2"></div></div>

<!---------------------- FIM MODAL ADICIONAR ITENS ----------------------------------------------->





<!---------------------- MODAL ADICIONAR TROCO ----------------------------------------------->

<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8 ">
        <section>


            <!-- Modal -->
            <div class="modal fade" id="myModal2" role="dialog">
                <div class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Adicionar Troco</h4>
                        </div>
                        <div class="modal-body">
                            <label>Insira o Valor para Troco</label>
                            <input class="form-control" type="text" id="txtValorTroco" required="">
                        </div>

                        <div class="modal-footer">
                            <button class="btn btn-success" type="submit" onclick="carai()"data-dismiss="modal">Adicionar</button>
                        </div>
                    </div>
                </div>
            </div>


        </section>
    </div>
    <div class="col-sm-2"></div></div>

<!---------------------- FIM MODAL ADICIONAR TROCO ----------------------------------------------->






<div class="row">
    <div class="col-sm-2"></div>
    <div class="col-sm-8">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <label>Cliente</label><br>
                <input type="text" class="form-control" id="txtNome" name="cliente" list="datalista1">
                <datalist id="datalista1">
                    <option class="active" value="">Cliente</option>
                    <?php
                    while ($exibirRegistros = mysqli_fetch_array($consulta)) {

                        $id = $exibirRegistros[0];
                        $telefoneCliente = $exibirRegistros[1];
                        $nomeCliente = $exibirRegistros[2];
                        $enderecoCliente = $exibirRegistros[3];
                        $complementoCliente = $exibirRegistros[4];

                        print "<option value='$nomeCliente'>";
                    }
                    ?>  
                </datalist>


            </div>
            <div class="panel-body"> 
                <table class="table">
                    <thead>
                        <tr>
                            <th class="col-xs-4">Produto</th>
                            <th class="col-xs-2">Quantidade</th>
                            <th class="col-xs-3">Valor Unitario</th>
                            <th class="col-xs-3">Valor Total</th>
                            <th class="col-xs-3"><button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal"><span class="glyphicon glyphicon-plus"></span></button></th>
                        </tr>
                    </thead></table>

                <div id="tabela"></div>


                <form method="post" action="bd/cadastrarPedido.php">                 


                    <div class="form-group row">
                        <div class="col-xs-6">
                            <label>Nome do Cliente</label>    
                            <input class="form-control" value="" type="hidden" id="txtNomeCliente" name="cliente" required="required">
                            <input class="form-control" value="" type="text" id="txtNomeCliente1" name="cliente" disabled required="required">
                        </div>
                        <div class="col-xs-6">
                            <label>Pedido</label>    
                            <input class="form-control" value="" type="hidden" id="txtPedido" name="produtos" required="required">
                            <input class="form-control" value="" type="text" id="txtPedido1" name="produtos" disabled required="required">
                        </div>
                    </div> 
                       <div class="form-group row"> 
                        <div class="col-xs-2">
                            <label>Total</label>    
                            <input class="form-control" value="" type="hidden" id="txtTotal" name="total" required="required">
                            <input class="form-control" value="" type="text" id="txtTotal1" name="total" disabled required="required">
                        </div>
                        <div class="col-xs-3">
                            <label>Status do Pedido</label>    
                            <select class="form-control" name="status" id="txtStatus" required="required">
                                <option value="Aberto">Aberto</option>
                                <option value="Despachado">Despachado</option>
                                <option value="Entregue">Entregue</option>
                                <option value="Finalizado">Finalizado</option>
                            </select>
                        </div>
                        <div class="col-xs-3">
                            <label>Forma de Pagamento</label>    
                            <select class="form-control" name="formaPagamento" id="txtFormaPagamento" required="required">
                                <option value=""></option>
                                <option value="Dinheiro" >Dinheiro</option>
                                <option value="Cartão" >Cartão</option>

                            </select>
                            </div>
                        
   <!----------------------------------------------- TRABALHANDO AQUI ----------------------------------------->
   <div class="col-xs-2" id="txtDinheiro">
   <label>Troco</label>
   <input type="hidden" class="form-control" value="0"  id="txtTroco" name="troco" >   
       
   </div>
   
   <div class="col-xs-2"><label>Adicionar Troco?</label><br/>
   <button type="button" class="btn btn-info" data-toggle="modal" data-target="#myModal2"><span class="glyphicon glyphicon-plus"></span></button> 
    </div>
                            
     <!-------------------------------------------FIM TRABALHANDO AQUI --------------------------------------------->
                        
                        
                    </div>
                    <div   style="text-align: right;">
                       
                        <button onclick="validarCadastro()" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
                    </div>
                </form>



            </div>
        </div>

    </div><div class="col-sm-2"></div></div>











<script>
    
    var valorTotal = 0;
    var i = 0;
    var pedidos = "";
    

    function criartabela() {
        nome = document.getElementById("txtNome").value;
        produto = document.getElementById("txtProduto").value;
        quantidade = document.getElementById("txtQuantidade").value;
       

        var preco = document.getElementById("txtProduto");
        console.log("O indice é: " + preco.selectedIndex);
        console.log("O texto é: " + preco.options[preco.selectedIndex].text);
        console.log("A chave é: " + preco.options[preco.selectedIndex].value);
        total = quantidade * preco.options[preco.selectedIndex].value;



        if ((nome != "") && (produto != "") && (quantidade != "")) {
            tabela = document.getElementById("tabela");

            if (tabela) {
                console.log(tabela.innerHTML);
                tabela.innerHTML += "\
<div class='form-group row'><div class='col-xs-4'>\n\
<input class='form-control'  id='txtProdutos' type='text' name='nomeProduto" + i + "' \n\
value='" + preco.options[preco.selectedIndex].text + "' disabled=''></div>\n\
<div class='col-xs-2'><input class='form-control' id='quantidade' type='text' value='" + quantidade + "' disabled=''></div>\n\
<div class='col-xs-2'><input class='form-control' id='valorUnidade' type='text' value='" + preco.options[preco.selectedIndex].value + "' disabled=''></div>\n\
<div class='col-xs-2'><input class='form-control' id='total' type='text' value='" + total + "' disabled=''></div>\n\
<div class='col-xs-1'><button type='button' class='btn  btn-danger' data-toggle='modal' data-target='#'><span class='glyphicon glyphicon-trash'></span></button ></div></div>";
                valorTotal += total;
                pedidos += ", " + quantidade + "x " + preco.options[preco.selectedIndex].text;
                document.getElementById("txtTotal").value = valorTotal;
                document.getElementById("txtPedido").value = pedidos;
                document.getElementById("txtNomeCliente").value = nome;
                document.getElementById("txtTotal1").value = "R$: " + valorTotal + ",00";
                document.getElementById("txtPedido1").value = pedidos;
                document.getElementById("txtNomeCliente1").value = nome;
                i += 1;
                
    
                
                
                
                
                

            } else {
                console.log("não achou");
            }
        } else {
            alert("Preenca todos os campos");
        }
    }
    
   
</script>
    <script>
        
                /*---------------------EM TESTE -------------------------------------*/
                
                
                
     function carai(){ 
        var trocado = document.getElementById("txtFormaPagamento").value;
        var troco = document.getElementById("txtValorTroco").value;
        var valorTotalTroco = document.getElementById("txtTotal").value;
        var trocoReal = troco - valorTotalTroco;
        if(trocado === "Dinheiro"){
        console.log(txtDinheiro.innerHTML);
        document.getElementById("txtTroco").value = trocoReal;
        txtDinheiro.innerHTML += "\n\
<input type='text' class='form-control' value='R$: "+trocoReal+",00'  id='txtTroco' name='troco' disabled>";
    }else{alert("Não Mesmo");}}
                
                
                /*---------------------EM TESTE -------------------------------------*/    
            
    </script>