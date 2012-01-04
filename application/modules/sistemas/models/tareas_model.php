<?php
class Tareas_model extends MY_Model{
  private $join1 = 'act_mae';
  function __construct(){
    parent::__construct();
    $this->setTable('act_mov');
  }
}
