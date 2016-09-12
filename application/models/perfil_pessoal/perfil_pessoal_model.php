<?php
class perfil_pessoal_model extends CI_Model{
    
    function __construct() {
        
        parent::__construct();
        
    }   
    
    public function exibe_usuario() {
        
            $this->db->select('*');    
            $this->db->from('usuarios');
            $this->db->join('setor', 'usuarios.setor_fk = setor.idsetor');
       
            $retorno = $this->db->get();

            return $retorno;
        
    }
    
    public function m_salvar_usuario() {
        
       $dados = $this->input->post();
       
       $id = $this->input->post('id');
       
       if($id != 0){
           
           $this->db->set('nome', $this->input->post('nome'));
           $this->db->set('email', $this->input->post('email'));
           $this->db->set('senha', $this->input->post('senha'));
           $this->db->set('setor_fk', $this->input->post('setor_fk'));
           
           $this->db->where('id',$id);
           
           $query = $this->db->update('usuarios',$dados);
           
       }else{
           
           redirect('perfil/p_administrador');
           
       }
       
       if($query){
           
           return TRUE;
           
       }else{
           
           return FALSE;
           
       }
    }
    
    public function m_list_usuario($id = NULL){
        
        if($id != NULL){
            
            $this->db->select('*');    
            $this->db->from('usuarios');
            $this->db->join('setor', 'usuarios.setor_fk = setor.idsetor');
            $this->db->where('id',$id);
        }
        
        return $this->db->get();
        
    }
    
}