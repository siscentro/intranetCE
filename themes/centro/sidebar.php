<div id="sidebar">
    <ul>
      <li>
        <h2>Intranet Consumax</h2>
        <p>
          <a href="https://192.168.5.25" target="_blank">
            <img src="<?php echo base_url() . '/assets/images/cmx.bmp';?>" width="200px" />
          </a>
        </p>
      </li>
      <?php if(isset($fastest)):?>
      <?php foreach($fastest as $key=>$datos):?>
      <li>
        <h2><?php echo $key?></h2>
        <ul>
          <?php foreach($datos as $m):?>
             <li><?php echo anchor($m['link'],$m['nombre'],'class="'.$m['clase'].'"')?></li>
          <?php endforeach?>
        </ul>
      </li>
      <?php endforeach?>
      <?php endif?>
    </ul>
</div>

