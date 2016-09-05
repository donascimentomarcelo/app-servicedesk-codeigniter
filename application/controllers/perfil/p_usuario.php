<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class P_usuario extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model("login/login_model");
        $this->login_model->logado();
    }
    
    public function index() {
        
        $this->load->helper('valida_login/valida_usuario_helper');
      
        $variaveis['validacao'] = getValidaUsuario();
        
        $this->load->view('perfil/usuario', $variaveis);
    }
}

	