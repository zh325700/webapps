<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index($page = 'login')
	{
		$this->load->view('generalised/header');
		$this->load->view($page);
		$this->load->view('generalised/footer');
	}
}
