<?php
class process_login extends CI_Controller{
    function index(){
        $this->load->helper('url');
        $this->load->helper('cookie');
        
        require_once('includes/functions.php');//You can't use the baseurl()
        //$this->load->model('functions');
        require_once('includes/db_connect.php');//You can't use the baseurl()
        //$this->load->model('db_connect');
        sec_session_start();
        //$this->functions->sec_session_start();
       
        $user=$this->input->post('user');
        $password=$this->input->post('p');//The hashed password    
        if(isset($user,$pas)){
            
            if(login($user,$password, $mysqli)==true){
                //login succes
                redirect('Welcome','Caregiver(overview)'); 
            }
            else{
                //login failed
                echo "<script>console.log('LOGIN FAILED, wrong password or username');</script>";
                redirect('Welcome','index');
            } 
        }
        else{
            //The correct POST variables were not sent to this page
            echo "<script> console.log('LOGIN FAILED, system failed');</script>";
            redirect('Welcome','index');
        }
    }
}

