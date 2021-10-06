<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agents extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('agent');
		$this->load->view('templates/footer');
	}

		public function agents()
	{
		$this->load->view('templates/header');
		$this->load->view('agents');
		$this->load->view('templates/footer');
	}
}