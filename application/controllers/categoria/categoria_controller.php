<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Categoria_controller extends CI_Controller {
    
    
    function  exibir_categoria()
    {
        $this->load->helper('preenche_dados/preenche_dados_helper');
        
        $variaveis['preenche_dados'] = getPreencheDados();
        
        
        $this->load->helper('valida_login/valida_administrador_helper');
        
        $variaveis['validacao'] = getValidaAdministrador();
        
        
        $this->load->view('configuracao/categoria/categoria_view', $variaveis);
  }
  
    public function LoadCategory()
    {
        $this->load->model('categoria/categoria_model');

        echo $this->categoria_model->MLoadCategory();
    }

    public function SaveOrEditCategory() 
    {
        $this->load->model('categoria/categoria_model');

        echo $this->categoria_model->MSaveOrEditCategory();
    }
    
}
