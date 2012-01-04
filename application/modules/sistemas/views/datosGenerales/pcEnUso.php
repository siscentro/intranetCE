<?php echo anchor('datosGenerales/addTerminal', 'Agregar', 'class="boton"')?>
<?php echo form_open('datosGenerales/pcEnUso');?>
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
    <?php echo $pc->tipo?>
  </td>
  <td><?php echo anchor('datosGenerales/editarTerminales/'.$pc->ip,'Editar','class="boton"')?></td>
</tr>
<?php  endforeach;?>
</table>