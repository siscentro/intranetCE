<?php
/**
 * Description of As780_model
 *
 * @author sistemas
 */
require_once (APPPATH."core/MY_Modelasterisk.php");

class As780_model extends MY_Modelasterisk{
  function __construct() {
    parent::__construct();
    $this->_setDB('as780');
  }
}
