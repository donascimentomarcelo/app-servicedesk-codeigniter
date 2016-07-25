<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cd_controller extends CI_Controller {

	public function formulario()
	{
		$this->load->helper('form');
                
		$this->load->view('menu_cd/formulario');
	}
        
        public function salvar_cd(){
            
            $this->load->model('cd/cd_model');
            
            $result = $this->cd_model->m_salvar_cd();
            
            if($result){
                
                 $this->load->view("mensagem/sucesso");
                
            }else{
                
                 $this->load->view("mensagem/erro");
                
            }
            
        }
        
        public function listar_cd(){
            
            $this->load->model('cd/cd_model');
            
            $consulta = $this->cd_model->exibe_cd();
            
            $variaveis['consulta'] = $consulta;
            
            $this->load->view("menu_cd/listar_cd_view",$variaveis);
        }
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */