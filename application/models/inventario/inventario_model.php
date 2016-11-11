<?php

class inventario_model extends CI_Model{
    
    function __construct() {
        
        parent::__construct();
        
    }    
  
    
    //HARDWARE
    
    function m_hardware_list(){
        
        $this->db->select('*');
        $this->db->from('inventario_hw');
        $this->db->join('inventario_config','inventario_hw.idinventario = inventario_config.idconfig');
        $this->db->order_by("idinventario", "desc");
        
        $variaveis = $this->db->get();
        
        foreach($variaveis -> result() as $linha){
       
        $arr[] = array( 
            
                "idinventario" => $linha->idinventario, 
                "nome" => $linha->nome, 
                "modelo" => $linha->modelo, 
                "inventario_config_fk" => $linha->inventario_config_fk,
                "nome_config" => $linha->nome_config
           
        );
        
        }
        
        if(isset($arr)){
        
        return json_encode($arr);
        }
    }
    
    function m_registro_hardware(){
        
        $_POST = json_decode(file_get_contents('php://input'), true);
        
        $nome = $this->input->post('nome');
        $modelo = $this->input->post('modelo');
        $FK_marca = $this->input->post('idconfig');
        
        $dados = array(
           'nome'=> $nome,
           'modelo'=>$modelo,
           'inventario_config_fk'=>$FK_marca
        );
        
        $id = $this->input->post('idinventario');
        
        if($id != 0){
            
            $this->db->where('idinventario', $id);
            $query = $this->db->update('inventario_hw', $dados);
            
        }else{
            
            $query = $this->db->insert('inventario_hw', $dados);
            
        }
        
        if($query){
            
            return TRUE;
            
        }else{
            
            return FALSE;
            
        }
        
    }
    
    function m_exclui_hardware(){
        
        
       $data = json_decode(file_get_contents("php://input"));     
 
       $idinvantario  = $data->idinventario;
       
       $this->db->where('idinventario', $idinvantario);
       $query = $this->db->delete('inventario_hw');
       
       
       if($query){
           
           return  TRUE;
           
       }else{
           
           return $this->db->_error_number();
           
       }
    
    }
    
    function m_edit_hw(){
        
        $data = json_decode(file_get_contents("php://input"));     
 
        $idinvantario  = (int)$data->idinventario;
        
        var_dump($idinvantario);
        
        $this->db->select('*');
        $this->db->from('inventario_hw');
        $this->db->join('inventario_config','inventario_hw.idinventario = inventario_config.idconfig');
        $this->db->where('categoria_config', 'hardware');
        $this->db->where('idconfig', $idinvantario);
        $this->db->order_by('idconfig', 'desc');
        
        $result = $this->db->get();
        
        foreach ($result -> result() as $row):
            $arr[] = array(
                
                'idconfig' => $row->idconfig,
                'nome_config' => $row->nome_config,
                'categoria_config' => $row->categoria_config,
                'status_config' => $row->status_config
                
            );
        endforeach;
        
        return json_encode($arr);
    }
    
    //SOFTWARE
    
    function m_software_list(){
        
        $this->db->select('*');
        $this->db->from('inventario_sw');
        $this->db->order_by('idsoftware', 'desc');
        
        $variaveis = $this->db->get();
        
        foreach($variaveis -> result() as $linha){
            
            $arr[] =  array(
                
                "idsoftware" => $linha->idsoftware,
                "nomesoftware" => $linha->nomesoftware,
                "modelosoftware" => $linha->modelosoftware,
                "marcasoftware" => $linha->marcasoftware
                
            );
            
        }
        
        return json_encode($arr);
    }
    
    function m_registrar_software(){
        
         $_POST = json_decode(file_get_contents('php://input'), true);
         
         $idsoftware = $this->input->post('idsoftware');
         $nomesoftware = $this->input->post('nomesoftware');
         $marcasoftware = $this->input->post('marcasoftware');
         $modelosoftware = $this->input->post('modelosoftware');
         
         $arr = array(
             
             'nomesoftware' => $nomesoftware,
             'marcasoftware' => $marcasoftware,
             'modelosoftware' => $modelosoftware
             
         );
         
         if($idsoftware != 0){
             
             $this->db->where('idsoftware', $idsoftware);
             $query = $this->db->update('inventario_sw', $arr);
             
         }else{
             
             $query = $this->db->insert('inventario_sw', $arr);
             
         }
     
         if($query){
             
             return TRUE;
             
         }else{
             
             return FALSE;
             
         }
     
    }
    
    function m_excluir_software(){
        
        $data = json_decode(file_get_contents("php://input"));
        
        $idsoftware = $data->idsoftware;
        
        $this->db->where('idsoftware', $idsoftware);
        $exclusao = $this->db->delete('inventario_sw');
        
        if($exclusao){
            
            return TRUE;
            
        }else{
            
            return $this->db->_error_number();
            
        }
    }
    
    //CONFIG
    

    function m_list_config(){
        
        $this->db->select('*');
        $this->db->from('inventario_config');
        $this->db->order_by('idconfig', 'desc');
        
        $data = $this->db->get();
        
        foreach ($data -> result() as $row):
            $arr[] = array(
                
                'idconfig' => $row->idconfig,
                'nome_config' => $row->nome_config,
                'categoria_config' => $row->categoria_config,
                'status_config' => $row->status_config
                
            );
        endforeach;
        
        return json_encode($arr);
    }
    
    function m_list_config_hw(){
        
        $this->db->select('*');
        $this->db->from('inventario_config');
        $this->db->where('categoria_config', 'hardware');
        $this->db->order_by('idconfig', 'desc');
        
        $data = $this->db->get();
        
        foreach ($data -> result() as $row):
            $arr[] = array(
                
                'idconfig' => $row->idconfig,
                'nome_config' => $row->nome_config,
                'categoria_config' => $row->categoria_config,
                'status_config' => $row->status_config
                
            );
        endforeach;
        
        return json_encode($arr);
    }
    
    function save_or_edit_config(){
        
        $data = json(file_get_contents("php://input"));
        
        $idconfig = $this->input->post('idconfig');
        
         $arr = array(
                
                'nome_config' => $this->input->post('nome_config'),
                'categoria_config' => $this->input->post('categoria_config'),
                'status_config' => $this->input->post('status_config')
                
            );
        
        if($idconfig != 0){
            
            $this->db->where('idconfig', $idconfig);
            $action = $this->db->update('inventario_config',$arr);
            
        }else{
            
            $action = $this->db->insert('inventario_config',$arr);
            
        }
        
        if($action){
        
            return TRUE;
            
        }else{
            
            return FALSE;
            
        }
    
   } 
}