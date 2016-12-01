<!DOCTYPE html>
<html ng-app="profile">
<head>
	<meta charset="utf-8">
	<title>Perfil Pessoal</title>

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="../../../bootstrap/css/cd.css" rel="stylesheet" type="text/css"/>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href="../../../bootstrap/css/cd.css" rel="stylesheet" type="text/css"/>
        
        <script src="../../../angular/lib/angular.min.js" type="text/javascript"></script>
        <script src="../../../angular/js/app.js" type="text/javascript"></script>
        <script src="../../../angular/js/controllers/profile/profilectrl.js" type="text/javascript"></script>
        <script src="../../../angular/js/services/profile/profileAPIService.js" type="text/javascript"></script>
        <script src="../../../angular/js/value/configValue.js" type="text/javascript"></script>
      
        <script type="text/javascript">
        
     
        
        $(document).ready(function(){
                        
                        $(document).ready(function(){
                                     $('.dropdown-toggle').dropdown();
                        });
                       
		});
        
        </script>
        
      
</head>
<body ng-controller="profilectrl">
    
        <div id="container">
            <h1><?php foreach ($preenche_dados->result() as $dados): ?> <img src="../../.<?php echo $dados->imagem; ?>" class="img-circle" width="50px" height="50px"> <?php endforeach; ?> <?php echo $this->session->userdata('nome'); ?></h1>

            <?php
            if ($this->session->userdata('perfil') == 'administrador') {

                include 'C:\xampp\htdocs\cd\application\views\menu_head\administrador\menu_inicial.php';
            } else {

                include 'C:\xampp\htdocs\cd\application\views\menu_head\usuario\menu_inicial.php';
            }
            ?>

            <div id="container">

                <h1>Alterar Dados Pessoais</h1>
                 <div id="body">
                    <div class="row">
                       <div class="col-md-4">
                            <div class="modal-body">
                                <div ng-repeat="dataProfile in dataProfile">
                                    <form role="form" name='formProfile' method="post" action="<?= base_url('index.php/perfil_pessoal/perfil_pessoal_controller/atualiza_perfil') ?>" id="formulario_usuario" enctype="multipart/form-data">

                                        <div class="form-group" >
                                            <img data-ng-src="{{dataProfile.imagem}}" class="img-circle" width="100px" height="100px">

                                        </div>

                                        <div class="form-group">
                                            <input type="text"  class="form-control"  ng-model="dataProfile.nome" placeholder="Informe o Nome."  ng-required="true"> 
                                        </div>


                                        <div class="form-group">
                                            <input type="password"  class="form-control"  ng-model="dataProfile.senha" placeholder="Informe a Senha."  ng-required="true">
                                        </div>


                                        <div class="form-group">
                                            <input type="text"  class="form-control"  ng-model="dataProfile.email" placeholder="Informe o E-mail."  ng-required="true">
                                        </div>


                                        <div class="form-group">
                                            <input type="text"  class="form-control"  ng-model="dataProfile.ramal" placeholder="Informe o Ramal."  ng-required="true">
                                        </div>


                                        <div class="form-group">
                                            <select class="form-control" ng-model="dataProfile.setor_fk"  ng-required="true" >

                                                <option ng-repeat="dataSector in dataSector" value="{{dataSector.idsetor}}" >{{dataSector.nomesetor}}</option>



                                            </select>
                                        </div>

                                        <input type="hidden" ng-model="dataProfile.id"/>

                                        <div>
                                            <button type="button" class="btn btn-secondary" ng-if="!formProfile.$invalid" ng-click="alterProfile(dataProfile)" >Atualizar</button>
                                        </div>

                                    </form>	    
                                </div> 
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
       </div>

      <p class="footer"></p>
  
</body>
</html>

	

