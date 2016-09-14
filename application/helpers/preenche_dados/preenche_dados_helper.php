<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('getPreencheDados')) {
    
    function getPreencheDados()
    {
    	$CI = get_instance();
    	$CI->load->model('perfil_pessoal/perfil_pessoal_model');
        
        $id = $CI->session->userdata('id');
        
        $dados = $CI->perfil_pessoal_model->m_list_usuario($id);
        
        return $dados;
    }   
}
        