<!DOCTYPE html>
<html ng-app="hardware">
<head>
	<meta charset="utf-8">
	<title>Inventário - Hardware</title>

        <script src="../../../angular/angular-1.5.8/angular.min.js" type="text/javascript"></script>
        
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="../../../bootstrap/css/cd.css" rel="stylesheet" type="text/css"/>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href="../../../bootstrap/css/cd.css" rel="stylesheet" type="text/css"/>
        
        <link href="../../../bootstrap/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        
        <script src="../../../bootstrap/js/jquery.js" type="text/javascript"></script>
        <script src="../../../bootstrap/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="../../../bootstrap/js/bootbox.js" type="text/javascript"></script>
        <script src="../../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../../bootstrap/js/jquery.forms.js" type="text/javascript"></script>
        <script src="../../../bootstrap/js/bootbox.min.js" type="text/javascript"></script>
        <script src="../../../bootstrap/js/jquery.confirm.js" type="text/javascript"></script>
        
        <script src="../../../bootstrap/js/jquery.validate.js" type="text/javascript"></script>
        
        <script src="../../../sweet/sweetalert-dev.js" type="text/javascript"></script>
        <script src="../../../sweet/sweetalert.min.js" type="text/javascript"></script>
        
        <link href="../../../sweet/sweetalert.css" rel="stylesheet" type="text/css"/>
        
        <link href="../../../craftpip-jquery/css/jquery-confirm.css" rel="stylesheet" type="text/css"/>
        <script src="../../../craftpip-jquery/js/jquery-confirm.js" type="text/javascript"></script>
        
        <script type="text/javascript">
        
        $(document).ready(function(){
            $('.dropdown-toggle').dropdown();
        });
     
        angular.module("hardware", []);
        angular.module("hardware").controller("hardwarecrtl", function($scope,$http){
            /*
            $scope.dados = [
                {nome:"teste", modelo: "teste", marca:"sony"},
                {nome:"teste1", modelo: "teste1", marca:"sony"},
                {nome:"teste2", modelo: "teste2", marca:"sony"}
            ];
            */
            $scope.dados = [];
        var carregaHardware = function(){
            $http.get("http://localhost/cd/index.php/inventario/inventario_controller/listagem").success(function(data, status){
                console.log(data);
                //$scope.dados = data;
                $scope.dados = data;
            }).error(function(data){
                $scope.message = "aconteceu um erro:"+data;
            });
        };   
        
        $scope.marca = [
                {nome:"sony", codigo: 1},
                {nome:"sansung", codigo: 2},
                {nome:"LG", codigo:3}
            ];
            
            $scope.registraInventario = function(registro){
                $http.post("http://localhost/cd/index.php/inventario/inventario_controller/registro_hardware", registro).success(function(data){
                delete $scope.registro;
                carregaHardware();
                //$scope.dados.unshift(angular.copy(registro));
                });
            };
            $scope.edit = function(idinventario){
                $http.get("http://localhost/cd/index.php/inventario/inventario_controller/listagem_where",idinventario).success(function(data){
                $scope.preenche = data;
                });
              console.log(idinventario);  
            };
            $scope.apagarRegistro = function(dados){
              $scope.dados = dados.filter(function (registro){
                 if(!registro.selecionado) return registro; 
              });
              
            };
            
            
            $scope.registroSelecionado = function(dados){
                return dados.some(function(registro){
                    return registro.selecionado;
                });
          
            };
            
            carregaHardware();
            
        });
        
        
        </script>
        <style>
            .cinza{
                background-color: #ccc;
            }
            
            .negrito{
                font-weight: bold;
            }
            
        </style>
      
</head>
<body>
    
<div id="container">
	<h1><?php foreach($preenche_dados -> result() as $dados):?> <img src="../../.<?php echo $dados->imagem;?>" class="img-circle" width="50px" height="50px"> <?php endforeach;?> <?php echo $this->session->userdata('nome');?></h1>
        
	  <?php if($this->session->userdata('perfil') == 'administrador'){
              
                  include 'C:\xampp\htdocs\cd\application\views\menu_head\administrador\menu_inicial.php';
             
              }else{
                  
                  include 'C:\xampp\htdocs\cd\application\views\menu_head\usuario\menu_inicial.php';
            
              }
              ?>
        
</head>
<body ng-controller="hardwarecrtl">

        <div id="container">

             <div class="" id="form_padrao" data-backdrop="static" >
	  
	      <div class="modal-header">
	        <h4 class="modal-title">Inventário - Hardware</h4>
	      </div>
                 <div>{{message}}</div>   
	      <div class="modal-body">
	      	
			<form role="form" name="inventarioForm" method="post" id="formulario_usuario" enctype="multipart/form-data">
			  <div class="form-group">
			    
                              <input type="hidden" class="form-control" ng-model="registro.idinventario" name="idinventario">
			  </div>
			  <div class="form-group">
			    
                              <input type="text" class="form-control" ng-model="registro.nome" name="nome" value="{{preenche.nome}}"  placeholder="Nome do produto" ng-required="true">
			  </div>
                            <div class="form-group">
                            
                                <input type="text" class="form-control" ng-model="registro.modelo" name="modelo" placeholder="Modelo do produto" ng-required="true">
                          </div>
                            <div class="form-group">
                                <select type="text" class="form-control" ng-model="registro.marca.nome" name="marca" ng-options="marca.nome for marca in marca" ng-required="true">
                                    <option value="">Selecione uma marca</option>
                                </select>
                            </div>
                            
                         <div>
                             <button type="button" ng-click="registraInventario(registro)" ng-disabled="inventarioForm.$invalid" class="btn btn-secondary btn-lg btn-block">Registrar</button>
                             <button type="button" ng-click="apagarRegistro(dados)" ng-if="registroSelecionado(dados)"  class="btn btn-secondary btn-lg btn-block">Apagar</button>
                             <!--<button type="button" ng-click="apagarRegistro(dados)" ng-disabled="!registroSelecionado(dados)"  class="btn btn-secondary btn-lg btn-block">Apagar</button>-->
                         </div>  
                            
			</form>	    
                  <table ng-show="dados.length > 0" class="table">
                      <tr>
                          <th></th>
                          <th style="text-align: center;">ID</th>
                          <th style="text-align: center;">Nome</th>
                          <th style="text-align: center;">Modelo</th>
                          <th style="text-align: center;">Marca</th>
                          <th></th>
                      </tr>
                      <tr ng-class="{'cinza negrito': dados.selecionado}" ng-repeat="dados in dados">
                          <td><input type="checkbox" ng-model="dados.selecionado"></td>
                          <td>{{dados.idinventario}}</td>
                          <td>{{dados.nome}}</td>
                          <td>{{dados.modelo}}</td>
                          <td>{{dados.marca}}</td>
                          <td><a href="javascript:;"  ng-click="edit(dados.idinventario)"><button type="button" class="glyphicon glyphicon-cog"></button></a></td>
                          <!--<td>{{dados.marca.nome}}</td>-->
                      </tr>
                  </table>
                  
	      </div>
	      <div class="modal-footer">
	      
              
	      </div>
	    </div>
	  </div>
	</div>
   </div>
    
<p class="footer"></p>
</div>
 
</body>
</html>
