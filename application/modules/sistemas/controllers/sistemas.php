<?php
/**
 * Description of sistemas
 *
 * @author sistemas
 */
class Sistemas extends MY_Controller{
  function __construct() {
    parent::__construct();
    $this->load->model('Actividad_model');
    $this->load->model('Terminales_model');
    $data['Servidores'][]=array('link'=>'sistemas/servers/estados', 'nombre'=>'Servidores', 'clase'=>'botServer');
    $data['Pcs'][]=array('link'=>'sistemas/pcEnUso', 'nombre'=>'Todas las PCs', 'clase'=>'botPcs');
    $data['Pcs'][]=array('link'=>'sistemas/addTerminal', 'nombre'=>'Agregar Terminal', 'clase'=>'botPcs');
    Template::set('fastest',$data);
  }
  function index(){
    $actividades = $this->Actividad_model->segunFecha();
    $data['IP']=$_SERVER['REMOTE_ADDR'];
    $ip=explode('.',$_SERVER['REMOTE_ADDR']);
    $PC=$this->Terminales_model->getById($ip[3]);
    $data['PC']=$PC;
    $data['accionPC']=(!isset($PC->ip))?'sistemas/addTerminal':'sistemas/editarTerminal/'.$PC->ip;
    $data['mensajePC']=(!isset($PC->ip))?'Agregar PC':'Editar PC';
    $data['posts']=$actividades;
    Template::set($data);
    Template::render();
  }
  function pcEnUso(){
    $this->output->enable_profiler(true);
    if($this->input->post('Filtrar')){
      $filtros = array();
      if($this->input->post('sucursal')&& $this->input->post('sucursal')!=0){
        $filtros['sucursal'] = $this->input->post('sucursal');
      };
      if($this->input->post('tipo') && $this->input->post('tipo')!=0 ){
        $filtros['tipo'] = $this->input->post('tipo');
      }
      $data['pcs'] = $this->Terminales_model->getAllFiltrado($filtros);
    }else{
      $data['pcs'] = $this->Terminales_model->getAll();
    }
    $data['opcSucursal'] = array(0 => 'Todas', 1 => 'Casa Central', 3 => 'Suc 780', 14 => 'Suc Tav', 80 => 'DPC');
    $data['opcTipo']     = array(0 => 'Todos',
                                 1 => 'Server',
                                 2 => 'Oficina',
                                 3 => 'Puesto Venta',
                                 4 => 'Caja',
                                 5 => 'Conectividad');
    if($this->session->flashdata('mensaje')){
      Template::set_message($this->session->flashdata('mensaje'),$this->session->flashdata('mensajeTipo'));
    }
    Template::set($data);
    Template::render();
  }
  function addTerminal(){
    $data['pc'] = array( 'ip'        => '',
                         'nombre'    => '',
                         'ubicacion' => '',
                         'sucursal'  => '',
                         'micro'     => '',
                         'mother'    => '',
                         'ram'       => '',
                         'disco'     => '',
                         'wifi'      => '',
                         'os'        => '',
                         'tipo'      => 3,
                         'freezada'  => 0,
                         'usuario'   => ''
                        );
    $data['opcSucursal'] = array(0 => 'Todas', 1 => 'Casa Central', 3 => 'Suc 780', 14 => 'Suc Tav', 80 => 'DPC');
    $data['accion'] = "sistemas/addTerminalDo";
    Template::set($data);
    Template::set_view('sistemas/editarTerminal');
    Template::render();
  }
  function addTerminalDo(){
    $pc = $this->Terminales_model->getById($this->input->post('ip'));
    if(!$pc){
      $datos = array( 'ip'        => $this->input->post('ip'),
                      'nombre'    => $this->input->post('nombre'),
                      'ubicacion' => $this->input->post('ubicacion'),
                      'sucursal'  => $this->input->post('sucursal'),
                      'micro'     => $this->input->post('micro'),
                      'mother'    => $this->input->post('mother'),
                      'ram'       => $this->input->post('ram'),
                      'disco'     => $this->input->post('disco'),
                      'wifi'      => $this->input->post('wifi'),
                      'os'        => $this->input->post('os'),
                      'tipo'      => $this->input->post('tipo'),
                      'freezada'  => $this->input->post('freezada'),
                      'usuario'   => $this->input->post('usuario')
                     );
      $this->Terminales_model->insert($datos);
      $this->session->set_flashdata('mensaje', "La IP fue ingresada con exito");
      $this->session->set_flashdata('mensajeTipo', "ok");
    }else{
      $this->session->set_flashdata('mensaje', "Esa IP ya estaba ingresada");
      $this->session->set_flashdata('mensajeTipo', "error");
    }
    redirect('sistemas/pcEnUso/');
  }
  function editarTerminal($id){
    $data['pc'] = $this->Terminales_model->getById($id);
    $data['opcSucursal'] = array(0 => 'Todas', 1 => 'Casa Central', 3 => 'Suc 780', 14 => 'Suc Tav', 80 => 'DPC');
    $data['accion'] = "sistemas/editarTerminalDo";
    Template::set($data);
    Template::render();
  }
  function editarTerminalDo(){
    $datos = array( 'nombre'    => $this->input->post('nombre'),
                    'ubicacion' => $this->input->post('ubicacion'),
                    'sucursal'  => $this->input->post('sucursal'),
                    'micro'     => $this->input->post('micro'),
                    'mother'    => $this->input->post('mother'),
                    'ram'       => $this->input->post('ram'),
                    'disco'     => $this->input->post('disco'),
                    'wifi'      => $this->input->post('wifi'),
                    'os'        => $this->input->post('os'),
                    'tipo'      => $this->input->post('tipo'),
                    'freezada'  => $this->input->post('freezada'),
                    'usuario'   => $this->input->post('usuario')
                   );
    $this->Terminales_model->update($datos,$this->input->post('ip'));
    $this->session->set_flashdata('mensaje', "La IP fue editada con exito");
    $this->session->set_flashdata('mensajeTipo', "ok");
    redirect('sistemas/pcEnUso/');
  }
}
