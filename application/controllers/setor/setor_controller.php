<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setor_controller extends CI_Controller {
    
    function listar_setor(){
        
        $this->load->model('setor/setor_model');
        
        $variaveis['resultado'] = $this->setor_model->m_listar_setor();
        
        
        $this->load->helper('preenche_dados/preenche_dados_helper');
        
        $variaveis['preenche_dados'] = getPreencheDados();
        
        
        $this->load->view('configuracao/setor/setor_view', $variaveis);
        
    }
    
    function salvar_setor(){
        
        $this->load->model('setor/setor_model');
        
        $resultado = $this->setor_model->m_salvar_setor();
        
        if($resultado){
            
            echo 1;
            
        }else{
            
            echo 0;
            
        }
        
    }
    
    function excluir_setor($idsetor){
        
        $this->load->model('setor/setor_model');
        
        $resultado = $this->setor_model->m_excluir_setor($idsetor);
        
        if($resultado == 0){
            
            echo 1;
            
        }else{
            
            echo $resultado;
            
        }
        
    }
    
    function dados_setor(){
        
        $idsetor = $this->input->post('idsetor');
        
        $this->load->model('setor/setor_model');
        
        $consulta = $this->setor_model->m_dados_setor($idsetor);
        
        if($consulta->num_rows() == 0){
            die('Setor não encontrado.');
        }
        
        $array_setor = array(
            
            'idsetor'=>$consulta->row()->idsetor,
            'nomesetor'=>$consulta->row()->nomesetor,
            'statussetor'=>$consulta->row()->statussetor
        
                );
        
        echo json_encode($array_setor);
    }
    
    
    public function loadSector() {
        
        $this->load->model('setor/setor_model');
        
        echo $this->setor_model->m_loadSector();
        
    }
    
    public function active_sector()
    {
    	
    	$this->load->model('setor/setor_model');

       	echo $this->setor_model->m_active_sector();
       
    }   
    
}