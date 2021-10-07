<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function login()
	{
    $this->load->view('templates/header');
		$this->load->view('login');
    $this->load->view('templates/footer');
	}

  public function register()
  {
    $this->load->view('templates/header');
    $this->load->view('register');
    $this->load->view('templates/footer');

    //process registration form
    $this->form_validation->set_rules('name', 'Your Username', 'trim|required|min_lenght[3]');
    $this->form_validation->set_rules('password', 'Password', 'required');
    $this->form_validation->set_rules('passconf', 'Password Confirmation', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required');
  }
  public function resetpassword()
  {
    $this->load->view('templates/header');
    $this->load->view('resetpassword');
    $this->load->view('templates/footer');
  }
    public function verifypasswordresetcode()
  {
    $this->load->view('templates/header');
    $this->load->view('verifypasswordresetcode');
    $this->load->view('templates/footer');
  }
    public function newpassword()
  {
    $this->load->view('templates/header');
    $this->load->view('newpassword');
    $this->load->view('templates/footer');
  }

}

