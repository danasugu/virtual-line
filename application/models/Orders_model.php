<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders_model extends CI_Model {

  // save order price

  public function getSavedOrder($email)
  {

  }

  //fetch all products

  public function getAllPackages()
  {
    $query = $this->db->get('products');
    return query->result_array();
  }


}