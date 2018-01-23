<?php

class ResidentLogin extends CI_Controller {
    
    public function view(){
        $this->load->model('Language_model');
        $data=$this->Language_model->getData($this->session->userdata('language'),'loginres');
        $this->load->model('Residents_model');
        $sex = FALSE;
        if (isset($_GET['sex'])){
            $sex = $_GET['sex'];
        }
        $data['division'] = "Kies een verdieping";
        $data['residents'] = $this->Residents_model->get_residents_by_sex($sex);
        $this->load->view('pages_generalised/header');
        $this->parser->parse('pages_resident/login_resident.php', $data);
        $this->parser->parse('pages_generalised/footer',$data['footer']);
    }
    
    public function loadBySex(){
        $this->load->model('Residents_model');
        $sex = $_GET['sex'];
        $data['residents'] = $this->Residents_model->get_residents_by_sex($sex);
        $this->load->view('pages_generalised/header.php');
        $this->load->view('pages_resident/login_resident.php', $data);
        $this->load->view('pages_generalised/footer');
    }
    
    public function verification(){
        $id = $_GET['id'];
        $this->load->model('Residents_model');
        $this->load->model('Language_model');
        $idvalue=$this->Residents_model->get_residents($id)["ID_Elder"];
        $data=$this->Language_model->getData($this->session->userdata('language'),'loginverres',$idvalue);
        $data['resident'] = $this->Residents_model->get_residents($id);
        $this->load->view('pages_generalised/header.php');
        $this->parser->parse('pages_resident/login_verification.php', $data);
        $this->parser->parse('pages_generalised/footer',$data['footer']);
    }
}