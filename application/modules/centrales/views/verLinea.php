<h1>Linea <?php echo $linea->name?></h1>
<div id="parametros">
  <?php echo form_open('centrales/verLinea/'.$linea->trunkid.'/'.$suc)?>
  Desde Fecha <?php echo form_input('fecini','','class="date"');?>
  Hasta Fecha <?php echo form_input('fechas','','class="date"');?>
  Tipo de LLamadas <?php echo form_dropdown('tipo', array('0'=>'Todas', '1'=>'Recibidas','2'=>'Realizadas'), '0');?>
  <?php echo form_submit('Consulta', 'Consulta')?>
  <?php echo form_close()?>
</div>
<br />
<table width="95%">
  <thead>
    <tr>
      <th>Tipo</th>
      <th>Fecha</th>
      <th>Id</th>
      <th>Origen</th>
      <th>Destino</th>
      <th>Linea Origen</th>
      <th>Linea Destino</th>
      <th>Duracion</th>
      <th>Estado</th>
    </tr>
  </thead>
<?php foreach($llamadas as $llamada):?>
  <?php
  $numero =(string) $llamada->dst;
  $tiempo->setTime(0,0,$llamada->duration);
  ?>
  <tr class="<?php echo ($llamada->channel==$linea->namecdr)?"callIn":"callOut";?>">
    <td class="<?php echo ($llamada->channel==$linea->namecdr)?"phonein":"phoneout";?>">&nbsp;</td>
      <td><?php echo $llamada->calldate?></td>
      <td><?php echo $llamada->clid?></td>
      <td><?php echo $llamada->src?></td>
      <td><?php echo $llamada->dst?></td>
      <td><?php echo $llamada->channel?></td>
      <td><?php echo $llamada->dstchannel?></td>
      <td><?php echo $tiempo->format('H:i:s')?></td>
      <td><?php echo $llamada->disposition?></td>
  </tr>
<?php endforeach; ?>
</table>

<script>
$(document).ready(function(){
  $('.date').datepicker({minDate: new Date(2011, 6-1, 1),maxDay: new Date(),dateFormat: 'yy-mm-dd',autoSize:true});
});
</script>