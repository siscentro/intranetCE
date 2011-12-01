<?php
/**
 * Description of cdr
 *
 * @author sistemas
 */
class Centrales extends MY_Controller{
  function __construct() {
    parent::__construct();
    //$this->load->model('Central_model');
    $this->load->model('As535_model');
    $this->load->model('As780_model');
  }
  function index(){
    $data['internos535'] = $this->As535_model->getInternos();
    $data['lineas535'] = $this->As535_model->getLineas();
    $data['internos780'] = $this->As780_model->getInternos();
    $data['lineas780'] = $this->As780_model->getLineas();

    Template::set($data);
    Template::render();
  }
}

