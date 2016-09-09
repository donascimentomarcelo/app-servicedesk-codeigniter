<?php
class imagem extends CI_Model{
    
    function __construct() {
        
        parent::__construct();
        
    }   
    

public function m_upload_imagem() {
        
       $dados = $_FILES['imagem'];
       
       $id = $this->input->post('id');
       
       return $dados;
    }
}
    