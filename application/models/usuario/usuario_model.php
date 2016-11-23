<?php

class usuario_model extends CI_Model {

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

    function setor_ativo() {

        $this->db->select('*');
        $this->db->from('setor');
        $this->db->where('statussetor', 'ativo');

        $retorno = $this->db->get();

        return $retorno;
    }

    public function m_salvar_usuario($imagem) {

        $id = $this->input->post('id');

        if (empty($imagem)) {

            if ($id != 0) {

                $dados = array(
                    'nome' => $this->input->post('nome'),
                    'email' => $this->input->post('email'),
                    'senha' => $this->input->post('senha'),
                    'perfil' => $this->input->post('perfil'),
                    'status' => $this->input->post('status'),
                    'ramal' => $this->input->post('ramal'),
                    'setor_fk' => $this->input->post('setor_fk')
                );

                $this->db->where('id', $id);

                $query = $this->db->update('usuarios', $dados);
            } else {

                $dados = array(
                    'nome' => $this->input->post('nome'),
                    'email' => $this->input->post('email'),
                    'senha' => $this->input->post('senha'),
                    'perfil' => $this->input->post('perfil'),
                    'status' => $this->input->post('status'),
                    'ramal' => $this->input->post('ramal'),
                    'setor_fk' => $this->input->post('setor_fk'),
                    'imagem' => '../../../imagem/imagem_vazia.jpg'
                );

                $query = $this->db->insert('usuarios', $dados);
            }
        } else {

            $dados = array(
                'nome' => $this->input->post('nome'),
                'email' => $this->input->post('email'),
                'senha' => $this->input->post('senha'),
                'perfil' => $this->input->post('perfil'),
                'status' => $this->input->post('status'),
                'ramal' => $this->input->post('ramal'),
                'setor_fk' => $this->input->post('setor_fk'),
                'imagem' => $imagem
            );

            if ($id != 0) {

                $this->db->where('id', $id);

                $query = $this->db->update('usuarios', $dados);
            } else {

                $query = $this->db->insert('usuarios', $dados);
            }
        }

        if ($query) {

            return TRUE;
        } else {

            return FALSE;
        }
    }

    public function m_list_usuario($id = NULL) {

        if ($id != NULL) {

            $this->db->select('*');
            $this->db->from('usuarios');
            $this->db->join('setor', 'usuarios.setor_fk = setor.idsetor');
            $this->db->where('id', $id);
        }

        return $this->db->get();
    }

    public function m_list_usuario_angular() {

        $id = $this->session->userdata('id');

        $this->db->select('*');
        $this->db->from('usuarios');
        $this->db->join('setor', 'usuarios.setor_fk = setor.idsetor');
        $this->db->where('id', $id);


        $data = $this->db->get();

        foreach ($data->result() as $row):
            $arr[] = array(
                'nomemenu' => $row->nome,
                'imagemmenu' => $row->imagem,
                'setormenu' => $row->nomesetor
            );
        endforeach;

        return json_encode($arr);
    }

    public function del_usuario($id) {

        $this->db->where('id', $id);

        if ($this->db->delete('usuarios')) {

            return TRUE;
        } else {

            return FALSE;
        }
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
