<?php
class categoria_model extends CI_Model{
    
    function __construct() {
        
        parent::__construct();
        
    }
    
    function m_exibir_categoria($idcategoria = 0){
        
        if($idcategoria != 0){
            
            $this->db->where('idcategoria', $idcategoria);
            
        }
        
        return $this->db->get('categoria');
    }
    
    function m_salvar_categoria(){
        
        $idcategoria = $this->input->post('idcategoria');
        
        $dados = $this->input->post();
        
        if($idcategoria != 0){
            
            $this->db->where('idcategoria', $idcategoria);
            
            $retorno = $this->db->update('categoria', $dados);
            
        }else{
            
            $retorno = $this->db->insert('categoria', $dados);
            
        }
        
        if($retorno){
            
            return TRUE;
            
        }else{
            
            return FALSE;
            
        }
    }
    function m_excluir_categoria($idcategoria){
        
        $this->db->where('idcategoria', $idcategoria);
        
        if($this->db->delete('categoria')){
            
            return TRUE;
            
        }else{
            
            return FALSE;
            
        }
    }
    
    function m_dados_categoria($idcategoria){
        
        if($idcategoria != NULL){
            
            $this->db->where('idcategoria', $idcategoria);
            
        }
        
        return $this->db->get('categoria');
        
    }
    
    
}