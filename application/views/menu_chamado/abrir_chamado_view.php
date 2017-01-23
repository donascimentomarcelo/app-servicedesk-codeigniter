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



        $(function () {
            $('#formulario_chamado').ajaxForm({
                success: function (data) {
                    if (data == 1 || data == 11) {
                     success: minhaCallCack();
                     limparCampo();

                 } else {
                    alert(data);
                }
            }
        });
        });

        var base_url = "<?= base_url() ?>";
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
            carregaDadosCdJSon(idchamado);

            carregaTabelaJSon(idchamado);

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
                             <div class="col-md-6">
                              <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-width-little-form">
                                <input class="mdl-textfield__input" name='nomechamado' type="text" id="nomechamado"  ng-model="callService.nomechamado" ng-required="true">
                                <label class="mdl-textfield__label" for="nomechamado">Título do Chamado</label>
                            </div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-width-little-form">
                                    <textarea class="mdl-textfield__input" type="text" rows= "3" id="descricao" ng-model='callService.descricao' ng-required="true"></textarea>
                                    <label class="mdl-textfield__label" for="descricao">Descrição...</label>
                                </div>

                            <div class="form-group">
                                <label for="categoria">Categoria</label>
                                <select class="form-control" name="categoria_fk" id="categoria_fk" ng-model='callService.categoria_fk' ng-required="true">
                                    <option value="">Selecione uma categoria</option>
                                    <!--AQUI!-->
                                    <?php //foreach ($categoria->result() as $linha): ?> 
                                    <option value="<?php //echo $linha->idcategoria   ?>"><?php // echo $linha->nomecategoria   ?></option>
                                    <?php // endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleSelect1">Subcategoria</label>

                                <select class="form-control" name="subcategoria_fk" id="subcategoria1" ng-model='callService.subcategoria_fk' ng-required="true">

                                </select>
                            </div>
                            <div id="sla1" class="form-group">
                            </div>
                            </div>

                            <div class="col-md-6">
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-width-little-form">
                                    <input class="mdl-textfield__input" name='nome' type="text" id="name"  ng-model="callService.nome" ng-required="true">
                                    <label class="mdl-textfield__label" for="name">Nome do Solicitante</label>
                                </div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-width-little-form">
                                    <input class="mdl-textfield__input" name='ramal' type="text" id="ramal"  ng-model="callService.ramal" ng-required="true">
                                    <label class="mdl-textfield__label" for="ramal">Ramal</label>
                                </div>
                                <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-width-little-form">
                                    <input class="mdl-textfield__input" name='email' type="text" id="email"  ng-model="callService.email" ng-required="true">
                                    <label class="mdl-textfield__label" for="email">E-mail</label>
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
                            </div>
                        </div>
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
