<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Alterar Foto</title>

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="../../../bootstrap/css/cd.css" rel="stylesheet" type="text/css"/>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <script src="../../../bootstrap/js/bootstrap-filestyle.min.js" type="text/javascript"></script>
        
        <script src="../../../bootstrap/js/jquery.forms.js" type="text/javascript"></script>
        <script src="../../../sweet/sweetalert-dev.js" type="text/javascript"></script>
        <link href="../../../sweet/sweetalert.css" rel="stylesheet" type="text/css"/>
        <script src="../../../sweet/sweetalert.min.js" type="text/javascript"></script>
        <script src="../../../angular/lib/angular.min.js" type="text/javascript"></script>
        <script type="text/javascript">
        
     
        
        $(document).ready(function(){
                        
                        $(document).ready(function(){
                                     $('.dropdown-toggle').dropdown();
                        });
                       
		});
                
        function minhaCallCack(){
         swal({   title: "Foto Alterada com sucesso!",
             text: "Exito ao realizar operação.",
             timer: 1000, 
             showConfirmButton: false 
         });
        }

    	$(function(){
    		$('#formulario_usuario').ajaxForm({
    			success: function(data) {
    				if (data === 1) {
                                    
                                    success: minhaCallCack();
                                    
				    	
    				}else{
                                    alert(data);
                                }
    			}
    		});
    	});
    
    	var base_url = "<?= base_url() ?>";
    
        function refresh(){
            document.location.href = document.location.href;
        }
        
        $(":file").filestyle({icon: false});
        
        function novo(){
                
    		$('#alterPhoto').modal('show');
            
    	}
        
        </script>
        
      
</head>
<body>
    
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

                <h1>Alterar Foto</h1>
                <div id="body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="modal-body">
                                
                                    <?php foreach ($consulta->result() as $dados): ?>
                                        <div class="form-group" >
                                            <img src="../../.<?php echo $dados->imagem; ?>" class="img-circle" width="100px" height="100px">
                                        </div>
                                       
                                        <div>
                                            <button type="button" class="btn btn-secondary" onclick="novo()">Atualizar</button>
                                        </div>
                                    <?php endforeach; ?>	
                               
                            </div> 
                        </div>
                    </div>
                </div> 
            </div>
            
            
            <div class="modal fade bs-example-modal-lg" id="alterPhoto" data-backdrop="static" >
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h4 class="modal-title">Selecione a nova foto para seu perfil!</h4>
                  </div>
                  <div class="modal-body">

                      <form role="form" name="form_image" method="post" action="<?= base_url('index.php/perfil_pessoal/perfil_pessoal_controller/alter_photo_profile') ?>" id="formulario_usuario" enctype="multipart/form-data">

                        <div class="form-group">
                            <input type="file" name="imagem" class="filestyle" data-icon="false" required="required">
                        </div>

                      </form>

                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" onclick="refresh()" >Fechar</button>

                   <button type="button" class="btn btn-secondary" onclick="$('#formulario_usuario').submit()">Atualizar</button>
                  </div>
                </div>
              </div>
            </div>
            
            
        </div>
    <p class="footer"></p>
  
</body>
</html>

	

<!--

<script src="../../../angular/lib/angular.min.js" type="text/javascript"></script>
<script src="../../../angular/lib/ngModel.js" type="text/javascript"></script>
<script src="../../../angular/js/app.js" type="text/javascript"></script>

<script src="../../../angular/js/controllers/photo_profile/photo_profilectrl.js" type="text/javascript"></script>
<script src="../../../angular/js/services/photo_profile/photo_profileAPIService.js" type="text/javascript"></script>

<script src="../../../angular/js/value/configValue.js" type="text/javascript"></script>
        

<div ng-repeat="dataProfilePhoto in dataProfilePhoto">
        <div class="form-group" >
            <img ng-src="../../.{{dataProfilePhoto.imagem}}" class="img-circle" width="100px" height="100px">
        </div>
    </div> 

        <div class="form-group">
            <input type="file" name="imagem" ng-model="action.imagem" class="filestyle" data-icon="false" required="required">
        </div>
        <div>
            <button type="button" ng-click="alterPhotoProfile(action)" class="btn btn-secondary">Atualizar</button>
        </div>	
</form>	    
-->