<!DOCTYPE html>
<html ng-app="sector">
<head>
	<meta charset="utf-8">
	<title>Manter Setor</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.indigo-pink.min.css">
    <script defer src="https://code.getmdl.io/1.2.1/material.min.js"></script>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="../../../bootstrap/css/cd.css" rel="stylesheet" type="text/css"/>

    <link href="../../../bootstrap/css/cd.css" rel="stylesheet" type="text/css"/>

    <script src="../../../bootstrap/js/jquery.js" type="text/javascript"></script>
    <script src="../../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

    <script src="../../../angular/lib/angular.min.js" type="text/javascript"></script>
    <script src="../../../angular/lib/dirPagination.js" type="text/javascript"></script>
    <script src="../../../angular/js/app.js" type="text/javascript"></script>
    <script src="../../../angular/js/value/configValue.js" type="text/javascript"></script>
    <script src="../../../angular/js/controllers/sector/sectorctrl.js" type="text/javascript"></script>
    <script src="../../../angular/js/services/sector/sectorAPIService.js" type="text/javascript"></script>

</head>

<body ng-controller="sectorctrl">
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <?php include 'C:\xampp\htdocs\cd\application\views\menu_head\administrador\menu.php'; ?>
        <main class="mdl-layout__content">
            <div class="page-content">

                <div id="container">
                   <h1><?php foreach($preenche_dados -> result() as $dados):?> <img src="../../.<?php echo $dados->imagem;?>" class="img-circle" width="50px" height="50px"> <?php endforeach;?> <?php echo $this->session->userdata('nome');?></h1>
                   <div id="body">

                    <div class="margin-top-table">
                        <!-- <input type="text"  class="form-control" ng-model="search" placeholder="Pesquise pelo nome do setor."> -->
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
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th class="none-table-480" style="text-align: center;" ng-click="ordenationBy('idsetor')">Código do Setor
                                            <span class="glyphicon sort-icon" ng-show="ordenationCritery === 'idsetor'" ng-class="{'glyphicon-triangle-bottom':ordenation,'glyphicon-triangle-top':!ordenation}"></span>
                                        </th>
                                        <th style="text-align: center;" ng-click="ordenationBy('nomesetor')">Nome do Setor
                                            <span class="glyphicon sort-icon" ng-show="ordenationCritery === 'nomesetor'" ng-class="{'glyphicon-triangle-bottom':ordenation,'glyphicon-triangle-top':!ordenation}"></span>
                                        </th>
                                        <th class="none-table-768 none-table-480" style="text-align: center;" ng-click="ordenationBy('statussetor')">Status
                                            <span class="glyphicon sort-icon" ng-show="ordenationCritery === 'statussetor'" ng-class="{'glyphicon-triangle-bottom':ordenation,'glyphicon-triangle-top':!ordenation}"></span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-click="edit(dataSector); itemClicked(dataSector.idsetor)" ng-class="{ 'cinza negrito': selectedIndex === dataSector.idsetor }" dir-paginate="dataSector in dataSector | orderBy:ordenationCritery:ordenation | filter:{nomesetor:search}| itemsPerPage : 5">
                                        <td class="none-table-480" style="text-align: center;">{{dataSector.idsetor}}</td>
                                        <td style="text-align: center;">{{dataSector.nomesetor}}</td>
                                        <td class="none-table-768 none-table-480" style="text-align: center;">{{dataSector.statussetor}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div style="text-align: center;">
                               <dir-pagination-controls max-size="5" direction-links="true" boundary-links="true"></dir-pagination-controls>
                           </div>
                       </div>
                       <div class="modal-body">

                        <form role="form" method="post" name="formSector">
                            <div class="content-grid mdl-grid">
                                <div class="mdl-cell mdl-cell--6-col">
                                    <div class="form-group">
                                        <input type="hidden" ng-model="action.idsetor" value="" />
                                    </div>
                                    <div class="form-group">
                                        <input type="text"  class="form-control" ng-model="action.nomesetor" ng-required="true" placeholder="Nome do setor.">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Status:</label><br>
                                        <label class="radio-inline">
                                            <input type="radio" value="ativo" ng-model="action.statussetor" ng-required="true"> Ativo
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio"  value="inativo" ng-model="action.statussetor" ng-required="true"> Inativo
                                        </label>
                                    </div>
                                    <div>
                                        <br>
                                         <button type="button" ng-click="new ()" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect"> <i class="material-icons">add</i></button>
                                         <button type="button" ng-click="saveOrEdit(action)" ng-if="!formSector.$invalid" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect"><i class="material-icons">archive</i></button>
                                         <br>
                                    </div>
                                </form>     
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
