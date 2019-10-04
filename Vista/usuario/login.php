<?php include "../../config.php" ?>

<!DOCTYPE html>
<html>
<head>
    <?php include FOLDER_TEMPLATE."header.php"; ?>
	<title></title>
</head>
<body onload="cargarAlerta()">
    <?php include FOLDER_TEMPLATE."topOut.php"; ?>
    <br>
    <br>
	<form method="post" action="<?=URL_CONTROLADOR?>usuarioControlador.php" class="w-25 mx-auto form-group shadow" style="padding:50px;">
            <h1>Inicio de sesión.</h1>
            
            <label>Nick:</label><br>
            <input type="text" name="txtNick" class="form-control"><br>
            <label>Contraseña:</label><br>
            <input type="password" name="txtClave" class="form-control"><br>
            <button>Ingresar</button><br>
            
            <input type="hidden" value="1" name="hdOpcion">
            
        </form>

        <?php include FOLDER_TEMPLATE."alerta.php";?>
</body>
</html>