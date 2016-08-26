<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cd_controller extends CI_Controller {

	public function manter_usuario()
	{
		$this->load->helper('form');
                
		$this->load->view('usuario/manter_usuario_view');
	}
        
        public function welcome_message() {
            $this->load->helper('form');
                
            $this->load->view('welcome_message');
        }
        public function salvar_cd(){
            
            $this->load->model('cd/cd_model');
            
           // $result = $this->cd_model->m_salvar_cd();
            
            if($this->input->post('nomecd') == '' && $this->input->post('gravadora') == ''){
                ?> Preencha os campos do formulario! <?php
            }else{
            
            if($this->cd_model->m_salvar_cd()){
                
                echo 1;
                
            }else{
                
                 echo 0;
                
            }
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
                
               // header("Location: http://localhost/cd/index.php/cd/cd_controller/listar_cd");
                echo 1;
                
            }else{
                
                 echo 0;
                
            }
            
        }
        
        public function dados_cd() {
            
            $idcd = $this->input->post("idcd");
            
            $this->load->model("cd/cd_model");
            
            $consulta = $this->cd_model->m_list_cd($idcd);
            
            if($consulta->num_rows() == 0){
                die("CD não encontrado");
            }
            
            $array_clientes = array(
                
                "idcd" => $consulta->row()->idcd,
                "nomecd" => $consulta->row()->nomecd,
                "gravadora" => $consulta->row()->gravadora
            );
            
            echo json_encode($array_clientes);
        }
}


        

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */