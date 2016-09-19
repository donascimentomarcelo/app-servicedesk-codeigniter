<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cd_controller extends CI_Controller {

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

            $row = $this->cd_model->exibe_cd();
            
            foreach ($row  as $linha):
                $datafinal = $linha['datafinal'];
                $horafinal = $linha['horafinal'];
                $nomecd = $linha['nomecd'];
                $gravadora = $linha['gravadora'];
                $class = $linha['class'];
                $porcentagem = $linha['porcentagem'];
                $idcd = $linha['idcd'];
                $sla = $linha['sla'];
            endforeach;
            
            $dataAtual = date('d/m/Y');
            $horaAtual = date('H');
            $minutoAtual = date('i');

            $sla = $sla * 60;//converte o periodo da SLA para minutos.

            if($horafinal >= $horaAtual && $datafinal >= $dataAtual){
                
                    $porcentagem = ($minutoAtual * 100)/$sla;
                    
                    $porcentagem = (int)$porcentagem;

                    if($porcentagem <= 25){

                    $class = 'success';

                    }else if($porcentagem >=26 && $porcentagem <=80){

                    $class = 'warning';

                    }else{

                    $class = 'danger';

                    }
            }else{
                    $class = 'danger';
                    $porcentagem = 100;
                    
            }
            foreach ($row  as $linha):
            $array = array(
                'idcd'=>$idcd,
                'nomecd'=>$nomecd,
                'gravadora'=>$gravadora,
                'class'=>$class,
                'porcentagem'=>$porcentagem
            );
        endforeach;
            //echo var_dump($array);
            $variaveis['consulta'] = $array;
            /*
            $this->load->helper('valida_login/valida_helper');
        
            $variaveis['validacao'] = getValida();
            
            
            $this->load->helper('preenche_dados/preenche_dados_helper');
        
            $variaveis['preenche_dados'] = getPreencheDados();
        
            
            $this->load->view("menu_cd/listar_cd_view",$variaveis);*/
        }
        
        public function excluir_cd($idcd) {
            
            $this->load->model('cd/cd_model');
            
            if($this->cd_model->excluir($idcd)){
                
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