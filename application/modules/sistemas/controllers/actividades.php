<?php
class Actividades extends MY_Controller{
  function __construct(){
    parent::__construct();
    $this->load->model('Categoria_model','',true);
    $this->load->model('Actividad_model','',true);
    $this->load->model('Tareas_model','',true);
  }
  
  function index(){
    $data['categorias'] = $this->Categoria_model->all();
    $data['posts']= $this->Actividad_model->getActivas();
    $data['fecha_aux']='';
    Template::set($data);
    Template::render();
  }
  
  function add(){
    $formu['id']          = '';
    $formu['categoria_id']   = 1;
    $formu['descripcion'] = '';
    $fechoy               = getdate();
    $formu['fecha']       = $fechoy['year'] . '-' . $fechoy['mon'] . '-' . $fechoy['mday'];
    $data['form']         = (object) $formu;
    $data['accion']       = 'actividades/addDo';
    $data['categorias']   = $this->Categoria_model->toDropDown();
    $this->template->write_view('contenido','actividades/editar', $data);
    $this->template->render();
  }
  
  function addDo(){
    $id = $this->Actividad_model->agregar();
    $this->index();
  }
  
  function editar($id){
    $data['accion'] = 'actividades/editarDo';
    $data['form']   = $this->Actividad_model->leer($id);
    $data['categorias']   = $this->Categoria_model->toDropDown();
    $this->template->write_view('contenido','actividades/editar', $data);
    $this->template->render();
  }
  
  function editarDo(){
    $this->Actividad_model->update();
    $this->index();
  }
  
  function delete($id){
    $this->Actividad_model->delete($id);
    $this->index();
  }
  
}

/*
 * Location: controllers/activdades.php
 */
