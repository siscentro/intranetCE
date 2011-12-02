<?php
/**
 * Description of asTAV_model
 *
 * @author sistemas
 */
class Astav_model extends Asterisk_model{
  function __construct() {
    parent::__construct();
    $this->_setDB('asTAV');
  }
}

