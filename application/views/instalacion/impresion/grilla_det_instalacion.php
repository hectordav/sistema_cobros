
        <div style="border-width: 1px; border-style: dashed;border-color: #9E9C9C;  "> <!--el que me da el interlinieado-->
        <H3><P ALIGN="CENTER"><label>Componentes a Instalar</label></H3>
<table border="0" width="100%" height="10%">
  <tbody>
  <tr>
  </tr>
    <tr>
<th>Descripcion</th>
      <th>Cantidad</th>
    </tr>

    <tr>
<? foreach ($det_instalacion->result() as $data) { ?>
      <td><?=$data->DESCRIPCION;?></td>
      <td><?=$data->CANTIDAD;?></td>
    </tr>
    <?}?>
  </tbody>
</table>
  </div>

