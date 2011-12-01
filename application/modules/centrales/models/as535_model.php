<?php
/**
 * Description of As780_model
 *
 * @author sistemas
 */
class As535_model extends CI_Model{
  private $DB;
  function __construct() {
    parent::__construct();
    $this->DB = $this->load->database('as535', true);
  }
  function getInternos(){
    $this->DB->select('extension');
    $this->DB->select('name');
    $this->DB->select('sipname');
    $this->DB->from('users');
    $this->DB->order_by('extension');
    $q = $this->DB->get();
    return $q->result();
  }
  function getLineas(){
    $this->DB->select('trunkid');
    $this->DB->select('name');
    $this->DB->select('maxchans');
    $this->DB->from('trunks');
    $this->DB->order_by('trunkid');
    $q = $this->DB->get();
    return $q->result();
  }
}
