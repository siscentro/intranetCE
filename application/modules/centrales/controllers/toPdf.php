<?php
/**
 * Description of pdf
 *
 * @author sistemas
 */
class ToPdf extends MY_Controller{
  private $correos;
  function __construct() {
    parent::__construct();
    $this->load->library('pdf');
    $this->correos['7110'] = 'encargado535@centroelectricosa.com.ar';
    $this->correos['7120'] = 'electricidad@centroelectricosa.com.ar';
    $this->correos['7124'] = 'depoelectricidad@centroelectricosa.com.ar';
    $this->correos['7131'] = 'proveedores2@centroelectricosa.com.ar';
    $this->correos['7132'] = 'proveedores3@centroelectricosa.com.ar';
    $this->correos['7133'] = 'administracion2@centroelectricosa.com.ar';
    $this->correos['7134'] = 'marketing@centroelectricosa.com.ar';
    $this->correos['7135'] = 'proveedores@centroelectricosa.com.ar';
    $this->correos['7136'] = 'adminsitracion@centroelectricosa.com.ar';
    $this->correos['7137'] = 'mariajose@centroelectricosa.com.ar';
    $this->correos['7142'] = 'andres@centroelectricosa.com.ar';
    $this->correos['7143'] = 'danielalbea@centroelectricosa.com.ar';
    $this->correos['7145'] = 'andres@centroelectricosa.com.ar';
    $this->correos['7146'] = 'hermesfreire@centroelectricosa.com.ar';
    $this->correos['7147'] = 'sistemas@centroelectricosa.com.ar';
    $this->correos['7148'] = 'migueldominguez@consumax.com.ar';
    $this->correos['7149'] = 'sistemas@centroelectricosa.com.ar';
    $this->correos['7150'] = 'hermesfreire@centroelectricosa.com.ar';
    $this->correos['7310'] = 'encargado@centroelectricosa.com.ar';
    $this->correos['7410'] = 'logistica@centroelectricosa.com.ar';
    $this->correos['7411'] = 'atencionalcliente@centroelectricosa.com.ar';
    $this->correos['7447'] = 'rma@centroelectricosa.com.ar';
    $this->correos['7510'] = 'encargadotav@centroelectricosa.com.ar';
  }
  function listinInternos($suc=0){
    switch ($suc) {
      case 'cc': //info casa central
        $model = 'As535_model';
        break;
      case '535': //info sucursal 535
        $model = 'As535_model';
        break;
      case '780': //info sucursal 780
        $model = 'As780_model';
        break;
      case 'TAV': //info sucursal tavella
        $model = 'Astav_model';
        break;
      case 'DPC': //info Deposito Central
        $model = 'Asdpc_model';
        break;
    }        
    $this->load->model($model);
    $internos=$this->{$model}->getInternos(false);
    $this->pdf->Open();
    $this->pdf->AddPage();
    $this->pdf->SetFont('Times','', 10);
    $this->pdf->Cell(20,5,"Interno",1,0,'C');
    $this->pdf->Cell(50,5,"Nombre",1,0,'C');
    $this->pdf->Cell(50,5,"Grupo de Trabajo",1,0,'C');
    $this->pdf->Cell(70,5,"E-Mail",1,1,'C');
    foreach($internos as $int){
      $this->pdf->Cell(20,5,$int->extension,1,0,'C');
      $this->pdf->Cell(50,5,$int->name,1,0,'L');
      $this->pdf->Cell(50,5,$int->nombreGrupo,1,0,'C');
      if(array_key_exists($int->extension,$this->correos)){
        $cor = $int->extension;
        $this->pdf->Cell(70,5,$this->correos[$cor],1,1,'C');
      }else{
        $this->pdf->Cell(70,5,"No Posee",1,1,'C');
      }
    }
    $this->pdf->Output('listado'.$suc.'.pdf',"I");
  }
  function listinFullCentro(){
    $model1 = 'As535_model';
    $model2 = 'As780_model';
    $model3 = 'Astav_model';
    $model4 = 'Asdpc_model';
    $this->load->model($model1);
    $this->load->model($model2);
    $this->load->model($model3);
    $this->load->model($model4);
    $int535=$this->{$model1}->getInternos(false);
    $int780=$this->{$model2}->getInternos(false);
    $inttav=$this->{$model3}->getInternos(false);
    $intdpc=$this->{$model4}->getInternos(false);
    $this->pdf->Open();
    $this->pdf->AddPage();
    $this->pdf->SetFont('Times','', 10);
    $this->pdf->Cell(20,5,"Interno",1,0,'C');
    $this->pdf->Cell(50,5,"Nombre",1,0,'C');
    $this->pdf->Cell(50,5,"Grupo de Trabajo",1,0,'C');
    $this->pdf->Cell(70,5,"E-Mail",1,1,'C');
    foreach($internos as $int){
      $this->pdf->Cell(20,5,$int->extension,1,0,'C');
      $this->pdf->Cell(50,5,$int->name,1,0,'L');
      $this->pdf->Cell(50,5,$int->nombreGrupo,1,0,'C');
      if(array_key_exists($int->extension,$this->correos)){
        $cor = $int->extension;
        $this->pdf->Cell(70,5,$this->correos[$cor],1,1,'C');
      }else{
        $this->pdf->Cell(70,5,"No Posee",1,1,'C');
      }
    }
    $this->pdf->Output('listado'.$suc.'.pdf',"I");
  }  
}