<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Uploadfile extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('fileupload');
		$this->load->view('templates/footer');
	}
}