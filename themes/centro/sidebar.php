<div id="sidebar">
    <ul>
      <li>
        <h2>Intranet Consumax</h2>
        <p><?php echo Assets::image('cmx.bmp')?></p>
      </li>
      <?php if(isset($fastest)):?>
      <?php foreach($fastest as $linea):?>
      <li>
        <h2>Categories</h2>
        <ul>
                <li><a href="#">Uncategorized</a> (3)<span>Lorem Ipsum Dolor Sit Amit</span></li>
                <li><a href="#">Lorem Ipsum</a> (42)<span>Lorem Ipsum Dolor Sit Amit</span></li>
                <li><a href="#">Urna Congue Rutrum</a> (28)<span>Lorem Ipsum Dolor Sit Amit</span> </li>
                <li><a href="#">Vivamus Fermentum</a> (13)<span>Lorem Ipsum Dolor Sit Amit</span> </li>
        </ul>
      </li>
      <?php endforeach?>
      <?php endif?>
    </ul>
</div>

