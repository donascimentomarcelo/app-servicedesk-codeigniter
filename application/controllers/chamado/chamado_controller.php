<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Chamado_controller extends CI_Controller {

        public function salvar_chamado(){
            
            $this->load->model('chamado/chamado_model');
            
           // $result = $this->chamado_model->m_salvar_chamado();
            
            if($this->input->post('nomechamado') == '' && $this->input->post('gravadora') == ''){
                ?> Preencha os campos do formulario! <?php
            }else{
            
            if($this->chamado_model->m_salvar_chamado()){
                
                echo 1;
                
            }else{
                
                 echo 0;
                
            }
            }
        }
        
        public function listar_chamado(){
            
            $this->load->model('chamado/chamado_model');

            $variaveis = $this->chamado_model->exibe_chamado();
            
            for($i = 0; $i < count($variaveis); $i++){

                $inicio = $variaveis[$i]['datainicial'];
                $fim = $variaveis[$i]['datafinal'];
  
                date_default_timezone_set('America/Sao_Paulo');

                $inicio = new DateTime($inicio);
                $fim = new DateTime($fim);
                $agora = new DateTime();

                $diffInicioFim = $fim->getTimestamp() - $inicio->getTimestamp();
                $diffInicioAgora = $agora->getTimestamp() - $inicio->getTimestamp();

                $porcentagem = $diffInicioAgora / $diffInicioFim * 100;

              
                if($porcentagem <= 25){

                $class = 'success';
                
                }else if($porcentagem >=26 && $porcentagem <=81){

                $class = 'warning';

                }else if($porcentagem >= 81 && $porcentagem <= 100) {
                    
                $class = 'danger';

                }else if($porcentagem >= 100) {
                    
                $porcentagem = 100;
                $class = 'danger';

                }
                
                $variaveis[$i] += ['porcentagem' => $porcentagem, 'class' => $class];
            }

            $variaveis['consulta'] = $variaveis;
            
            
            $this->load->helper('valida_login/valida_helper');
        
            $variaveis['validacao'] = getValida();
            
            
            $this->load->helper('preenche_dados/preenche_dados_helper');
        
            $variaveis['preenche_dados'] = getPreencheDados();
            
            
            $this->load->model('categoria/categoria_model');
        
            $variaveis['categoria'] = $this->categoria_model->m_exibir_categoria();
            
            
            $this->load->model('usuario/usuario_model');
            
            $this->load->helper('setor_ativo/setor_ativo_helper');
        
            $variaveis['setor_ativo'] = getSetorAtivo();
        
            
            $this->load->view("menu_chamado/listar_chamado_view",$variaveis);
            
        }
        
        public function excluir_chamado($idchamado) {
            
            $this->load->model('chamado/chamado_model');
            
            if($this->chamado_model->excluir($idchamado)){
                
               echo 1;
                
            }else{
                
                 echo 0;
                
            }
            
        }
        
        public function dados_chamado() {
            
            $idchamado = $this->input->post("idchamado");
            
            $this->load->model("chamado/chamado_model");
            
            $consulta = $this->chamado_model->m_list_chamado($idchamado);
            
            if($consulta->num_rows() == 0){
                die("Chamado não encontrado");
            }
            
            $array_clientes = array(
                
                "idchamado" => $consulta->row()->idchamado,
                "nomechamado" => $consulta->row()->nomechamado,
                "gravadora" => $consulta->row()->gravadora,
                "nome" => $consulta->row()->nome,
                "email" => $consulta->row()->email,
                "setor_fk" => $consulta->row()->setor_fk
            );
            
            echo json_encode($array_clientes);
        }
        
}


        

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */