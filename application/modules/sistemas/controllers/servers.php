<?php
class Servers extends Controller{
  function __construct(){
    parent::Controller();
    $this->load->model('Servers_model', '',true);
    $this->load->model('Categoria_model','',true);
    $this->template->add_css('template'); //css maestro
    $this->template->add_css('jquery-ui-1.8.4');
    $this->template->add_js('jquery-1.4.2.min');
    $this->template->add_js('jquery-ui-1.8.4.min');
    $this->template->write_view('menuTemplate', '_menuTemplate');
    // menu derecha
    $dataSide['categorias']=$this->Categoria_model->CuentoActividades();
    $this->template->write_view('sidebar', '_sidebarTemplate', $dataSide);
  }
  function index(){
    $this->template->write_view('contenido', 'servers/index');
    $this->template->render();
  }
  
}

/*
 * Location: controller/serves.php
 * Archivo controlador de Servidores para links automaticos
 * 
 */