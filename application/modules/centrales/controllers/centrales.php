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
  }
  function index(){
    Template::render();
  }
  function resumen($suc=0){
    $gruposCC = array('603','605','606','607','608','609','610');
    $grupos535 = array('601','602','604');
    switch ($suc) {
      case 'cc': //info casa central
        $this->load->model('As535_model');
        $internosCC  = $this->As535_model->getInternos(false,$gruposCC);
        $internos535 = $this->As535_model->getInternos(false,$grupos535);
        $data['sinAsignar']=count($this->As535_model->getInternos(true))-(count($internosCC)+count($internos535));
        $lineas   = $this->As535_model->getLineas();
        $data['internos']=$internosCC;
        $data['lineas']=$lineas;
        break;
      case '535': //info sucursal 535
        $this->load->model('As535_model');
        $internosCC  = $this->As535_model->getInternos(false,$gruposCC);
        $internos535 = $this->As535_model->getInternos(false,$grupos535);
        $data['sinAsignar']=count($this->As535_model->getInternos(true))-(count($internosCC)+count($internos535));
        $lineas   = $this->As535_model->getLineas();
        $data['internos']=$internos535;
        $data['lineas']=$lineas;
        break;
      case '780': //info sucursal 780
        $this->load->model('As780_model');
        $internos = $this->As780_model->getInternos(false);
        $lineas   = $this->As780_model->getLineas();
        $data['sinAsignar']=count($this->As780_model->getInternos(true))-(count($internos));
        $data['internos']=$internos;
        $data['lineas']=$lineas;
        break;
      case 'TAV': //info sucursal tavella
        $this->load->model('Astav_model');
        $internos = $this->Astav_model->getInternos(false);
        $lineas   = $this->Astav_model->getLineas();
        $data['internos']=$internos;
        $data['lineas']=$lineas;
        $data['sinAsignar']=count($this->Astav_model->getInternos(true))-(count($internos));
        break;
      case 'DPC': //info Deposito Central
        $this->load->model('Asdpc_model');
        $internos = $this->Asdpc_model->getInternos(false);
        $lineas   = $this->Asdpc_model->getLineas();
        $data['internos']=$internos;
        $data['lineas']=$lineas;
        $data['sinAsignar']=count($this->Asdpc_model->getInternos(true))-(count($internos));
        break;
    }
    Template::set($data);
    Template::render();
  }
}

