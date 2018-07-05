
<h4><span class="label label-primary "><strong>Tecnico</strong></span></h4>
		<select name="id_tecnico" id="id_tecnico" class="form-control" required="required">
			<option value="0"></option>
                <?php
                    foreach ($tecnico as $i) {
                        echo '<option value="'. $i->ID .'">'. $i->NOMBRE .'</option>';
                    }
                ?>
            </select>
		</div>
</div>
</div>

 </form>
