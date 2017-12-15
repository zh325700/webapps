<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function index($page = 'login') {
        $this->load->model('Language_model');
        if ($this->input->post('language') == 'Dutch') {
            $this->lang->load('Dutch_lang', 'dutch');
        } else {
            $this->lang->load('english_lang', 'english');
        }
        $data = $this->Language_model->getData('Dutch', 'login');

        $this->load->view('pages_generalised/header');
        $this->parser->parse($page, $data);
        $this->load->view('pages_generalised/footer');
    }

    public function Caregiver($page) {
        $this->load->model('Language_model');
        $this->lang->load('Dutch_lang', 'dutch');
        $data = $this->Language_model->getData('Dutch', $page);

        $this->load->view('pages_generalised/header');
        $this->load->view('pages_generalised/caregiver');
        $this->parser->parse('pages_caregiver/' . $page, $data);
        $this->load->view('pages_generalised/footer');
    }

    public function Resident($page) {
        $this->load->model('Language_model');
        $this->lang->load('Dutch_lang', 'dutch');
        $data = $this->Language_model->getData('Dutch', $page);

        $this->load->view('pages_generalised/header');
        $this->load->view('pages_generalised/resident');
        $this->parser->parse('pages_resident/' . $page, $data);
        $this->load->view('pages_generalised/footer');
    }

    public function Overview($page) {
        $this->load->view('pages_caregiver/' . $page);
    }

}
