<?php 
include "../../../Dao/novedadDAO.php";
include "../../../config.php";
sessionValidate();
?>

<!DOCTYPE html>
<html>
<?php include FOLDER_TEMPLATE."header.php"; ?>
<body onload="cargarAlerta()">
<?php include FOLDER_TEMPLATE."topIn.php"; ?>

	<div class="row">
		<div class="col-2 bg-dark p-4" style="height: 650px">
	       <h3 class="text-white">Registrar novedad con placa</h3>
	       <div class="btn-group-vertical">

	           <button class="btn btn-outline-success"><a href="gestionarNovedades.php" class="text-white">Regresar</a></button>
	       </div>
    	</div>
	<div class="col-4">
		<?php 
			$novedad = $_SESSION['datosNovedad'];

			foreach($novedad as $registro)
			{
			 ?>
		<br>
	<form method="post" action="../../../Controlador/novedadControlador.php" <?=include FOLDER_TEMPLATE."frmStyle.php"?>>
		<h1>Registrar Novedad</h1>
		
		<label>Descripcion:</label>
		<input type="textarea" name="txtDesc" class="form-control" required="">
		<label>Estado:</label>
		<select name="cmbEst" class="form-control" required="">
			<option value="">Seleccionar</option>
			<option value="En buen Estado">En buen Estado</option>
			<option value="En mesa de ayuda">En mesa de ayuda</option>
			<option value="Dañado">Dañado</option>
			<option value="Desconfigurado">Desconfigurado</option>
			<option value="No encontrado">No encontrado</option>
		</select>		
		<label>idUsuario:</label>
		<input type="text" name="txtusu" value="<?=$_SESSION['idUsuario']?>" class="form-control" readonly="true">
		<label>Id Elemento:</label>
		<input type="text" name="txtpla" value="<?=$registro['idElemento']?>" class="form-control" readonly="true">
		<br>
		<button>Registrar</button>
		<input type="hidden" name="Nopcion" value="3">
	</form>
<?php } ?>

	</div>
	<div class="col-6">
		<?php include "novedadesListadas.php";  ?>
	</div>
    </div>
    <?php include FOLDER_TEMPLATE."alerta.php";?>
</body>
</html>