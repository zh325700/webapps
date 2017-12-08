<?php
class Process_login extends CI_Controller{
    function user_login(){
        $this->load->model('functions_model');
               
        $user=$this->input->post('email');
        $password=$this->input->post('p');//The hashed password
        if(isset($user,$password)){
            
            if($this->functions_model->login($user,$password)==true){
                //login succes
                redirect('Welcome/Caregiver/overview','refresh'); 
            }
            else{
                //login failed
                echo "<script>console.log('LOGIN FAILED, wrong password or username');</script>";
                redirect('Welcome','refresh');
            } 
        }
        else{
            //The correct POST variables were not sent to this page
            echo "<script> console.log('LOGIN FAILED, system failed');</script>";
            redirect('Welcome','refresh');
        }
    }
}

