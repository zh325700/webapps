<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index($page = 'login'){
		$this->load->view('pages_generalised/header_general');
		$this->load->view($page);
		$this->load->view('pages_generalised/footer');
	}
	
	public function Caregiver($page){
		$this->load->view('pages_generalised/header_caregiver');
		$this->load->view('pages_caregiver/'.$page);
		$this->load->view('pages_generalised/footer');
	}
	
	public function Resident($page){
		$this->load->view('pages_generalised/header_general');
		$this->load->view('pages_resident/'.$page);
		$this->load->view('pages_generalised/footer');
	}
}
