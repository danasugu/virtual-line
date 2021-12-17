<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {
 //get user details
 public function getUserDetails($email)
  {
    $this->db->where('email', $email);
    $query = $this->db->get('users');
    return $query->row(); //return one row, one user


  }
}