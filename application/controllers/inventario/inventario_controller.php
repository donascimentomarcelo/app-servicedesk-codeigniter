<?php

if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Inventario_controller extends CI_Controller {

    function hardware_list(){
        
        $this->load->helper('valida_login/valida_helper');
        
        $variaveis['validacao'] = getValida();


        $this->load->helper('preenche_dados/preenche_dados_helper');

        $variaveis['preenche_dados'] = getPreencheDados();
        
        
        $this->load->view('inventario/hardware/hardware_view',$variaveis);
    }
    
}