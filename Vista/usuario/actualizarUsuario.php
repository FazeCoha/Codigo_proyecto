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
			<?php 
			$usuario = $_SESSION['datosUsuario'];

			foreach($usuario as $registro)
			{
			 ?>
			<br> 
			<form method="post" action="<?=URL_CONTROLADOR?>usuarioControlador.php" <?=include FOLDER_TEMPLATE."frmStyle.php"?>>
		        <h1>Actualizar Usuario</h1>
		              
		        <label>Nick:</label>
		        <input type="text" name="txtNick" value="<?=$registro['nick']?>" class="form-control" readonly="true">
		        <label>Contraseña:</label>
		        <input type="password" name="txtClave" value="<?=$registro['clave']?>" class="form-control">
		        <label>Confirmar Contraseña</label>
                <input type="password" name="txtConfirmarClave" value="<?=$registro['clave']?>" class="form-control">
		        <label>Rol:</label>
		        <select name="cmbRol" class="form-control">
		            <option value="admin">Administrador</option>
		            <option value="cuentadante">Cuentadante</option>
		            <option value="colaborador">Colaborador</option>
		        </select>
		        <label>Nombre:</label>
		        <input type="text" name="txtNombre" value="<?=$registro['nombre']?>" class="form-control">
		        <label>Correo:</label>
		        <input type="text" name="txtCorreo" value="<?=$registro['correo']?>" class="form-control"><br>

		        <button>Actualizar</button><br>
		        <input type="hidden" name="hdOpcion" value="4">
		    </form>
			<?php } ?>
		</div>
		<div class="col-6">
            <br>
            <?php include FOLDER_TEMPLATE."listaUsuarios.php"; ?>
        </div>
	</div>
	<?php include FOLDER_TEMPLATE."alerta.php";?>
</body>
</html>