<?php
class Logout extends CI_Controller{
    
    function index(){         
        //Unset all session values
        $this->session->unset_userdata($_SESSION);
        
        //Delete the actual cookie
        //delete_cookie(session_name());
        
        //destroy sessio,
        $this->session->sess_destroy();
        
        redirect('Welcome','refresh');
        exit();
    }
}
