<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Messages extends CI_Controller {

	public function index()
	{
		$result = $this->Messages_model->getMessages();
		$data = $result;
		$this->load->view('message', $data);
	}
}