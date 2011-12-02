<?php
/**
 * Description of cdr535_model
 *
 * @author sistemas
 */
class Asterisk_model extends CI_Model{
  private $DB;
  function __construct() {
    parent::__construct();
  }
  function _setDB($databaseName){
    $this->DB = $this->load->database($databaseName, true);
  }
  function getInternos(){
    $this->DB->select('extension');
    $this->DB->select('name');
    $this->DB->from('users');
    $this->DB->order_by('extension');
    $q = $this->DB->get();
    return $q->result();
  }
  function getLineas(){
    $this->DB->select('trunkid');
    $this->DB->select('name');
    $this->DB->select('tech');
    $this->DB->from('trunks');
    $this->DB->order_by('trunkid');
    $q = $this->DB->get();
    return $q->result();
  }
}
