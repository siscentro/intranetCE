<div class="post">
  <div class="post-bgtop">
    <div class="post-bgbtm">
      <h2 class="title"><a href="#">Datos de la terminal</a></h2>
      <p class="meta">Direccion IP:<?php echo $IP?>
              <?php echo anchor($accionPC, $mensajePC, 'class="permalink"')?></p>
      <div class="entry">
        <?php if(count($PC)<1):?>
        <?php else:?>
          <?php foreach($PC as $key=>$valor):?>
            <p>
              <?php echo $key.'=>'.$valor;?>
            </p>
          <?php endforeach;?>
        <?php endif;?>
      </div>
    </div>
  </div>
</div>
<?php foreach($posts as $post):?>
<div class="post">
<div class="post-bgtop">
<div class="post-bgbtm">
  <h2 class="title"><a href="#"><?php echo $post->NombreCategoria?></a></h2>
  <p class="meta"><?php echo $post->fecha?>
          &nbsp;&bull;&nbsp; <a href="#" class="comments">Comments (64)</a> &nbsp;&bull;&nbsp; <?php echo anchor('actividades/editar/'.$post->id, 'Editar', 'class="permalink"')?></p>
  <div class="entry">
        <p><?php echo $post->descripcion?></p>
  </div>
</div>
</div>
</div>
<?php endforeach;?>
<?php echo anchor('actividades/add','Agregar Actividad','id=botonAdd');?>
