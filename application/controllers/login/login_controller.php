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
                redirect('login/menu');
            }else{
                 $mensagem = array('class' => 'danger',
                    'mensagem' => 'Erro de autenticação!'
                );
                $dados = array('alerta' => $mensagem);

                $this->load->view('login/login_view', $dados);

            }
        }
    }
    public function sair(){
        
                $this->session->sess_destroy();
        
                 $mensagem = array('class' => 'success',
                    'mensagem' => 'Usuário deslogado!'
                );
                $dados = array('alerta' => $mensagem);

                $this->load->view('login/login_view', $dados);

    }
}

	