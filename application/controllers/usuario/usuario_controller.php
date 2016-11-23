<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_controller extends CI_Controller {

    public function listar_usuario() {
        
        $this->load->helper('valida_login/valida_administrador_helper');
        
        $variaveis['validacao'] = getValidaAdministrador();
        
       
        $this->load->helper('preenche_dados/preenche_dados_helper');
        
        $variaveis['preenche_dados'] = getPreencheDados();
     
        
        $this->load->view('usuario/manter_usuario_view',$variaveis);
        
    }
    
    function list_user(){
        
        $this->load->model('usuario/usuario_model');
        
        echo $this->usuario_model->m_list_user();
        
    }
    
    public function insert_or_edit_user() {
        
        $this->load->model('usuario/usuario_model');
   
        echo $this->usuario_model->m_insert_or_edit_user();
        
    }
    
    public function salvar_usuario() {
        
        $this->load->model('usuario/usuario_model');
   
        /*
        $insert = $this->usuario_model->m_salvar_usuario();
        $this->load->helper('upload_perfil/foto_helper');
        
        $upload = getFoto();
        */
        
        $imagem = $this->do_upload();
        
        $insert = $this->usuario_model->m_salvar_usuario($imagem);

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
                'ramal'=> $consulta->row()->ramal,
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
   
     function getPreencheDados(){
         
    	$this->load->model('usuario/usuario_model');
        
        $data = $this->usuario_model->m_list_usuario_angular();
        
        echo $data;
    }   
    
}