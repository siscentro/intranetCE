<?php
/**
 * Description of Cdrdpc_model
 *
 * @author sistemas
 */
require_once (APPPATH."core/MY_Modelcdr.php");

class Cdrdpc_model extends MY_Modelcdr{
  function __construct() {
    parent::__construct();
    $this->_setDB('dbDPC');
  }

}
