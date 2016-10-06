<?php

class chamado_model extends CI_Model{
    
    function __construct() {
        
        parent::__construct();
        
    }    
    
    public function m_salvar_chamado() {
        
        //$dados = $this->input->post();
        
        $idchamado = $this->input->post("idchamado");
        $id = $this->session->userdata('id');
        
        if($idchamado != 0){
            
            $this->db->where("idchamado", $idchamado);
            
             $dados = array(
                 
                "usuarios_fk" => $id,
                "nomechamado" => $this->input->post('nomechamado'),
                "gravadora" => $this->input->post('gravadora'),
                "nome" => $this->input->post('nome'),
                "email" => $this->input->post('email'),
                "ramal" => $this->input->post('ramal'),
                "descricao" => $this->input->post('descricao'),
               // "subcategoria_fk" => $this->input->post('subcategoria_fk'),
               // "categoria_fk" => $this->input->post('categoria_fk'),
                "setor_fk" => $this->input->post('setor_fk'),
               // "datainicial" => $inicio,
               // "datafinal" => $fim
                
                
            );
            
            $query = $this->db->update("chamado", $dados);
            
        }else{
            
    
            $sla = $this->input->post('sla');
            
            $sla = (int)$sla;
            
            $inicio = date('Y-m-d H:i:s'); 
            $fim = date('Y-m-d H:i:s', strtotime("+$sla hours",strtotime($inicio))); 
          
            $dados = array(
                "usuarios_fk" => $id,
                "nomechamado" => $this->input->post('nomechamado'),
                "gravadora" => $this->input->post('gravadora'),
                "nome" => $this->input->post('nome'),
                "email" => $this->input->post('email'),
                "ramal" => $this->input->post('ramal'),
                "descricao" => $this->input->post('descricao'),
                "subcategoria_fk" => $this->input->post('subcategoria_fk'),
                "categoria_fk" => $this->input->post('categoria_fk'),
                "setor_fk" => $this->input->post('setor_fk'),
                "datainicial" => $inicio,
                "datafinal" => $fim
                
                
            );
            
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
            $this->db->join('categoria', 'chamado.categoria_fk = categoria.idcategoria');
            $this->db->join('subcategoria', 'chamado.subcategoria_fk = subcategoria.idsubcategoria');
            $this->db->where("idchamado", $idchamado);
            //$this->db->where("idchamado", $idchamado);
        }
        
        return $this->db->get();
        
    }
}
            