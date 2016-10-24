<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Indicadores</title>

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="../../../bootstrap/css/cd.css" rel="stylesheet" type="text/css"/>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href="../../../bootstrap/css/cd.css" rel="stylesheet" type="text/css"/>
        
        <link href="../../../bootstrap/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        
        <script src="../../../bootstrap/js/jquery.js" type="text/javascript"></script>
        <script src="../../../bootstrap/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="../../../bootstrap/js/jquery.form.js" type="text/javascript"></script>
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
        
        <script src="../../../bootstrap/js/moment.js" type="text/javascript"></script>
        <script src="../../../bootstrap/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
        <script type="text/javascript">
        
         $(document).ready(function(){
                                     $('.dropdown-toggle').dropdown();
                        });
     
        
        $(document).ready(function(){
                        
                       
                        
                        $("#formulario_usuario").validate({
                            rules : {
                                  nome:{
                                         required:true,
                                         minlength:3
                                  },
                                  email:{
                                         required:true,
                                         minlength:3
                                  }                               
                            },
                            messages:{
                                  nome:{
                                         required:"Informe o Campo Nome!",
                                         minlength:"O Nome deve ter pelo menos 3 caracteres"
                                  },
                                  email:{
                                         required:"Informe o E-mail!",
                                         minlength:"O E-mail deve ter pelo menos 3 caracteres"
                                  }    
                            }
                     });
		});
                
        function minhaCallCack(){
         swal({   title: "Perfil Alterado com sucesso!",
             text: "Exito ao realizar operação.",
             timer: 1000, 
             showConfirmButton: false 
         });
        }

    	
    
    	var base_url = "<?= base_url() ?>";
    
        function refresh(){
            document.location.href = document.location.href;
        }
        
      
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
<body>

        <div id="container">

             <div class="" id="modalUsuario" data-backdrop="static" >
	  
	      <div class="modal-header">
	        <h4 class="modal-title">Painel de Localizador de Chamados</h4>
	      </div>
                 
	      <div class="modal-body">
	      	<form role="form" method="post" action="<?= base_url('index.php/indicadores/indicadores_controller/indicadores')?>">
		
                  <div class="container">
                     
                  
                      <div class="container">
                        <div class='col-md-5'>
                            <div class="form-group">
                                
                                    <label for="nome">Data Inicial: </label>
                                    <input type="date" name="datainicial" class="form-control">
                                
                            </div>
                        </div>
                        <div class='col-md-5'>
                            <div class="form-group">
                                
                                     <label for="nome">Data Final: </label>
                                     <input type="date" name="datafinal" class="form-control">
                                
                            </div>
                        </div>
                    </div>
                      
                        <div class="form-group">
                            <div class="allinput" >
                            <label for="email" style="margin-left: 10%;">Status:</label>
			    <label class="radio-inline">
                                <input type="radio" name="statuschamado" id="aguardando" value="aguardando" checked="checked"> Aguardando atendimento
                              </label>
                              <label class="radio-inline">
                                <input type="radio" name="statuschamado" id="ematendimento" value="ematendimento"> Em atendimento
                              </label>
                              <label class="radio-inline">
                                <input type="radio" name="statuschamado" id="encerrar" value="encerrar"> Encerrdo
                              </label>
                            </div>
                            </div>
                      
                  </div>
                    
                    <button type="submit" class="btn btn-primary" >Pesquisar</button>
        
		</form>	    
		
                  
                  
                  
	      </div>
	      <div class="modal-footer">
	            <table class="display table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="">
                        <thead>
                            <tr>
                            <th style="text-align: center; ">Chamado</th>
                            <th style="text-align: center; ">Solicitante</th>
                            <th style="text-align: center; ">Técnico</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php 
                        if(isset($consulta)){
                            
                            foreach ($consulta -> result() as $coluna):  ?> 

                        <tr>
                            <td style="text-align: center; "><?php echo $coluna->idchamado;?></td>
                            <td style="text-align: center; "><?php echo $coluna->nomechamado?></td>
                            <td style="text-align: center; "><?php echo $coluna->statuschamado?></td>
                            
                        </tr>

                        <?php endforeach;
                        }?>

                                    </tbody>
                </table>
              
	      </div>
	    </div>
	  </div>
	</div>
   </div>
    
<p class="footer"></p>
</div>
 
</body>
</html>
