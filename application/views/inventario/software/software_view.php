<!DOCTYPE html>
<html ng-app="software">
<head>
	<meta charset="utf-8">
	<title>Inventário - Software</title>

        <script src="../../../angular/lib/angular.min.js" type="text/javascript"></script>
        <script src="../../../angular/lib/dirPagination.js" type="text/javascript"></script>
        <script src="../../../angular/js/app.js" type="text/javascript"></script>
        <script src="../../../angular/js/value/configValue.js" type="text/javascript"></script>
        <script src="../../../angular/js/controllers/inventario/softwarecrtl.js" type="text/javascript"></script>
        <script src="../../../angular/js/services/inventario/softwareAPIService.js" type="text/javascript"></script>
        
        <script src="../../../bootstrap/js/jquery.js" type="text/javascript"></script>
        <script src="../../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../../craftpip-jquery/js/jquery-confirm.js" type="text/javascript"></script>
        <!--  <link href="../../../bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>-->
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="../../../bootstrap/css/cd.css" rel="stylesheet" type="text/css"/>
        <link href="../../../craftpip-jquery/css/jquery-confirm.css" rel="stylesheet" type="text/css"/>
        
        <script type="text/javascript">
        
            $(document).ready(function(){
                         $('.dropdown-toggle').dropdown();
            });
     
        </script>
        
      
        </head>
        <body ng-controller="softwarecrtl">

        <div id="container">
                <h1><?php foreach($preenche_dados -> result() as $dados):?> <img src="../../.<?php echo $dados->imagem;?>" class="img-circle" width="50px" height="50px"> <?php endforeach;?> <?php echo $this->session->userdata('nome');?></h1>

               <?php include 'C:\xampp\htdocs\cd\application\views\menu_head\administrador\menu_inicial.php'; ?>

            <div id="container">

                 <div class="" id="form_padrao" data-backdrop="static" >

                  <div class="modal-header">
                    <h4 class="modal-title">Inventário - Software</h4>
                  </div>
                  <div>{{error}}</div>   
                  <div class="modal-body">
                      <div class="row">
                          <div class="col-md-6">
                                <form name="formSoftware">
                                    <div class="height-form">
                                            <div class="form-group">
                                                <input class="form-control" type="hidden" ng-model="action.idsoftware">
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" type="text" placeholder="Nome do software" ng-model="action.nomesoftware" ng-required="true">
                                            </div>
                                            <div class="form-group">
                                                <input class="form-control" type="text" placeholder="Serial Number" ng-model="action.serialsoftware" ng-required="true">
                                            </div>
                                            <div class="form-group">
                                                <select class="form-control" ng-model="action.inventario_config_fk" ng-required="true">
                                                    <option value="">Selecione um fabricante.</option>
                                                    <option ng-repeat="dataConfigSoftware in dataConfigSoftware" value="{{dataConfigSoftware.idconfig}}">{{dataConfigSoftware.nome_config}}</option>
                                                </select>
                                            </div>
                                    </div>
                                    <div>
                                        <button type="button" class="btn btn-secondary" ng-click="new()">Novo</button>
                                        <button type="button" class="btn btn-secondary" ng-click="actionSoftware(action)" ng-disabled="formSoftware.$invalid">Registrar</button>
                                    </div>
                                </form>
                          </div>
                          <div class="col-md-6">
                            <div class="margin-top-table">  
                                <div class="form-group">
                                    <input class="form-control" type="text" placeholder="Pesquise o pelo nome do Software." ng-model="search">
                                </div>
                                <div class="height-table">
                                  <table class="table" ng-show="dataSoftware.length > 0">
                                        <thead>
                                            <tr>
                                                <td style="text-align: center;" ng-click="ordenationBy('idsoftware')"> ID
                                                <span class="glyphicon sort-icon" ng-show="ordenationCritery==='idsoftware'" ng-class="{'glyphicon-triangle-bottom':ordenation,'glyphicon-triangle-top':!ordenation}"></span>
                                                </td>
                                                <td style="text-align: center;" ng-click="ordenationBy('nomesoftware')">Nome do Software
                                                <span class="glyphicon sort-icon" ng-show="ordenationCritery==='nomesoftware'" ng-class="{'glyphicon-triangle-bottom':ordenation,'glyphicon-triangle-top':!ordenation}"></span>
                                                </td>
                                                <td style="text-align: center;" ng-click="ordenationBy('serialsoftware')">Serial Number
                                                <span class="glyphicon sort-icon" ng-show="ordenationCritery==='serialsoftware'" ng-class="{'glyphicon-triangle-bottom':ordenation,'glyphicon-triangle-top':!ordenation}"></span>
                                                </td>
                                                <td style="text-align: center;" ng-click="ordenationBy('nome_config')">Fabricante
                                                <span class="glyphicon sort-icon" ng-show="ordenationCritery==='nome_config'" ng-class="{'glyphicon-triangle-bottom':ordenation,'glyphicon-triangle-top':!ordenation}"></span>
                                                </td>
                                                <td></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr ng-click="update(dataSoftware); itemSelected(dataSoftware.idsoftware)" ng-class="{'cinza negrito': selectedIndex === dataSoftware.idsoftware}" dir-paginate="dataSoftware in dataSoftware | orderBy:ordenationCritery:ordenation | filter:{nomesoftware:search}| itemsPerPage : 5">
                                                <td>{{dataSoftware.idsoftware}}</td>
                                                <td>{{dataSoftware.nomesoftware}}</td>
                                                <td>{{dataSoftware.serialsoftware}}</td>
                                                <td>{{dataSoftware.nome_config}}</td>
                                                <td>
                                                    <a href="javascript:;"  ng-click="delete(dataSoftware.idsoftware)"><button type="button" class="glyphicon glyphicon-trash"></button></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                  </table>
                                </div>
                                <dir-pagination-controls ng-show="dataSoftware.length > 0" max-size="5" direction-link="true" boundary-link="true"></dir-pagination-controls>
                            </div>
                        </div>
                      </div>
                  </div>
                  <div class="modal-footer">

                  </div>
                </div>
            </div>
	</div>

    
<p class="footer"></p>

</body>
</html>
