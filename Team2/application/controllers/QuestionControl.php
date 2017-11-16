<?php

/**
 * Description of QuestionControl
 *
 * @author lore
 */
class QuestionControl extends CI_Controller{
    public function __construct() {
        parent::__construct();
        //$this->load->Library('parser');
        $this->load->helper('url');
    }
    public function index(){
        $this->load->view('pages_residents/question');
    }
}
