<?php
class Servers_model extends Model{
  private $tabla="servidores";
  function __construct(){
    parent::Model();
  }
  
  function all(){
    $this->db->_reset_select();
    $this->db->from($this->tabla);
    return $this->db->get()->result();
  }
}

/*
 * Location: controllers/servers_model.php
 * 
 */