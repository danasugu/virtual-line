<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Orders_model extends CI_Model {

 //Function to get total saved order price
 public function getSavedOrder($email)
 {

 $query = $this->db->query("SELECT * FROM cart WHERE email='$email'ORDER BY date DESC");

 foreach($query->result() as $row)
 {
 $itemPrice = $row->item_price;

 return $itemPrice;
 }

 }


  //fetch all products

  public function getAllPackages()
  {
    $query = $this->db->get('products');
    return query->result_array();
  }









}