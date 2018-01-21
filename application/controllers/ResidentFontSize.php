<?php
    class ResidentFontSize extends CI_Controller {
        
        public function __construct() {
            parent::__construct();
            $this->load->helper('url');
        }
        
        public function index(){
           // $data['residents'] = $this->Residents_model->get_residents($ID_Elder);
            $this->load->view('pages_generalised/header');
            $this->load->view('pages_generalised/residents');
            $this->load->view('pages_resident/fontsizechoose');
            $this->load->view('pages_generalised/footer');
        }
        
        public function update_ResidentFontSize($fontSize,$ID_Elder = 1) {
            $data['residents'] = $this->Residents_model->get_residents($ID_Elder);
            $this->Residents_model->ResidentFontSize($fontSize,$ID_Elder);
         //   redirect to the main resident page 
            redirect('Welcome/Resident/menu','refresh');
       }
        
    }

