<?php
/**
 * Description of home
 *
 * @author sistemas
 */
class Home extends MY_Controller{
  function __construct() {
    parent::__construct();
  }
  function index(){
    Template::render();
  }

  function todos(){
    $this->load->model('Central535_model');
    $data['datos'] = $this->Central535_model->getAll();
    Template::set($data);
    Template::render();
  }
}
