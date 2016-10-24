<?php

class indicadores_model extends CI_Model{
    
    function __construct() {
        
        parent::__construct();
        
    }    
   
    function m_localizador(){
        
        $status = $this->input->post('statuschamado');
        $datainicial = $this->input->post('datainicial');
        $datafinal = $this->input->post('datafinal');
        
        
        if($status != "" && $datafinal != "" && $datainicial != ""){
        //select * from chamado where datainicial >= '2016-10-14' and datafinal <='2016-10-16'
        
        $this->db->select('*');
        $this->db->from('chamado');
        $this->db->where('statuschamado', $status);
        $this->db->where('datainicial >=', $datainicial);
        $this->db->where('datafinal <=', $datafinal);
       
        $variaveis = $this->db->get()->result_array();
         
        }else{
            
        $this->db->select('*');
        $this->db->from('chamado');

        $variaveis = $this->db->get()->result_array();

        }
            
            for($i = 0; $i < count($variaveis); $i++){

                $inicio = $variaveis[$i]['datainicial'];
                $fim = $variaveis[$i]['datafinal'];
  
                date_default_timezone_set('America/Sao_Paulo');

                $inicio = new DateTime($inicio);
                $fim = new DateTime($fim);
                $agora = new DateTime();

                $diffInicioFim = $fim->getTimestamp() - $inicio->getTimestamp();
                $diffInicioAgora = $agora->getTimestamp() - $inicio->getTimestamp();

                $porcentagem = $diffInicioAgora / $diffInicioFim * 100;

              
                if($porcentagem < 25){

                $class = 'success';
                
                }else if($porcentagem >25 && $porcentagem <=81){

                $class = 'warning';

                }else if($porcentagem >= 81 && $porcentagem <= 100) {
                    
                $class = 'danger';

                }else if($porcentagem >= 100) {
                    
                $porcentagem = 100;
                $class = 'danger';

                }
                
                $variaveis[$i] += ['porcentagem' => $porcentagem, 'class' => $class];
            }

            return $variaveis;
        
    }
    
        function indicadores(){
            
            //select count(*) from chamado where statuschamado = 'aguardando'

            $status = $this->input->post('statuschamado');
            $datainicial = $this->input->post('datainiciale');
            $datafinal = $this->input->post('datafinal');


            if($status != "" && $datafinal != "" && $datainicial != ""){

            $this->db->select('*');
            $this->db->from('chamado');
            $this->db->where('statuschamado', $status);
            $this->db->where('datainicial >=', $datainicial);
            $this->db->where('datafinal <=', $datafinal);

            $variaveis = $this->db->get()->num_rows();

            }else{

            $this->db->select('*');
            $this->db->from('chamado');

            $variaveis = $this->db->get()->num_rows();

        }
    }
}