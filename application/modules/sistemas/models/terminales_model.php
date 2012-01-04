<?php
class Terminales_model extends MY_Model{
  function  __construct() {
    parent::__construct();
    $this->setTable('terminales');
  }
  function getAllFiltrado($filtros){
    foreach($filtros as $key=>$valor){
      $this->db->where($key,$valor);
    };
    $this->db->from($this->getTable());
    $q = $this->db->get();
    if ($q->num_rows()>0){
      return $q->result();
    }else{
      return false;
    }
  }
}
