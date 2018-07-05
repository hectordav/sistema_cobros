<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="http://code.jquery.com/ui/1.10.2/jquery-ui.js"></script>

    </head>
    <body>
        <?= form_open(base_url().'index.php/controllerComboBoxes/hacerAlgo'); ?>
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
            <br/>
            <br/>
            <button>Aceptar</button>
        </form>

        <script type="text/javascript">
            $(document).ready(function() {
                $("#idEstado").change(function() {
                    $("#idEstado option:selected").each(function() {
                        idEstado = $('#idEstado').val();
                        $.post("<?php echo base_url(); ?>index.php/controllerComboBoxes/fillCiudades", {
                            idEstado : idEstado
                        }, function(data) {
                            $("#idCiudad").html(data);
                        });
                    });
                });
            });
        </script>
    </body>
</html>
