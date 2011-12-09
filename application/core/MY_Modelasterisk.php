<?php
/**
 * Description of cdr535_model
 *
 * @author sistemas
 */
class MY_Modelasterisk extends CI_Model{
  private $dbn;
  function __construct() {
    parent::__construct();
  }
  function _setDB($DBN){
    $this->dbn = $DBN;
    $this->{$this->dbn}=$this->load->database($this->dbn, true);
  }
  function get_database_group() {
    return $this->dbn;
  }
  function getInternos($full=true,$grp=array()){
    $grupos = $this->getGrupoExtensiones($grp);
    $this->{$this->dbn}->select('extension');
    $this->{$this->dbn}->select('name');
    $this->{$this->dbn}->select('sipname');
    $this->{$this->dbn}->from('users');
    $this->{$this->dbn}->order_by('extension');
    $q = $this->{$this->dbn}->get()->result();
    foreach($q as $item){
      $banderaExtension=false;
      foreach($grupos as $x){
        if($item->extension == $x->extension){
          $dat = array('extension' => $item->extension, 'name'=> $item->name, 'grupo'=>$x->grupo, 'nombreGrupo'=>$x->nombre);
          $banderaExtension=true;
          $datos[] = (object) $dat;
        };
      };
      if(!$banderaExtension && $full ){
          $dat = array('extension' => $item->extension, 'name'=> $item->name, 'grupo'=>'S/A', 'nombreGrupo'=>'SinAsignar');
          $datos[] = (object) $dat;
      };
    };
    return $datos;
  }
  function getLineas(){
    $this->{$this->dbn}->select('trunkid');
    $this->{$this->dbn}->select('name');
    $this->{$this->dbn}->select('tech');
    $this->{$this->dbn}->from('trunks');
    $this->{$this->dbn}->order_by('trunkid');
    $q = $this->{$this->dbn}->get();
    return $q->result();
  }
  function getGrupoExtensiones($grp=array()){
    $this->{$this->dbn}->select('grpnum  as grupo');
    $this->{$this->dbn}->select('grplist as lista');
    $this->{$this->dbn}->select('description as nombre');
    $this->{$this->dbn}->from('ringgroups');
    foreach($grp as $key=>$valor){
      if($key==0){
        $this->{$this->dbn}->where('grpnum', $valor);
      }else{
        $this->{$this->dbn}->or_where('grpnum', $valor);
      }
    };
    $inicio = $this->{$this->dbn}->get()->result();
    foreach($inicio as $ini){
      $exten = explode('-', $ini->lista);
      foreach($exten as $i){
        $datAux = array('extension'=>$i,'grupo'=>$ini->grupo,'nombre'=>$ini->nombre);
        $datos[] = (object) $datAux;
      };
    }
    return $datos;
  }
  function getNombreLinea($id){
    $this->DB = $this->{$this->dbn};
    $this->DB->select('trunkid');
    $this->DB->select('name');
    $this->DB->select('CONCAT(UPPER(tech),"/",channelid,"-1") as namecdr', false);
    $this->DB->from('trunks');
    $this->DB->where('trunkid',$id);
    return $this->DB->get()->row();
  }
}
