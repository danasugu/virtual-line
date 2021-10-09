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
    $this->form_validation->set_rules('name', 'Username', 'trim|required|min_length[3]');
    $this->form_validation->set_rules('sex', 'Your Gender');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
    $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required|min_length[5]');
    $this->form_validation->set_rules('email', 'Email', 'trim|required');

    //check if all validation went thru
    if($this->form_validation->run() == FALSE){
        $this->load->view('templates/header');
        $this->load->view('register');
        $this->load->view('templates/footer');
    } else{
            //collect form data
           $fullname   =  $this->input->post('name');
           $sex           =  $this->input->post('sex');
           $email        =  $this->input->post('email');
           $rowpass    =  $this->input->post('confirm_password');


          //verify if user exists or not - grap the result in avariable (result)

          $result = $this->User_model->userExist($email);

            if($result ==TRUE) 
            {
              redirect('home/login');
            } else
            {
              //insert data into DB
              //hash the password
            $password =     md5($rowpass);
              //create an array to pass the data
              // $data = array
            }



            //redirect to login page

    }

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

