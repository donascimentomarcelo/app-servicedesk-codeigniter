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
                        
                       
                     });
		
    	var base_url = "<?= base_url() ?>";

    	function carregaDadosCdJSon(idhistorico){
    		$.post(base_url+'/index.php/chamado/chamado_controller/historico_datalhado', {
    			idhistorico: idhistorico
    		}, function (data){
                        if(data.justificativa == '0'){
                        $('#justificativa').val(data.justificativa = 'Nenhuma justificativa encontrada.') ;   
                        }else{
    			$('#justificativa').val(data.justificativa);
                    }
    		}, 'json');
    	}
    
    	function janelaDescricao(idhistorico){
    		
    		carregaDadosCdJSon(idhistorico);
                //alert(idhistorico);
    		
	    	$('#modalEditarCliente').modal('show');
    	}

        function refresh(){
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
        <div class="" id="modalUsuario" data-backdrop="static">
	      <div class="modal-header">
	        <h4 class="modal-title">Dados do Chamado  <?php foreach($historico_detalhado -> result() as $linha): echo $linha->idchamado; endforeach?></h4>
	      </div>
                <ul class="nav nav-tabs">
                        <li class="active"><a href="#first-tab" data-toggle="tab">Dados do chamado</a></li>
                        <li><a href="#second-tab" data-toggle="tab">Dados do Usuário</a></li>
                        <li><a href="#fourth-tab" data-toggle="tab">Histórico</a></li>
                        <li><a href="#fifth-tab" data-toggle="tab">Justificativas</a></li>
                </ul>
	      <div class="modal-body">
                <form role="form"  id="formulario_chamado">
                    <?php foreach($historico_detalhado -> result() as $linha):?>
                        <div class="tab-content">
                            <div class="tab-pane active in" id="first-tab">
			  <div class="form-group">
			    <label for="nome">Título do Chamado</label>
			    <input type="text" class="form-control" id="nomechamado" value="<?php echo $linha->nomechamado?>"  readonly="true"  name='nomechamado' >
			  </div>
                            
			 
                            <div class="form-group">
			    <label for="categoria">Categoria</label>
                            <select class="form-control" name="categoria_fk" id="categoria_fk" required="required" onchange='buscar_subcategoria($(this).val())' disabled >
                                
                                <option value="<?php echo $linha->categoria_fk?>"><?php echo $linha->nomecategoria?></option>
                                <!--AQUI!-->
                                 <?php foreach ($categoria -> result() as $linha1): ?> 
                                
                                <option value="<?php echo $linha1->idcategoria?>"><?php echo $linha1->nomecategoria?></option>
                                
                                <?php endforeach;?>
                                
                            </select>
			  </div>
                            
                             
                            <div class="form-group">
                            <label for="exampleSelect1">Subcategoria</label>
                            
                            <select class="form-control" name="subcategoria_fk" id="subcategoria" required="required" onchange='buscar_sla($(this).val())' disabled>
                             <option value="<?php echo $linha->subcategoria_fk?>"><?php echo $linha->nomesubcategoria?></option>
                                
                            </select>
                          </div>
                                <div id="sla" class="form-group">
                               
                                </div>     
                                
                          <div class="form-group">
                            <label for="exampleTextarea">Descrição</label>
                            <textarea class="form-control" id="descricao" name="descricao" rows="3" maxlength="499" readonly="true"><?php echo $linha->descricao?></textarea>
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
                                        <th style="text-align: center; width: 18px;">Técnico</th>
                                        <th style="text-align: center; width: 10px;">Ramal</th>
                                        <th style="text-align: center; width: 20px;">E-mail</th>
                                        <th style="text-align: center; width: 12px;">Data</th>
                                        <th style="text-align: center; width: 18px;">Status</th>
                                        <th style="text-align: center; width: 50%;">Justificativa</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    <?php foreach ($historico -> result() as $coluna):  ?> 

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
                            <div class="tab-pane" id="fifth-tab">
                                <h1 style="text-align: center;">Histórico de chamados</h1>
                                 <?php foreach ($historico -> result() as $coluna):?> 
                                
                                <div class="row">
                                    <div class="col-xs-9"><b>Nome</b>: <?php echo $coluna->nometecnico ?></div>
                                    <div class="col-xs-6"><b>Status</b>: <?php echo $coluna->statuschamado; ?></div>
                                    <div class="col-xs-9"><b>Data</b>: <?php $i = $coluna->data; echo date('d/m/Y H:i:s', strtotime($i));?></div>
                                    <div class="col-xs-4"><div id="divjustificativa"><b>Justificativa</b>: <?php $i = $coluna->justificativa;
                                     if($i != '0'){
                                            
                                        echo $i;
                                        
                                        }else{
                                            
                                            echo'Nenhuma justificativa encontrada.';
                                        }
                                    ?></div></div>
                                </div>
                                    <hr align="center" width="100%" size="2" color=#00000>
                                  
                                 <?php endforeach;?>
                            </div>
                        </div>  
                    </form>	    
                <?php endforeach;?>
                  
                <!--MODAL DESCRIÇÃO--> 
                
                 <div class="modal fade bs-example-modal-lg" id="modalEditarCliente" >
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title">Justificativa</h4>
                        </div>
                        
                        <div class="modal-body">
                                <form role="form" id="formulario_chamado">
                                  <div class="form-group">
                                  
                                  <textarea class="form-control" id="justificativa" name="justificativa" rows="3" maxlength="499" readonly="true"></textarea>
                                  </div>
                              </form>	    
                        </div>
                          
                        <div class="modal-footer">
                            
                          <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>

                        </div>
                      </div>
                    </div>
                  </div>
                
                <!--MODAL DESCRIÇÃO--> 
                  
	      </div>
	      <div class="modal-footer">
                
	        <button type="button" class="btn btn-default" data-dismiss="modal" onclick="refresh()" >Atualizar</button>
             
	      </div>
	    </div>
	  </div>
          </div>
        
	<p class="footer"><a href="javascript: history.back()">Voltar</a> <strong>{elapsed_time}</strong> seconds</p>
</div>
<style type="text/css">

</style>
</body>
</html>
