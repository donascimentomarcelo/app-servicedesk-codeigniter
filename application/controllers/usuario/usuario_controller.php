<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_controller extends CI_Controller {

    public function listar_usuario() {
        
        $this->load->model('usuario/usuario_model');
        
        $consulta = $this->usuario_model->exibe_usuario();
        
        $variaveis['consulta'] = $consulta;
        
        $this->load->view('usuario/manter_usuario_view',$variaveis);
        
    }
    
    public function salvar_usuario() {
        
        $this->load->model('usuario/usuario_model');
        
        $insert = $this->usuario_model->m_salvar_usuario();
        
        if($insert){
            
            echo 1;
            
        }else{
            
            echo 0;
            
        }
    }
    
}