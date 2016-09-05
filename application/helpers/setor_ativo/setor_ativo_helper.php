<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('getSetorAtivo')) {
    
    function getSetorAtivo()
    {
    	$CI = get_instance();
    	$CI->load->model('usuario_model');

       	return $CI->usuario_model->setor_ativo();
        //regra de nogócios onde permite que somente setores ativos sejam selecionados na view.
    }   
}
