<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Perfil_pessoal_controller extends CI_Controller {
    
    function alterar_perfil(){
        
       $this->load->model('perfil_pessoal/perfil_pessoal_model');
       $this->load->model('usuario/usuario_model');
       
        
       $this->load->helper('setor_ativo/setor_ativo_helper');
       
       $variaveis['setor_ativo'] = getSetorAtivo();
       
       
       $this->load->helper('valida_login/valida_helper');
        
       $variaveis['validacao'] = getValida();
       
       
       $this->load->helper('preenche_dados/preenche_dados_helper');
        
       $variaveis['preenche_dados'] = getPreencheDados();
       
       
       $variaveis['consulta'] = $this->preenche_dados();
        
        $this->load->view('perfil_pessoal/perfil_pessoal_view', $variaveis);
        
    }
    
    function preenche_dados(){
        
        $this->load->model('perfil_pessoal/perfil_pessoal_model');
        
        $id = $this->session->userdata('id');
        
        $dados = $this->perfil_pessoal_model->m_list_usuario($id);
        
        return $dados;
        
    }
    
    function  atualiza_perfil(){
        
        $this->load->model('perfil_pessoal/perfil_pessoal_model');
   
        /*
        $insert = $this->usuario_model->m_salvar_usuario();
        $this->load->helper('upload_perfil/foto_helper');
        
        $upload = getFoto();
        */
        
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

    
}