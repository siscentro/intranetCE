<?php
class Categoria_model extends MY_Model{
  private $tabla = 'categoria';
  function __construct(){
    parent::__construct();
    $this->setTable('categoria');
  }
  
  function all(){
    $this->db->_reset_select();
    $this->db->select('*');
    $this->db->from($this->getTable());
    return $this->db->get()->result();
  }
  
  function CuentoActividades(){
    $this->db->_reset_select();
    $this->db->select('categoria.id AS id, categoria.nombre AS nombre, count(actividades.id) AS cantidad');
    $this->db->from($this->join1);
    $this->db->join($this->tabla, 'categoria_id = categoria.id', 'inner');
    $this->db->group_by('categoria_id');
    return $this->db->get()->result();
  }
  
  function toDropDown(){
    $this->db->_reset_select();
    $this->db->select('id, nombre');
    $this->db->from($this->tabla);
    $this->db->order_by('nombre');
    $row=$this->db->get();
    foreach($row->result() as $r){
      $lista [$r->id] = $r->nombre;
    }
    return (object) $lista;
  }
  
  function agregar(){
    $datos = array( 'nombre' => $this->input->post('nombre'));
    $this->db->insert($this->tabla, $datos);
    return $this->db->insert_id();
  }
  
  function leer($id){
    $this->db->_reset_select();
    $this->db->select('id, nombre');
    $this->db->from($this->tabla);
    $this->db->where('id', $id);
    return $this->db->get()->row();
  }
  
  function update($id){
    $datos = array('nombre' => $this->input->post('nombre'));
    $this->db->update($this->tabla, $datos);
  }
  
  function delete($id=0){
    if($id!=0){
      $this->db->where('id', $id);
      $this->db->delete($this->tabla);
    }
  }
  
}

/*
 * Location: models/categorias_model.php
 */
