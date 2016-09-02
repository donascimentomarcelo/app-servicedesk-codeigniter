<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perfil_pessoal_library extends CI_Controller {

function setor_ativo(){
        
        $this->load->model('usuario/usuario_model');
        
        $setor_ativo = $this->usuario_model->setor_ativo();
        
        return $setor_ativo;
    }
}