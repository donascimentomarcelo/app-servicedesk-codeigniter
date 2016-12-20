<!DOCTYPE html>
<html ng-app="inventarioConfig">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inventário - Configurações</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.indigo-pink.min.css">
        <script defer src="https://code.getmdl.io/1.2.1/material.min.js"></script>

        <script src="../../../angular/lib/angular.min.js" type="text/javascript"></script>
        <script src="../../../angular/lib/dirPagination.js" type="text/javascript"></script>
        <script src="../../../angular/js/app.js" type="text/javascript"></script>
        <script src="../../../angular/js/controllers/inventario/configcrtl.js" type="text/javascript"></script>
        <script src="../../../angular/js/services/inventario/configAPIService.js" type="text/javascript"></script>
        <script src="../../../angular/js/value/configValue.js" type="text/javascript"></script>

        <script src="../../../bootstrap/js/jquery.js" type="text/javascript"></script>
        <script src="../../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../../craftpip-jquery/js/jquery-confirm.js" type="text/javascript"></script>
        <!-- <link href="../../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>-->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="../../../bootstrap/css/cd.css" rel="stylesheet" type="text/css"/>
        <link href="../../../craftpip-jquery/css/jquery-confirm.css" rel="stylesheet" type="text/css"/>
    </head>
    <body ng-controller="configcrtl">
        <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
            <?php include 'C:\xampp\htdocs\cd\application\views\menu_head\administrador\menu.php'; ?>
            <main class="mdl-layout__content">
                <div class="page-content">
                    <div id="container">
                        <h1><?php foreach ($preenche_dados->result() as $dados): ?> <img src="../../.<?php echo $dados->imagem; ?>" class="img-circle" width="50px" height="50px"> <?php endforeach; ?> <?php echo $this->session->userdata('nome'); ?></h1>
                        <div id="body">
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <form name="inventarioConfig" method="post">
                                            <div class="height-form">  
                                                <div class="form-group">
                                                    <input class="form-control" type="hidden" name="idconfig" ng-model="action.idconfig">
                                                </div>
                                                <div class="form-group">
                                                    <input class="form-control" type="text" placeholder="Nome da configuração" ng-model="action.nome_config" ng-required="true">
                                                </div>
                                                <div class="form-group">
                                                    <label class="label-config-inventario">Categoria:</label><br>
                                                    <div class="radios-bts">  
                                                        <label class="radio-inline">
                                                            <input type="radio" name="categoria" id="hardware"  value="hardware" ng-model="action.categoria_config" ng-required="true"> Hardware
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="categoria" id="software"  value="software" ng-model="action.categoria_config" ng-required="true"> Software
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label  class="label-config-inventario">Status:</label><br>
                                                    <div class="radios-bts-two">  
                                                        <label class="radio-inline">
                                                            <input type="radio" name="status" id="ativo"  value="ativo" ng-model="action.status_config" ng-required="true"> Ativo
                                                        </label>
                                                        <label class="radio-inline">
                                                            <input type="radio" name="status" id="inativo" value="inativo" ng-model="action.status_config" ng-required="true"> Inativo
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div>
                                                <button type="button" ng-click="new ()" class="btn btn-secondary">Novo</button>
                                                <button type="button" ng-click="actionConfig(action)" class="btn btn-secondary" ng-disabled="inventarioConfig.$invalid">Registrar</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="margin-top-table">
                                            <div class="form-group">
                                                <input class="form-control" type="text" ng-model="search" placeholder="Pesquise pelo nome da configuração.">
                                            </div>
                                            <div class="height-table">
                                                <table class="table">
                                                    <thead>
                                                        <tr> 
                                                            <th style="text-align: center;" ng-click="ordenationBy('idconfig')">ID
                                                                <span class="glyphicon sort-icon" ng-show="ordenationCritery === 'idconfig'" ng-class="{'glyphicon-triangle-bottom':ordenation,'glyphicon-triangle-top':!ordenation}"></span>
                                                            </th>
                                                            <th style="text-align: center;" ng-click="ordenationBy('nome_config')">Nome da Configuração
                                                                <span class="glyphicon sort-icon" ng-show="ordenationCritery === 'nome_config'" ng-class="{'glyphicon-triangle-bottom':ordenation,'glyphicon-triangle-top':!ordenation}"></span>
                                                            </th>
                                                            <th style="text-align: center;" ng-click="ordenationBy('categoria_config')">Categoria
                                                                <span class="glyphicon sort-icon" ng-show="ordenationCritery === 'categoria_config'" ng-class="{'glyphicon-triangle-bottom':ordenation,'glyphicon-triangle-top':!ordenation}"></span>
                                                            </th>
                                                            <th style="text-align: center;" ng-click="ordenationBy('status_config')">Status
                                                                <span class="glyphicon sort-icon" ng-show="ordenationCritery === 'status_config'" ng-class="{'glyphicon-triangle-bottom':ordenation,'glyphicon-triangle-top':!ordenation}"></span>
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr ng-click="editConfig(dataConfig); itemClicked(dataConfig.idconfig)" ng-class="{ 'cinza negrito': selectedIndex === dataConfig.idconfig }" dir-paginate="dataConfig in dataConfig | filter:{nome_config:search} | orderBy:ordenationCritery:ordenation | itemsPerPage:5">
                                                            <td>{{dataConfig.idconfig}}</td>
                                                            <td>{{dataConfig.nome_config}}</td>
                                                            <td>{{dataConfig.categoria_config}}</td>
                                                            <td>{{dataConfig.status_config}}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <dir-pagination-controls max-size="5" direction-links="true" boundary-links="true"></dir-pagination-controls>
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
