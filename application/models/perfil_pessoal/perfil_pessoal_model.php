<?php
class perfil_pessoal_model extends CI_Model{
    
    function __construct() {
        
        parent::__construct();
        
    }   
    
    public function exibe_usuario() {
        
            $this->db->select('*');    
            $this->db->from('usuarios');
            $this->db->join('setor', 'usuarios.setor_fk = setor.idsetor');
       
            $retorno = $this->db->get();

            return $retorno;
        
    }
    
       public function m_alter_photo_profile() {
           
            /*
            $array = json_decode(file_get_contents('php://input'));
            
            $time = time();
            
            $i = file_put_contents('./imagem/'.$time.'.png', base64_decode($array['imagem']['base64']));
            
            var_dump($i);
             
             if(empty($_FILES['imagem']['name'])){
                
                return "1230";
                 
            }elseif($_FILES['imagem']['type'] != 'gif' || $_FILES['imagem']['type'] != 'jpg'  || $_FILES['imagem']['type'] != 'png'){
                
                return"1231";
                
            }elseif($_FILES['imagem']['size'] != 100){
                
                return"1232";
                
            } 
             
            */
           
            $file_name = $_FILES['imagem']['name'];
            $file_name_pieces = end(explode(".",  $file_name));

            $length = 20;
            $key = '';
            $keys = array_merge(range(0, 9), range('a', 'z'));

            for ($i = 0; $i < $length; $i++) 
            {
                $key .= $keys[array_rand($keys)];
            }

            $new_file_name = $key;

            $config['file_name']            = $new_file_name;
            $config['upload_path']          = './imagem/';
            $config['allowed_types']        = 'gif|jpg|png|bmp';
            $config['max_size']             = 2024;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;

            $this->load->library('upload');

            $this->upload->initialize($config);

            if ( ! $this->upload->do_upload('imagem'))
            {
                    //$error = array('error' => $this->upload->display_errors());

                    return $this->upload->display_errors();
            }
            else
            {

                    $imagem = '../../../imagem/'.$new_file_name.'.'.$file_name_pieces;
                    
                    $id = $this->session->userdata('id');
                    $this->db->where('id', $id);
                    $this->db->set('imagem', $imagem);
                    $this->db->update('usuarios');

                    return TRUE;
            }
           
        }

        
        
        public function m_list_usuario($id = NULL){
        
        if($id != NULL){
            
            $this->db->select('*');    
            $this->db->from('usuarios');
            $this->db->join('setor', 'usuarios.setor_fk = setor.idsetor');
            $this->db->where('id',$id);
        }
        
        return $this->db->get();
        
    }
    
    
        public function m_load_image(){
        
            $id = $this->session->userdata('id');
            
            $this->db->select('*');    
            $this->db->from('usuarios');
            $this->db->join('setor', 'usuarios.setor_fk = setor.idsetor');
            $this->db->where('id',$id);
        
            $return = $this->db->get();
            
            foreach($return ->result() as $row):
                $arr[] = array(
                    'imagem' => $row->imagem
                );
            endforeach;
            
            return json_encode($arr);
        
    }
    
    public function m_load_profile(){
        
         $id = $this->session->userdata('id');
        
        if($id != NULL){
            
            $this->db->select('*');    
            $this->db->from('usuarios');
            $this->db->join('setor', 'usuarios.setor_fk = setor.idsetor');
            $this->db->where('id',$id);
        }
        
        $return = $this->db->get();
        
        foreach ($return ->result() as $row):
            $arr[] = array(
                "id" => $row->id,
                "nome" => $row->nome,
                "email" => $row->email,
                "ramal" => $row->ramal,
                "perfil" => $row->perfil,
                "nomesetor" => $row->nomesetor,
                "status" => $row->status,
                "setor_fk" => $row->setor_fk,
                "senha" => $row->senha,
                "imagem" => $row->imagem
            );
        endforeach;
        
        return json_encode($arr);
        
    }
    
    
    
    public function m_update_profile() {
        
        $_POST = json_decode(file_get_contents('php://input'), true);
      
        $id = $this->input->post('id');

        $arr = array(
            'nome' => $this->input->post('nome'),
            'email' => $this->input->post('email'),
            'email' => $this->input->post('email'),
            'ramal' => $this->input->post('ramal'),
            'setor_fk' => $this->input->post('setor_fk')
        );

        if ($id != 0) {

            $this->db->where('id', $id);

            $return = $this->db->update('usuarios', $arr);
        } else {

            $return = $this->db->insert('usuarios', $arr);
        }

        if ($return) {

            return TRUE;
            
        } else {

            return FALSE;
        }
    }

}