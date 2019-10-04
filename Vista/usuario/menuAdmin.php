<?php 
include "../../config.php";
sessionValidate();
 ?>

<!DOCTYPE html>
<html>
	<?php include FOLDER_TEMPLATE."header.php";?>
<body>
	<?php include FOLDER_TEMPLATE."topIn.php";?>
	<div class="row">
        <div class="col-2 bg-dark p-4" style="height: 600px">
            <h3 class="text-white">Menu Administrador</h3>
            <div class="btn-group-vertical">
                <button class="btn btn-outline-success"><a href="<?=URL_VISTA?>usuario/gestionarUsuarios.php" class="text-white">Gestionar Usuarios</a></button>
                <button class="btn btn-outline-success"><a href="<?=URL_VISTA?>menuAdmin.php" class="text-white">Gestionar Elementos</a></button>
        	</div>
    	</div>
        <div class="col-10">
            
        </div>
    </div>
</body>
</html>