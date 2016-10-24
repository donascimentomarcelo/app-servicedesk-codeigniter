<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Indicadores_controller extends CI_Controller {

            
    function localizador(){
        
        $this->load->model('indicadores/indicadores_model');
        
        $variaveis['consulta'] = $this->indicadores_model->m_localizador();
        
        $this->load->helper('valida_login/valida_helper');
        
        $variaveis['validacao'] = getValida();
            
            
        $this->load->helper('preenche_dados/preenche_dados_helper');
        
        $variaveis['preenche_dados'] = getPreencheDados();
        
        $this->load->view('indicadores/localizador_view', $variaveis);
        
        
    }
    

    function indicadores(){
        
        $this->load->model('indicadores/indicadores_model');

        $variaveis['consulta'] = $this->indicadores_model->indicadores();
        
        /*
        echo '<pre>';
        echo var_dump($variaveis);
        echo '</pre>';
         */

        $this->load->helper('valida_login/valida_helper');

        $variaveis['validacao'] = getValida();


        $this->load->helper('preenche_dados/preenche_dados_helper');

        $variaveis['preenche_dados'] = getPreencheDados();


        $this->load->view('indicadores/indicadores_view', $variaveis);

    }
    
}
    