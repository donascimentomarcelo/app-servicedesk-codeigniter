<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Manter CD</title>

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
        
        <script type="text/javascript">
        
     
        
        $(document).ready(function(){
                        
                        $(document).ready(function(){
                                     $('.dropdown-toggle').dropdown();
                        });
                        
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

    	$(function(){
    		$('#formulario_usuario').ajaxForm({
    			success: function(data) {
    				if (data == 1 || data == 11 || data == 10) {
                                    
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
        
        
        </script>
        
      
</head>
<body>
    
<div id="container">
	<h1><?php foreach($preenche_dados -> result() as $dados):?> <img src="../../.<?php echo $dados->imagem;?>" class="img-circle" width="50px" height="50px"> <?php endforeach;?>Hello <?php echo $this->session->userdata('nome');?>, Welcome to CodeIgniter!  </h1>
        
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
	        <h4 class="modal-title">Alterar Dados Pessoais</h4>
	      </div>
	      <div class="modal-body">
	      	<?php foreach($consulta -> result() as $dados):?>
			<form role="form" method="post" action="<?= base_url('index.php/perfil_pessoal/perfil_pessoal_controller/atualiza_perfil')?>" id="formulario_usuario" enctype="multipart/form-data">
			  <div class="form-group" >
                              <img src="../../.<?php echo $dados->imagem;?>" class="img-circle" width="100px" height="100px">
                              
			  </div>
			  <div class="form-group">
			    <label for="nome">Foto de Perfil</label>
                            <input type="file" name="imagem"  id="imagem" value="../../.<?php echo $dados->imagem;?>">
			  </div>
			  <div class="form-group">
			    <label for="nome">Nome</label>
                            <input type="text"  class="form-control" id="nome"  name='nome' value="<?php echo $dados->nome?>">
			  </div>
			 
			  <div class="form-group">
			    <label for="email">Senha</label>
                            <input type="password"  class="form-control" id="senha" name='senha' value="<?php echo $dados->senha?>">
			  </div>
			  <div class="form-group">
			    <label for="nome">E-mail</label>
			    <input type="text"  class="form-control" id="email"  name='email' value="<?php echo $dados->email?>">
			  </div>
			  <div class="form-group">
			    <label for="setor">Setor</label>
                            <select class="form-control" name="setor_fk" id="setor_fk" required="required">
                                
                                <option value="<?php echo $dados->idsetor?>"><?php echo $dados->nomesetor?></option>
                                
                                 <?php foreach ($setor_ativo -> result() as $linha): ?> 
                                
                                <option value="<?php echo $linha->idsetor?>"><?php echo $linha->nomesetor?></option>
                                
                                <?php endforeach;?>
                                
                            </select>
			  </div>
			  
			  <input type="hidden" name="id" id="id" value="<?php echo $dados->id?>" />
			</form>	    
		<?php endforeach; ?>	    
	      </div>
	      <div class="modal-footer">
	      
               <button type="button" class="btn btn-primary" onclick="$('#formulario_usuario').submit()">Atualizar</button>
	      </div>
	    </div>
	  </div>
	</div>
   </div>
    
<p class="footer"><a href="javascript: history.back()">Voltar</a> <strong>{elapsed_time}</strong> seconds</p>
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
