<?php
class Telefonos_model extends Model{
  
  private $tabla = 'lineas';
  
  function __construct(){
    parent::Model();
  }
  function all(){
    $this->db->from($this->tabla);
    return $this->db->get()->result();
  }
}
