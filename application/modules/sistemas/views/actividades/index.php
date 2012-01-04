<h1>Actividades </h1>
<?php echo anchor('actividades/add', 'Agregar Actividad','id="botonAdd"');?>
  <?php foreach($posts as $post):?>
    <div class="post">
      <h2 class="title"><?php echo $post->NombreCategoria?></h2>
      <p class="date"><?php echo $post->fecha?></p>
      <div class="entry">
        <p><?php echo $post->descripcion?></p>
        <p class="links"><a href="#" class="comments">Comments (64)</a> &nbsp;&nbsp;&nbsp;<?php echo anchor('actividades/editar/'.$post->id, 'Editar', 'class="permalink"')?></p>
      </div>
    </div>  
  <?php endforeach;?>
