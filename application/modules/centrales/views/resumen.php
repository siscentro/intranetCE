<div id="acord">
  <h3><a href="#">Internos</a></h3>
  <div>
    <table>
      <thead>
        <tr>
          <th>Interno</th>
          <th>Nombre</th>
          <th>Grupo</th>
          <th>Nombre Grupo</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($internos as $interno):?>
        <tr>
          <td>
            <?php echo $interno->extension?>
          </td>
          <td>
            <?php echo $interno->name?>
          </td>
          <td>
            <?php echo $interno->grupo?>
          </td>
          <td>
            <?php echo $interno->nombreGrupo?>
          </td>
          <td>
              <?php echo anchor('centrales/verInterno/'.$interno->extension."/".$suc,'Detalles Interno', 'class="detInternos"')?>
              <?php echo anchor('centrales/verGrupo/'.$interno->grupo."/".$suc,'Detalles Grupo', 'class="detGrupos"')?>
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>
    Internos sin Asignar a Grupo = <?php echo $sinAsignar?>
  </div>
  <h3><a href="#">Lineas</a></h3>
  <div>
    <table>
      <thead>
        <tr>
          <th>Linea</th>
          <th>Tipo</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($lineas as $linea):?>
        <tr>
          <td>
            <?php echo $linea->name?>
          </td>
          <td>
            <?php echo $linea->tech?>
          </td>
          <td>
              <?php echo anchor('centrales/verLinea/'.$linea->trunkid."/".$suc,'Detalles Linea', 'class="detLineas"')?>
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>
  </div>
</div>

<script>
$(document).ready(function(){
  $("#acord").accordion();
  $(".detInternos").button({icons:{primary:'ui-icon-person'}, text:false})
  $(".detGrupos").button({icons:{primary:'ui-icon-refresh'}, text:false})
  $(".detLineas").button({icons:{primary:'ui-icon-circle-arrow-e'}, text:false})
});
</script>