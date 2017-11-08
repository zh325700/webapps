<?php
    class Posts extends CI_Controller{
        public function __construct() {
            parent::__construct();
            //$this->load->Library('parser');
            $this->load->helper('url');
        }
        
        public function index(){ 
            //$data['title'] = 'latest Posts';
            
            $this->load->view('templates_residents/header');
           // $this->load->view('posts_residents/index',$data);
            $this->load->view('templates_residents/footer');
        }
    }