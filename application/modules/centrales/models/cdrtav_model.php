<?php
/**
 * Description of Cdrtav_model
 *
 * @author sistemas
 */
require_once (APPPATH."core/MY_Modelcdr.php");

class Cdrtav_model extends MY_Modelcdr{
  function __construct() {
    parent::__construct();
    $this->_setDB('dbTAV');
  }

}
