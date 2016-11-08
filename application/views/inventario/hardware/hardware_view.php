<!DOCTYPE html>
<html ng-app="hardware">
<head>
	<meta charset="utf-8">
	<title>Inventário - Hardware</title>

        <script src="../../../angular/lib/angular.min.js" type="text/javascript"></script>
        <script src="../../../angular/lib/dirPagination.js" type="text/javascript"></script>
        <script src="../../../angular/js/app.js" type="text/javascript"></script>
        <script src="../../../angular/js/controllers/hardwarecrtl.js" type="text/javascript"></script>
        <script src="../../../angular/js/services/hardwareAPIService.js" type="text/javascript"></script>
        <script src="../../../angular/js/value/configValue.js" type="text/javascript"></script>
        
        <script src="../../../bootstrap/js/jquery.js" type="text/javascript"></script>
        <script src="../../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../../craftpip-jquery/js/jquery-confirm.js" type="text/javascript"></script>
       
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="../../../bootstrap/css/cd.css" rel="stylesheet" type="text/css"/>
        <link href="../../../craftpip-jquery/css/jquery-confirm.css" rel="stylesheet" type="text/css"/>
        
        <script type="text/javascript">
        
        $(document).ready(function(){
            $('.dropdown-toggle').dropdown();
        });
     
         </script>
       
</head>

<body ng-controller="hardwarecrtl">
    
<div id="container">
    <div ng-repeat="datauser in datauser">
        <h1> <img src="{{datauser.imagemmenu}}" class="img-circle" width="50px" height="50px"> {{datauser.nomemenu}}</h1>
    </div>
	<!--<h1><?php// foreach($preenche_dados -> result() as $dados):?> <img src="../../.<?php //echo $dados->imagem;?>" class="img-circle" width="50px" height="50px"> <?php// endforeach;?> <?php //echo $this->session->userdata('nome');?></h1>-->
       
        <?php include 'C:\xampp\htdocs\cd\application\views\menu_head\administrador\menu_inicial.php'; ?>
        
        <div id="container">

             <div class="" id="form_padrao" data-backdrop="static" >
	  
	      <div class="modal-header">
	        <h4 class="modal-title">Inventário - Hardware</h4>
	      </div>
                 <div>{{message}}</div>   
	      <div class="modal-body">
                  <div class="row">
                      <div class="col-md-6">
                        <form role="form" name="inventarioForm" method="post" id="formulario_usuario" enctype="multipart/form-data">
			  <div class="form-group">
			    
                              <input type="hidden" class="form-control" ng-model="registro.idinventario" name="idinventario">
			  </div>
			  <div class="form-group">
			    
                              <input type="text" class="form-control" ng-model="registro.nome" name="nome"  placeholder="Nome do produto" ng-required="true">
			  </div>
                            <div class="form-group">
                            
                              <input type="text" class="form-control" ng-model="registro.modelo" name="modelo" placeholder="Modelo do produto" ng-required="true">
                          </div>
                            <div class="form-group">
                                <select type="text" class="form-control" ng-model="registro.marca" name="marca" >
                                    <option value="">{{registro.marca}}</option>
                                    <option value="sony">Sony</option>
                                    <option value="sansung">Sansung</option>
                                    <option value="lenovo">Lenovo</option>
                                </select>
                            </div>
                            
                         <div>
                             <button type="button" ng-click="registraInventario(registro)" ng-disabled="inventarioForm.$invalid" class="btn btn-secondary">Registrar</button>
                             <button type="button" ng-click="apagarMultiplosRegistro(dados)" ng-if="registroSelecionado(dados)"  class="btn btn-secondary">Apagar</button>
                         </div>  
                            
			</form>	   
                      </div>
                      <div class="col-md-6">
                        <input class="form-control" id="search" type="text" ng-model="search" placeholder="Pesquise o pelo nome do Hardware."/>
                        <table ng-show="dados.length > 0" class="table">
                                <tr>
                                    <th style="text-align: center;" ng-click="ordenarPor('idinventario')"> ID
                                    <span class="glyphicon sort-icon" ng-show="criterioDeOrdenacao==='idinventario'" ng-class="{'glyphicon-chevron-up':ordenacao,'glyphicon-chevron-down':!ordenacao}"></span>
                                    </th>
                                    <th style="text-align: center;" ng-click="ordenarPor('nome')">Nome
                                    <span class="glyphicon sort-icon" ng-show="criterioDeOrdenacao==='nome'" ng-class="{'glyphicon-chevron-up':ordenacao,'glyphicon-chevron-down':!ordenacao}"></span>
                                    </th>
                                    <th style="text-align: center;" ng-click="ordenarPor('modelo')">Modelo
                                    <span class="glyphicon sort-icon" ng-show="criterioDeOrdenacao==='modelo'" ng-class="{'glyphicon-chevron-up':ordenacao,'glyphicon-chevron-down':!ordenacao}"></span>
                                    </th>
                                    <th style="text-align: center;" ng-click="ordenarPor('marca')">Marca
                                    <span class="glyphicon sort-icon" ng-show="criterioDeOrdenacao==='marca'" ng-class="{'glyphicon-chevron-up':ordenacao,'glyphicon-chevron-down':!ordenacao}"></span>
                                    </th>
                                    <th></th>
                                </tr>
                            </tbody>
                                <tr ng-class="{'cinza negrito': dados.selecionado}" dir-paginate="dados in dados | filter:{nome:search} | orderBy:criterioDeOrdenacao:ordenacao| itemsPerPage:5">
                                    <td>{{dados.idinventario}}</td>
                                    <td>{{dados.nome}}</td>
                                    <td>{{dados.modelo}}</td>
                                    <td>{{dados.marca}}</td>
                                    <td>
                                        <a href="javascript:;"  ng-click="edit(dados)"><button type="button" class="glyphicon glyphicon-edit"></button></a> | 
                                        <a href="javascript:;"  ng-click="apagarRegistro(dados.idinventario)"><button type="button" class="glyphicon glyphicon-trash"></button></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                  <dir-pagination-controls max-size="5" direction-links="true" boundary-links="true"></dir-pagination-controls>
                 </div>
                 </div>
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
