
	<div class ="container">
<div class="row">
<br>
		<div class="col-xs-12">
	<?$correcto = $this->session->flashdata('alerta');
    if ($correcto)
    {?>
 <div class="alert alert-warning alert-dismissible" role="alert">
	<button type ="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	<strong>!Advertencia!</strong> El Registro no existe
	<a href="<?php echo $this->config->base_url();?>index.php/cliente" class="alert-link">Agregar Cliente</a>
</div>

    <?}?>

		<form id="enviar"action="<?php echo $this->config->base_url();?>index.php/instalacion/guardar_instalacion" method="POST" class="form-inline" role="form">

			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon" id="sizing-addon2">Cliente</span>
						<input type="text" id="txt_id_cliente"name="txt_id_cliente" class="form-control" placeholder="Ingrese Cedula" />
				<span class="input-group-btn">
        <button class="btn btn-default "  name="boton_submit" id="boton_submit"type="submit" disabled="true">Nueva Factura</button>
				</div>
			</div>
		</form>

		</div>
		</div>
	</div>

	</div>

