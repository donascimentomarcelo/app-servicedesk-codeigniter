<?php
class usuario_model extends CI_Model{
    
    function __construct() {
        
        parent::__construct();
        
    }   

    public function exibe_usuario($id = 0) {
        
        if($id != 0){
            
            $this->db->where('id',$id);
            
        }
        
        $retorno = $this->db->get('usuarios');
        
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
            $this->db->where('id',$id);
        }
        
        return $this->db->get('usuarios');
        
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