<?php
include_once('bd/bd.php');
$result_produto = "SELECT * FROM produto";
$resultado_produtos = mysqli_query($conexao, $result_produto);
?>
<?php include_once('topo.php')?>
<div class="fadeIn">



        <div class="col-lg-3"></div>
        <div class="col-lg-6">

<?php
while ($exibirRegistros = mysqli_fetch_array($resultado_produtos)) {

    $id = $exibirRegistros[0];
    $nome = $exibirRegistros[1];
    $descricao = $exibirRegistros[2];
    $tamanho = $exibirRegistros[3];
    $preco = $exibirRegistros[4];

    print" <div class='list-group '>";
    print" <div class='row list-group-item active'><div class='col-lg-6'><span class='glyphicon glyphicon-user'></span> $nome, $tamanho </div><div class='col-lg-6' style='text-align: right;' ><span class='glyphicon glyphicon-usd'></span> $preco</div></div>";
    print" <div class='row list-group-item'><div class='col-lg-6'><span class='glyphicon glyphicon-home'></span> $descricao </div>";
    print" <div style='text-align: right;'>";
    print" <button type='button' class='btn  btn-success' data-toggle='modal' data-target='#exampleModal' data-whatever='$id' data-whatevernome='$nome' data-whateverdescricao='$descricao' data-whatevertamanho='$tamanho' data-whateverpreco='$preco'><span class='glyphicon glyphicon-pencil'></span> </button>";
    print" <button type='button' class='btn  btn-danger' data-toggle='modal' data-target='#myModal' data-whatever='$id' data-whatevernome='$nome' ><span class='glyphicon glyphicon-trash'></span> </button >";
    print" </div></div><br/> ";
}
?>
<div  >



            <!-- MODAL EDITAR-->

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="exampleModalLabel">Produto</h4>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="bd/processaProduto.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="nome" class="control-label">Nome:</label>
                                    <input name="nome" type="text" class="form-control" id="nome">
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="control-label">Descrição:</label>
                                    <input type="text" name="descricao" class="form-control" id="descricao" required="required" placeholder="Ex. (84) 9 9999-8888 " minlength="15" maxlength="15" class="form-control" onkeypress="$(this).mask('(00) 0 0000-0000');" required="required">
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="control-label">Tamanho:</label>
                                    <textarea name="tamanho" class="form-control" id="tamanho"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="control-label">Preço:</label>
                                    <textarea name="preco" class="form-control" id="preco"></textarea>
                                </div>
                                <input name="id" type="hidden" class="form-control" id="id" value="">
                                <div  style="text-align: right;">
                                <button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-danger">Alterar</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>



            <script type="text/javascript">
                $('#exampleModal').on('show.bs.modal', function (event) {
                    var button = $(event.relatedTarget) // Button that triggered the modal
                    var recipient = button.data('whatever') // Extract info from data-* attributes
                    var recipientnome = button.data('whatevernome')
                    var recipientdescricao = button.data('whateverdescricao')
                    var recipienttamanho = button.data('whatevertamanho')
                    var recipientpreco = button.data('whateverpreco')
                    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                    var modal = $(this)
                    modal.find('.modal-title').text('ID ' + recipient)
                    modal.find('#id').val(recipient)
                    modal.find('#nome').val(recipientnome)
                    modal.find('#descricao').val(recipientdescricao)
                    modal.find('#tamanho').val(recipienttamanho)
                    modal.find('#preco').val(recipientpreco)

                })
            </script>

            <!-- FIM MODAL EDITAR-->  






              <!--  MODAL EDITAR EXCLUIR -->  
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <div class="modal-title"></div>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="bd/deletaProduto.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Deseja excluir</label>
                                    <input name="nome" type="text" class="form-control" id="recipient-name" disabled>
                                </div>
                                <input name="id" type="hidden" class="form-control" id="id" value="">
                                <div  style="text-align: right;">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-danger ">Excluir</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>


            <script type="text/javascript">
                $('#myModal').on('show.bs.modal', function (event) {
                    var button = $(event.relatedTarget) // Button that triggered the modal
                    var recipient = button.data('whatever') // Extract info from data-* attributes
                    var recipientnome = button.data('whatevernome')

                    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                    var modal = $(this)
                    modal.find('.modal-title').text('ID ' + recipient)
                    modal.find('#id').val(recipient)
                    modal.find('#recipient-name').val(recipientnome)


                })
            </script>
        <!-- FIM MODAL EXCLUIR-->  
        
        
        
        
        
        
        <!-- MODAL CADASTRO-->

        <div class="modal fade" id="modalAdicionar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="exampleModalLabel"><span class="glyphicon glyphicon-user"></span> Cadastrar Produto</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="bd/cadastrarProduto.php">
                            <div class="form-group" >
                                <label for="usr">Nome:</label>
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input type="text" name="nome" class="form-control" id="txtNome" required="required" placeholder="Nome do Lanche">
                                </div>
                                <label for="usr">Descrição:</label>
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span><input type="text" name="descricao" class="form-control" id="txtIngredientes" required="required" placeholder="Ingredientes">
                                </div>
                                <label for="usr">Tamanho:</label>
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-scale"></i></span><select class="form-control" name="tamanho">
                                <option value="-"></option>
                                <option value="p">P</option>
                                <option value="m">M</option>
                                <option value="g">G</option>
                                </select><br/></div>
                                <label for="usr">Preço:</label>
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-usd"></i></span><input type="text" name="preco" class="form-control" id="txtPreco" required="required" placeholder="Preço">
                            </div></div>
                            
                            <div  style="text-align: right;">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                            <button type="submit" value="Salvar" onclick="cadastrar()" class="btn btn-success"><span class="glyphicon glyphicon-floppy-disk"></span> Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>



        <script>
               function cadastrar(){

                var nomeLanche = document.getElementById("txtNome").value;
                var ingredientes = document.getElementById("txtIngredientes").value;
                var tamanho = document.getElementById("txtTamanho").value;
                var preco = document.getElementById("txtPreco").value;
                
                if(nomeLanche != "" && ingredientes != "" && tamanho != "" && preco != ""){
                
                    alert("Produto cadastrado com sucesso");
                    window.location.href = "index.php";
                }             
                else{
                    alert("Preencha todos os campos!");
                    return false;
                
                }
                
            };  
        </script>

            <!-- FIM MODAL CADASTRO--> 


            
            
            
            
            
            
            
            
            
            <button id="myBtn" data-toggle='modal' data-target='#modalAdicionar' data-whatever='$id' data-whatevernome='$nomeCliente' data-whatevertelefone='$telefoneCliente' data-whateverendereco='$enderecoCliente' data-whatevercomplemento='$complementoCliente'><span class="glyphicon glyphicon-plus"></span></button>
            
            
            
            
            
            
            
        </div>  
        <div class="col-lg-3"></div>  
 </div>




