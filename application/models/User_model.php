<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

  public function userExist($email)
  {
    $this->db->where('email', $email); 
        $query = $this->db->get('users');  
        if($query->num_row() >0) 
        {
          return TRUE;
        } else
        {
          return FALSE;
        }
  }
 
  // insert user registration data

  