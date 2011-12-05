<?php
/**
 * Description of cdr535_model
 *
 * @author sistemas
 */
class MY_Modelasterisk extends CI_Model{
  private $dbn;
  function __construct() {
    parent::__construct();
  }
  function _setDB($DBN){
    $this->dbn = $DBN;
    $this->{$this->dbn}=$this->load->database($this->dbn, true);
  }
  function getInternos(){
    $this->{$this->dbn}->select('extension');
    $this->{$this->dbn}->select('name');
    $this->{$this->dbn}->select('sipname');
    $this->{$this->dbn}->from('users');
    $this->{$this->dbn}->order_by('extension');
    $q = $this->{$this->dbn}->get();
    return $q->result();
  }
  function getLineas(){
    $this->{$this->dbn}->select('trunkid');
    $this->{$this->dbn}->select('name');
    $this->{$this->dbn}->select('tech');
    $this->{$this->dbn}->from('trunks');
    $this->{$this->dbn}->order_by('trunkid');
    $q = $this->{$this->dbn}->get();
    return $q->result();
  }
}
