<?php
include_once('bd/bd.php');
$result_cliente = "SELECT * FROM clientes";
$resultado_clientes = mysqli_query($conexao, $result_cliente);
?>
<?php include_once('topo.php')?>
<div class="fadeIn">
  


        <div class="col-lg-2"></div>
        <div class="col-lg-8">

<?php
while ($exibirRegistros = mysqli_fetch_array($resultado_clientes)) {

    $id = $exibirRegistros[0];
    $telefoneCliente = $exibirRegistros[1];
    $nomeCliente = $exibirRegistros[2];
    $enderecoCliente = $exibirRegistros[3];
    $complementoCliente = $exibirRegistros[4];

    print" <div class='list-group '>";
    print" <a href='#' class='list-group-item active'><span class='glyphicon glyphicon-user'></span> $nomeCliente <br/><span class='glyphicon glyphicon-earphone'></span> $telefoneCliente</a>";
    print" <a href='#' class='list-group-item'><span class='glyphicon glyphicon-home'></span> $enderecoCliente, $complementoCliente";
    print" <div style='text-align: right;'>";
    print" <button type='button' class='btn  btn-success' data-toggle='modal' data-target='#exampleModal' data-whatever='$id' data-whatevernome='$nomeCliente' data-whatevertelefone='$telefoneCliente' data-whateverendereco='$enderecoCliente' data-whatevercomplemento='$complementoCliente'><span class='glyphicon glyphicon-pencil'></span></button>";
    print" <button type='button' class='btn  btn-danger' data-toggle='modal' data-target='#myModal' data-whatever='$id' data-whatevernome='$nomeCliente' ><span class='glyphicon glyphicon-trash'></span></button >";
    print" </div></a></div> ";
}
?>
<div  >



            <!-- MODAL EDITAR-->

            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="exampleModalLabel">Curso</h4>
                        </div>
                        <div class="modal-body">
                            <form method="POST" action="bd/processaCliente.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Nome:</label>
                                    <input name="nomeCliente" type="text" class="form-control" id="recipient-name">
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="control-label">Telefone:</label>
                                    <input type="text" name="telefoneCliente" class="form-control" id="telefoneCliente" required="required" placeholder="Ex. (84) 9 9999-8888 " minlength="15" maxlength="15" class="form-control" onkeypress="$(this).mask('(00) 0 0000-0000');" required="required">
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="control-label">Endereço:</label>
                                    <textarea name="enderecoCliente" class="form-control" id="enderecoCliente"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="message-text" class="control-label">Complemento:</label>
                                    <textarea name="complementoCliente" class="form-control" id="complementoCliente"></textarea>
                                </div>
                                <input name="id" type="hidden" class="form-control" id="id-curso" value="">
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
                    var recipientendereco = button.data('whateverendereco')
                    var recipientcomplemento = button.data('whatevercomplemento')
                    var recipienttelefone = button.data('whatevertelefone')
                    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                    var modal = $(this)
                    modal.find('.modal-title').text('ID ' + recipient)
                    modal.find('#id-curso').val(recipient)
                    modal.find('#recipient-name').val(recipientnome)
                    modal.find('#enderecoCliente').val(recipientendereco)
                    modal.find('#complementoCliente').val(recipientcomplemento)
                    modal.find('#telefoneCliente').val(recipienttelefone)

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
                            <form method="POST" action="bd/deletaCliente.php" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="recipient-name" class="control-label">Deseja excluir</label>
                                    <input name="nomeCliente" type="text" class="form-control" id="recipient-name" disabled>
                                </div>
                                <input name="id" type="hidden" class="form-control" id="id-curso" value="">
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
                    modal.find('#id-curso').val(recipient)
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
                        <h4 class="modal-title" id="exampleModalLabel"><span class="glyphicon glyphicon-user"></span> Cadastrar Cliente</h4>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="bd/cadastraCliente.php">
                            <div class="form-group" >
                                <label for="usr">Nome:</label>
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span><input type="text" name="nomeCliente" class="form-control" id="txtNomeCliente" required="required" placeholder="Nome"><br/>
                                </div>
                                <label for="usr">Telefone:</label>
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-earphone"></i></span><input type="text" name="telefoneCliente" class="form-control" id="txtTelefone" required="required" placeholder="Ex. (84) 9 9999-8888 " minlength="15" maxlength="15" class="form-control" onkeypress="$(this).mask('(00) 0 0000-0000');" required="required">
                                </div>
                                <label for="usr">Endereço:</label>
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span><input type="text" name="enderecoCliente" class="form-control" id="txtEndereco" required="required" placeholder="Endereço"><br/>
                                </div>
                                <label for="usr">Complemento:</label>
                                <div class="input-group">
                                <span class="input-group-addon"><i class="glyphicon glyphicon-list-alt"></i></span><input type="text" name="complementoCliente" class="form-control" id="txtComplemento" placeholder="Complemento"><br/>
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
        var telefoneCliente = document.getElementById("txtTelefone").value;
                     var nomeCliente = document.getElementById("txtNomeCliente").value;
                     var endereco = document.getElementById("txtEndereco").value;
                     if(telefoneCliente != "" && nomeCliente != "" && endereco != ""){
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
        <div class="col-lg-2"></div>  
 </div>




