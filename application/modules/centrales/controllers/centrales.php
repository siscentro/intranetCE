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
    $this->load->model('Astav_model');
  }
  function index(){
    Template::render();
  }
  function resumen($suc=0){
    switch ($suc) {
      case 'cc': //info casa central
        $grupos = array(603,605,606,607,608,609);
        $internos = $this->As535_model->getInternos($grupos);
        $lineas   = $this->As535_model->getLineas();
        $data['internos']=$internos;
        $data['lineas']=$lineas;
        break;
      case '780': //info sucursal 780
        $internos = $this->As780_model->getInternos();
        $lineas   = $this->As780_model->getLineas();
        $data['internos']=$internos;
        $data['lineas']=$lineas;
        break;
      case 'TAV': //info sucursal tavella
        $internos = $this->Astav_model->getInternos();
        $lineas   = $this->Astav_model->getLineas();
        $data['internos']=$internos;
        $data['lineas']=$lineas;
        break;
    }
    Template::set($data);
    Template::render();
  }
}

