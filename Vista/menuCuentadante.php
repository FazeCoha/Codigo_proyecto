<?php 
include "../Dao/usuarioDAO.php";
include "../config.php";
sessionValidate();
 ?>
<!DOCTYPE html>
<html>
<?php include FOLDER_TEMPLATE."header.php";?>
<body>
	<?php include FOLDER_TEMPLATE."topIn.php";?>

    <div class="row">

        <?php include FOLDER_TEMPLATE."leftMenuCuentadante.php" ?>
        
        <div class="col-10">
            <br>
            <br>
            <!--<form action="../Controlador/elementoControlador.php" method="post">
                <label>Listar por número de ambiente</label>
                <select name="cmbNumeroAmbiente">
                    <?php for($i=1; $i<10; $i++)
                    {
                    	?>
                    	<option value="10<?=$i?>">10<?=$i?></option>
                    	<?php
                    }
                    ?>
                </select>
                <br>
                <input type="hidden" value="4" name="opcion">
                <input type="submit" value="Listar">
            </form>

            <form action="../Controlador/elementoControlador.php" method="post">
                <label>Listar por estado</label>
                <select name="cmbEstado">
                    <option value="buenEstado">En buen estado</option>
                    <option value="mesaDeAyuda">En mesa de ayuda</option>
                    <option value="dañado">Dañado</option>
                    <option value="desconfigurado">Desconfigurado</option>
                    <option value="noEncontrado">No encontrado</option>
                </select>
                <br>
                <input type="hidden" value="5" name="opcion">
                <input type="submit" value="Listar">
            </form>

            <form action="../Controlador/elementoControlador.php" method="post">
                <label>Listar por estado y ambiente</label>
                <select name="cmbEstado">
                   <option value="buenEstado">En buen estado</option>
                    <option value="mesaDeAyuda">En mesa de ayuda</option>
                    <option value="dañado">Dañado</option>
                    <option value="desconfigurado">Desconfigurado</option>
                    <option value="noEncontrado">No encontrado</option>
                </select>
                <select name="cmbNumeroAmbiente">
                	
                </select>
                <br>
                <input type="hidden" value="6" name="opcion">
                <input type="submit" value="Listar">
            </form>
                <br>-->

                <?php include "elementosListados2.php"; ?>
            </div>
    </div>
</body>
</html>