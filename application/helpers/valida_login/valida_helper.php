<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('getValida')) 
   {
    
        function getValida()
        {
        $CI = get_instance();


       if(empty($CI->session->userdata('email')))
        {

        redirect('login/login_controller/proteger');

        }
            return true;
        }   
    }
