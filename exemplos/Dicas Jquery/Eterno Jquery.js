  $(document).ready(function(){
                    $('.dropdown-toggle').dropdown();
                        });
                        
     $(document).ready(function(){
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
        
    $(document).ready(function(){
            $('table.display').dataTable();
    });
    $(document).ready(function(){
            $('#tabela').dataTable({
                
             
                
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
    					
    					//Algo esta acontecendo no controller que está trazendo 11 no lugar de 1.
                                        
    					//document.location.href = document.location.href;
                                        success: minhaCallCack();
                                        //limparCampo();
				    	
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
    			$('#idchamado').val(data.idchamado);//aqui eu seto a o input hidden com o id do cliente, para que a edição funcione. Em cada tela aberta, eu seto o id do cliente. 
    			$('#nome').val(data.nome); 
    			$('#codusuario').val(data.codusuario); 
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
                        
                if( data.statuschamado == 'ematendimento'){
                        $("#salvar").removeAttr('disabled');
                        $("#amarrar").hide();
                }else{
                        $("#salvar").addAttr('disabled');
                }
                        
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
    		var buscarvalor = '';

                for(var i in data['justificativa','nometecnico','statuschamado', 'data']){
                    if(data['justificativa'][i] == '0'){
                        data['justificativa'][i] = 'Nenhuma Justificativa a exibir.';
                    }
                    buscarvalor += '<div id="divjustificativa"><span><u><b>Responsável:</b></u> '+data['nometecnico'][i]+'</span><br><span> <u><b>Status:</b></u> '+data['statuschamado'][i]+'</span><br><span> <u><b>Data:</b></u> '+data['data'][i] +'</span><br> <u><b>Justificativa:</b></u> ' + data['justificativa'][i] + '</div><br>';
                }

                $('.add-info').html(buscarvalor);

                // console.log(data);

    		}, 'json');
    	}
        
        function limparCampo(){
            $("#idchamado").val(''); 
            $("#nomechamado").val(''); 
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
    			$('#codusuario').val(data.id); 
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
        });
        
         $(function(){
            $(".allinput input:radio").click(function(){
                for( i=0; i < $(this).length; i++ ){
                    if($(this).is(":checked")){
                        if($(this).val() == 'encerrar' || $(this).val() == 'aguardando'){
                          $("#justificativa").removeAttr("disabled");               
                        } else{
                          $("#justificativa").attr("disabled","disabled");
                        }
                     }
                 }                     
            });
            
        });