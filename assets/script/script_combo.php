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
                            $("#id_zona").html(data);
                        });
                    });
                });
            });
        </script>