<?php
/**
 * Description of cdr535_model
 *
 * @author sistemas
 */
class Central_model extends CI_Model{
  private $DB;
  function __construct() {
    parent::__construct();
    $this->DB = $this->load->database('db535', true);
  }
  function getAll(){
    $this->DB->select('calldate');
/*
    $this->DB->select('clid');
    $this->DB->select('src');
    $this->DB->select('dst');*/
    $this->DB->from('cdr');
    //$this->DB->limit(100);
    $q = $this->DB->get();
    return $q->result();
  }
}
