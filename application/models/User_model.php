<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model
{
    //check to see if the user exists
    public function userExist($email)
    {
        $this->db->where('email', $email);
        
        $query = $this->db->get('users');
        
        if($query->num_rows() > 0)
        {
            return TRUE;
            
        }else
        {
            return FALSE;
        }
    }
 
    // insert user registration data

    public function insertUserRegistrationData($email, $fullname, $sex, $password)
    {
        $data = array(
        
        'fullname'  =>   $fullname,
        'sex'       =>   $sex,
        'password'  =>   $password,
        'email'     =>   $email
        
        );
        
        $this->db->insert('users', $data);
        
        $insert_id = $this->db->insert_id();
        
        return $insert_id;
    }
    
    //process user login
    public function getLoginData($email, $password)
    {
      $this->db->where('email', $email);
        $this->db->where('password', $password);

        $query ->$this->db->get('users');

        if($query->num_rows() > 0)
        {
            return TRUE;
            
        }else
        {
            return FALSE;
        }
    }

        
    //Process User login
    public function verifyLoginData($email, $password)
    {
         $this->db->where('email', $email);
         $this->db->where('password', $password);
        
         $query = $this->db->get('users');
        
        
        if($query->num_rows() > 0)
        {
            return TRUE;
            
        }else
        {
            return FALSE;
        }
        

    }
    
        public function getUserData($email)
    {
        $this->db->where('email', $email);
        
        $query = $this->db->get('users');
        
        return $query->row();
    }

        public function userEmailExist($email)
    {
        $this->db->where('email', $email);
        
        $query = $this->db->get('users');
        
        if($query->num_rows() > 0)
        {
            return TRUE;
            
        }else
        {
            return FALSE;
        }
    }

  }