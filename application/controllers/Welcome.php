<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function index($page = 'login') {
        $this->load->model('Language_model');
        $data = $this->Language_model->getData($this->session->userdata('language'), 'login');

        $this->load->view('pages_generalised/loginpageheader');
        $this->parser->parse($page, $data);
        $this->load->view('pages_generalised/footer');
    }

    public function Caregiver($page) {
        $this->load->model('Language_model');
        $data = $this->Language_model->getData($this->session->userdata('language'), $page);
        $this->load->view('pages_generalised/caregiver');
        $this->parser->parse('pages_caregiver/' . $page, $data);
        $this->load->view('pages_generalised/footer');
    }

    public function Resident($page) {
        $this->load->model('Language_model');
        $data = $this->Language_model->getData('Dutch', $page);

        $this->load->view('pages_generalised/headerRes');
//  //      $this->load->view('pages_generalised/resident');
        $this->parser->parse('pages_resident/' . $page, $data);
        $this->load->view('pages_generalised/footer');
    }

    public function Overview($page) {
        $this->load->model('Language_model');
        $this->lang->load('Dutch_lang', 'dutch');
        $data = $this->Language_model->getData($this->session->userdata('language'), 'newOverView');
        $this->parser->parse('pages_caregiver/' . $page,$data);
    }
    public function LoadThankyou(){
        $this->load->view('pages_resident/thankyou');
    }

}
