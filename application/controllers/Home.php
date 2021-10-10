<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function login()
	{

    //validate form input
    $this->form_validation->set_rules('email', 'Email', 'trim|required');
    $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');

    $this->load->view('templates/header');
		$this->load->view('login');
    $this->load->view('templates/footer');
	}

  public function register()
  {
     if(isset($_SESSION['login']) == TRUE){
         
            redirect('dashboard');
            
        }else
            
        {
        //Proccess registration form
        $this->form_validation->set_rules('sex', 'Your Sex');
        $this->form_validation->set_rules('name', 'Your Fullname', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required|min_length[5]');
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        
        
        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header');
            $this->load->view('register');
            $this->load->view('templates/footer');
        }else
        {
            //Collect Form Data
            $fullname   =   $this->input->post('name');
            $sex        =   $this->input->post('sex');
            $email      =   $this->input->post('email');
            $rawpass    =   $this->input->post('confirm_password');
            
            
            //Verify if user exist
            
            $result = $this->User_model->userExist($email);
            
            
            if($result == TRUE)
            {
                $error = "User Already Exist, Login";
                
                $this->session->set_flashdata('error', $error);
                
                redirect('home/login');
                
            }else
            {
                //Insert Data in Database
                
                $password   =   md5($rawpass);
                
                $result = $this->User_model->insertUserRegistrationData($email, $fullname, $sex, $password);
                
                if($result > 0)
                {
                    $success = "Registration Successfull, Login";
                
                    $this->session->set_flashdata('success', $success);
                    
                    redirect('home/login');
                    
                }else
                {
                
                    $error = "Registration not Successful, Try Again";
                
                    $this->session->set_flashdata('error', $error);
                    
                    redirect('home/register');
                }
                
                
            }
              
            
           }
        
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

