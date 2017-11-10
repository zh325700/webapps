<?php
    class LoginR_control extends CI_Controller {
        
        public function __construct() {
            parent::__construct();
            $this->load->helper('url');
        }
        
        public function index(){
            $this->load->view('pages_residents/loginR'); 
        }
        
    }

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

