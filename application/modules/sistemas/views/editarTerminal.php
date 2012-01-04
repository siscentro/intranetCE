<?php echo form_open($accion);?>
<table>
<?php foreach($pc as $key=>$valor):?>
  <?php
  switch($key){
    case 'ip':
      $msj =$_SERVER['REMOTE_ADDR'];
      $select = false;
      break;
    case 'wifi':
      $select = array(1 => 'Si',
                      0 => 'No'
                     );
      break;
    case 'freezada':
      $select = array(1 => 'Si',
                      0 => 'No'
                     );
      break;
    case 'tipo':
      $select = array(1 => 'Server',
                      2 => 'Oficina',
                      3 => 'Puesto Venta',
                      4 => 'Caja',
                      5 => 'Conectividad'
                     );
      break;
    case 'sucursal':
      $select = array(1  => 'Casa central',
                      3  => 'Suc 780',
                      14 => 'Suc Tav',
                      80 => 'DPC'
                     );
      break;
    default:
      $msj="";
      $select = false;
      break;
  }
  ?>
<tr>
  <th><?php echo $key?></th>
  <?php if(!$select):?>
    <td><?php echo form_input($key,$valor)?><?php echo $msj?></td>
  <?php else:?>
    <td><?php echo form_dropdown($key,$select,$valor)?></td>
  <?php endif;?>
</tr>
<?php  endforeach;?>
<tr>
  <td colspan="2"><?php echo form_submit("Guardar", 'Guardar');?></td>
</tr>
</table>
<?php echo form_close();?>