<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subcategoria_controller extends CI_Controller {
    
    
    function  exibir_subcategoria(){
        
        $this->load->model('subcategoria/subcategoria_model');
        
        $variaveis['consulta'] = $this->subcategoria_model->m_exibir_subcategoria();
        
        
        $this->load->model('categoria/categoria_model');
        
        $variaveis['categoria'] = $this->categoria_model->m_exibir_categoria();
        
        
        $this->load->helper('preenche_dados/preenche_dados_helper');
        
        $variaveis['preenche_dados'] = getPreencheDados();
        
        
        $this->load->helper('valida_login/valida_administrador_helper');
        
        $variaveis['validacao'] = getValidaAdministrador();
        
        
        $this->load->view('configuracao/subcategoria/subcategoria_view', $variaveis);
  }
  
    
    function salvar_subcategoria(){
        
        $this->load->model('subcategoria/subcategoria_model');
        
        $registro = $this->subcategoria_model->m_salvar_subcategoria();
        
        if($registro){
            
            echo 1;
            
        }else{
            
            echo 0;
            
        }
    }
        function dados_subcategoria(){
            
            $idsubcategoria = $this->input->post('idsubcategoria');
            
            $this->load->model('subcategoria/subcategoria_model');
        
            $consulta = $this->subcategoria_model->m_dados_subcategoria($idsubcategoria);
            
            
            if($consulta->num_rows() == 0){
                
                die('Categoria não encontrada.');
                
            }
            
            $array = array(
                'idsubcategoria'=>$consulta->row()->idsubcategoria,
                'nomesubcategoria'=>$consulta->row()->nomesubcategoria,
                'categoria_fk'=>$consulta->row()->categoria_fk,
            );
            
            echo json_encode($array);
            
        }
        
        function excluir_subcategoria($idsubcategoria){
            
            $this->load->model('subcategoria/subcategoria_model');
            
            $excluir = $this->subcategoria_model->m_excluir_subcategoria($idsubcategoria);
            
            if($excluir){
                
                echo 1;
                
            }else{
                
                echo 0;
                
            }
            
        }
        
        function ajax_dados_subcategoria($idcategoria){
            
            $this->load->model('subcategoria/subcategoria_model');
            
            $dados = $this->subcategoria_model->m_ajax_dados_subcategoria($idcategoria);
            
            $option = "<option value=''></option>";
            foreach($dados -> result() as $linha) {
            $option .= "<option value='$linha->idsubcategoria'>$linha->nomesubcategoria</option>"; 
            }

            echo $option;
            
        }
    
}
