<h1>Actividad</h1>
<?php echo form_open($accion);?>
<?php echo form_hidden('id',$form->id);?>
<?php echo form_hidden('estado', 1);?>
<table>
  <tr>
    <td>Categoria:</td>
    <td>
      <?php
      echo form_dropdown('categoria_id', $categorias, 1, "id=categoria_id");?>
    </td>
  </tr>
  <tr>
    <td>Descripcion:</td>
    <td>
      <?php
      $datainput = array( 'id' => 'descripcion', 
                          'name' => 'descripcion', 
                          'value' => $form->descripcion,
                          'rows'  => 20, 
                          'cols'  => 50
                        );
      echo form_textarea($datainput);?>
    </td>
  </tr>
  <tr>
    <td>Fecha:</td>
    <td>
      <?php
      $datainput = array( 'id' => 'fecha', 
                          'name' => 'fecha', 
                          'value' => $form->fecha
                        );
      echo form_input($datainput);?>
    </td>
  </tr>
  <tr>
    <td colspan="2">
      <div id="estadioRadio" >
        <?php echo form_label('Pendiente', 'estado1');?>
        <?php echo form_radio('estado', 0, true, 'id="estado1"');?>
        <?php echo form_label('Proceso', 'estado2');?>
        <?php echo form_radio('estado', 1, true, 'id="estado2"');?>
        <?php echo form_label('Terminado', 'estado3');?>
        <?php echo form_radio('estado', 9, true, 'id="estado3"');?>
      </div>
    </td>
  </tr>
  <tr>
    <td><?php echo form_submit('Grabar', 'Grabar');?></td>
    <td><?php echo form_reset('Cancelar', 'Cancelar');?></td>
  </tr>
</table>
<?php echo form_close();?>
<?php echo anchor('', '[ Volver ]');?>


<script>
$(document).ready(function(){
  $("estadoRadio").buttoset();
});
</script>