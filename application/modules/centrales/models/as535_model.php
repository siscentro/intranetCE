<?php
/**
 * Description of As780_model
 *
 * @author sistemas
 */
require_once (APPPATH."core/MY_Modelasterisk.php");

class As535_model extends MY_Modelasterisk{
  private $GCC;
  private $G535;
  function __construct() {
    parent::__construct();
    $this->_setDB('as535');
    $this->GCC  = array('603','605','606','607','608','609','610');
    $this->G535 = array('601','602','604');
  }
  function getInternosCentral($full=true){
    return $this->getInternos($full,$this->GCC);
  }
  function getInternos535($full=true){
    return $this->getInternos($full,$this->G535);
  }
}
