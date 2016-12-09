<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_controller extends CI_Controller {
    
    public function autenticar() {
        
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email', 'Email','required');
        $this->form_validation->set_rules('senha', 'Senha','required');
        $this->form_validation->set_error_delimiters('<p class="erro">','</p>');
        
        if($this->form_validation->run()== FALSE){
            
            $mensagem = array('class' => 'danger',
                    'mensagem' => 'Preencha os campos!'
                );
                $dados = array('alerta' => $mensagem);

                $this->load->view('login/login_view', $dados);
            
        }else{
            
            $this->load->model('login/login_model');
            $response = $this->login_model->buscaPorEmailSenha();
             
            if($response == 'StatusInativo')
            {
            $mensagem = array('class' => 'danger',
                    'mensagem' => '<strong>Usuário inativo!</strong><br> Entre em contato com o administrador do sistema.'
                );
                $dados = array('alerta' => $mensagem);

                $this->load->view('login/login_view', $dados);   
            }
            else
            {
            $mensagem = array('class' => 'danger',
                    'mensagem' => 'Erro de autenticação!'
                );
                $dados = array('alerta' => $mensagem);

                $this->load->view('login/login_view', $dados);
            }
        }
    }

    
    public function proteger() 
    {

        $this->load->model('login/login_model');
        $this->login_model->destroy_session();
   
        $mensagem = array('class' => 'danger',
            'mensagem' => '<strong>Usuário inexistente!</strong><br> Não tente burlar o sistema.'
        );

        $dados = array('alerta' => $mensagem);

        $this->load->view('login/login_view', $dados);
    }

    public function sair()
    {
        
        $this->load->model('login/login_model');
        $this->login_model->destroy_session();

        $mensagem = array('class' => 'success',
            'mensagem' => 'Usuário deslogado com sucesso!'
        );

        $dados = array('alerta' => $mensagem);

        $this->load->view('login/login_view', $dados);
    }
}

	