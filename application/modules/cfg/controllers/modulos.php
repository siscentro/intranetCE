<?php
/**
 * Controlador de Modulos de los menues
 *
 * @author sistemas
 */
class Modulos extends MY_Controller{
  function __construct() {
    parent::__construct();
    $this->load->model('Modulos_model');
  }
  function index(){
    $modulos = $this->Modulos_model->getAll();
    $data['modulos']=$modulos;
    Template::set($data);
    Template::render();
  }
}
