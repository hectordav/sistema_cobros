<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
	<script type="text/javascript">
function imprSelec(factura)
        {
          var ficha=document.getElementById(factura);var ventimp=window.open(' ','popimpr');ventimp.document.write(ficha.innerHTML);ventimp.document.close();ventimp.print();ventimp.close();
          window.open("<?php echo $this->config->base_url();?>index.php/instalacion/cargar_grilla/","_self")
        }

</script>
</head>
<body>
<a href="javascript:imprSelec('factura')"><button type="button" class="btn btn-sm btn-default">Imprimir Factura</button></a>
<div id="factura">
<table border="0" width="100%" height="10%">
   <thead>
        <tr>
           <th width="10%"><IMG SRC="<?php echo $this->config->base_url();?>assets/img/logo.png"></th>
            <td width="80%">
            <?=$NOMBRE;?>
            <br>
            <?=$CEDULA;?>
            <br>
            <?=$DIRECCION;?>
            <br>
            <?=$TELF_1;?> ,<?$TELF_2;?>
            <br>
            </td>
        </tr>
    </thead>
</table>
<div style="border-width: 1px; border-style: dashed;border-color: #9E9C9C;  "> <!--el que me da el interlinieado--> </div>



