<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_controller extends CI_Controller {
    
    public function autenticar() {
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email','required');
        $this->form_validation->set_rules('senha', 'Senha','required');
        $this->form_validation->set_error_delimiters('<p class="erro">','</p>');
        
        
        $this->load->model('login/login_model');
        $usuario = $this->login_model->buscaPorEmailSenha();
        
        if($this->form_validation->run()== FALSE){
            $this->load->view('login/login_view');
        }else{
            if($usuario){
                $data = array(
                    'email' =>  $this->input->post('email'),
                    'logado' => true
                );
                $this->session->set_userdata($data);
                redirect('login/area_restrita');
            }else{
                redirect($this->index());
            }
        }
       /* 
        $email = $this->input->post('email');
        $senha = $this->input->post('senha');
        //$usuario = $this->login_model->buscaPorEmailSenha($email, $senha);
        
        if($usuario){
            $this->session->set_userdata("usuario_logado",$usuario);
            //$dados = array("mensagem" =>"logado com sucesso");
            $this->load->view("welcome_message");
        }else{
            //$dados = array("mensagem" =>"Erro ao logar");
            echo $usuario;
            $this->load->view("mensagem/erro");
        }
     */   
    }
}

	