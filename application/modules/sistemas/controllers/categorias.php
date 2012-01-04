<?php
class Categorias extends Controller{
  function __construct(){
    parent::Controller();
    $this->load->model('Categoria_model', '',true);
    $this->load->model('Actividad_model','',true);
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
    $data['categorias'] = $this->Categoria_model->all();
    $this->template->add_js('categorias/index');
    $this->template->write_view('contenido','categorias/index', $data);
    $this->template->render();
  }
  
  function actividades($id){
    $data['posts'] = $this->Actividad_model->SegunCategoria($id);
    $this->template->write_view('contenido', 'categorias/actividades', $data);
    $this->template->render();
  }
  
  function add(){
    $formu['nombre']='';
    $formu['id']='';
    $data['form'] = (object) $formu;
    $this->template->write_view('contenido', 'categorias/editar', $data);
    $this->template->render();
  }
  
  function addDo(){
    $this->Categoria_model->agregar();
    $this->index();
  }
  
  function editar($id){
    $data['form']=$this->Categoria_model->leer($id);
    $this->template->write_view('contenido', 'categorias/editar', $data);
    $this->template->render();
  }
  
}


/*
 * Location: controller/categorias.php
 */