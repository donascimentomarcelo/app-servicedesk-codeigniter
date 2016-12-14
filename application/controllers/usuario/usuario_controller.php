<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_controller extends CI_Controller {

    public function listar_usuario() 
    {
        
        $this->load->helper('valida_login/valida_administrador_helper');
        
        $variaveis['validacao'] = getValidaAdministrador();
        
       
        $this->load->helper('preenche_dados/preenche_dados_helper');
        
        $variaveis['preenche_dados'] = getPreencheDados();
     
        
        $this->load->view('usuario/manter_usuario_view',$variaveis);
        
    }
    
    function list_user()
    {
        
        $this->load->model('usuario/usuario_model');
        
        echo $this->usuario_model->m_list_user();
        
    }
    
    public function insert_or_edit_user()
    {
        
        $_POST = json_decode(file_get_contents('php://input'), true);
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('nome', 'Nome','required');
        $this->form_validation->set_rules('email', 'Email','required');
        $this->form_validation->set_rules('senha', 'Senha','required');
        $this->form_validation->set_rules('ramal', 'Ramal','required');
        $this->form_validation->set_rules('nomesetor', 'Setor','required');
        $this->form_validation->set_rules('perfil', 'Perfil','required');
        $this->form_validation->set_rules('status', 'Status','required');
        
        if($this->form_validation->run()== FALSE)
        {
            
            echo json_encode(
                    array(
                        'class' => 'alert alert-danger alert-dismissible alert-content-grid-mdl-grid fade in',
                        'message' => 'Preencha todos os campos!'
                        )
                    );
            
        }
        else
        {
        
            $this->load->model('usuario/usuario_model');
   
            $this->usuario_model->m_insert_or_edit_user();

            echo  json_encode(
                        array(
                            'class' => 'alert alert-success alert-dismissible alert-content-grid-mdl-grid fade in',
                            'message' => 'Operação realizada com sucesso!'
                            )
                        );
        
        }
    }
    
}