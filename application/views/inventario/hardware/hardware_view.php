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
        angular.module("hardware").controller("hardwarecrtl", function($scope){
            $scope.dados = [
                {nome:"teste", modelo: "teste"},
                {nome:"teste1", modelo: "teste1"},
                {nome:"teste2", modelo: "teste2"}
            ];
            
            $scope.registraInventario = function(registro){
                $scope.dados.unshift(angular.copy(registro));
                delete $scope.registro;
            };
        });
        
        
        </script>
        
      
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
	      <div class="modal-body">
	      	
			<form role="form" method="post" action="<?= base_url('index.php/perfil_pessoal/perfil_pessoal_controller/atualiza_perfil')?>" id="formulario_usuario" enctype="multipart/form-data">
			  <div class="form-group">
			    
                              <input type="text" class="form-control" name="nomeproduto" ng-model="registro.nome" placeholder="Nome do produto">
			  </div>
                            <div class="form-group">
                            
                                <input type="text" class="form-control" name="nomeproduto" ng-model="registro.modelo"placeholder="Modelo do produto">
                          </div>
                            
                         <div>
                             <button type="button" ng-click="registraInventario(registro)" ng-disabled="!registro.nome ||  !registro.modelo" class="btn btn-secondary btn-lg btn-block">Registrar</button>
                         </div>  
                            
			</form>	    
                  <table class="table table-striped">
                      <tr>
                          <th>Nome</th>
                          <th>Marca</th>
                      </tr>
                      <tr ng-repeat="dados in dados">
                          <td ng-repeat="(key, value) in dados">{{value}}</td>
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
