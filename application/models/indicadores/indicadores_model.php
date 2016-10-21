<?php

class indicadores_model extends CI_Model{
    
    function __construct() {
        
        parent::__construct();
        
    }    

    function m_localizador(){
        
        $status = $this->input->post('status');
        $datainicial = $this->input->post('datainicial');
        $datafinal = $this->input->post('datafinal');
        
        $this->db->where('status', $status);
        $this->db->like('nomechamado >=', $datainicial);
        $this->db->like('datafinal <=', $datafinal);
       
        return $this->db->get('chamado');
        
    }
}