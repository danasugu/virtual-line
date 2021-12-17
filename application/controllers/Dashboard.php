<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    	public function index()
    	{
    	if(isset($_SESSION['login']) == TRUE){

    	$id = $this->session->userdata('id');
    	$email = $this->session->userdata('email');


    	$data['result'] = $this->Dashboard_model->getUserDetails($email);

    	// $data['msgCount'] = $this->Messages_model->getMessagesCount($email);

    	// $data['getPrice'] = $this->Orders_model->getSavedOrder($email);

    	// $data['getOrders'] = $this->Orders_model->getOrderDetails($email);

    	$this->load->view('templates/header');
    	$this->load->view('dashboard', $data);
    	$this->load->view('templates/footer');

    	}else

    	{
    	redirect('dashboard/logout');
    	}


    	}

		public function updateprofile()
    {
        $this->load->view('templates/header');
        $this->load->view('updateprofile');
        $this->load->view('templates/footer');
    }

		public function upgrade()
    {
        $this->load->view('templates/header');
        $this->load->view('upgrade');
        $this->load->view('templates/footer');
    }
		public function logout()
    {
        $this->load->view('templates/header');
        $this->load->view('logout');
        $this->load->view('templates/footer');
    }
}