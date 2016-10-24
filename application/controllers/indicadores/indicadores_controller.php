<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Indicadores_controller extends CI_Controller {
    
    function carrega_view_indicadores(){
        
            $this->load->model('indicadores/indicadores_model');

            $variaveis['consulta'] = $this->indicadores_model->exibe_chamado();
            
            
            $this->load->helper('valida_login/valida_helper');
        
            $variaveis['validacao'] = getValida();
            
            
            $this->load->helper('preenche_dados/preenche_dados_helper');
        
            $variaveis['preenche_dados'] = getPreencheDados();
            
            
            $this->load->model('categoria/categoria_model');
        
            $variaveis['categoria'] = $this->categoria_model->m_exibir_categoria();
            
            
            $this->load->model('subcategoria/subcategoria_model');
        
            $variaveis['subcategoria'] = $this->subcategoria_model->m_exibir_subcategoria();
            
            
            $this->load->model('usuario/usuario_model');
            
            $this->load->helper('setor_ativo/setor_ativo_helper');
        
            $variaveis['setor_ativo'] = getSetorAtivo();
        
            
            $this->load->view('indicadores/indicadores_view', $variaveis);
    }
            
    function localizador(){
        
        $this->load->model('indicadores/indicadores_model');
        
        $variaveis['consulta'] = $this->indicadores_model->m_localizador();
        
        $this->load->helper('valida_login/valida_helper');
        
        $variaveis['validacao'] = getValida();
            
            
        $this->load->helper('preenche_dados/preenche_dados_helper');
        
        $variaveis['preenche_dados'] = getPreencheDados();
        
        $this->load->view('indicadores/indicadores_view', $variaveis);
        
        
    }
    
}
    