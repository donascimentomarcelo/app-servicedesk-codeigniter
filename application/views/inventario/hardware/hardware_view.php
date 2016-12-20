<!DOCTYPE html>
<html ng-app="hardware">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inventário - Hardware</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.indigo-pink.min.css">
        <script defer src="https://code.getmdl.io/1.2.1/material.min.js"></script>

        <script src="../../../angular/lib/angular.min.js" type="text/javascript"></script>
        <script src="../../../angular/lib/dirPagination.js" type="text/javascript"></script>
        <script src="../../../angular/lib/angular-toastr.tpls.js" type="text/javascript"></script>
        <link href="../../../angular/css/angular-toastr.css" rel="stylesheet" type="text/css"/>
        <script src="../../../angular/js/app.js" type="text/javascript"></script>
        <script src="../../../angular/js/controllers/inventario/hardwarecrtl.js" type="text/javascript"></script>
        <script src="../../../angular/js/services/inventario/hardwareAPIService.js" type="text/javascript"></script>
        <script src="../../../angular/js/value/configValue.js" type="text/javascript"></script>
        <!--<script src="../../../angular/js/config/interceptorconfig.js" type="text/javascript"></script>-->
        <!--<script src="../../../angular/js/interceptors/loadingInterceptors.js" type="text/javascript"></script>-->
        <script src="../../../angular/js/interceptors/inventario/hardware/hardwareInterceptor.js" type="text/javascript"></script>
        <script src="../../../angular/js/interceptors/inventario/hardware/hardwareValidate.js" type="text/javascript"></script>

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="../../../bootstrap/css/cd.css" rel="stylesheet" type="text/css"/>

        <script src="../../../bootstrap/js/jquery.js" type="text/javascript"></script>
        <script src="../../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    </head>

    <body ng-controller="hardwarecrtl">
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
            <?php include 'C:\xampp\htdocs\cd\application\views\menu_head\administrador\menu.php'; ?>
            <main class="mdl-layout__content">
                <div class="page-content">
                    <div id="container">
                        <!-- <div ng-repeat="datauser in datauser">
                             <h1> <img src="{{datauser.imagemmenu}}" class="img-circle" width="50px" height="50px"> {{datauser.nomemenu}}</h1>
                         </div>-->
                        <h1><?php foreach ($preenche_dados->result() as $dados): ?> <img src="../../.<?php echo $dados->imagem; ?>" class="img-circle" width="50px" height="50px"> <?php endforeach; ?> <?php echo $this->session->userdata('nome'); ?></h1>

                        <div id="body">
                            <div class="margin-top-table">
                                <div class="margin-top-table">
                                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
                                        <label class="mdl-button mdl-js-button mdl-button--icon" for="sample6">
                                            <i class="material-icons">search</i>
                                        </label>
                                        <div class="mdl-textfield__expandable-holder">
                                            <input class="mdl-textfield__input" type="text" id="sample6" ng-model="search">
                                            <label class="mdl-textfield__label" for="sample-expandable">Pesquise pelo nome do Hardware</label>
                                        </div>
                                    </div>
                                </div>
                                <!--<div ng-show="loading">
                                    <h5><div class="loader"></div></h5>
                                </div>
                                <div ng-hide="loading">-->

                                <table ng-show="dados.length > 0" class="mdl-data-table mdl-js-data-table  mdl-shadow--2dp"cellspacing="0" width="100%">
                                    <tr>
                                        <th style="text-align: center;" ng-click="ordenarPor('idinventario')"> ID
                                            <span class="glyphicon sort-icon" ng-show="criterioDeOrdenacao === 'idinventario'" ng-class="{'glyphicon-triangle-bottom':ordenacao,'glyphicon-triangle-top':!ordenacao}"></span>
                                        </th>
                                        <th style="text-align: center;" ng-click="ordenarPor('nome')">Nome
                                            <span class="glyphicon sort-icon" ng-show="criterioDeOrdenacao === 'nome'" ng-class="{'glyphicon-triangle-bottom':ordenacao,'glyphicon-triangle-top':!ordenacao}"></span>
                                        </th>
                                        <th class="none-table-768 none-table-480" style="text-align: center;" ng-click="ordenarPor('modelo')">Modelo
                                            <span class="glyphicon sort-icon" ng-show="criterioDeOrdenacao === 'modelo'" ng-class="{'glyphicon-triangle-bottom':ordenacao,'glyphicon-triangle-top':!ordenacao}"></span>
                                        </th>
                                        <th class="none-table-768 none-table-480" style="text-align: center;" ng-click="ordenarPor('dataconfig')">Marca
                                            <span class="glyphicon sort-icon" ng-show="criterioDeOrdenacao === 'dataconfig'" ng-class="{'glyphicon-triangle-bottom':ordenacao,'glyphicon-triangle-top':!ordenacao}"></span>
                                        </th>
                                        <th></th>
                                    </tr>
                                    </tbody>
                                    <tr ng-click="edit(dados); itemClicked(dados.idinventario)"  ng-class="{ 'cinza negrito': selectedIndex === dados.idinventario }" dir-paginate="dados in dados | filter:{nome:search} | orderBy:criterioDeOrdenacao:ordenacao| itemsPerPage:5">
                                        <td style="text-align: center;">{{dados.idinventario}}</td>
                                        <td style="text-align: center;">{{dados.nome}}</td>
                                        <td class="none-table-768 none-table-480" style="text-align: center;">{{dados.modelo}}</td>
                                        <td class="none-table-768 none-table-480" style="text-align: center;">{{dados.nome_config}}</td>
                                        <td style="text-align: center;">
                                            <a href="javascript:;"  ng-click="apagarRegistro(dados.idinventario)"><i class="material-icons">delete_forever</i></a>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                                <div class="location-pagination">
                                    <dir-pagination-controls max-size="5" direction-links="true" boundary-links="true"></dir-pagination-controls>
                                </div>
                            </div>
                            <div class="formResponsive ">
                                <form role="form" name="inventarioForm" method="post" id="formulario_usuario" enctype="multipart/form-data">
                                    <div class="content-grid mdl-grid">
                                        <div class="mdl-cell mdl-cell--6-col">
                                            <div class="form-group">
                                                <input type="hidden" class="form-control" ng-model="registro.idinventario" name="idinventario">
                                            </div>
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-width">
                                                <input class="mdl-textfield__input" type="text" id="nameHardware"  ng-model="registro.nome" ng-required="true">
                                                <label class="mdl-textfield__label" for="nameHardware">Nome do Hardware</label>
                                            </div>
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-width">
                                                <input class="mdl-textfield__input" type="text" id="modelHardware"  ng-model="registro.modelo" ng-required="true">
                                                <label class="mdl-textfield__label" for="modelHardware">Modelo do Hardware</label>
                                            </div>
                                            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-width">
                                                <select type="text" class="form-control" ng-model="registro.inventario_config_fk" name="inventario_config_fk" ng-required="true">
                                                    <option value="">Selecione uma marca.</option>
                                                    <option ng-repeat="dataconfig in dataconfig" value="{{dataconfig.idconfig}}" >{{dataconfig.nome_config}}</option>
                                                </select>
                                            </div>
                                            <div>
                                                <div  data-spy="affix">
                                                    <button type="button" ng-click="registraInventario(registro)" ng-if="!inventarioForm.$invalid" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect"><i class="material-icons">archive</i></button><br><br>
                                                    <button type="button" ng-click="new ()" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect"> <i class="material-icons">add</i></button>
                                                </div> 
                                            </div>  
                                        </div>
                                    </div>
                                </form>	   
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <!--</div>-->
    </body>
</html>
