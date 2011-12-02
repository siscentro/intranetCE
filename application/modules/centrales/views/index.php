<h1>Centrales Telefonicas</h1>
<?php echo anchor('centrales/resumen/cc','Casa Central', 'class="boton"');?>
<?php echo anchor('centrales/resumen/535','Suc. 535', 'class="boton"');?>
<?php echo anchor('centrales/resumen/780','Suc. 780', 'class="boton"');?>
<?php echo anchor('centrales/resumen/TAV','Suc. Tavella', 'class="boton"');?>
<script>
$(document).ready(function(){
  $(".boton").button({icons:{primary:'ui-icon-circle-triangle-e'}});
});
</script>