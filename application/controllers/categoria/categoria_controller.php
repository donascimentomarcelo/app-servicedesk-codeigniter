<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categoria_controller extends CI_Controller {
    
    
    function  exibir_categoria(){
        
        $this->load->model('categoria/categoria_model');
        
        $variaveis['consulta'] = $this->categoria_model->m_exibir_categoria();
        
        
        $this->load->helper('preenche_dados/preenche_dados_helper');
        
        $variaveis['preenche_dados'] = getPreencheDados();
        
        
        $this->load->helper('valida_login/valida_administrador_helper');
        
        $variaveis['validacao'] = getValidaAdministrador();
        
        
        $this->load->view('configuracao/categoria/categoria_view', $variaveis);
  }
  
    
    function salvar_categoria(){
        
        $this->load->model('categoria/categoria_model');
        
        $registro = $this->categoria_model->m_salvar_categoria();
        
        if($registro){
            
            echo 1;
            
        }else{
            
            echo 0;
            
        }
    }
        function dados_categoria(){
            
            $idcategoria = $this->input->post('idcategoria');
            
            $this->load->model('categoria/categoria_model');
        
            $consulta = $this->categoria_model->m_dados_categoria($idcategoria);
            
            
            if($consulta->num_rows() == 0){
                
                die('Categoria não encontrada.');
                
            }
            
            $array = array(
                'idcategoria'=>$consulta->row()->idcategoria,
                'nomecategoria'=>$consulta->row()->nomecategoria
            );
            
            echo json_encode($array);
            
        }
        
        function excluir_categoria($idcategoria){
            
            $this->load->model('categoria/categoria_model');
            
            $excluir = $this->categoria_model->m_excluir_categoria($idcategoria);
            
            if($excluir){
                
                echo 1;
                
            }else{
                
                echo 0;
                
            }
            
        }
    
}
