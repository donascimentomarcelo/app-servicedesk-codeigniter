<?php

class usuario_model extends CI_Model {

    function __construct() 
    {

        parent::__construct();
    }

    public function m_list_user() 
    {

        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->join('setor', 'usuarios.setor_fk = setor.idsetor');

        $return = $this->db->get();

        foreach ($return->result() as $row):
            $arr[] = array(
                "id" => $row->id,
                "nome" => $row->nome,
                "email" => $row->email,
                "ramal" => $row->ramal,
                "perfil" => $row->perfil,
                "nomesetor" => $row->nomesetor,
                "status" => $row->status,
                "senha" => $row->senha,
                "setor_fk" => $row->setor_fk
            );
        endforeach;


        return json_encode($arr);
    }

    public function m_insert_or_edit_user() 
    {

        $array = json_decode(file_get_contents('php://input'), true);

        $arr = array(
            'nome' => $array['nome'],
            'email' => $array['email'],
            'senha' => $array['senha'],
            'perfil' => $array['perfil'],
            'status' => $array['status'],
            'ramal' => $array['ramal'],
            'setor_fk' => $array['setor_fk'],
            'imagem' => '../../../imagem/imagem_vazia.jpg'
        );
        
        if($this->input->post('id') != NULL)
        {
        $id = $this->input->post('id');
        }
        else
        {
        $id = 0;  
        }

        if ($id != 0) 
        {
            $this->db->where('id', $id);
            $success = $this->db->update('usuarios', $arr);
        } 
        else 
        {
            $success = $this->db->insert('usuarios', $arr);
        }

        if ($success) 
        {
            return TRUE;
        } 
        else 
        {
            return $this->db->_error_number();
        }
    }

}
