<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index($page = 'login')
	{
		$this->load->view('generalised/header');
		$this->load->view($page);
		$this->load->view('generalised/footer');
	}
	
	public function Caregiver($page){
		$this->load->view('generalised/header');
		$this->load->view('caregiver/'.$page);
		$this->load->view('generalised/footer');
	}
	
	public function Resident($page){
		$this->load->view('generalised/header');
		$this->load->view('resident/'.$page);
		$this->load->view('generalised/footer');
	}
}
