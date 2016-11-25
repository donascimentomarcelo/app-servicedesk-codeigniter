<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perfil_pessoal_controller extends CI_Controller {
    
    function alterar_perfil(){
        
       $this->load->model('perfil_pessoal/perfil_pessoal_model');
       $this->load->model('usuario/usuario_model');
       
       $this->load->helper('valida_login/valida_helper');
        
       $variaveis['validacao'] = getValida();
       
       
       $this->load->helper('preenche_dados/preenche_dados_helper');
        
       $variaveis['preenche_dados'] = getPreencheDados();
       
       
       $this->load->view('perfil_pessoal/perfil_pessoal_view', $variaveis);
        
    }

    
    function  atualiza_perfil(){
        
        $this->load->model('perfil_pessoal/perfil_pessoal_model');
 
        $imagem = $this->do_upload();
        
        $insert = $this->perfil_pessoal_model->atualizar_perfil($imagem);

            if($insert){

                echo 1;

            }else{

                echo 0;
            }
    }
    
    public function do_upload(){

            if(isset($_FILES["imagem"])){
        
              $type = explode('.', $_FILES["imagem"]["name"]);
              $type = $type[count($type)-1];
              $url = "./imagem/".uniqid(rand()).'.'.$type;
                if(in_array($type, array("jpg","jpeg","gif","png")))
                    if(is_uploaded_file($_FILES["imagem"]["tmp_name"]))
                        if(move_uploaded_file($_FILES["imagem"]["tmp_name"], $url))
                return $url;
               //return "";
            }else {
        
                return FALSE;
                
        }
    }
    
    public function load_profile() {
        
        $this->load->model('perfil_pessoal/perfil_pessoal_model');
        
        echo  $this->perfil_pessoal_model->m_load_profile();
    }
    
    
    
    public function update_profile() {
        
        $this->load->model('perfil_pessoal/perfil_pessoal_model');
        
        echo  $this->perfil_pessoal_model->m_update_profile();
    }
    
    
    public function alter_photo() {
        
       $this->load->model('perfil_pessoal/perfil_pessoal_model');
       $this->load->model('usuario/usuario_model');
       
       $this->load->helper('valida_login/valida_helper');
        
       $variaveis['validacao'] = getValida();
       
       
       $this->load->helper('preenche_dados/preenche_dados_helper');
        
       $variaveis['preenche_dados'] = getPreencheDados();
       
       $variaveis['consulta'] = $this->display_user_data();
       
       $this->load->view('perfil_pessoal/alter_photo_view', $variaveis);
        
    }
    
        function display_user_data(){
        
        $this->load->model('perfil_pessoal/perfil_pessoal_model');
        
        $id = $this->session->userdata('id');
        
        $dados = $this->perfil_pessoal_model->m_list_usuario($id);
        
        return $dados;
        
    }

    
}