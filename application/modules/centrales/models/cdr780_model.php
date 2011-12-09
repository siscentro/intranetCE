<?php
/**
 * Description of Cdr780_model
 *
 * @author sistemas
 */
require_once (APPPATH."core/MY_Modelcdr.php");

class Cdr780_model extends MY_Modelcdr{
  function __construct() {
    parent::__construct();
    $this->_setDB('db780');
  }

}
