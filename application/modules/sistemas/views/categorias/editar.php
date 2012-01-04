<h1>Categorias</h1>

<?php echo form_open('categorias/addDo');?>
<table>
  <tr>
    <td colspan="2"> <?php echo $form->id;?> </td>
  </tr>
  <tr>
    <td>Nombre</td>
    <td><?php echo form_input('nombre', $form->nombre);?></td>
  </tr>
  <tr>
    <td colspan="2"><?php echo form_submit('Grabar', 'Grabar');?></td>
  </tr>
</table>
<?php echo form_close();?>
