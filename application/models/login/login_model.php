<?php

class login_model extends CI_Model{
    
    function __construct() 
    {
        
        parent::__construct();
        
    }  
    
        function buscaPorEmailSenha()
       {

           $this->db->select('*');
           $this->db->from('usuarios');
           $this->db->where('email', $this->input->post('email'));
           $this->db->where('senha', $this->input->post('senha'));
          // $this->db->where('status', 'ativo');
           $this->db->limit(1);

           $usuario = $this->db->get();

           if($usuario->num_rows() == 1)
           {
               foreach ($usuario->result() as $row):

                   $session = array(
                       'perfil' => $row->perfil,
                       'email' => $row->email,
                       'ip' => getenv("REMOTE_ADDR"),
                       'status' => $row->status,
                       'nome' => $row->nome,
                       'id' => $row->id,
                       'logado' => true
                   );

               endforeach;

               $this->session->set_userdata($session);

               if  ($session['status'] == 'inativo')
               {

                    return 'StatusInativo';

               } 
               elseif($session['perfil'] == 'usuario') 
               {

                   redirect('perfil/p_usuario');

               }
               elseif($session['perfil'] == 'administrador')
               {
                  redirect('perfil/p_administrador');
               }
               }
    
        }
        
        public function destroy_session() 
        {
            $this->session->sess_destroy();
            return TRUE;
        }
 
    }
