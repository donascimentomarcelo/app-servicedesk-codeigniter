<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Histórico de Chamado</title>

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link href="../../../../bootstrap/css/cd.css" rel="stylesheet" type="text/css"/>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
        <link href="../../../../bootstrap/css/cd.css" rel="stylesheet" type="text/css"/>
        
        <link href="../../../../bootstrap/css/jquery.dataTables.min_h.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="https://cdn.datatables.net/responsive/2.1.0/css/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        
        <script src="../../../../bootstrap/js/jquery.js" type="text/javascript"></script>
        <script src="../../../../bootstrap/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="../../../../bootstrap/js/jquery.form.js" type="text/javascript"></script>
        <script src="../../../../bootstrap/js/bootbox.js" type="text/javascript"></script>
        <script src="../../../../bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="../../../../bootstrap/js/jquery.forms.js" type="text/javascript"></script>
        <script src="../../../../bootstrap/js/bootbox.min.js" type="text/javascript"></script>
        
        <script src="../../../../bootstrap/js/jquery.validate.js" type="text/javascript"></script>
        
        <script src="../../../../sweet/sweetalert-dev.js" type="text/javascript"></script>
        <script src="../../../../sweet/sweetalert.min.js" type="text/javascript"></script>
        
        <link href="../../../../sweet/sweetalert.css" rel="stylesheet" type="text/css"/>
        
        <link href="../../../../craftpip-jquery/css/jquery-confirm.css" rel="stylesheet" type="text/css"/>
        <script src="../../../../craftpip-jquery/js/jquery-confirm.js" type="text/javascript"></script>
        
        <script type="text/javascript">
        
     
        
        $(document).ready(function(){
				$('table.display').dataTable();
                                
                                $(document).ready(function(){
                                     $('.dropdown-toggle').dropdown();
                        });
                        
                        $("#formulario_chamado").validate({
                            rules : {
                                  nomechamado:{
                                         required:true,
                                         minlength:3
                                  },
                                  gravadora:{
                                         required:true,
                                         minlength:3
                                  }                               
                            },
                            messages:{
                                  nomechamado:{
                                         required:"Informe o nome do CD!",
                                         minlength:"O nome deve ter pelo menos 3 caracteres"
                                  },
                                  gravadora:{
                                         required:"Informe a gravadora!",
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
        //http://t4t5.github.io/sweetalert/
        /*
    	 * Função que carrega após o DOM estiver carregado.
    	 * Como estou usando o ajaxForm no formulário, é aqui que eu o configuro.
    	 * Basicamente somente digo qual função será chamada quando os dados forem postados com sucesso.
    	 * Se o retorno for igual a 1, então somente recarrego a janela.
    	 */
    	$(function(){
    		$('#formulario_chamado').ajaxForm({
    			success: function(data) {
    				if (data == 1 || data == 11) {
    					
    					//Algo esta acontecendo no controller que está trazendo 11 no lugar de 1.
    					//Faço esse if com || pq preciso que atualize a pagina.
    					//se for sucesso, simplesmente recarrego a página. Aqui você pode usar sua imaginação.
                                        
    					//document.location.href = document.location.href;
                                        success: minhaCallCack();
                                        limparCampo();
				    	
    				}else{
                                    alert(data);
                                }
    			}
    		});
    	});
    
    	//Aqui eu seto uma variável javascript com o base_url do CodeIgniter, para usar nas funções do post.
    	var base_url = "<?= base_url() ?>";
    	
	    /*
	     *	Esta função serve para preencher os campos do cliente na janela flutuante
	     * usando jSon.  
	     */
    	function carregaDadosCdJSon(idchamado){
    		$.post(base_url+'/index.php/chamado/chamado_controller/dados_chamado', {
    			idchamado: idchamado
    		}, function (data){
    			$('#nomechamado').val(data.nomechamado);
    			$('#gravadora').val(data.gravadora);
    			$('#idchamado').val(data.idchamado);//aqui eu seto a o input hidden com o id do cliente, para que a edição funcione. Em cada tela aberta, eu seto o id do cliente. 
    			$('#nome').val(data.nome); 
    			$('#email').val(data.email); 
    			$('#ramal').val(data.ramal); 
    			$('#descricao').val(data.descricao); 
    			$('#nometec').val(data.nometec); 
    			$('#emailtec').val(data.emailtec); 
    			$('#ramaltec').val(data.ramaltec); 
                        $('#'+data.statuschamado).prop('checked', true);
    			$('#setor_fk').val(data.setor_fk); 
    			$('#subcategoria').val(data.subcategoria_fk); 
    			$('#categoria_fk').val(data.categoria_fk); 
    		}, 'json');
    	}
    
    	function janelaNovoCd(idchamado){
    		
    		//antes de abrir a janela, preciso carregar os dados do chamado e preencher os campos dentro do modal
    		carregaDadosCdJSon(idchamado);
                
                carregaTabelaJSon(idchamado);
    		//alert(idchamado);
    		
	    	$('#modalEditarCliente').modal('show');
    	}
        
         function carregaTabelaJSon(idchamado){
            $.post(base_url+'/index.php/chamado/chamado_controller/historico', {
    			idchamado: idchamado
    		}, function (data){
    		var items = [];
                $.each( data, function( key, val ) {
                  items.push( "<li id='" + key + "'>" + val + "</li>" );
                  alert(val);
                });

                $( "<ul/>", {
                  "class": "my-new-list",
                  html: items.join( "" )
                }).appendTo( "body" );
    		}, 'json');
    	}
        
        function limparCampo(){
            $("#idchamado").val(''); 
            $("#nomechamado").val(''); 
            $("#gravadora").val(''); 
        }
        
        function carregaDadosNovoJSon(id){
    		$.post(base_url+'/index.php/usuario/usuario_controller/dados_usuario', {
    			id: id
    		}, function (data){
    			$('#nome').val(data.nome); 
    			$('#email').val(data.email); 
    			$('#ramal').val(data.ramal); 
    			$('#setor_fk').val(data.setor_fk); 
    		}, 'json');
    	}
        
        function amarrar(id){
    		$.post(base_url+'/index.php/usuario/usuario_controller/dados_usuario', {
    			id: id
    		}, function (data){
    			$('#idtec').val(data.id); 
    			$('#nometec').val(data.nome); 
    			$('#emailtec').val(data.email); 
    			$('#ramaltec').val(data.ramal);  
    		}, 'json');
    	}
        
    	function novo(id){
            // na função limparCampo() eu apago os valores que estão no modal
            // devido ter aberto o modal anteriormente, fica salvo os valores.
                carregaDadosNovoJSon(id);
            
    		$('#modalEditarCliente').modal('show');
    	}
        
        function confirma(idchamado){
        resposta = confirm("Deseja realmente excluir esse aluno?");
        if (resposta){
            $.ajax({
                type: "POST",
                data: {
                    idchamado: idchamado
                },
                
                url: "http://localhost/cd/index.php/chamado/chamado_controller/excluir_chamado/"+idchamado,
                success: function(data) {
                    if(data == 1 || data == 11){
                        swal("Excluído!", "Dado excluída com sucesso!", "success"); 
                    }else{
                        swal("Erro ao excluir", "Houve algum erro ao excluir!", "error"); 
                        alert("Houve algum erro ao excluir!");
                    }
                },
                error: function(){
                    alert("Houve algum erro ao excluir!");
                }
            });
        }
    }

        function refresh(){
            //document.location.href = document.location.href;
            location.reload();
        }
        
        
        
        function buscar_subcategoria(idcategoria){
          $.post(base_url+"/index.php/subcategoria/subcategoria_controller/ajax_dados_subcategoria", {
            idcategoria : idcategoria
            }, function(data){
            $('#subcategoria').html(data);
            });
        }
        
        function buscar_sla(idsubcategoria){
          $.post(base_url+"/index.php/subcategoria/subcategoria_controller/ajax_dados_sla", {
            idsubcategoria : idsubcategoria
            }, function(data){
            $('#sla').html(data);
            });
        }
        
        $(function(){
	$("#amarrar").click(function(){
		$("#salvar").removeAttr('disabled');
	});	
})
        </script>

</head>
<body>

<div id="container">
    <h1><?php foreach($preenche_dados -> result() as $dados):?> <img src="../../../.<?php echo $dados->imagem;?>" class="img-circle" width="50px" height="50px"> <?php endforeach;?> <?php echo $this->session->userdata('nome');?> </h1>

              <?php if($this->session->userdata('perfil') == 'administrador'){
              
                  include 'C:\xampp\htdocs\cd\application\views\menu_head\administrador\menu.php';
             
              }else{
                  
                  include 'C:\xampp\htdocs\cd\application\views\menu_head\usuario\menu.php';
            
              }
              ?>

<div id="container">
	
        <div id="body">
            
             <div id="atendimento">
               <nav class="navbar navbar-inverse">
                    <div class="navbar-header">
                      <a class="navbar-brand" href="#">Histórico detalhado dos chamados</a>
                    </div>
                 
              </nav>
      
         
          </div>
	</div>
        
         <!--START MODAL-->
         <div class="row">
         <div class="col-xs-12 col-md-8">
         <div class="modal-dialog" style="margin-left: 4%; width: 70%;">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h4 class="modal-title">Dados do Chamado</h4>
	      </div>
                <ul class="nav nav-tabs">
                        <li class="active"><a href="#first-tab" data-toggle="tab">Dados do chamado</a></li>
                        <li><a href="#second-tab" data-toggle="tab">Dados do Usuário</a></li>
                        <li><a href="#fourth-tab" data-toggle="tab">Histórico</a></li>
                </ul>
	      <div class="modal-body">
                <form role="form"  id="formulario_chamado">
                    <?php foreach($historico_detalhado -> result() as $linha):?>
                        <div class="tab-content">
                            <div class="tab-pane active in" id="first-tab">
			  <div class="form-group">
			    <label for="nome">Título do Chamado</label>
			    <input type="text" class="form-control" id="nomechamado" value="<?php echo $linha->nomechamado?>"  name='nomechamado'>
			  </div>
                            
			 
                            <div class="form-group">
			    <label for="categoria">Categoria</label>
                            <select class="form-control" name="categoria_fk" id="categoria_fk" required="required" onchange='buscar_subcategoria($(this).val())'>
                                
                                <option value="<?php echo $linha->categoria_fk?>"><?php echo $linha->nomecategoria?></option>
                                <!--AQUI!-->
                                 <?php foreach ($categoria -> result() as $linha1): ?> 
                                
                                <option value="<?php echo $linha1->idcategoria?>"><?php echo $linha1->nomecategoria?></option>
                                
                                <?php endforeach;?>
                                
                            </select>
			  </div>
                            
                             
                            <div class="form-group">
                            <label for="exampleSelect1">Subcategoria</label>
                            
                            <select class="form-control" name="subcategoria_fk" id="subcategoria" required="required" onchange='buscar_sla($(this).val())'>
                             <option value="<?php echo $linha->subcategoria_fk?>"><?php echo $linha->nomesubcategoria?></option>
                                <!--AQUI!-->
                                 <?php foreach ($subcategoria -> result() as $linha2): ?> 
                                
                                <option value="<?php echo $linha2->idsubcategoria?>"><?php echo $linha2->nomesubcategoria?></option>
                                
                                <?php endforeach;?>
                            </select>
                          </div>
                                <div id="sla" class="form-group">
                               
                                </div>     
                                
                          <div class="form-group">
                            <label for="exampleTextarea">Descrição</label>
                            <textarea class="form-control" id="descricao" name="descricao" rows="3" ><?php echo $linha->descricao?></textarea>
                          </div>
                            
			  <input type="hidden" name="idchamado" id="idchamado" value="" />
                          
                          </div>
                          <div class="tab-pane" id="second-tab">
                          
                                <div class="form-group">
                                    <label for="nome">Nome do Solicitante</label>
                                    <input type="text" class="form-control" id="nome" value="<?php echo $linha->nome?>"  name='nome'readonly="true">
                                </div>
                                <div class="form-group">
                                    <label for="nome">Ramal</label>
                                    <input type="text" class="form-control" id="ramal" value="<?php echo $linha->ramal?>"  name='ramal' readonly="true">
                                </div>
                              
                           <div class="form-group">
			    <label for="setor">Setor</label>
                            <select class="form-control" name="setor_fk" id="setor_fk" disabled="true">
                                
                                  <option value="<?php echo $linha->setor_fk?>"><?php echo $linha->nomesetor?></option>
                                
                                 <?php foreach ($setor_ativo -> result() as $linha1): ?> 
                                
                                <option value="<?php echo $linha->idsetor?>"><?php echo $linha->nomesetor?></option>
                                
                                <?php endforeach;?>
                                
                            </select>
			  </div>
                             <div class="form-group">
                                    <label for="nome">E-mail</label>
                                    <input type="text" class="form-control" id="email" value="<?php echo $linha->email?>"  name='email' readonly="true">
                                </div>
                         </div>  
                            
                           
                            <div class="tab-pane" id="fourth-tab">
                              
                                <table class="display table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="">
                                    <thead>
                                        <tr>
                                        <th style="text-align: center;">Técnico</th>
                                        <th style="text-align: center;">Ramal</th>
                                        <th style="text-align: center;">E-mail</th>
                                        <th style="text-align: center;">Data</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php foreach ($historico -> result() as $coluna):  ?> 

                                    <tr>
                                        <td style="text-align: center;"><?php echo $coluna->nometecnico?></td>
                                        <td style="text-align: center;"><?php echo $coluna->ramaltecnico?></td>
                                        <td style="text-align: center;"><?php echo $coluna->emailtecnico?></td>
                                        <td style="text-align: center;"><?php echo $coluna->data?></td>
                                    </tr>
                                    
                                    <?php endforeach;?>
                                    
                                    </tbody>
                                </table>
                            </div>
                        </div>  
                    </form>	    
                <?php endforeach;?>
                 
	      </div>
	      <div class="modal-footer">
                  <?php $id = $this->session->userdata('id')?>
	        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="refresh()" >Fechar</button>
              
	        <button type="button" id="amarrar" class="btn btn-default" onclick="amarrar(<?= $id?>)">Amarrar</button>
                
	       
              <!-- <button type="button" id="salvar" class="btn btn-primary"  disabled="disabled" onclick="$('#formulario_chamado').submit()">Salvar</button>-->
               <button type="button" id="salvar" class="btn btn-primary"   onclick="$('#formulario_chamado').submit()">Salvar</button>
	      </div>
	    </div>
	  </div>
          </div>
          <div class="col-xs-6 col-md-4" style="margin-left: -20%;">   
          <div style="margin-left: 5%;margin-top: 4%; width: 160%;">
                      
                      <table class="display table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="">
                                    <thead>
                                        <tr>
                                        <th style="text-align: center;">Técnico</th>
                                        <th style="text-align: center;">Ramal</th>
                                        <th style="text-align: center;">Data</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php  ?> 

                                    <tr>
                                        <td style="text-align: center;"></td>
                                        <td style="text-align: center;"></td>
                                        <td style="text-align: center;"></td>
                                    </tr>
                                    </tbody>
                                </table>
                      
                  </div>	    
        </div>
</div>
        
	<p class="footer"><a href="javascript: history.back()">Voltar</a> <strong>{elapsed_time}</strong> seconds</p>
</div>

</body>
</html>
