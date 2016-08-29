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
        $this->db->where('status', 'ativo');
        $this->db->limit(1);
        
        $usuario = $this->db->get();
        
        if($usuario->num_rows() == 1){
            return $usuario->result();
        }else{
            return FALSE;
        }
        
        
    }
    
     function logado() {
        
        $logado = $this->session->userdata('logado');
        
        if(!isset($logado)||$logado != true){
            redirect(base_url());
            die();
        }
        
    }
    
    function perfil(){
        
        $this -> db -> select('*');
        $this -> db -> from('usuarios');
        $this->db->where('email', $this->input->post('email'));
        $this->db->where('senha', $this->input->post('senha'));
        
        $dados = $this->db->get();
        
        return $dados;
    }
  
}
