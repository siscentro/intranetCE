<?php echo Template::message();?>
<?php echo anchor ('auth/logout','Salir','id="botSalir"');?>

<script>
$(document).ready(function(){
  $('#botSalir').button({icons:{primary:'ui-icon-circle-close'}});
})
</script>