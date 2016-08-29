<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class P_usuario extends CI_Controller {
    
    function __construct() {
        parent::__construct();
        $this->load->model("login/login_model");
        $this->login_model->logado();
    }
    
    public function index() {
        $this->load->view('perfil/usuario');
    }
}

	