<?php
class Actividad_model extends MY_Model{
  private $join1 = 'categoria';
  private $join2 = 'act_mov';
  function __construct(){
    parent::__construct();
    $this->setTable('act_mae');
  }
  function getActivas(){
      $this->db->from($this->getTable());
      $this->db->where('estado !=',1);
      return $this->db->get()->result(); 
  }
  function segunFecha($fecini=false,$fechas=false){
    $fechoy=new DateTime();
    if($fechas){
      $fechas;
    }else{
      $fechas=$fechoy->format('Y-m-d');
    };
    if($fecini){
      $fecini;
    }else{
      $fechoy->modify('-1 week');
      $fecini=$fechoy->format('Y-m-d');
    }
    $this->db->select('actividad.id AS id, actividad.fecha AS fecha, actividad.descripcion, categoria.nombre AS NombreCategoria');
    $this->db->from($this->getTable());
    $this->db->join($this->join1,'categoria_id = categoria.id', 'inner');
    $whereFec = sprintf("date_format(update_at,'%s') ", '%Y-%m-%d');
    $this->db->where($whereFec . ">=",$fecini);
    $whereFec = sprintf("date_format(update_at,'%s') ", '%Y-%m-%d');
    $this->db->where($whereFec . "<=",$fechas);
    $this->db->order_by('update_at', 'Desc');
    $this->db->limit(10);
    return $this->db->get()->result();    
  }
  function segunCategoria($id){
    $this->db->_reset_select();
    $this->db->select('actividades.id AS id, actividades.fecha AS fecha, actividades.descripcion, categoria.nombre AS NombreCategoria');
    $this->db->from($this->tabla);
    $this->db->join($this->join1,'categoria_id = categoria.id', 'inner');
    $this->db->where('categoria_id', $id);
    $this->db->order_by('fecha');
    return $this->db->get()->result();
  }
  function agregar($datos){
    $this->db->set('create_at', 'NOW()',false); 
    $this->db->set('estado', 1 );
    $this->db->insert($this->tabla,$datos);
    return $this->db->insert_id();
  }
}
