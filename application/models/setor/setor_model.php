<?php

class setor_model extends CI_Model{
    
    function __construct() 
    {
        
        parent::__construct();
        
    }  
    
    public function m_loadSector()
    {
        $this->db->select("*");
        $this->db->from("setor");
        $this->db->order_by("idsetor", "desc");

        $return = $this->db->get();

        foreach ($return->result() as $row):
            $arr[] = array(
                'idsetor' => $row->idsetor,
                'nomesetor' => $row->nomesetor,
                'statussetor' => $row->statussetor
            );
        endforeach;

        return json_encode($arr);
    }
    
    public function m_save_or_edit_sector()
    {
        $array = json_decode(file_get_contents('php://input'), true);

        $idsetor = $array["idsetor"];

        $arr = array(
            'nomesetor' => $array["nomesetor"],
            'statussetor' => $array["statussetor"]
        );

        if ($idsetor != 0) {

            $this->db->where("idsetor", $idsetor);
            $return = $this->db->update("setor", $arr);
        } else {

            $return = $this->db->insert("setor", $arr);
        }

        return $return;
    }
    
    public function m_active_sector() 
    {
        
        $this->db->select('*');
        $this->db->from('setor');
        $this->db->where('statussetor', 'ativo');

        $data = $this->db->get();

        foreach ($data->result() as $row):

            $arr[] = array(
                'idsetor' => $row->idsetor,
                'nomesetor' => $row->nomesetor,
                'statussetor' => $row->statussetor
            );

        endforeach;

        return json_encode($arr);
    }
}