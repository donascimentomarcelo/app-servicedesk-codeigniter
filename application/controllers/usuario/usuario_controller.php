<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_controller extends CI_Controller {

    public function listar_usuario() {
        
        $this->load->model('usuario/usuario_model');
        
        $consulta = $this->usuario_model->exibe_usuario();
        
        $variaveis['setor_ativo'] = $this->setor_ativo();
        
        $variaveis['consulta'] = $consulta;
        
        $this->load->view('usuario/manter_usuario_view',$variaveis);
        
    }
    
    function setor_ativo(){
        
        $this->load->model('usuario/usuario_model');
        
        $setor_ativo = $this->usuario_model->setor_ativo();
        
        return $setor_ativo;
        //regra de nogócios onde permite que somente setores ativos sejam selecionados na view.
    }


    public function salvar_usuario() {
        
        $this->load->model('usuario/usuario_model');
        
        $insert = $this->usuario_model->m_salvar_usuario();
        
        if($insert){
            
            echo 1;
            
        }else{
            
            echo 0;
            
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
                'nomesetor'=> $consulta->row()->nomesetor,
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