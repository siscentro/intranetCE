<?php
/**
 * Description of cdr535_model
 *
 * @author sistemas
 */
class MY_Modelcdr extends CI_Model{
  private $dbn;
  private $tabla='cdr';
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
  function getUltimasLLamadas($extension=false,$limite=20){
    if($extension){
      $this->DB=$this->{$this->dbn};
      $this->DB->from($this->tabla);
      $this->DB->where('src',$extension);
      $this->DB->or_where('dst', $extension);
      $this->DB->order_by('calldate', 'DESC');
      $this->DB->limit($limite);
      return $this->DB->get()->result();
    }else{
      return false;
    }
  }
  function getUltimasLLamadasRealizadas($extension=false,$limite=20){
    if($extension){
      $this->DB=$this->{$this->dbn};
      $this->DB->from($this->tabla);
      $this->DB->where('src',$extension);
      $this->DB->order_by('calldate', 'DESC');
      $this->DB->limit($limite);
      return $this->DB->get()->result();
    }else{
      return false;
    }
  }
  function getUltimasLLamadasRecibidas($extension=false,$limite=20){
    if($extension){
      $this->DB=$this->{$this->dbn};
      $this->DB->from($this->tabla);
      $this->DB->where('dst', $extension);
      $this->DB->order_by('calldate', 'DESC');
      $this->DB->limit($limite);
      return $this->DB->get()->result();
    }else{
      return false;
    }
  }
  function getTotalLLamadasRea($extension=false, $fecini=false,$fechas=false){
    if($extension){
      $this->DB=$this->{$this->dbn};
      $this->DB->from($this->tabla);
      $this->DB->where('src',$extension);
      return $this->DB->count_all_results();
    }else{
      return false;
    }
  }
  function getTotalLLamadasRec($extension=false, $fecini=false,$fechas=false){
    if($extension){
      $this->DB=$this->{$this->dbn};
      $this->DB->from($this->tabla);
      $this->DB->where('dst',$extension);
      return $this->DB->count_all_results();
    }else{
      return false;
    }
  }
  function getTotalMinutosRec($extension=false, $fecini=false,$fechas=false){
    if($extension){
      $this->DB=$this->{$this->dbn};
      $this->DB->from($this->tabla);
      $this->DB->where('dst',$extension);
      return $this->DB->count_all_results();
    }else{
      return false;
    }
  }
  function getLLamadasXLinea($channeldst,$tipo=false,$fecini=false,$fechas=false){
    $fechoy=new DateTime();
    if($fechas){
      $fechas;
    }else{
      $fechas=$fechoy->format('Y-m-d');
    };
    if($fecini){
      $fecini;
    }else{
      $fechoy->modify('-1 day');
      $fecini=$fechoy->format('Y-m-d');
    }
    $this->DB = $this->{$this->dbn};
    $this->DB->from($this->tabla);
    $whereFec = sprintf("date_format(calldate,'%s') ", '%Y-%m-%d');
    $this->DB->where($whereFec . ">=",$fecini);
    $whereFec = sprintf("date_format(calldate,'%s') ", '%Y-%m-%d');
    $this->DB->where($whereFec . "<=",$fechas);
    switch($tipo){
      case 1:
              $this->DB->where('channel',$channeldst);
              break;
      case 2:
              $this->DB->where('dstchannel',$channeldst);
              break;
      default:
              $whereChannels=sprintf("( channel = '%s' OR dstchannel='%s' )", $channeldst,$channeldst);
              $this->DB->where($whereChannels);
              break;
    };
    $this->DB->order_by('calldate', 'DESC');
    //echo $this->DB->_compile_select();
    return $this->DB->get()->result();
  }
}
