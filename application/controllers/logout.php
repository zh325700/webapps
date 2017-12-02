<?php
class logout extends CI_Controller{
    
    function index(){
        $this->load->helper('url');
        $this->load->helper('cookie');
        
        require_once('includes/functions.php');//You can't use the baseurl()
        //$this->load->model('functions');
        sec_session_start();
        //$this->functions->sec_session_start();
         
        //Unset all session values
        $_SESSION=array();
        //$this->session->unset_userdata($_SESSION);
        
        //Delete the actual cookie
        delete_cookie(session_name());
        
        //destroy sessio,
        session_destroy();
        //this->session->sess_destroy();
        
        redirect('Welcome','index');
        exit();
    }
}
