<?php

class cd_model extends CI_Model{
    
    function __construct() {
        
        parent::__construct();
        
    }    
    
    public function m_salvar_cd() {
        
        $dados = $this->input->post();
        
        $idcd = $this->input->post("idcd");
        
        if($idcd != 0){
            
            $this->db->where("idcd", $idcd);
            
            $query = $this->db->update("cd", $dados);
            
        }else{
            
            $query = $this->db->insert("cd", $dados);
            
            echo $query;
            
        }
        
        if($query){
            
            return TRUE;
            
        }else{
            
            return FALSE;
            
        }
        
    }
    
    public function exibe_cd($idcd = 0){
        
        if($idcd != 0){
            
            $this->db->where("idcd", $idcd);
        
        }    
            
            $retorno = $this->db->get("cd");
            
            return $retorno;
        
        
    }
}
