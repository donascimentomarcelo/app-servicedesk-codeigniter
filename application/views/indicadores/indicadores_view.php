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
	        <h4 class="modal-title">Painel de Indicadores</h4>
	      </div>
	      <div class="modal-body">
	      	<form role="form" method="post" action="<?= base_url('index.php/indicadores/indicadores_controller/localizador')?>">
		
                  <div class="container">
                     
                  
                      <div class="container">
                        <div class='col-md-5'>
                            <div class="form-group">
                                
                                    <label>Data Inicial: </label>
                                    <input type="date" name="datainicial">
                                
                            </div>
                        </div>
                        <div class='col-md-5'>
                            <div class="form-group">
                                
                                     <label>Data Final: </label>
                                     <input type="date" name="datafinal">
                                
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
                            <th style="text-align: center; width: 18px;">Técnico</th>
                            <th style="text-align: center; width: 10px;">Ramal</th>
                            <th style="text-align: center; width: 20px;">E-mail</th>
                            <th style="text-align: center; width: 12px;">Data</th>
                            <th style="text-align: center; width: 18px;">Status</th>
                            <th style="text-align: center; width: 50%;">Justificativa</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php foreach ($dados -> result() as $coluna):  ?> 

                        <tr>
                            <td style="text-align: center; width: 18px;"><?php echo $coluna->nometecnico?></td>
                            <td style="text-align: center; width: 10px;"><?php echo $coluna->ramaltecnico?></td>
                            <td style="text-align: center; width: 20px;"><?php echo $coluna->emailtecnico?></td>
                            <td style="text-align: center; width: 12px;"><?php $i = $coluna->data; echo date('d/m/Y H:i:s', strtotime($i));?></td>
                            <td style="text-align: center; width: 18px;"><?php echo $coluna->statuschamado?></td>
                            <td style=" width: 40%; "><a style="text-align: center;" href="javascript:;"  onclick="janelaDescricao(<?= $coluna->idhistorico ?>)"><button type="button" class="glyphicon glyphicon-eye-open"></button></a>
                            <?php 
                            $i = $coluna->justificativa;
                            $j = 120;
                            if($i != '0'){

                            echo substr_replace($i, (strlen($i) > $j ? '...' : ''), $j);

                            }else{

                                echo'Nenhuma justificativa encontrada.';
                            }
                            ?></td>
                        </tr>

                        <?php endforeach;?>

                                    </tbody>
                </table>
              
	      </div>
	    </div>
	  </div>
	</div>
   </div>
    
<p class="footer"></p>
</div>
  <style type="text/css">

	::selection{ background-color: #E13300; color: white; }
	::moz-selection{ background-color: #E13300; color: white; }
	::webkit-selection{ background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body{
		margin: 0 15px 0 15px;
	}
	
	p.footer{
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}
	
	#container{
		margin: 10px;
		border: 1px solid #D0D0D0;
		-webkit-box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</body>
</html>
