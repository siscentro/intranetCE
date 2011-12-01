<?php
/**
 * Tabla de modulos de menues
 *
 * @author sistemas
 */
class Modulos_model extends MY_Model{
  function __construct() {
    parent::__construct();
    $this->setTable('cfg_modulos');
  }
  /**
   * Obtener todos los menues para el usuario
   *
   * @return object
   */
  function getMenuUser($user){
    $this->db->select('nombre as nombre');
    $this->db->select('link as link');
    $this->db->select('clase as clase');
    $this->db->from('user_modulos');
    $this->db->join($this->getTable(), 'user_modulos.modulo_id=cfg_modulos.id', 'inner');
    $this->db->where('user_modulos.user_id', $user);
    return $this->db->get()->result();
  }
}
