<?php
class categoria_model extends CI_Model{
    
    function __construct() 
    {
        parent::__construct();
    }
    
    public function MLoadCategory() 
    {
        $this->db->select("*");
        $this->db->from("categoria");

        $return = $this->db->get();

        foreach ($return->result()as $row):
            $arr[] = array(
                'idcategoria' => $row->idcategoria,
                'nomecategoria' => $row->nomecategoria
            );
        endforeach;

        return json_encode($arr);
    }
    
    public function MSaveOrEditCategory() 
    {
        $array = json_decode(file_get_contents('php://input'), true);

        $id = $array['idcategoria'];
        $nomecategoria = $array['nomecategoria'];

        $arr = array('nomecategoria' => $nomecategoria);

        if ($id != 0) {

            $this->db->where('idcategoria', $id);
            $return = $this->db->update('categoria', $arr);
        } else {

            $return = $this->db->insert('categoria', $arr);
        }

        return $return;
    }
    public function m_exibir_categoria(){
        
    }
    
}