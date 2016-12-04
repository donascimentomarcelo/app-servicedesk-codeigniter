<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Manter Subcategoria</title>

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
                        
                        $("#formulario_subcategoria").validate({
                            rules : {
                                  nomesubcategoria:{
                                         required:true,
                                         minlength:3
                                  },                               
                                  nomesubcategoria:{
                                         required:true,
                                         minlength:3
                                  }                               
                            },
                            messages:{
                                  nomesubcategoria:{
                                         required:"Informe o nome da subsubcategoria!",
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
    		$('#formulario_subcategoria').ajaxForm({
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
    	
	function carregaDadosCategoriaJSon(idsubcategoria){
    		$.post(base_url+'/index.php/subcategoria/subcategoria_controller/dados_subcategoria', {
    			idsubcategoria: idsubcategoria
    		}, function (data){
    			$('#idsubcategoria').val(data.idsubcategoria);
    			$('#nomesubcategoria').val(data.nomesubcategoria);
    			$('#sla').val(data.sla);
    			$('#categoria_fk').val(data.categoria_fk);
                   
    			  
    		}, 'json');
    	}
    
    	function janelaNovoCategoria(idsubcategoria){
    		
    		carregaDadosCategoriaJSon(idsubcategoria);
                
	    	$('#modalCategoria').modal('show');
    	}
        
        function limparCampo(){
            $("#idsubcategoria").val(''); 
            $("#nomesubcategoria").val(''); 
            $("#sla").val(''); 
            $("#categoria_fk").val(''); 
    
        }
        
    	function novo(){
                limparCampo();
            
    		$('#modalCategoria').modal('show');
    	}
        
        function confirma(idsubcategoria){
            
            $.confirm({
            title: 'Excluir Usuário',
            content: 'Deseja excluir esse usuário?',
            confirm: function(){
               
            $.ajax({
                type: "POST",
                data: {
                    idsubcategoria: idsubcategoria
                },
                
                url: "http://localhost/cd/index.php/subcategoria/subcategoria_controller/excluir_subcategoria/"+idsubcategoria,
                success: function(data) {
                    if(data == 1 || data == 11){
                       
                        //$.alert('Categoria excluida com sucesso!');
                        document.location.href = document.location.href;
                    }else if(data == 1451){
                        
                        swal("Erro ao excluir", "Este subcategoria está vinculado a um usuário. Favor, antes de excluir, desvincule.", "error"); 
                       
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
	<h1><?php foreach($preenche_dados -> result() as $dados):?> <img src="../../.<?php echo $dados->imagem;?>" class="img-circle" width="50px" height="50px"> <?php endforeach;?><?php echo $this->session->userdata('nome');?></h1>

        <?php 

            include 'C:\xampp\htdocs\cd\application\views\menu_head\administrador\menu.php';
        ?>

</head>
<body>

<div id="container">
	<h1>Manter Subcategoria</h1>
        <div id="body">

           <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="tabela1">
                <thead>
                    <tr>
                    <th style="text-align: center;">Código da Subcategoria</th>
                    <th style="text-align: center;">Nome da Subcategoria</th>
                    <th style="text-align: center;">Nome da Categoria</th>
                    <th style="text-align: center;">SLA</th>
                    <th style="text-align: center;">Opções</th>
                    </tr>
                </thead>
                <tbody>
                    
                <?php foreach ($consulta -> result() as $linha): ?> 
                    
                <tr>
                    <td style="text-align: center;"><?php echo $linha->idsubcategoria ?></td>
                    <td style="text-align: center;"><?php echo $linha->nomesubcategoria ?></td>
                    <td style="text-align: center;"><?php echo $linha->nomecategoria ?></td>
                    <td style="text-align: center;"><?php echo $linha->sla.' Horas' ?></td>
                    <td style="text-align: center;"><a style="text-align: center;" href="javascript:;"  onclick="janelaNovoCategoria(<?= $linha->idsubcategoria ?>)"><button type="button" class="glyphicon glyphicon-cog"></button></a><a style="text-align: center;" href="javascript:;"  onclick="confirma(<?= $linha->idsubcategoria ?>)"><button type="button" class="glyphicon glyphicon-trash"></button></a></td>
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
	      	
			<form role="form" method="post" action="<?= base_url('index.php/subcategoria/subcategoria_controller/salvar_subcategoria')?>" id="formulario_subcategoria">
                            
                          <div class="form-group">
			    <label for="categoria">Categoria</label>
                            <select class="form-control" name="categoria_fk" id="categoria_fk" required="required">
                                
                                <option value="">Selecione uma categoria</option>
                                
                                 <?php foreach ($categoria -> result() as $linha): ?> 
                                
                                <option value="<?php echo $linha->idcategoria?>"><?php echo $linha->nomecategoria?></option>
                                
                                <?php endforeach;?>
                                
                            </select>
			  </div>
                            
			  <div class="form-group">
			    <label for="nome">Nome do Subcategoria</label>
                            <input type="text"  class="form-control" id="nomesubcategoria"  name='nomesubcategoria'>
			  </div>
                            
                         <div class="form-group">
                            <label for="nome">SLA</label>
                            <select class="form-control" name="sla" id="sla" required="required">
                                   <option value="">Defina a SLA</option>
                                   <option value="1">1 Hora</option>
                                   <option value="2">2 Horas</option>
                                   <option value="4">4 Horas</option>
                                   <option value="8">8 Horas</option>
                                   <option value="16">16 Horas</option>
                                   <option value="24">1 Dia</option>
                                   <option value="48">2 Dias</option>
                                   <option value="72">3 Dias</option>
                                   <option value="168">1 Semana</option>
                                   <option value="336">2 Semanas</option>
                             </select>
                         </div>
			  <input type="hidden" name="idsubcategoria" id="idsubcategoria" value="" />
			</form>	    
			    
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="refresh()" >Fechar</button>
	       
               <button type="button" class="btn btn-primary" onclick="$('#formulario_subcategoria').submit()">Salvar</button>
	      </div>
	    </div>
	  </div>
	</div>
        
        
	<p class="footer"></p>
</div>
  
</body>
</html>
