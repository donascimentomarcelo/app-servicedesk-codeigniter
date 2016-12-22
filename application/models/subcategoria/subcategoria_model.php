<?php
class subcategoria_model extends CI_Model{
    
    function __construct() {
        
        parent::__construct();
        
    }
    
    function MLoadSubcategory(){
        
            $this->db->select('*');    
            $this->db->from('subcategoria');
            $this->db->join('categoria', 'subcategoria.categoria_fk = categoria.idcategoria');
            
            $return = $this->db->get();
            
            foreach($return -> result() as $row):
                $arr[] = array(
                    'idsubcategoria'=>$row->idsubcategoria,
                    'nomesubcategoria'=>$row->nomesubcategoria,
                    'sla'=>$row->sla,
                    'categoria_fk'=>$row->categoria_fk
                );
            endforeach;
            
            return json_encode($arr);
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
    
        function m_ajax_dados_subcategoria(){
        
        $idcategoria = $this->input->post('idcategoria');
        
        $this->db->where('categoria_fk', $idcategoria);
        
        $dados = $this->db->get('subcategoria');
        
        return $dados;
    }
    
        function m_ajax_dados_sla(){
        
        $idsubcategoria = $this->input->post('idsubcategoria');
        
        $this->db->where('idsubcategoria', $idsubcategoria);
        
        $dados = $this->db->get('subcategoria');
        
        return $dados;
    }
    
    
}