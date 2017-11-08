<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MenuCaregiver_control
 *
 * @author lore
 */
class MenuC_control extends CI_Controller{
    
    public function __construct() {
        parent::__construct();
        //$this->load->Library('parser');
        $this->load->helper('url');
    }
    public function index(){
        $this->load->view('pages_care/menu_c');
    }
}
