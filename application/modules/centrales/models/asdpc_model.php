<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of asdpc
 *
 * @author sistemas
 */
require_once (APPPATH."core/MY_Modelasterisk.php");

class Asdpc_model extends MY_Modelasterisk{
  function __construct() {
    parent::__construct();
    $this->_setDB('asDPC');
  }
}