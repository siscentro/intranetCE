<div id="menu">
  <ul>
    <?php foreach($menu as $m):?>
    <li <?php echo check_method($m->link)?> ><?php echo anchor($m->link,$m->nombre,$m->clase)?></li>
    <?php endforeach;?>
  </ul>
</div>

