<br>
<div class="container">
	<?$correcto = $this->session->flashdata('alerta');
    if (!$correcto)
    {
    }
    else{?>
  <div class="success-message hidden">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span></button>
  <strong>!Advertencia!</strong> El Registro no existe
  <a href="<?php echo $this->config->base_url();?>index.php/cliente" class="alert-link">Agregar Cliente</a>
</div>
    <?php }
    ?>
    <br>
<h2><span class="label label-primary "><strong>Detalle de Instalacion</strong></span></h2>

<form action="<?php echo $this->config->base_url();?>index.php/instalacion/guardar_det_instalacion" method="POST"  role="form">

 <P ALIGN=right><input type="submit" class="btn btn-md btn-success"onclick = "this.form.action = '<?= $this->config->base_url();?>index.php/instalacion/actualizar_instalacion'" value="Guardar Instalacion" />


<div class="row" style="border-width: 1px; border-style: dashed;border-color: #9E9C9C;">
		<div class="col-md-6" >
		<div class="col-md-12" >
<h4><span class="label label-primary "><strong># Instalacion</strong></span></h4>
  <input type="hidden" id="lbl_instalacion_2"name="lbl_instalacion_2" value="<?echo $id_instalacion;?>">
<input type="text" name="txt_instalacion" id="txt_instalacion" class="form-control" value="<?echo $id_instalacion;?>" required="required" pattern="" title=""disabled="true">
				<div class="form-group">
				<h4><span class="label label-primary "><strong>Cliente</strong></span></h4>
				<input type="text" name="txt_cliente" id="txt_cliente" class="form-control" value="<?echo $nombre_cliente;?>" required="required" pattern="" title="" disabled="true">

				<h4><span class="label label-primary"><strong>Direccion</strong></span></h4></span>
				<div class="form-group">
					<textarea name="textarea" id="textarea" class="form-control" rows="3" required="required" disabled="true"><?echo $direccion_cliente;?></textarea>



