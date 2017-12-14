<?php

class LoginResident extends CI_Controller {
    
    public function view(){
        $this->load->model('Residents_model');
        $sex = FALSE;
        if (isset($_GET['sex'])){
            $sex = $_GET['sex'];
        }
        $data['residents'] = $this->Residents_model->get_residents_by_sex($sex);
        $this->load->view('pages_generalised/header');
        $this->load->view('pages_resident/login_resident.php', $data);
        $this->load->view('pages_generalised/footer');
    }
    
    public function loadBySex(){
        $this->load->model('Residents_model');
        $sex = $_GET['sex'];
        $data['residents'] = $this->Residents_model->get_residents_by_sex($sex);
        $this->load->view('pages_generalised/header');
        $this->load->view('pages_resident/login_resident.php', $data);
        $this->load->view('pages_generalised/footer');
    }
    
    public function next(){
        
        $this->load->view('pages_resident/login_verification.php');
    }
}