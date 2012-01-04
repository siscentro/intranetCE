<?php
class DatosGenerales extends Controller{
  function __construct(){
    parent::Controller();
    $this->load->model('Categoria_model','',true);
    $this->load->model('Telefonos_model','',true);
    $this->load->model('Terminales_model','',true);
    $this->template->add_css('template'); //css maestro
    $this->template->add_css('jquery-ui-1.8.4');
    $this->template->add_js('jquery-1.4.2.min');
    $this->template->add_js('jquery-ui-1.8.4.min');
    $this->template->write_view('menuTemplate', '_menuTemplate');
    // menu derecha
    $dataSide['categorias']=$this->Categoria_model->CuentoActividades();
    $this->template->write_view('sidebar', '_sidebarTemplate', $dataSide);
  }
  function index(){
    $data = array();
    $this->template->add_js('datosGenerales/index');
    $this->template->write_view('contenido', 'datosGenerales/index', $data);
    $this->template->render();
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
    $data['opcSucursal'] = array(0 => 'Todas', 1 => 'Casa Central', 3 => 'Suc 780', 80 => 'DPC');
    $data['opcTipo']     = array(0 => 'Todos',
                                 1 => 'Server',
                                 2 => 'Oficina',
                                 3 => 'Puesto Venta',
                                 4 => 'Caja',
                                 5 => 'Conectividad');
    $this->template->add_js('datosGenerales/pcEnUso');
    $this->template->write_view('contenido','datosGenerales/pcEnUso', $data);
    $this->template->render();
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
    $data['accion'] = "datosGenerales/addTerminalDo";
    $this->template->add_js('datosGenerales/editarTerminales');
    $this->template->write_view('contenido', 'datosGenerales/editarTerminales', $data);
    $this->template->render();
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
      $this->pcEnuso();
    }else{
      $this->template->write('contenido', "Esa IP ya estaba ingresada");
      $this->template->render();
    }
  }
  function editarTerminales($id){
    $data['pc'] = $this->Terminales_model->getById($id);
    $data['accion'] = "datosGenerales/editarTerminalesDo";
    $this->template->add_js('datosGenerales/editarTerminales');
    $this->template->write_view('contenido', 'datosGenerales/editarTerminales', $data);
    $this->template->render();
  }
  function editarTerminalesDo(){
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
    $this->Terminales_model->update($this->input->post('ip'), $datos);
    $this->pcEnuso();
  }

}
