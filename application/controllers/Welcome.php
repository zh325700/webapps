<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
		$this->load->view('generalised/header');
		$this->load->view('login');
		$this->load->view('generalised/footer');
	}
}
