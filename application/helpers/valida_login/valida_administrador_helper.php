<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('getValidaAdministrador')) {
    
    function getValidaAdministrador()
    {
    $CI = get_instance();
    $CI2 = get_instance();
    
   if(empty($CI->session->userdata('email'))){
    
    redirect('login/login_controller/proteger');
    
    }else if($CI2->session->userdata('perfil') != 'administrador'){
    
     redirect('perfil/p_usuario');
    
    }
        return true;
    }   
}
