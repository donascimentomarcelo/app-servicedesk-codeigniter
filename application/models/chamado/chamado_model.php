<?php

class chamado_model extends CI_Model
{

    function __construct()
    {

        parent::__construct();
    }

    public function m_salvar_chamado()
    {

        $idchamado = $this->input->post("idchamado");
        $id = $this->session->userdata('id');

        if ($idchamado != 0)
        {

            $this->db->where("idchamado", $idchamado);

            $dados = array(
                "nometec" => $this->input->post('nometecnico'),
                "emailtec" => $this->input->post('emailtecnico'),
                "ramaltec" => $this->input->post('ramaltecnico'),
                "nomechamado" => $this->input->post('nomechamado'),
                "codusuario" => $this->input->post('usuarios_fk'),
                "statuschamado" => $this->input->post('statuschamado'),
                "descricao" => $this->input->post('descricao'),
                "setor_fk" => $this->input->post('setor_fk'),
            );

            $query = $this->db->update("chamado", $dados);


            if ($query)
            {

                $agora = date('Y-m-d H:i:s');

                $i = $this->input->post('statuschamado');

                if ($i == 'aguardando')
                {

                    $status = 'Aguardando Atendimento';
                }
                elseif ($i == 'ematendimento')
                {

                    $status = 'Em Atendimento';
                } 
                elseif ($i == 'encerrar')
                {

                    $status = 'Encerrado';
                }
                elseif ($i == 'reabrir')
                {

                    $status = 'Reaberto';
                }

                $historico = array(
                    "nometecnico" => $this->input->post('nometecnico'),
                    "emailtecnico" => $this->input->post('emailtecnico'),
                    "ramaltecnico" => $this->input->post('ramaltecnico'),
                    "justificativa" => $this->input->post('justificativa'),
                    "usuarios_fk" => $this->input->post('usuarios_fk'),
                    "chamado_fk" => $this->input->post('idchamado'),
                    "statuschamado" => $status,
                    "data" => $agora
                );
                $query = $this->db->insert("historico", $historico);
            }
        }
        else
        {

            $sla = $this->input->post('sla');

            $sla = (int) $sla;

            $inicio = date('Y-m-d H:i:s');
            $fim = date('Y-m-d H:i:s', strtotime("+$sla hours", strtotime($inicio)));

            $dados = array(
                "usuarios_fk" => $id,
                "nomechamado" => $this->input->post('nomechamado'),
                "nome" => $this->input->post('nome'),
                "email" => $this->input->post('email'),
                "ramal" => $this->input->post('ramal'),
                "descricao" => $this->input->post('descricao'),
                "statuschamado" => $this->input->post('statuschamado'),
                "subcategoria_fk" => $this->input->post('subcategoria_fk'),
                "categoria_fk" => $this->input->post('categoria_fk'),
                "setor_fk" => $this->input->post('setor_fk'),
                "statuschamado" => 'aguardando',
                "datainicial" => $inicio,
                "datafinal" => $fim
            );

            $query = $this->db->insert("chamado", $dados);

            echo $query;
        }

        if ($query)
        {

            return TRUE;
        } 
        else
        {

            return FALSE;
        }
    }

    public function exibe_chamado()
    {

        $this->db->where("statuschamado", 'aguardando');

        $variaveis = $this->db->get("chamado")->result_array();


        for ($i = 0; $i < count($variaveis); $i++)
        {

            $inicio = $variaveis[$i]['datainicial'];
            $fim = $variaveis[$i]['datafinal'];

            date_default_timezone_set('America/Sao_Paulo');

            $inicio = new DateTime($inicio);
            $fim = new DateTime($fim);
            $agora = new DateTime();

            $diffInicioFim = $fim->getTimestamp() - $inicio->getTimestamp();
            $diffInicioAgora = $agora->getTimestamp() - $inicio->getTimestamp();

            $porcentagem = $diffInicioAgora / $diffInicioFim * 100;


            if ($porcentagem < 25)
            {

                $class = 'success';
            } 
            else if ($porcentagem > 25 && $porcentagem <= 81)
            {

                $class = 'warning';
            } 
            else if ($porcentagem >= 81 && $porcentagem <= 100)
            {

                $class = 'danger';
            } 
            else if ($porcentagem >= 100)
            {

                $porcentagem = 100;
                $class = 'danger';
            }

            $variaveis[$i] += ['porcentagem' => $porcentagem, 'class' => $class];
        }

        return json_encode($variaveis);
    }

    public function exibe_chamado_atendimento()
    {

        $id = $this->session->userdata('id');

        $this->db->where("statuschamado", 'ematendimento');
        $this->db->where("usuarios_fk", $id);

        $variaveis = $this->db->get("chamado")->result_array();


        for ($i = 0; $i < count($variaveis); $i++)
        {

            $inicio = $variaveis[$i]['datainicial'];
            $fim = $variaveis[$i]['datafinal'];

            date_default_timezone_set('America/Sao_Paulo');

            $inicio = new DateTime($inicio);
            $fim = new DateTime($fim);
            $agora = new DateTime();

            $diffInicioFim = $fim->getTimestamp() - $inicio->getTimestamp();
            $diffInicioAgora = $agora->getTimestamp() - $inicio->getTimestamp();

            $porcentagem = $diffInicioAgora / $diffInicioFim * 100;


            if ($porcentagem < 25)
            {

                $class = 'success';
            } 
            else if ($porcentagem > 25 && $porcentagem <= 81)
            {

                $class = 'warning';
            }
            else if ($porcentagem >= 81 && $porcentagem <= 100)
            {

                $class = 'danger';
            } 
            else if ($porcentagem >= 100)
            {

                $porcentagem = 100;
                $class = 'danger';
            }

            $variaveis[$i] += ['porcentagem' => $porcentagem, 'class' => $class];
        }

        return $variaveis;
    }

    public function m_list_chamado($idchamado = NULL)
    {

        if ($idchamado != NULL)
        {
            $this->db->select('*');
            $this->db->from('chamado');
            $this->db->join('usuarios', 'chamado.usuarios_fk = usuarios.id');
            $this->db->join('setor', 'chamado.setor_fk = setor.idsetor');
            $this->db->join('categoria', 'chamado.categoria_fk = categoria.idcategoria');
            $this->db->join('subcategoria', 'chamado.subcategoria_fk = subcategoria.idsubcategoria');
            $this->db->where("idchamado", $idchamado);
            //$this->db->where("idchamado", $idchamado);
        }

        return $this->db->get();
    }

    public function m_historico($idchamado = NULL)
    {

        if ($idchamado != NULL)
        {
            $this->db->select('*');
            $this->db->from('chamado');
            //$this->db->join('historico', 'historico.chamado_fk = chamado.idchamado');
            $this->db->join('setor', 'chamado.setor_fk = setor.idsetor');
            $this->db->join('categoria', 'chamado.categoria_fk = categoria.idcategoria');
            $this->db->join('subcategoria', 'chamado.subcategoria_fk = subcategoria.idsubcategoria');
            $this->db->join('usuarios', 'chamado.usuarios_fk = usuarios.id');
            $this->db->where("idchamado", $idchamado);
        }

        return $this->db->get();
    }

    public function m_historico_ajax()
    {
            $_POST = json_decode(file_get_contents('php://input'),true);
        
            $idchamado = $this->input->post('idchamado');

            $this->db->select('*');
            $this->db->from('chamado');
            $this->db->join('historico', 'historico.chamado_fk = chamado.idchamado');
            $this->db->where("idchamado", $idchamado);
        

            $return = $this->db->get();
             
            foreach ($return -> result() as $row):
                $arr[] = array(
                    'idhistorico'=>$row->idhistorico, 
                    'nometecnico'=>$row->nometecnico, 
                    'ramaltecnico'=>$row->ramaltecnico,
                    'emailtecnico'=>$row->emailtecnico, 
                    'data'=>$row->data, 
                    'statuschamado'=>$row->statuschamado,
                    'justificativa'=>$row->justificativa, 
                    'chamado_fk'=>$row->chamado_fk,  
                    'usuarios_fk'=>$row->usuarios_fk
                );
            endforeach; 
            
            return json_encode($arr);
    }

    public function m_historico_datalhado($idhistorico = NULL)
    {

        if ($idhistorico != NULL)
        {

            $this->db->where("idhistorico", $idhistorico);
        }

        return $this->db->get('historico');
    }

    public function m_historico_tabela($idchamado = NULL)
    {

        if ($idchamado != NULL)
        {
            $this->db->select('*');
            $this->db->from('chamado');
            $this->db->join('historico', 'historico.chamado_fk = chamado.idchamado');
            $this->db->where("idchamado", $idchamado);
        }

        return $this->db->get();
    }

    function m_meus_chamados()
    {

        $id = $this->session->userdata('id');

        $this->db->where("usuarios_fk", $id);

        $variaveis = $this->db->get("chamado")->result_array();


        for ($i = 0; $i < count($variaveis); $i++)
        {

            $inicio = $variaveis[$i]['datainicial'];
            $fim = $variaveis[$i]['datafinal'];

            date_default_timezone_set('America/Sao_Paulo');

            $inicio = new DateTime($inicio);
            $fim = new DateTime($fim);
            $agora = new DateTime();

            $diffInicioFim = $fim->getTimestamp() - $inicio->getTimestamp();
            $diffInicioAgora = $agora->getTimestamp() - $inicio->getTimestamp();

            $porcentagem = $diffInicioAgora / $diffInicioFim * 100;


            if ($porcentagem < 25)
            {

                $class = 'success';
            } 
            else if ($porcentagem > 25 && $porcentagem <= 81)
            {

                $class = 'warning';
            } 
            else if ($porcentagem >= 81 && $porcentagem <= 100)
            {

                $class = 'danger';
            } 
            else if ($porcentagem >= 100)
            {

                $porcentagem = 100;
                $class = 'danger';
            }

            $variaveis[$i] += ['porcentagem' => $porcentagem, 'class' => $class];
        }

        return json_encode($variaveis);
    }

}
