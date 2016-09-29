<?php
class subcategoria_model extends CI_Model{
    
    function __construct() {
        
        parent::__construct();
        
    }
    
    function m_exibir_subcategoria(){
        
            $this->db->select('*');    
            $this->db->from('subcategoria');
            $this->db->join('categoria', 'subcategoria.categoria_fk = categoria.idcategoria');
            
        return $this->db->get();
    }
    
    function m_salvar_subcategoria(){
        
        $idsubcategoria = $this->input->post('idsubcategoria');
        
        $dados = $this->input->post();
        
        if($idsubcategoria != 0){
            
            $this->db->where('idsubcategoria', $idsubcategoria);
            
            $retorno = $this->db->update('subcategoria', $dados);
            
        }else{
            
            $retorno = $this->db->insert('subcategoria', $dados);
            
        }
        
        if($retorno){
            
            return TRUE;
            
        }else{
            
            return FALSE;
            
        }
    }
    function m_excluir_subcategoria($idsubcategoria){
        
        $this->db->where('idsubcategoria', $idsubcategoria);
        
        if($this->db->delete('subcategoria')){
            
            return TRUE;
            
        }else{
            
            return FALSE;
            
        }
    }
    
    function m_dados_subcategoria($idsubcategoria){
        
        if($idsubcategoria != NULL){
            
            $this->db->select('*');    
            $this->db->from('subcategoria');
            $this->db->join('categoria', 'subcategoria.categoria_fk = categoria.idcategoria');
            $this->db->where('idsubcategoria', $idsubcategoria);
            
        }
        
        return $this->db->get();
        
    }
    
    
}