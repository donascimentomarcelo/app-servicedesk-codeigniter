<!DOCTYPE html>
<html ng-app="user">
    <head>
        <meta charset="utf-8">
        <title>Manter Usuário</title>

        <script src="../../../angular/lib/angular.min.js" type="text/javascript"></script>
        <script src="../../../angular/lib/angular-route.js" type="text/javascript"></script>
        <script src="../../../angular/lib/dirPagination.js" type="text/javascript"></script>
        <script src="../../../angular/lib/angular-file.js" type="text/javascript"></script>
        <script src="../../../angular/lib/angular-resource.min.js" type="text/javascript"></script>
        <script src="../../../angular/js/app.js" type="text/javascript"></script>
        <script src="../../../angular/js/controllers/user/usercrtl.js" type="text/javascript"></script>
        <script src="../../../angular/js/services/user/userAPIService.js" type="text/javascript"></script>
        <script src="../../../angular/js/value/configValue.js" type="text/javascript"></script>
        
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://code.getmdl.io/1.2.1/material.indigo-pink.min.css">
        <script defer src="https://code.getmdl.io/1.2.1/material.min.js"></script>
        
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="../../../bootstrap/css/cd.css" rel="stylesheet" type="text/css"/>

        <script src="../../../bootstrap/js/jquery.js" type="text/javascript"></script>
        <script src="../../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

        <link href="../../../craftpip-jquery/css/jquery-confirm.css" rel="stylesheet" type="text/css"/>
        <script src="../../../craftpip-jquery/js/jquery-confirm.js" type="text/javascript"></script>

        <script type="text/javascript">

            $(document).ready(function(){
                $('.dropdown-toggle').dropdown();
            });
              
        </script>


    </head>
    <body ng-controller="usercrtl">

        
            <h1><?php foreach ($preenche_dados->result() as $dados): ?> <img src="../../.<?php echo $dados->imagem; ?>" class="img-circle" width="50px" height="50px"> <?php endforeach; ?> <?php echo $this->session->userdata('nome'); ?>  </h1>

            <?php
            include 'C:\xampp\htdocs\cd\application\views\menu_head\administrador\menu.php';
            ?>

            <div id="container">
                <h1>Manter Usuário</h1>
                <div id="body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="modal-body">

                                <form role="form" name="useu_form" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <input type="hidden" value="" ng-model="action.id" />
                                    </div>
                                    
                                  <div class="mdl-textfield mdl-js-textfield">
                                      <input class="mdl-textfield__input" type="text" id="sample3" ng-model="action.nome" ng-required="true" placeholder="Nome do Usuário.">
                                  </div>


                                    <div class="mdl-textfield mdl-js-textfield">
                                        <input type="password"  class="mdl-textfield__input" ng-model="action.senha" placeholder="Senha do Usuário." ng-required="true">
                                    </div>

                                    <div class="mdl-textfield mdl-js-textfield">
                                        <input type="text"  class="mdl-textfield__input" ng-model="action.email" placeholder="E-mail do Usuário." ng-required="true">
                                    </div>

                                    <div class="mdl-textfield mdl-js-textfield">
                                        <input type="text"  class="mdl-textfield__input" ng-model="action.ramal" placeholder="Ramal do Usuário." ng-required="true">
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Perfil:</label><br>
                                        <label class="radio-inline">
                                            <input type="radio" name="perfil" id="usuario" value="usuario" checked="checked" ng-model="action.perfil" ng-required="true"> Usuário
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="perfil" id="administrador" value="administrador" ng-model="action.perfil" ng-required="true"> Administrador
                                        </label>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Status:</label><br>
                                        <label class="radio-inline">
                                            <input type="radio" name="status" id="ativo" value="ativo" checked="checked" ng-model="action.status" ng-required="true"> Ativo
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="status" id="inativo" value="inativo" ng-model="action.status" ng-required="true"> Inativo
                                        </label>
                                    </div>

                                    <div class="form-group">
                                        <select class="form-control" ng-model="action.setor_fk" ng-required="true">

                                            <option value="">Selecione um Setor</option>
                                            <option ng-repeat="sectorData in sectorData" value="{{sectorData.idsetor}}">{{sectorData.nomesetor}}</option>

                                        </select>
                                    </div>

                                    <hr>
                                    <div>
                                        <button type="button" ng-click="new ()" class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored"> <i class="material-icons">add</i></button>
                                        <button type="button" ng-click="insert_or_edit(action)" ng-if="!useu_form.$invalid" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Registrar</button>
                                    </div>  
                                </form>	    

                            </div>

                        </div>
                        <div class="margin-top-table">
                        <div class="col-md-8">
                          
                          <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
                            <label class="mdl-button mdl-js-button mdl-button--icon" for="sample6">
                              <i class="material-icons">search</i>
                            </label>
                            <div class="mdl-textfield__expandable-holder">
                              <input class="mdl-textfield__input" type="text" id="sample6" ng-model="search">
                              <label class="mdl-textfield__label" for="sample-expandable">Pesquise pelo nome do usuário</label>
                            </div>
                          </div>

                            <table class="mdl-data-table mdl-js-data-table  mdl-shadow--2dp" cellspacing="0" width="100%" id="tabela1">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;" ng-click="ordenationBy('id')">ID
                                            <span class="glyphicon sort-icon" ng-show="ordenationCritery === 'id'" ng-class="{'glyphicon-triangle-bottom':ordenation,'glyphicon-triangle-top':!ordenation}"></span>
                                        </th>
                                        <th style="text-align: center;" ng-click="ordenationBy('nome')">Nome do Usuário
                                            <span class="glyphicon sort-icon" ng-show="ordenationCritery === 'nome'" ng-class="{'glyphicon-triangle-bottom':ordenation,'glyphicon-triangle-top':!ordenation}"></span>
                                        </th>
                                        <th class="none-table-768 none-table-480" style="text-align: center;" ng-click="ordenationBy('email')">E-Mail
                                            <span class="glyphicon sort-icon" ng-show="ordenationCritery === 'email'" ng-class="{'glyphicon-triangle-bottom':ordenation,'glyphicon-triangle-top':!ordenation}"></span>
                                        </th>
                                        <th class="none-table-768 none-table-480" style="text-align: center;" ng-click="ordenationBy('perfil')">Perfil
                                            <span class="glyphicon sort-icon" ng-show="ordenationCritery === 'perfil'" ng-class="{'glyphicon-triangle-bottom':ordenation,'glyphicon-triangle-top':!ordenation}"></span>
                                        </th>
                                        <th class="none-table-480" style="text-align: center;" ng-click="ordenationBy('status')">Status
                                            <span class="glyphicon sort-icon" ng-show="ordenationCritery === 'status'" ng-class="{'glyphicon-triangle-bottom':ordenation,'glyphicon-triangle-top':!ordenation}"></span>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr ng-click="edit(userData); itemClicked(userData.id)" ng-class="{ 'cinza negrito': selectedIndex === userData.id }" dir-paginate="userData in userData | orderBy:ordenationCritery:ordenation | filter:{nome:search} | itemsPerPage :10">
                                        <td style="text-align: center;">{{userData.id}}</td>
                                        <td style="text-align: center;">{{userData.nome}}</td>
                                        <td class="none-table-768 none-table-480" style="text-align: center;">{{userData.email}}</td>
                                        <td class="none-table-768 none-table-480" style="text-align: center;">{{userData.perfil}}</td>
                                        <td class="none-table-480"style="text-align: center;">{{userData.status}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            <dir-pagination-controls max-size="5" direction-links="true" boundary-links="true"></dir-pagination-controls>
                        </div>
                        </div>
                    </div>
                     <p class="footer"></p>
                </div>
            </div>
    </body>
</html>
