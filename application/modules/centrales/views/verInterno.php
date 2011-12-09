<h1>Detalle Interno <?php echo $interno?></h1>
total llamadas<?php echo $totalRealizadas?>
<br />
<table width="95%">
  <thead>
    <tr>
      <th>Tipo</th>
      <th>Fecha</th>
      <th>Id</th>
      <th>Origen</th>
      <th>Destino</th>
      <th>Linea</th>
      <th>Duracion</th>
      <th>Estado</th>
    </tr>
  </thead>
<?php foreach($llamadas as $llamada):?>
  <?php
  $numero =(string) $llamada->dst;
  $tiempo->setTime(0,0,$llamada->duration);
  ?>
  <tr class="<?php echo (strlen($numero)>4)?"callOut":"callIn";?>">
    <td class="<?php echo ($llamada->src==$interno)?"phoneout":"phonein";?>">&nbsp;</td>
      <td><?php echo $llamada->calldate?></td>
      <td><?php echo $llamada->clid?></td>
      <td><?php echo $llamada->src?></td>
      <td><?php echo $llamada->dst?></td>
      <td><?php echo $llamada->dstchannel?></td>
      <td><?php echo $tiempo->format('H:i:s')?></td>
      <td><?php echo $llamada->disposition?></td>
  </tr>
<?php endforeach; ?>
</table>