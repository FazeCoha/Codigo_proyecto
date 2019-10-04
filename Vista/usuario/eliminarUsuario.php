<?php 
include "../../Dao/usuarioDAO.php";
include "../../config.php";
sessionValidate();
 ?>

<!DOCTYPE html>
<html>
	<?php include FOLDER_TEMPLATE."header.php";?>
<body onload="cargarAlerta()">
	<?php include FOLDER_TEMPLATE."topIn.php";?>
	<div class="row">
		<?php include FOLDER_TEMPLATE."leftMenuUsuarios.php";?>
		<div class="col-4">
			<br>
			<form method="post" action="<?=URL_CONTROLADOR?>usuarioControlador.php" <?=include FOLDER_TEMPLATE."frmStyle.php"?>>
                <h1>Eliminar Usuario</h1>
                <label>Nick:</label>
                <input type="text" name="txtNick" class="form-control"><br>

                <button>Eliminar</button><br>
                <input type="hidden" name="hdOpcion" value="5">
            </form>
		</div>

		<div class="col-6">
            <br>
            <?php include FOLDER_TEMPLATE."listaUsuarios.php"; ?>
        </div>
        
	</div>
	<?php include FOLDER_TEMPLATE."alerta.php";?>
</body>
</html>