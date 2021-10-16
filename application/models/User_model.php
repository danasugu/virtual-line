<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {


    //Checks to see if user already exist
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


    //Insert User Registration Data
    public function insertUserRegistrationData($email, $fullname, $sex, $password)
    {
        $data = array (

        'fullname'  =>   $fullname,
        'sex'       =>   $sex,
        'password'  =>   $password,
        'email'     =>   $email

        );

        $this->db->insert('users', $data);

        $insert_id = $this->db->insert_id();

        return $insert_id;


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

    //Get user info after login
    public function getUserData($email)
    {
        $this->db->where('email', $email);

        $query = $this->db->get('users');

        return $query->row();
    }







    //Checks to see if user already exist
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




    //Insert User Registration Data
    public function insertPassResetData($data)
    {

        $this->db->insert('passreset', $data);

        $insert_id = $this->db->insert_id();

        return $insert_id;


    }




    //Checks to see if token and code valid
	public function verifytoken($tokenid, $status)
    {
        $this->db->where('token', $tokenid);

        $this->db->where('status', $status);

        $query = $this->db->get('passreset');

        $result = $query->row();

        if(isset($result))
        {
            return $result->email;

        }else
        {
            return FALSE;
        }



    }

    //Checks to see if token and code valid
	public function verifycode($code)
    {
        $this->db->where('code', $code);

        $query = $this->db->get('passreset');

        $result = $query->row();

        if(isset($result))
        {
            return $result->email;

        }else
        {
            return FALSE;
        }



    }



    //Update new password
    public function updateNewPassword($email, $password)
    {
        $this->db->where('email', $email);

        $data = array (

            'password'  =>   $password

        );

        $this->db->update('users', $data);

        $result = $this->db->affected_rows();

        return $result;

    }


    //Change stutas of password reset status to FALSE
    public function updatePasswordResetStatus($email, $status)
    {
        $this->db->where('email', $email);

        $data = array (

            'status'  =>   $status

        );

        $this->db->update('passreset', $data);

        $result = $this->db->affected_rows();

        return $result;

    }




    //Function to delete user profile
    public function deleteProfile($email)
    {
        $this->db->where('email', $email);

        $query = $this->db->delete('users');

        if($query)
        {
            return TRUE;
        }else
        {
            return FALSE;
        }

    }

}