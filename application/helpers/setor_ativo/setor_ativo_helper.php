<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('getSetorAtivo')) {
    
    function getSetorAtivo()
    {
    	$CI = get_instance();
    	$CI->load->model('setor/setor_model');

       	return $CI->setor_model->m_active_sector();
        //regra de nogócios onde permite que somente setores ativos sejam selecionados na view.
    }   
}
