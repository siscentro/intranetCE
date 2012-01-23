<?php
/**
 * Description of cdr
 *
 * @author sistemas
 */
class Centrales extends MY_Controller{
  function __construct() {
    parent::__construct();
    $data['Imprimir'][]=array('link'=>'centrales/toPdf/listinInternos/cc', 'nombre'=>'Listado Internos Central', 'clase'=>'botPrint');
    $data['Imprimir'][]=array('link'=>'centrales/toPdf/listinInternos/535', 'nombre'=>'Listado Internos Suc 535', 'clase'=>'botPrint');
    $data['Imprimir'][]=array('link'=>'centrales/toPdf/listinInternos/780', 'nombre'=>'Listado Internos Suc 780', 'clase'=>'botPrint');
    $data['Imprimir'][]=array('link'=>'centrales/toPdf/listinInternos/TAV', 'nombre'=>'Listado Internos Suc TAV', 'clase'=>'botPrint');
    $data['Imprimir'][]=array('link'=>'centrales/toPdf/listinInternos/DPC', 'nombre'=>'Listado Internos DPC', 'clase'=>'botPrint');
    Template::set('fastest',$data);
  }
  function index(){
    Template::render();
  }
  function resumen($suc=0){
    switch ($suc) {
      case 'cc': //info casa central
        $this->load->model('As535_model');
        $internosCC  = $this->As535_model->getInternosCentral(false);
        $internos535 = $this->As535_model->getInternos535(false);
        $data['sinAsignar']=count($this->As535_model->getInternos(true))-(count($internosCC)+count($internos535));
        $lineas   = $this->As535_model->getLineas();
        $data['internos']=$internosCC;
        $data['lineas']=$lineas;
        break;
      case '535': //info sucursal 535
        $this->load->model('As535_model');
        $internosCC  = $this->As535_model->getInternosCentral(false);
        $internos535 = $this->As535_model->getInternos535(false);
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
    $data['suc']=$suc;
    Template::set($data);
    Template::render();
  }
  function verLinea($trunk_id,$suc){
    $limite=20;
    switch ($suc) {
      case 'cc': //info casa central
        $modelo="Cdr535_model";
        $modeloAs="As535_model";
        break;
      case '535': //info sucursal 535
        $modelo="Cdr535_model";
        $modeloAs="As535_model";
        break;
      case '780': //info sucursal 780
        $modelo="Cdr780_model";
        $modeloAs="As780_model";
        break;
      case 'TAV': //info sucursal tavella
        $modelo="Cdrtav_model";
        $modeloAs="Astav_model";
        break;
      case 'DPC': //info Deposito Central
        $modelo="Cdrdpc_model";
        $modeloAs="Asdpc_model";
        break;
    }
    $fechoy = new DateTime();
    $fecini = ($this->input->post('fecini'))?$this->input->post('fecini'):$fechoy->format('Y-m-d');
    $fechas = ($this->input->post('fechas'))?$this->input->post('fechas'):$fechoy->format('Y-m-d');
    $tipo   = ($this->input->post('tipo'))?$this->input->post('tipo'):0;
    $this->load->model($modelo);
    $this->load->model($modeloAs);
    $linea =  $this->{$modeloAs}->getNombreLinea($trunk_id);
    $data['linea'] = $linea;
    $data['suc']             = $suc;
    $data['tiempo']          = new DateTime();
    $data['fecha']           = new DateTime();
    $data['llamadas'] = $this->{$modelo}->getLLamadasXLinea($linea->namecdr,$tipo,$fecini,$fechas);
    Template::set('path', '/var/www/betas/intranet/');
    Template::set_block('grafico', 'centrales/grafico');
    $data['php_chart'] = '/var/www/betas/intranet'.'/assets/php-ofc-library/open_flash_chart_object.php';
    $data['pageDatos'] =  'chart.php';
    //$realizadasTot = $this->{$modelo}->getTotalLlamadasRea($linea->namecdr);
    /*
     * graficos
     */
    Template::set($data);
    Template::render();
  }
  function verInterno($interno,$suc){
    $limite=20;
    switch ($suc) {
      case 'cc': //info casa central
        $modelo="Cdr535_model";
        break;
      case '535': //info sucursal 535
        $modelo="Cdr535_model";
        break;
      case '780': //info sucursal 780
        $modelo="Cdr780_model";
        break;
      case 'TAV': //info sucursal tavella
        $modelo="Cdrtav_model";
        break;
      case 'DPC': //info Deposito Central
        $modelo="Cdrdpc_model";
        break;
    }
    $this->load->model($modelo);
    $llamadas      = $this->{$modelo}->getUltimasLlamadas($interno,$limite);
    $recibidas     = $this->{$modelo}->getUltimasLlamadasRecibidas($interno,$limite);
    $realizadas    = $this->{$modelo}->getUltimasLlamadasRealizadas($interno,$limite);
    $realizadasTot = $this->{$modelo}->getTotalLlamadasRea($interno);
    $data['interno']         = $interno;
    $data['llamadas']        = array_merge($recibidas, $realizadas);
    $data['llamadas']        = $llamadas;
    $data['totalRealizadas'] = $realizadasTot;
    $data['suc']             = $suc;
    $data['tiempo']          = new DateTime();
    $data['fecha']           = new DateTime();
    Template::set($data);
    Template::render();
  }
}

