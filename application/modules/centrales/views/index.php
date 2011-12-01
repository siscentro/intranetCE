<div id="internos">
  535
<table>
  <thead>
    <tr>
      <th>
        Interno
      </th>
      <th>
        Nombre
      </th>
      <th>
        Usuario
      </th>
    </tr>
  </thead>
<?php foreach($internos535 as $interno):?>
<tr>
  <td>
    <?php echo $interno->extension?>
  </td>
  <td>
    <?php echo $interno->name?>
  </td>
  <td>
    <?php echo $interno->sipname?>
  </td>
</tr>
<?php endforeach; ?>
</table>
</div>
<div id="lineas">
<table>
  <thead>
    <tr>
      <th>
        Nombre
      </th>
      <th>
        Cant. Lineas
      </th>
    </tr>
  </thead>
<?php foreach($lineas535 as $linea):?>
<tr>
  <td>
    <?php echo $linea->name?>
  </td>
  <td>
    <?php echo $linea->maxchans?>
  </td>
</tr>
<?php endforeach; ?>
</table>
</div>
<div style="clear:both"></div>
<div id="internos">
  780
<table>
  <thead>
    <tr>
      <th>
        Interno
      </th>
      <th>
        Nombre
      </th>
      <th>
        Usuario
      </th>
    </tr>
  </thead>
<?php foreach($internos780 as $interno):?>
<tr>
  <td>
    <?php echo $interno->extension?>
  </td>
  <td>
    <?php echo $interno->name?>
  </td>
  <td>
    <?php echo $interno->sipname?>
  </td>
</tr>
<?php endforeach; ?>
</table>
</div>
<div id="lineas">
<table>
  <thead>
    <tr>
      <th>
        Nombre
      </th>
      <th>
        Cant. Lineas
      </th>
    </tr>
  </thead>
<?php foreach($lineas780 as $linea):?>
<tr>
  <td>
    <?php echo $linea->name?>
  </td>
  <td>
    <?php echo $linea->maxchans?>
  </td>
</tr>
<?php endforeach; ?>
</table>
</div>


<script>
$(document).ready(function(){
  $("#internos").addClass('ui-widget');
  $("#lineas").addClass('ui-widget');
  $("#internos").css('float','left');
  $("#lineas").css('float','right');
});
</script>