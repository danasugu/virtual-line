<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

  public function getUser($email)
  {
    $this->db->where(email', $email);  
    $query = $this->db->get('users');  
  }
 
  // public function getMessages()
  // {
  //   $this->db->get('messages');
  //   $query = $this->result();
  //   return $query;
  // }
}