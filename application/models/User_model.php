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

  public function insertUserRegistrationData($email, $fullname, $sex, $password)
  {
      $data = array(
        'fullname'  => $fullname,
        'sex'          => $sex,
        'password' => $password,
        'email'       => $email
      );
      $this->db->insert('users', $data);
      $insert_id =  $this->insert_id();
      
      return $insert_id;
  }