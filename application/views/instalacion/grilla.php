<br>
<div id="grilla">
<div class="row">
	<div style="border-width: 1px; border-style: dashed;border-color: #9E9C9C;  "> <!--el que me da el interlinieado-->
<h3><span class="label label-warning">Equipos a Instalar</span></h3>
				<form id="form-guardar"action="<?php echo $this->config->base_url();?>index.php/instalacion/guardar_det_instalacion" method="POST"  role="form">
					<div class="form-group">
						<div class="input-group">
							<input type="hidden" id="lbl_instalacion"name="lbl_instalacion" value="<?echo $id_instalacion;?>">
						<span class="input-group-addon" id="sizing-addon2">Equipos:</span>
						<input type="text" name="txt_equipo"  id="txt_equipo"class="form-control"
						placeholder="Ingrese Equipo" aria-describedby="sizing-addon2" required>
						<span class="input-group-addon" id="sizing-addon2">Cantidad</span>
						<input type="text" name="txt_cantidad"  id="txt_cantidad"class="form-control"
						placeholder="Ingrese Cantidad" aria-describedby="sizing-addon2" required>
						<span class="input-group-btn">
						<button class="btn btn-default " onclick="guardar_det_instalacion()" name="btn_enviar"id="btn_enviar" type="submit" >Agregar</button></span>
						</div>
					</div>
				</form>
					<div id="det_instalacion">
					</div>
			</div>

			</div>
			<br>
			<br>
