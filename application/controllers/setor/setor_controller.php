<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Setor_controller extends CI_Controller {
    
    function listar_setor(){
        
        $this->load->model('setor/setor_model');
        
        $resultado = $this->setor_model->m_listar_setor();
        
        $variaveis['resultado'] = $resultado;
        
        $this->load->view('configuracao/setor/setor_view', $variaveis);
        
    }
    
    function salvar_setor(){
        
        $this->load->model('setor/setor_model');
        
        $resultado = $this->setor_model->m_salvar_setor();
        
        if($resultado){
            
            echo 1;
            
        }else{
            
            echo 0;
            
        }
        
    }
    
    function excluir_setor($idsetor){
        
        $this->load->model('setor/setor_model');
        
        $resultado = $this->setor_model->m_excluir_setor($idsetor);
        
        if($resultado){
            
            echo 1;
            
        }else{
            
            echo 0;
            
        }
        
    }
    
    function dados_setor(){
        
        $idsetor = $this->input->post('idsetor');
        
        $this->load->model('setor/setor_model');
        
        $consulta = $this->setor_model->m_dados_setor($idsetor);
        
        if($consulta->num_rows() == 0){
            die('Setor não encontrado.');
        }
        
        $array_setor = array(
            
            'idsetor'=>$consulta->row()->idsetor,
            'nomesetor'=>$consulta->row()->nomesetor,
            'status'=>$consulta->row()->status
        
                );
        
        echo json_encode($array_setor);
    }
    
}