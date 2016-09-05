<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('getValidaAdministrador')) {
    
    function getValidaAdministrador()
    {
    	
    if(empty(($this->session->userdata('email')))){
    
    redirect('login/login_controller/proteger');
    
    }else if($this->session->userdata('perfil') != 'administrador'){
    
     redirect('perfil/p_usuario');
    
    }
        
    }   
}
