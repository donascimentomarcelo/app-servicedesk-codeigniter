<?php

class inventario_model extends CI_Model{
    
    function __construct() {
        
        parent::__construct();
        
    }    
    
    function m_hardware_list(){
        
        $this->db->select('*');
        $this->db->from('inventario');
        
        $variaveis = $this->db->get();
        
        foreach($variaveis -> result() as $linha){
       
        $arr[] = array( 
            
                "nome" => $linha->nome, 
                "modelo" => $linha->modelo, 
                "marca" => $linha->marca
           
        );
         
         
        }
        
        return json_encode($arr);
        
    }
    
    function m_registro_hardware(){
        
        $_POST = json_decode(file_get_contents('php://input'), true);
        
        $nome = $this->input->post('nome');
        $modelo = $this->input->post('modelo');
        $j = $this->input->post('marca');
        
        foreach ($j as $i){
            $marca = $i['nome'];
        }
        
        $dados = array(
           'nome'=> $nome,
           'modelo'=>$modelo,
           'marca'=>$marca
        );
        
        $id = $this->input->post('idinventario');
        
        if($id != 0){
            
            $this->db->where('inventario', $id);
            $query = $this->db->update('inventario', $dados);
            
        }else{
            
            $query = $this->db->insert('inventario', $dados);
            
        }
        
        if($query){
            
            return TRUE;
            
        }else{
            
            return FALSE;
            
        }
        
    }
}