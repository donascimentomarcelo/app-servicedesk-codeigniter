<?php

class chamado_model extends CI_Model{
    
    function __construct() {
        
        parent::__construct();
        
    }    
    
    public function m_salvar_chamado() {
        
        $dados = $this->input->post();
        
        $idchamado = $this->input->post("idchamado");
        
        if($idchamado != 0){
            
            $this->db->where("idchamado", $idchamado);
            
            $query = $this->db->update("chamado", $dados);
            
        }else{
            
            $query = $this->db->insert("chamado", $dados);
            
            echo $query;
            
        }
        
        if($query){
            
            return TRUE;
            
        }else{
            
            return FALSE;
            
        }
        
    }
    
    public function exibe_chamado($idchamado = 0){
        
        if($idchamado != 0){
            
            $this->db->where("idchamado", $idchamado);
        
        }    
            
            $retorno = $this->db->get("chamado")->result_array();
            
            return $retorno;
        
        
    }
    
    public function excluir($idchamado) {
        
        $this->db->where('idchamado',$idchamado);
        
        if($this->db->delete("chamado")){
            
            return TRUE;
            
        }else{
            
            return FALSE;
            
        }
        
    }
    
    public function m_list_chamado($idchamado = NULL) {
        
        if($idchamado != NULL){
            $this->db->select('*');    
            $this->db->from('chamado');
            $this->db->join('usuarios', 'chamado.usuarios_fk = usuarios.id');
            $this->db->join('setor', 'chamado.setor_fk = setor.idsetor');
            $this->db->where("idchamado", $idchamado);
        }
        
        return $this->db->get();
        
    }
}
            