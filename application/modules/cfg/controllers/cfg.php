<?php
/**
 * Controlador de Configuraciones generales
 *
 * @author sistemas
 */
class Cfg extends MY_Controller{
  function __construct() {
    parent::__construct();
  }
  function index(){
    Template::render();
  }
}
