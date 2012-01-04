<?php echo anchor('categorias/add','Agregar Categoria', 'id=botonAdd');?> 

<table>
<tr>
  <th>ID</th>
  <th>Nombre</th>
</tr>
  <?php foreach($categorias as $categoria):?>
    <tr>
      <td><?php echo anchor('categorias/editar/'.$categoria->id, $categoria->id);?></td>
      <td><?php echo $categoria->nombre?></td>
    </tr>
  <?php endforeach;?>
</table>
<br />

<?php
/*
 * Location: view/categorias/index.php
 */