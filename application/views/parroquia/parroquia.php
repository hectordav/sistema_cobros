 <body>
        <?= form_open(base_url().'index.php/parroquia/hacerAlgo'); ?>
            <select id="idEstado" name="idEstado">
                <option value="0">Estados</option>
                <?php
                    foreach ($estados as $i) {
                        echo '<option value="'. $i->ID .'">'. $i->DESCRIPCION .'</option>';
                    }
                ?>
            </select>
            <br/>
            <br/>
            <select id="idCiudad" name="idCiudad">
                <option value="0">Ciudades</option>
            </select>
             <select id="idparroquia" name="idparroquia">
                <option value="0">parroquia</option>
            </select>
            <br/>
            <br/>
            <select id="idzona" name="idzona">
                <option value="0">parroquia</option>
            </select>
            <button>Aceptar</button>
        </form>
        <script type="text/javascript">
            $(document).ready(function() {
                $("#idEstado").change(function() {
                    $("#idEstado option:selected").each(function() {
                        idEstado = $('#idEstado').val();
                        $.post("<?php echo base_url(); ?>index.php/parroquia/fillCiudades", {
                            idEstado : idEstado
                        }, function(data) {
                            $("#idCiudad").html(data);
                        });
                    });
                });
            });
               $(document).ready(function() {
                $("#idCiudad").change(function() {
                    $("#idCiudad option:selected").each(function() {
                        idCiudad = $('#idCiudad').val();
                        $.post("<?php echo base_url(); ?>index.php/parroquia/fill_parroquia", {
                            idCiudad : idCiudad
                        }, function(data) {
                            $("#idparroquia").html(data);
                        });
                    });
                });
            });
                  $(document).ready(function() {
                $("#idparroquia").change(function() {
                    $("#idparroquia option:selected").each(function() {
                        idparroquia = $('#idparroquia').val();
                        $.post("<?php echo base_url(); ?>index.php/parroquia/fill_zona", {
                            idparroquia : idparroquia
                        }, function(data) {
                            $("#idzona").html(data);
                        });
                    });
                });
            });
        </script>
    </body>
</html>
