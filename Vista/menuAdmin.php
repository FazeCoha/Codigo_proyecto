<?php 
include "../Dao/usuarioDAO.php";
include "../config.php";
sessionValidate();
 ?>

<!DOCTYPE html>
<html>
    <?php include FOLDER_TEMPLATE."header.php";?>
<body onload="cargarAlerta()">
    <?php include FOLDER_TEMPLATE."topIn.php";?>

    <div class="row">
	
	   <?php include FOLDER_TEMPLATE."leftMenuElementos.php" ?>

       <div class="col-4">
        <br>
	   <form action="../Controlador/elementoControlador.php" method="post" <?=include FOLDER_TEMPLATE."frmStyle.php"?>>
            <h1>Ingresar Elemento</h1>
            <br>
            <label>PLACA</label>
            <input type="text" name="txtPlaca" class="form-control" required>
            
            <label>Estado</label>
            <select name="cmbEstado" class="form-control">
                <option value="buenEstado">En buen estado</option>
                <option value="mesaDeAyuda">En mesa de ayuda</option>
                <option value="dañado">Dañado</option>
                <option value="desconfigurado">Desconfigurado</option>
                <option value="noEncontrado">No encontrado</option>
            </select>
            <label>Categoria</label>
            <input type="text" name="txtCategoria" class="form-control" required>
            <label>Serial</label>
            <input type="text" name="txtSerial" class="form-control" required>
            <label>Descripcion</label>
            <textarea name="txtDescripcion" class="form-control" required></textarea>
            <label>Numero de ambiente</label>
            <select name="cmbNumeroAmbiente">
                <option value="101">101</option>
                <option value="201">201</option>
                <option value="301">301</option>
                <option value="401">401</option>
                <option value="501">501</option>
                <option value="601">601</option>
            </select>
            <input type="hidden" value="1" name="opcion">

            <br>
            <input type="submit" value="Enviar" data-toggle="modal" data-target="#myModal">
            <br>
        </form>
        
        </div>
        <div class="col-6 pl-0">
        <br>
        <form action="../Controlador/elementoControlador.php" method="POST" enctype="multipart/form-data" class="w-75 form-group shadow" style="padding:25px;">
            <label>Carga Masiva de datos</label>
            <br>
            <label>Cargar archivo(Solo XLSX)</label>
            <input accept=".xlsx" type="file" name="subir" />
            <input type="hidden" name="opcion" value="9">
            <input type="submit">
        </form>
        <br>
        <?php 
        include "elementosListados2.php";
        ?>

        
        </div>
    </div>
    <?php include FOLDER_TEMPLATE."alerta.php"; ?>
</body>
</html>