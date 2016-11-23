<?php

class setor_model extends CI_Model{
    
    function __construct() {
        
        parent::__construct();
        
    }  
    
    function m_listar_setor($idsetor = 0){
        
        if($idsetor != 0){
            
            $this->db->where('idsetor', $idsetor);
            
        }
        
        $retorno = $this->db->get('setor');
        
        return $retorno;
        
    }
    
    function m_salvar_setor(){
        
        $dados = $this->input->post();
        
        $idsetor = $this->input->post('idsetor');
        
        if($idsetor != 0){
            
            $this->db->where('idsetor', $idsetor);
            
            $query = $this->db->update('setor', $dados);
            
        }else{
            
            $query = $this->db->insert('setor', $dados);
            
        }
        
        if($query){
            
            return TRUE;
            
        }else{
            
            return FALSE;
            
        }
        
    }
    
    function m_excluir_setor($idsetor = 0){
        
        $this->db->where('idsetor', $idsetor);
        
        $excluir = $this->db->delete('setor');
        
        if($excluir){
           
            return TRUE;
            
        }else{
            
            return $this->db->_error_number();
            
        }
        
    }
    
    function m_dados_setor($idsetor = NULL){
        
        if($idsetor != NULL){
            
            $this->db->where('idsetor', $idsetor);
            
        }
        
        $consulta = $this->db->get('setor');
        
        return $consulta;
        
    }
    
    public function m_active_sector() {
        
        $this->db->select('*');    
        $this->db->from('setor');
        $this->db->where('statussetor', 'ativo');

        $data = $this->db->get();
        
        foreach ($data -> result() as $row):
            
            $arr[]= array (
                
                    'idsetor'=>$row->idsetor,
                    'nomesetor'=>$row->nomesetor,
                    'statussetor'=>$row->statussetor
                
                );
        
        endforeach;

        return json_encode($arr);
        
    }
}