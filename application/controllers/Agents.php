<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Agents extends CI_Controller {

	public function index()
	{
		$this->load->view('agent');
	}
}