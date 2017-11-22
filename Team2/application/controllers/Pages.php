<?php
    class Pages extends CI_Controller{
        public function __construct() {
            parent::__construct();
            $this->load->helper('url');
        }
        public function view($page = 'home'){ /*searching for home if not provided*/
            if(!file_exists(APPPATH.'views/pages_residents/'.$page.'.php')){
                show_404();
            }
            $questions=array("How do you think of the caregiver Anna?","Are you okay with the food provided in the morning?");
            $count = 0;
            $data['title'] = ucfirst($page);/*title variable = page variable in this case we passing about then show about*/
            $data['qnum1']=$questions[0];
            $data['qnum2']=$questions[1];
            
            $this->load->view('templates_residents/header');
            $this->load->view('pages_residents/'.$page,$data);
            $this->load->view('templates_residents/footer');
        }
                
        public function question(){
            $this->load->view('pages_residents/question');
            $this->load->view('templates_residents/footer');
        }
        
        public function menuRes(){
            $this->load->view('pages_residents/menuResidents');
            $this->load->view('templates_residents/footer');
        }
        
        public function loginRes(){
            $this->load->view('pages_residents/loginR');
            $this->load->view('templates_residents/footer');           
        }

    }