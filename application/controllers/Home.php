<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function login()
	{
    $this->load->view('templates/header');
		$this->load->view('login');
	}

  public function register()
  {
    $this->load->view('templates/header');
    $this->load->view('register');
  }
}

