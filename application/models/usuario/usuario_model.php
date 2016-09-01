<?php
class usuario_model extends CI_Model{
    
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
    
    function setor_ativo(){
        
            $this->db->select('*');    
            $this->db->from('setor');
            $this->db->where('statussetor', 'ativo');
       
            $retorno = $this->db->get();

            return $retorno;
        
    }
    
    public function m_salvar_usuario() {
        
       $dados = $this->input->post();
       
       $id = $this->input->post('id');
       
       if($id != 0){
           
           $this->db->where('id',$id);
           
           $query = $this->db->update('usuarios',$dados);
           
       }else{
           
           $query = $this->db->insert('usuarios',$dados);
           
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
            //$this->db->join('setor', 'usuarios.setor_fk = setor.idsetor');
            $this->db->where('id',$id);
        }
        
        return $this->db->get();
        
    }
    
    public function del_usuario($id) {
        
        $this->db->where('id', $id);
        
        if($this->db->delete('usuarios')){
            
            return TRUE;
            
        }else{
            
            return FALSE;
        }
        
    }
}