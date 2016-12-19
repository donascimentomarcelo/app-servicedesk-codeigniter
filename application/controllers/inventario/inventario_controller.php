<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inventario_controller extends CI_Controller {

    function hardware_list()
    {
        
        $this->load->helper('valida_login/valida_helper');

        $variaveis['validacao'] = getValida();


        $this->load->helper('preenche_dados/preenche_dados_helper');

        $variaveis['preenche_dados'] = getPreencheDados();


        $this->load->view('inventario/hardware/hardware_view', $variaveis);
    }
    
    function listagem()
    {
        $this->load->model('inventario/inventario_model');

        echo $this->inventario_model->m_hardware_list();
    }
    
    function registro_hardware()
    {
        $this->load->model('inventario/inventario_model');

        echo $this->inventario_model->m_registro_hardware();
    }
    
    function listagem_where($idinventario = NULL)
    {
        $this->load->model('inventario/inventario_model');
        
        echo $this->inventario_model->m_hardware_list_where($idinventario);
    }
    
    function exclui_hardware()
    {
        $this->load->model('inventario/inventario_model');
        
        echo $this->inventario_model->m_exclui_hardware();
    }
    
    function list_edit_hw()
    {
        $this->load->model('inventario/inventario_model');
        
        echo $this->inventario_model->m_edit_hw();
    }
    
    //SOFTWARE
    
    function software_list()
    {
        $this->load->helper('valida_login/valida_helper');

        $variaveis['validacao'] = getValida();


        $this->load->helper('preenche_dados/preenche_dados_helper');

        $variaveis['preenche_dados'] = getPreencheDados();


        $this->load->view('inventario/software/software_view', $variaveis);
    }
    
    function list_software()
    {
        $this->load->model('inventario/inventario_model');

        echo $this->inventario_model->m_software_list();
    }
    
    function insert_or_update_software()
    {
        $this->load->model('inventario/inventario_model');

        echo $this->inventario_model->m_insert_or_update_software();
    }
    
    function delete_software()
    {
        $this->load->model('inventario/inventario_model');

        echo $this->inventario_model->m_delete_software();
    }

    //  CONFIGURAÇÃO 
    
    function configuracao_inventario_list()
    {
        $this->load->helper('valida_login/valida_helper');

        $variaveis['validacao'] = getValida();


        $this->load->helper('preenche_dados/preenche_dados_helper');

        $variaveis['preenche_dados'] = getPreencheDados();


        $this->load->view('inventario/config/config_view', $variaveis);
    }
    
    function list_config_hw()
    {
        $this->load->model('inventario/inventario_model');
        
        echo $this->inventario_model->m_list_config_hw();
    }
    function list_config_sw()
    {
        $this->load->model('inventario/inventario_model');
        
        echo $this->inventario_model->m_list_config_sw();
    }
    
    
    function list_config()
    {
        $this->load->model('inventario/inventario_model');
        
        echo $this->inventario_model->m_list_config();
    }
    
    function save_or_edit_config()
    {
        $this->load->model('inventario/inventario_model');
        
        echo $this->inventario_model->m_save_or_edit_config();
    }
    
    
}