<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Home extends CI_Controller {


       //LOGIN ============================
	public function login()
	{
        if(isset($_SESSION['login']) == TRUE){

            redirect('dashboard');

        }else
        {

        //Validate form input
        $this->form_validation->set_rules('email', 'Email', 'trim|required');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header');
            $this->load->view('login');
            $this->load->view('templates/footer');
        }else
        {
            $email      =   $this->input->post('email');
            $rawpass    =   $this->input->post('password');

            $password   =   md5($rawpass);


            $result = $this->User_model->verifyLoginData($email, $password);

            if($result == FALSE)
            {
                $error = "User not Found. Please Register";

                $this->session->set_flashdata('error', $error);

                redirect('home/login');
            }else
            {
                //User logged in already
                $result = $this->User_model->getUserData($email);

                $data = array(

                    'fullname'  =>   $result->fullname,
                    'image'     =>   $result->image,
                    'email'     =>   $result->email,
                    'id'        =>   $result->id,
                    'login'     =>   TRUE

                );

                $this->session->set_userdata($data);

                redirect('dashboard');

            }



        }

      }//End of session checker

	}//End of login function


        //REGISTER  ============================
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



        //RESET PASSWORD ============================
    //Getting user email for password reset
     public function resetpassword()
	{
         if(isset($_SESSION['login']) == TRUE){

            redirect('dashboard');

        }else

        {


        //validating email input
        $this->form_validation->set_rules('email', 'Email', 'trim|required');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header');
            $this->load->view('resetpassword');
            $this->load->view('templates/footer');
        }else
        {

            //Get email
            $email = $this->input->post('email');

            //Check if email exist
            $result = $this->User_model->userEmailExist($email);

            $this->session->set_userdata('email', $email);

            if($result == TRUE)
            {
                //Email the user

                $token      =   md5(uniqid(rand(), true));

                $randcode   =   md5($email);

                $code       =   substr($randcode, 2,8);

                $status     =   "TRUE";


                $subject    =   "Password Reset Link | Virtualines";

                $message    =   "Dear Customer,\r\n You requested for a password reset on Virtualine Platform. \r\nKindly click on the link or copy and paste this link in your browser url to reset your password.\n\n This is your Link : ". base_url('home/verifytoken')."/?tokenID=" . $token . "&status=" . $status . " \n\nYour Reset Password Code is : " . $code . " \r\nThank You\r\nRegards, \r\nVirtualines Support \r\ninfo@virtualines.com";


                //Setting email config
                $config = Array(

                    'protocol'      =>      'smtp',
                    'smtp_host'     =>      'ssl://smtp.googlemail.com',
                    'smtp_port'     =>      465,
                    'smtp_user'     =>      'dana.sugu@gmail.com',
                    'smtp_pass'     =>      'password',
                    'mailtype'      =>      'html',
                    'charset'       =>      'iso-8859-1',
                    'wordwrap'      =>      TRUE

                );
                //Load library and pass in the config
                $this->load->library('email', $config);
                $this->email->set_newline('\r\n');

                $supportEmail   =   "reset@virtualine.com";
                $supportName    =   "Support Team";
                $email          =   $this->session->userdata('email');

                $this->email->from($supportEmail, $supportName);
                $this->email->to($email);


                $this->email->subject($subject);
                $this->email->message($message);

                if($this->email->send())
                {

                    //send data to the table
                    $data = array(

                        'email'     =>   $email,
                        'token'     =>   $token,
                        'code'      =>   $code,
                        'status'    =>   "TRUE"

                    );

                    //Call the model function to insert data in the reset password table
                    $result = $this->User_model->insertPassResetData($data);

                    if($result > 0)
                    {
                        $success = "Please check you email for password reset code";

                        $this->session->set_flashdata('success', $success);

                        redirect('home/login');
                    }



                }else
                {
                    $error = "Message not sent. Email not Valid. Re-enter Email";

                    $this->session->set_flashdata('error', $error);

                    redirect('home/resetpassword');
                }



            }else
            {
                $error = "Email not Valid.... Re-enter Email";

                $this->session->set_flashdata('error', $error);

                redirect('home/resetpassword');

            }


        }

        }

	}


     public function verifytoken()
	{
         if(isset($_SESSION['login']) == TRUE){

            redirect('dashboard');

        }else
        {
        $url        =   parse_url($_SERVER['REQUEST_URI']);
                        parse_str($url['query'], $params);

        $tokenid    =   $params['tokenID'];

        $status     =   $params['status'];

        //Check if the code and token and status are valid

        $result = $this->User_model->verifytoken($tokenid, $status);

        if($result == false)
        {
            $error = "Sorry, Token Expired. Try Again";

            $this->session->set_flashdata('error', $error);

            redirect('home/resetpassword');

        }else
        {
            $userEmail = $result;

            $this->session->set_userdata('userEmail', $userEmail);

            $success = "Your Token has been verified For " . $userEmail . " Please Enter Code";

            $this->session->set_flashdata('success', $success);

            redirect('home/verifypasswordcode');

        }


        }


	}

        //VERIFY PASSWORD ============================
    public function verifypasswordcode()
    {

        if(isset($_SESSION['login']) == TRUE){

            redirect('dashboard');

        }else

        {

        $this->form_validation->set_rules('resetcode', 'Reset Code', 'trim|required|min_length[7]');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header');
            $this->load->view('verifypasswordresetcode');
            $this->load->view('templates/footer');
        }else
        {
            $code = $this->input->post('resetcode');

            $result = $this->User_model->verifycode($code);

            if($result)
            {
                redirect('home/newpassword');

            }else
            {
                $error = "Sorry, Password Reset Code Invalid. Try Again";

                $this->session->set_flashdata('error', $error);

                redirect('home/resetpassword');
            }
        }
      }
    }

    //NEW PASSWORD ============================
      public function newpassword()
	{
         if(isset($_SESSION['login']) == TRUE){

            redirect('dashboard');

        }else

        {

        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');
        $this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required|min_length[5]');

        if($this->form_validation->run() == FALSE)
        {
            $this->load->view('templates/header');
            $this->load->view('newpassword');
            $this->load->view('templates/footer');
        }else
        {
            $rawpass    =   $this->input->post('confirm_password');

            $password   =   md5($rawpass);

            $email      =   $this->session->userdata('userEmail');


            $result = $this->User_model->updateNewPassword($email, $password);

            if($result > 0)
            {
                //Change the status in the password reset table to FALSE
                $status     = "FALSE";
                $email      = $this->session->userdata('userEmail');
                $result     = $this->User_model->updatePasswordResetStatus($email, $status);

                if($result > 0){

                     $success = "Your Password Successfully Changed. Please Login";

                    $this->session->set_flashdata('success', $success);

                    redirect('home/login');
                }

            }

          }

        }
	}













}