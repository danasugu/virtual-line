<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends CI_Controller {

	public function index()
	{
		$this->load->view('templates/header');
		$this->load->view('messages');
    $this->load->view('templates/footer');

		// $result = $this->Messages_model->getMessages();
		// $data = $result;
		// $this->load->view('message', $data);


	}
	public function readmessage ()
	{
		$this->load->view('templates/header');
		$this->load->view('readmessage');
    $this->load->view('templates/footer');

	}
}