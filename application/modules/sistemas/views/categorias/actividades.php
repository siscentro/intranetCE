<?php foreach($posts as $post):?>
    <div class="post">
      <h2 class="title"><?php echo $post->NombreCategoria;?></h2>
      <p class="date"><?php echo $post->fecha?></p>
      <div class="entry">
        <p><?php echo $post->descripcion;?></p>
        <p class="links"><a href="#" class="comments">Comments (64)</a> &nbsp;&nbsp;&nbsp; <a href="#" class="permalink">Full article</a></p>
      </div>
    </div>
<?php endforeach;?>