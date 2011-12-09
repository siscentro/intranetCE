<?php
/**
 * Description of Cdr535_model
 *
 * @author sistemas
 */
require_once (APPPATH."core/MY_Modelcdr.php");

class Cdr535_model extends MY_Modelcdr{
  private $GCC;
  private $G535;
  function __construct() {
    parent::__construct();
    $this->_setDB('db535');
    $this->GCC  = array('603','605','606','607','608','609','610');
    $this->G535 = array('601','602','604');
  }

}
