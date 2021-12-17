<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {
 //get user details
 public function getUserDetails($email)
  {
    $this->db->where('email', $email);

  }
}