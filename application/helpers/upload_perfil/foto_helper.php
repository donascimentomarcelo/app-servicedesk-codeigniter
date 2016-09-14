<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('getFoto')) {
    
    function getFoto()
    {
    	$CI = get_instance();
        
        $config['upload_path']          = 'C:\xampp\htdocs\cd\application\imagem';
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;

        $CI->load->library('upload', $config);

        if ( ! $CI->upload->do_upload('imagem')){
            $error = array('error' => $CI->upload->display_errors());

            echo var_dump($error);
                        
        }else{
        
            return 1;
            
        }

    }   
}
/*
Realiza o uplod da imagem. Por enquanto, não está sendo utilizado.
*/