<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$autoload['packages'] = array();


$autoload['libraries'] = array('database', 'form_validation', 'upload', 'session', 'encryption', 'email' );


$autoload['drivers'] = array();


$autoload['helper'] = array('form', 'url', 'path', 'security', 'file', 'path');


$autoload['config'] = array();


$autoload['language'] = array();


$autoload['model'] = array('User_model', 'Dashboard_model', 'Messages_model', 'Orders_model');

//upload manuallly
// Class upload extends UI_Cond{
//   $this->load->library('upload');
//   $this->upload->
// }