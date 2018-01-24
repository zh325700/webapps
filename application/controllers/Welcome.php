<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function index($page = 'login') {
        $this->load->model('Language_model');
        $data = $this->Language_model->getData($this->session->userdata('language'), 'login');
        $this->load->view('pages_generalised/header');
        $this->load->view('pages_generalised/loginpage');
        $this->parser->parse($page, $data);
        $this->parser->parse('pages_generalised/footer',$data['footer']);
    }

    public function Caregiver($page) {
        $this->load->model('Language_model');
        $data = $this->Language_model->getData($this->session->userdata('language'), $page);
        $this->load->view('pages_generalised/header');
        $this->parser->parse('pages_generalised/caregiver',$data['header']);
        $this->parser->parse('pages_caregiver/' . $page, $data);
        $this->parser->pasre('pages_generalised/footer',$data['footer']);
    }

    public function Resident($page) {
        $this->load->model('Language_model');
        $data = $this->Language_model->getData('Dutch', $page);
        $this->load->view('pages_generalised/header');
        $this->load->view('pages_generalised/residents');
        $this->parser->parse('pages_resident/' . $page, $data);
        $this->parser->parse('pages_generalised/footer',$data['footer']);
    }

    public function Overview($page) {
        $this->load->model('Language_model');
        $this->lang->load('Dutch_lang', 'dutch');
        $data = $this->Language_model->getData($this->session->userdata('language'), 'newOverView');
        $this->parser->parse('pages_generalised/header',$data['header']);
        $this->parser->parse('pages_caregiver/' . $page,$data);
        $this->parser->parse('pages_generalised/footer',$data['footer']);
    }
    public function LoadThankyou(){
        $this->load->view('pages_resident/thankyou');
    }

}
