<?php

class login_model extends CI_Model{
    
    function __construct() {
        
        parent::__construct();
        
    }  
    
     function buscaPorEmailSenha(){
         
        
        $this -> db -> select('*');
        $this -> db -> from('usuarios');
        $this->db->where('email', $this->input->post('email'));
        $this->db->where('senha', $this->input->post('senha'));
        $this->db->limit(1);
        
        $usuario = $this->db->get();
        
        if($usuario->num_rows() == 1){
            return $usuario->result();
        }else{
            return FALSE;
        }
        //return $usuario;
        
    }
    
     function logado() {
        
        $logado = $this->session->userdata('logado');
        
        if(!isset($logado)||$logado != true){
            echo 'voce não tem permissao';
            die();
        }
        
    }
  
}
