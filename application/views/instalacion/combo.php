<h4><span class="label label-primary "><strong>Provincia</strong></span></h4>
		<select name="idEstado" id="idEstado" class="form-control" required="required">
			<option value="0">Provincia</option>
                <?php
                    foreach ($estados as $i) {
                        echo '<option value="'. $i->ID .'">'. $i->DESCRIPCION .'</option>';
                    }
                ?>
            </select>
		<h4><span class="label label-primary "><strong>Ciudad</strong></span></h4>
		<select name="idCiudad" id="idCiudad" class="form-control" required="required">
			<option value=""></option>
		</select>
		<h4><span class="label label-primary "><strong>Parroquia</strong></span></h4>
		<select name="idparroquia" id="idparroquia" class="form-control" required="required">
			<option value=""></option>
		</select>

		<h4><span class="label label-primary "><strong>Zona</strong></span></h4>
		<select name="id_zona" id="id_zona" class="form-control" required="required">
			<option value=""></option>
		</select>
				</div>
				</div>
				</div>
		</div>

