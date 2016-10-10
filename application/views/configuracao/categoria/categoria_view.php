<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Manter Categoria</title>

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="../../../bootstrap/css/cd.css" rel="stylesheet" type="text/css"/>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href="../../../bootstrap/css/cd.css" rel="stylesheet" type="text/css"/>
        
        <link href="../../../bootstrap/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        
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
				$('#tabela1').dataTable();
                                
                                $(document).ready(function(){
                                     $('.dropdown-toggle').dropdown();
                        });
                        
                        $("#formulario_categoria").validate({
                            rules : {
                                  nomecategoria:{
                                         required:true,
                                         minlength:3
                                  }                               
                            },
                            messages:{
                                  nomecategoria:{
                                         required:"Informe o nome da categoria!",
                                         minlength:"O nome deve ter pelo menos 3 caracteres"
                                  }   
                            }
                     });
		});
        function minhaCallCack(){
         swal({   title: "Registro salvo com sucesso!",
             text: "Exito ao realizar operação.",
             timer: 1000, 
             showConfirmButton: false 
         });
        }
    
    	$(function(){
    		$('#formulario_categoria').ajaxForm({
    			success: function(data) {
    				if (data == 1 || data == 11) {
                                    
                                    
                                    success: minhaCallCack();
                                    limparCampo();
				    	
    				}else{
                                    alert(data);
                                }
    			}
    		});
    	});
        
    	var base_url = "<?= base_url() ?>";
    	
	function carregaDadosCategoriaJSon(idcategoria){
    		$.post(base_url+'/index.php/categoria/categoria_controller/dados_categoria', {
    			idcategoria: idcategoria
    		}, function (data){
    			$('#idcategoria').val(data.idcategoria);
    			$('#nomecategoria').val(data.nomecategoria);
                        $('#'+data.statuscategoria).prop('checked', true);
    			  
    		}, 'json');
    	}
    
    	function janelaNovoCategoria(idcategoria){
    		
    		carregaDadosCategoriaJSon(idcategoria);
                
	    	$('#modalCategoria').modal('show');
    	}
        
        function limparCampo(){
            $("#idcategoria").val(''); 
            $("#nomecategoria").val(''); 
    
        }
        
    	function novo(){
                limparCampo();
            
    		$('#modalCategoria').modal('show');
    	}
        
        function confirma(idcategoria){
            
            $.confirm({
            title: 'Excluir Usuário',
            content: 'Deseja excluir esse usuário?',
            confirm: function(){
               
            $.ajax({
                type: "POST",
                data: {
                    idcategoria: idcategoria
                },
                
                url: "http://localhost/cd/index.php/categoria/categoria_controller/excluir_categoria/"+idcategoria,
                success: function(data) {
                    if(data == 1 || data == 11){
                       
                        $.alert('Categoria excluida com sucesso!');
                        document.location.href = document.location.href;
                    }else if(data == 1451){
                        
                        swal("Erro ao excluir", "Este categoria está vinculado a um usuário. Favor, antes de excluir, desvincule.", "error"); 
                       
                    }else{
                        alert(data)
                    }
                },
                error: function(){
                    alert("Houve algum erro ao excluir!");
                }
            });
                        }, cancel: function(){
                    $.alert('Cancelado!');
                }
            });
        }
   
    
        function refresh(){
            document.location.href = document.location.href;
        }

        </script>
        
      
</head>
<body>
<?php if(empty(($this->session->userdata('email')))){
    
    redirect('login/login_controller/proteger');
    
}
?>
<div id="container">
	<h1><?php foreach($preenche_dados -> result() as $dados):?> <img src="../../.<?php echo $dados->imagem;?>" class="img-circle" width="50px" height="50px"> <?php endforeach;?><?php echo $this->session->userdata('nome');?>  </h1>

        <?php 

            include 'C:\xampp\htdocs\cd\application\views\menu_head\administrador\menu.php';
        ?>

</head>
<body>

<div id="container">
	<h1>Manter Categoria</h1>
        <div id="body">

           <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="tabela1">
                <thead>
                    <tr>
                    <th style="text-align: center;">Código da Categoria</th>
                    <th style="text-align: center;">Nome da Categoria</th>
                    <th style="text-align: center;">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    
                <?php foreach ($consulta -> result() as $linha): ?> 
                    
                <tr>
                    <td style="text-align: center;"><?php echo $linha->idcategoria ?></td>
                    <td style="text-align: center;"><?php echo $linha->nomecategoria ?></td>
                    <td style="text-align: center;"><a style="text-align: center;" href="javascript:;"  onclick="janelaNovoCategoria(<?= $linha->idcategoria ?>)"><button type="button" class="glyphicon glyphicon-cog"></button></a><a style="text-align: center;" href="javascript:;"  onclick="confirma(<?= $linha->idcategoria ?>)"><button type="button" class="glyphicon glyphicon-trash"></button></a></td>
                </tr>
                
                <?php endforeach;?>
                
                </tbody>
            </table>
            
	</div>
        
         <!--START MODAL-->
        <div class="modal fade bs-example-modal-lg" id="modalCategoria" data-backdrop="static" >
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title">Manter Categoria</h4>
	      </div>
	      <div class="modal-body">
	      	
			<form role="form" method="post" action="<?= base_url('index.php/categoria/categoria_controller/salvar_categoria')?>" id="formulario_categoria">
			  <div class="form-group">
			    <label for="nome">Nome do Categoria</label>
                            <input type="text"  class="form-control" id="nomecategoria"  name='nomecategoria'>
			  </div>
			  <input type="hidden" name="idcategoria" id="idcategoria" value="" />
			</form>	    
			    
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="refresh()" >Fechar</button>
	       
               <button type="button" class="btn btn-primary" onclick="$('#formulario_categoria').submit()">Salvar</button>
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
		color: #333;
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
