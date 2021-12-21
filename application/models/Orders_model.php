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



public function upgrade($page)
{
if(isset($_SESSION['login']) == TRUE){

$data = array(

'pages' => $page
);

$data['results'] = $this->Orders_model->getAllPackages();

$productId = $this->input->post('productid');

$data['result'] = $this->Orders_model->getPackageDetails($productId);


$this->load->view('templates/header');
$this->load->view('upgrade', $data);
$this->load->view('templates/footer');

}else

{
redirect('dashboard/logout');
}
}





}