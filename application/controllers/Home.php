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

    //process registration form
    $this->form_validation->set_rules('sex', 'Your Gender');
    $this->form_validation->set_rules('name', 'Your Username', 'trim|required|min_lenght[3]');
    $this->form_validation->set_rules('password', 'Password', 'required|min_lenght[5]');
    $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required|min_lenght[5]');
    $this->form_validation->set_rules('email', 'Email', 'trim|required');

    //check if all validation went thru
    if($this->form_validation->run() == FALSE{
    $this->load->view('templates/header');
    $this->load->view('register');
    $this->load->view('templates/footer');
    })

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

