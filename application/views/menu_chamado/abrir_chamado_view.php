<!DOCTYPE html>
<html ng-app="serviceCall">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Meus Chamados</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.indigo-pink.min.css">
        <script defer src="https://code.getmdl.io/1.2.1/material.min.js"></script>

        <script src="../../../bootstrap/js/jquery.js" type="text/javascript"></script>
        <script src="../../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../../bootstrap/js/jquery.forms.js" type="text/javascript"></script>

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="../../../bootstrap/css/cd.css" rel="stylesheet" type="text/css"/>

        <script src="../../../angular/lib/angular.min.js" type="text/javascript"></script>
        <script src="../../../angular/lib/dirPagination.js" type="text/javascript"></script>
        <script src="../../../angular/js/app.js" type="text/javascript"></script>
        <script src="../../../angular/js/controllers/serviceCall/serviceCallCtrl.js" type="text/javascript"></script>
        <script src="../../../angular/js/services/serviceCall/serviceCallAPIService.js" type="text/javascript"></script>

        <script type="text/javascript">


            //http://t4t5.github.io/sweetalert/
            /*
             * Função que carrega após o DOM estiver carregado.
             * Como estou usando o ajaxForm no formulário, é aqui que eu o configuro.
             * Basicamente somente digo qual função será chamada quando os dados forem postados com sucesso.
             * Se o retorno for igual a 1, então somente recarrego a janela.
             */
            $(function () {
                $('#formulario_chamado').ajaxForm({
                    success: function (data) {
                        if (data == 1 || data == 11) {

                            //Algo esta acontecendo no controller que está trazendo 11 no lugar de 1.
                            //Faço esse if com || pq preciso que atualize a pagina.
                            //se for sucesso, simplesmente recarrego a página. Aqui você pode usar sua imaginação.

                            //document.location.href = document.location.href;
                            success: minhaCallCack();
                            limparCampo();

                        } else {
                            alert(data);
                        }
                    }
                });
            });

            //Aqui eu seto uma variável javascript com o base_url do CodeIgniter, para usar nas funções do post.
            var base_url = "<?= base_url() ?>";

            /*
             *	Esta função serve para preencher os campos do cliente na janela flutuante
             * usando jSon.  
             */
            function carregaDadosCdJSon(idchamado) {
                $.post(base_url + '/index.php/chamado/chamado_controller/dados_chamado', {
                    idchamado: idchamado
                }, function (data) {
                    $('#nomechamado').val(data.nomechamado);
                    $('#idchamado').val(data.idchamado);//aqui eu seto a o input hidden com o id do cliente, para que a edição funcione. Em cada tela aberta, eu seto o id do cliente. 
                    $('#nome').val(data.nome);
                    $('#codusuario').val(data.codusuario);
                    $('#email').val(data.email);
                    $('#ramal').val(data.ramal);
                    $('#descricao').val(data.descricao);
                    $('#nometec').val(data.nometec);
                    $('#emailtec').val(data.emailtec);
                    $('#ramaltec').val(data.ramaltec);
                    $('#' + data.statuschamado).prop('checked', true);
                    $('#setor_fk').val(data.setor_fk);
                    $('#subcategoria').val(data.subcategoria_fk);
                    $('#categoria_fk').val(data.categoria_fk);
                }, 'json');
            }

            function janelaNovoCd(idchamado) {

                //antes de abrir a janela, preciso carregar os dados do chamado e preencher os campos dentro do modal
                carregaDadosCdJSon(idchamado);

                carregaTabelaJSon(idchamado);
                //alert(idchamado);

                $('#modalEditarCliente').modal('show');
            }

            function carregaTabelaJSon(idchamado) {
                $.post(base_url + '/index.php/chamado/chamado_controller/historico', {
                    idchamado: idchamado
                }, function (data) {
                    var items = [];
                    $.each(data, function (key, val) {
                        items.push("<li id='" + key + "'>" + val + "</li>");
                        //alert(val);
                    });

                    $("<ul/>", {
                        "class": "my-new-list",
                        html: items.join("")
                    }).appendTo("body");
                }, 'json');
            }

            function limparCampo() {
                $("#idchamado").val('');
                $("#nomechamado").val('');
            }

            function carregaDadosNovoJSon(id) {
                $.post(base_url + '/index.php/usuario/usuario_controller/dados_usuario', {
                    id: id
                }, function (data) {
                    $('#nome1').val(data.nome);
                    $('#email1').val(data.email);
                    $('#ramal1').val(data.ramal);
                    $('#setor_fk1').val(data.setor_fk);
                }, 'json');
            }

            function amarrar(id) {
                $.post(base_url + '/index.php/usuario/usuario_controller/dados_usuario', {
                    id: id
                }, function (data) {
                    $('#idtec').val(data.id);
                    $('#nometec').val(data.nome);
                    $('#emailtec').val(data.email);
                    $('#ramaltec').val(data.ramal);
                }, 'json');
            }

            function novo(id) {
                // na função limparCampo() eu apago os valores que estão no modal
                // devido ter aberto o modal anteriormente, fica salvo os valores.
                carregaDadosNovoJSon(id);

                $('#novo').modal('show');
            }


            function refresh() {
                //document.location.href = document.location.href;
                location.reload();
            }



            function buscar_subcategoria(idcategoria) {
                $.post(base_url + "/index.php/subcategoria/subcategoria_controller/ajax_dados_subcategoria", {
                    idcategoria: idcategoria
                }, function (data) {
                    $('#subcategoria').html(data);
                });
            }

            function buscar_sla(idsubcategoria) {
                $.post(base_url + "/index.php/subcategoria/subcategoria_controller/ajax_dados_sla", {
                    idsubcategoria: idsubcategoria
                }, function (data) {
                    $('#sla').html(data);
                });
            }
            function buscar_subcategoria_n(idcategoria) {
                $.post(base_url + "/index.php/subcategoria/subcategoria_controller/ajax_dados_subcategoria", {
                    idcategoria: idcategoria
                }, function (data) {
                    $('#subcategoria1').html(data);
                });
            }

            function buscar_sla_n(idsubcategoria) {
                $.post(base_url + "/index.php/subcategoria/subcategoria_controller/ajax_dados_sla", {
                    idsubcategoria: idsubcategoria
                }, function (data) {
                    $('#sla1').html(data);
                });
            }

        </script>

    </head>
    <body ng-controller="serviceCallCtrl">

        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
            <?php include 'C:\xampp\htdocs\cd\application\views\menu_head\administrador\menu.php'; ?>
            <main class="mdl-layout__content">
                <div class="page-content">
                   <div id="container">
                   <h1><?php foreach ($preenche_dados->result() as $dados): ?> <img src="../../.<?php echo $dados->imagem; ?>" class="img-circle" width="50px" height="50px"> <?php endforeach; ?> <?php echo $this->session->userdata('nome'); ?></h1>
                   <div id="body">
                   <div class="row">
                   <div class="col-md-12">

                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#first1-tab" data-toggle="tab">Dados do chamado</a></li>
                        <li><a href="#second2-tab" data-toggle="tab">Dados do Usuário</a></li>
                    </ul>
                    <div class="modal-body">
                        <form role="form" method="post" action="<?= base_url('index.php/chamado/chamado_controller/salvar_chamado') ?>" id="formulario_chamado">
                            <div class="tab-content">
                                <div class="tab-pane active in" id="first1-tab">
                                    <div class="form-group">
                                        <label for="nome">Título do Chamado</label>
                                        <input type="text" class="form-control" id="nomechamado"  name='nomechamado'>
                                    </div>
                                    <div class="form-group">
                                        <label for="categoria">Categoria</label>
                                        <select class="form-control" name="categoria_fk" id="categoria_fk" required="required" onchange='buscar_subcategoria_n($(this).val())'>
                                            <option value="">Selecione uma categoria</option>
                                            <!--AQUI!-->
                                            <?php //foreach ($categoria->result() as $linha): ?> 
                                            <option value="<?php //echo $linha->idcategoria   ?>"><?php // echo $linha->nomecategoria   ?></option>
                                            <?php // endforeach; ?>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleSelect1">Subcategoria</label>

                                        <select class="form-control" name="subcategoria_fk" id="subcategoria1" required="required" onchange='buscar_sla_n($(this).val())'>

                                        </select>
                                    </div>
                                    <div id="sla1" class="form-group">

                                    </div>     

                                    <div class="form-group">
                                        <label for="exampleTextarea">Descrição</label>
                                        <textarea class="form-control" id="descricao" name="descricao" rows="3" maxlength="499"></textarea>
                                    </div>

                                    <input type="hidden" name="idchamado" id="idchamado" value="" />

                                </div>
                                <div class="tab-pane" id="second2-tab">

                                    <div class="form-group">
                                        <label for="nome">Nome do Solicitante</label>
                                        <input type="text" class="form-control" id="nome1"  name='nome'readonly="true">
                                    </div>
                                    <div class="form-group">
                                        <label for="nome">Ramal</label>
                                        <input type="text" class="form-control" id="ramal1"  name='ramal' readonly="true">
                                    </div>

                                    <div class="form-group">
                                        <label for="setor">Setor</label>
                                        <select class="form-control" name="setor_fk" id="setor_fk1" required="required">

                                            <option value="">Selecione um Setor</option>

                                            <?php //foreach ($setor_ativo->result() as $linha): ?> 

                                            <option value="<?php //echo $linha->idsetor   ?>"><?php //echo $linha->nomesetor   ?></option>

                                            <?php //endforeach; ?>

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="nome">E-mail</label>
                                        <input type="text" class="form-control" id="email1"  name='email' readonly="true">
                                    </div>
                        </form>	    
                    </div>

                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="refresh()" >Fechar</button>

                    <button type="button" id="salvar" class="btn btn-primary"   onclick="$('#formulario_chamado').submit()">Salvar</button>
                </div>
         </div>
       </div>
      </div>
     </div>
    </div> 
   </div>
  </main>
 </div>        
</body>
</html>
