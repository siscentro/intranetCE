<?php echo Template::message()?>
<?php echo anchor('sistemas/addTerminal', 'Agregar', 'class="boton"')?>
<?php echo form_open('sistemas/pcEnUso');?>
Sucursal: <?php echo form_dropdown('sucursal', $opcSucursal, 0);?>
Tipo: <?php echo form_dropdown('tipo', $opcTipo, 0);?>
<?php echo form_submit('Filtrar', 'Filtrar');?>
<?php echo form_close();?>
<table>
  <thead>
  <th>Ip</th>
  <th>Nombre</th>
  <th>Tipo</th>
  <th>Acciones</th>
  </thead>
<?php foreach($pcs as $pc):?>
<tr>
  <td>
    192.168.0.<?php echo $pc->ip?>
  </td>
  <td>
    <?php echo $pc->nombre?>
  </td>
  <td class="tipos">
    <?php 
      $tip=$pc->tipo;
      echo $opcTipo[$tip];
    ?>
  </td>
  <td><?php echo anchor('sistemas/editarTerminal/'.$pc->ip,'Editar','class="botEditar"')?></td>
</tr>
<?php  endforeach;?>
</table>

<script>
$(document).ready(function(){
  $(".botEditar").button({icons:{primary:'ui-icon-pencil'},text:false});
});
</script>