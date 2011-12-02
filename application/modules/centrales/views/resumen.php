<div id="acord">
  <h3>Internos</h3>
  <div>
    <table>
      <thead>
        <tr>
          <th>Interno</th>
          <th>Nombre</th>
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
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>
  </div>
  <h3>Lineas</h3>
  <div>
    <table>
      <thead>
        <tr>
          <th>Linea</th>
          <th>Tipo</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($lienas as $linea):?>
        <tr>
          <td>
            <?php echo $linea->name?>
          </td>
          <td>
            <?php echo $linea->tech?>
          </td>
        </tr>
        <?php endforeach;?>
      </tbody>
    </table>
  </div>
</div>