<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cd_controller extends CI_Controller {

	public function formulario()
	{
		$this->load->helper('form');
                
		$this->load->view('menu_cd/formulario');
	}
        
        public function salvar_cd(){
            
            $this->load->model('cd/cd_model');
            
           // $result = $this->cd_model->m_salvar_cd();
            
            if($this->cd_model->m_salvar_cd()){
                
                echo 1;
                
            }else{
                
                 echo 0;
                
            }
            
        }
        
        public function listar_cd(){
            
            $this->load->model('cd/cd_model');
            
            $consulta = $this->cd_model->exibe_cd();
            
            $variaveis['consulta'] = $consulta;
            
            $this->load->view("menu_cd/listar_cd_view",$variaveis);
        }
        
        public function excluir_cd($idcd) {
            
            $this->load->model('cd/cd_model');
            
            if($this->cd_model->excluir($idcd)){
                
                header("Location: http://localhost/cd/index.php/cd/cd_controller/listar_cd");
                
            }else{
                
                 echo 0;
                
            }
            
        }
}


        

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */