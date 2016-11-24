<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_controller extends CI_Controller {

    public function listar_usuario() {
        
        $this->load->helper('valida_login/valida_administrador_helper');
        
        $variaveis['validacao'] = getValidaAdministrador();
        
       
        $this->load->helper('preenche_dados/preenche_dados_helper');
        
        $variaveis['preenche_dados'] = getPreencheDados();
     
        
        $this->load->view('usuario/manter_usuario_view',$variaveis);
        
    }
    
    function list_user(){
        
        $this->load->model('usuario/usuario_model');
        
        echo $this->usuario_model->m_list_user();
        
    }
    
    public function insert_or_edit_user() {
        
        $this->load->model('usuario/usuario_model');
   
        echo $this->usuario_model->m_insert_or_edit_user();
        
    }
    
}