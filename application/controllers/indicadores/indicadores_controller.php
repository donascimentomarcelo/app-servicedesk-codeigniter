<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Indicadores_controller extends CI_Controller {
    
    function carrega_view_indicadores(){
        
        $this->load->helper('valida_login/valida_helper');
        
        $variaveis['validacao'] = getValida();
            
            
        $this->load->helper('preenche_dados/preenche_dados_helper');
        
        $variaveis['preenche_dados'] = getPreencheDados();
        
        $this->load->view('indicadores/indicadores_view', $variaveis);
    }
            
    function localizador(){
        
        $this->load->model('indicadores/indicadores_model');
        
        $variaveis['dados'] = $this->indicadores_model->m_localizador();
        
        $this->load->helper('valida_login/valida_helper');
        
        $variaveis['validacao'] = getValida();
            
            
        $this->load->helper('preenche_dados/preenche_dados_helper');
        
        $variaveis['preenche_dados'] = getPreencheDados();
        
        $this->load->view('indicadores/indicadores_view', $variaveis);
        
        
    }
    
}
    