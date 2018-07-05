
 <? foreach ($cliente->result() as $data) { ?>

	<table border="0" width="100%" height="10%">
   <thead>
        <tr>
           <th width="15%"ALIGN="RIGHT">Cedula:</th>
            <td width="80%"><?=$data->rif;?></td>
        </tr>
        <tr>
        <th width="15%" ALIGN="RIGHT"> Cliente:</th>
	        <td width="80%"><?=$data->nombre;?></td>
	    </tr>
        <tr>
        <th width="15%" ALIGN="RIGHT">Direccion:</th>
          <td width="80%"><?=$data->direccion;?></td>
        </tr>
          <tr>
           <th width="15%" ALIGN="RIGHT">Telefono:</th>
            <td width="80%"><?=$data->telef_1;?> ,<?$data->correo;?> </td>
          </tr>
    </thead>
</table>
<br>
<?}?>
<div style="border-width: 1px; border-style: dashed;border-color: #9E9C9C;  "> <!--el que me da el interlinieado--> </div>