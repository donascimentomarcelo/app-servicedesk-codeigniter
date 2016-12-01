<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setor_controller extends CI_Controller {
    
    function listar_setor(){
        
        $this->load->model('setor/setor_model');
       
        $this->load->helper('preenche_dados/preenche_dados_helper');
        
        $variaveis['preenche_dados'] = getPreencheDados();
        
        
        $this->load->view('configuracao/setor/setor_view', $variaveis);
        
    }

    public function loadSector() 
    {
        
        $this->load->model('setor/setor_model');
        
        echo $this->setor_model->m_loadSector();
        
    }
    
    public function active_sector()
    {
    	
    	$this->load->model('setor/setor_model');

       	echo $this->setor_model->m_active_sector();
       
    }   
    
    public function save_or_edit_sector()
    {
        
        $this->load->model('setor/setor_model');

       	echo $this->setor_model->m_save_or_edit_sector();
        
    }
    
}