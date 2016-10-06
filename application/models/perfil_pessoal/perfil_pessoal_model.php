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
    
       public function atualizar_perfil($imagem) {
        
        if(empty($imagem)){
            
             $id = $this->input->post('id');
             
             $dados = array (
            
            'nome' => $this->input->post('nome'),
            'email' => $this->input->post('email'),
            'email' => $this->input->post('email'),
            'ramal' => $this->input->post('ramal'),         
            'setor_fk' => $this->input->post('setor_fk')        
          
        );
       
       if($id != 0){
           
           $this->db->where('id',$id);
           
           $query = $this->db->update('usuarios',$dados);
           
       }else{
           
           $query = $this->db->insert('usuarios',$dados);
           
       }
            
        }else{
        
        $dados = array (
            
            'nome' => $this->input->post('nome'),
            'email' => $this->input->post('email'),
            'senha' => $this->input->post('senha'),         
            'ramal' => $this->input->post('ramal'),         
            'setor_fk' => $this->input->post('setor_fk'),         
            'imagem' => $imagem        
          
        );
       
       $id = $this->input->post('id');
       
       if($id != 0){
           
           $this->db->where('id',$id);
           
           $query = $this->db->update('usuarios',$dados);
           
       }else{
           
           $query = $this->db->insert('usuarios',$dados);
           
       }
       
       
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