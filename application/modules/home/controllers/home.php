<?php
/**
 * Description of home
 *
 * @author sistemas
 */
class Home extends MY_Controller{
  function __construct() {
    parent::__construct();
  }
  function index(){
    Template::render();
  }
}

?>
