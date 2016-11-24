<?php

class usuario_model extends CI_Model {

    function __construct() {

        parent::__construct();
    }

    public function m_list_user() {

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
                "setor_fk" => $row->setor_fk
            );
        endforeach;


        return json_encode($arr);
    }

    public function m_insert_or_edit_user() {

        $_POST = json_decode(file_get_contents('php://input'), true);

        $arr = array(
            'nome' => $this->input->post('nome'),
            'email' => $this->input->post('email'),
            'senha' => $this->input->post('senha'),
            'perfil' => $this->input->post('perfil'),
            'status' => $this->input->post('status'),
            'ramal' => $this->input->post('ramal'),
            'setor_fk' => $this->input->post('setor_fk'),
            'imagem' => '../../../imagem/imagem_vazia.jpg'
        );

        $id = $this->input->post('id');

        if ($id != 0) {

            $this->db->where('id', $id);
            $success = $this->db->update('usuarios', $arr);
        } else {

            $success = $this->db->insert('usuarios', $arr);
        }

        if ($success) {

            return TRUE;
        } else {

            return FALSE;
        }
    }

}
