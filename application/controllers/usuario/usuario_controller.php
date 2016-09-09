<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_controller extends CI_Controller {

    public function listar_usuario() {
        
        $this->load->helper('valida_login/valida_administrador_helper');
        
        $variaveis['validacao'] = getValidaAdministrador();
        
        
        $this->load->model('usuario/usuario_model');
        
        $variaveis['consulta'] = $this->usuario_model->exibe_usuario();
        
        
        $this->load->helper('setor_ativo/setor_ativo_helper');
        
        $variaveis['setor_ativo'] = getSetorAtivo();
        
        
        $this->load->view('usuario/manter_usuario_view',$variaveis);
        
    }
    
    public function salvar_usuario() {
        
        $this->load->model('usuario/usuario_model');
   
        $insert = $this->usuario_model->m_salvar_usuario();
        
        $this->load->helper('upload_perfil/foto_helper');
        
        $upload = getFoto();
        
        if($upload){
        
            if($insert){

                echo 1;

            }else{

                echo 0;

            }
        }else{
            
            echo 'erro no upload';
        }

    }
    
    public function do_upload(){
        
                $config['upload_path']          = 'C:\xampp\htdocs\cd\application\imagem';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['max_size']             = 100;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;

                $this->load->library('upload', $config);

                if ( ! $this->upload->do_upload('imagem')){
                        $error = array('error' => $this->upload->display_errors());

                        echo var_dump($error);
                        
                }else{
                    
                        $salvar = $this->salvar_usuario();
                        
                        if($salvar){

                            echo 1;
                        
                        }else{
                            
                            echo 0;
                        }
                }
        }

    
    public function dados_usuario() {
        
        $id = $this->input->post('id');
        
        $this->load->model('usuario/usuario_model');
        
        $consulta = $this->usuario_model->m_list_usuario($id);
        
        if($consulta->num_rows() == 0){
            die('Usuário não encontrado');
        }
        
        $array_usuario = array(
                
                'id'=> $consulta->row()->id,
                'nome'=> $consulta->row()->nome,
                'email'=> $consulta->row()->email,
                'senha'=> $consulta->row()->senha,
                'perfil'=> $consulta->row()->perfil,
                'setor_fk'=> $consulta->row()->setor_fk,
                'status'=> $consulta->row()->status
                
                );
        
        echo json_encode($array_usuario);
    }
    
    public function excluir_usuario($id){
        
        $this->load->model('usuario/usuario_model');
        
        if($this->usuario_model->del_usuario($id)){
            
            echo 1;
            
        }else{
            
            echo 0;
            
        }
        
        
    }
    
}