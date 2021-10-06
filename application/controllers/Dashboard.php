<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function index()
    {
        $this->load->view('templates/header');
        $this->load->view('dashboard');
        $this->load->view('templates/footer');
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