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
                <h1>Registrar Usuario</h1>
                <label>Nick</label>
                <input type="text" name="txtNick" class="form-control">
                <label>Contraseña</label>
                <input type="password" name="txtClave" class="form-control">
                <label>Confirmar Contraseña</label>
                <input type="password" name="txtConfirmarClave" class="form-control">
                <label>Rol</label>
                <select name="cmbRol" class="form-control">
                    <option value="admin">Administrador</option>
                    <option value="cuentadante">Cuentadante</option>
                    <option value="colaborador">Colaborador</option>
                </select>
                <label>Nombre</label>
                <input type="text" name="txtNombre" class="form-control"> 
                <label>Correo</label>
                <input type="text" name="txtCorreo" class="form-control"><br>

                <div class="form-group">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                        <label class="form-check-label" for="invalidCheck">
                        Acepte los términos y condiciones.
                        </label>
                        <div class="invalid-feedback">
                        Usted debe aceptar antes de enviar la información.
                        </div>
                    </div>
                </div>

                <button>Registrar</button><br>
                <input type="hidden" name="hdOpcion" value="2">
        </div>
        <div class="col-6">
            <br>
            <?php include FOLDER_TEMPLATE."listaUsuarios.php"; ?>
        </div>
	</div>
    <?php include FOLDER_TEMPLATE."alerta.php";?>
</body>
</html>