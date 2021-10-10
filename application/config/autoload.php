<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$autoload['packages'] = array();

$autoload['libraries'] = array('database', 'form_validation', 'upload', 'session', 'encryption');

$autoload['drivers'] = array();

$autoload['helper'] = array('form', 'url', 'path', 'email');

$autoload['config'] = array();

$autoload['language'] = array();

$autoload['model'] = array('User_model');

//upload manuallly
// Class upload extends UI_Cond{
//   $this->load->library('upload');
//   $this->upload->
// }