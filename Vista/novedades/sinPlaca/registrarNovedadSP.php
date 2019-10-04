<?php 
include "../../../Dao/novedadSPDAO.php";
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
	       <h3 class="text-white">Registrar novedad sin placa</h3>
	       <div class="btn-group-vertical">

	           <button class="btn btn-outline-success"><a href="../conPlaca/gestionarNovedades.php" class="text-white">Regresar</a></button>
	       </div>
    	</div>
	<div class="col-4">
		<?php 
			$novedadSP = $_SESSION['datosNovedadSP'];

			foreach($novedadSP as $registro)
			{
			 ?>
		<br>
	<form method="post" action="../../../Controlador/novedadControlador.php" <?=include FOLDER_TEMPLATE."frmStyle.php"?>>
		<h1>Registrar Novedad sin Placa</h1>
		
		<label>Descripcion:</label>
		<input type="textarea" name="txtDescSP" class="form-control" required="">
		<label>Usuario:</label>
		<input type="text" name="txtusuSP" value="2" class="form-control" readonly="true">
		<label>Ambiente:</label>
		<input type="text" name="cmbAmb" value="<?=$registro['numero']?>" class="form-control" readonly="true">
		<br>
		<button>Registrar</button>
		<input type="hidden" name="Nopcion" value="4">
	</form>
<?php } ?>

	</div>
	<div class="col-6">
		<?php include "novedadesSPListadas.php";  ?>
	</div>
    </div>
    <?php include FOLDER_TEMPLATE."alerta.php";?>
</body>
</html>