<?php
/**
 * Description of asTAV_model
 *
 * @author sistemas
 */
require_once (APPPATH."core/MY_Modelasterisk.php");

class Astav_model extends MY_Modelasterisk{
  function __construct() {
    parent::__construct();
    $this->_setDB('asTAV');
  }
}

