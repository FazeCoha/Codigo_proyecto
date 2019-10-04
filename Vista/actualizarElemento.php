<?php 
sessionValidate();
 ?>

<!DOCTYPE html>
<html>
    <?php include FOLDER_TEMPLATE."header.php";?>
<body>
    <?php include FOLDER_TEMPLATE."topIn.php";?>
    <div class="row">
        <?php include FOLDER_TEMPLATE."leftMenuElementos.php";?>
        <div class="col-4">
        	<?php 
        		foreach($elemento as $registro){

        	 ?>
                <br>
        		    <form action="../Controlador/elementoControlador.php" method="post" <?=include FOLDER_TEMPLATE."frmStyle.php"?>>
                    <h1>Actualizar</h1>
                    
                    <label>PLACA</label>
                    <input type="text" name="txtPlaca" value="<?=$registro['placa']?>" readonly="readonly" class="form-control">
                    
                    <label>Estado</label>
                    <input type="text" name="txtEstado" value="<?=$registro['estado']?>" class="form-control">
                    
                    <label>Categoria</label>
                    <input type="text" name="txtCategoria" value="<?=$registro['categoria']?>" class="form-control">
                    
                    <label>Serial</label>
                    <input type="text" name="txtSerial" value="<?=$registro['serial']?>" readonly="readonly" class="form-control">
                	
                    <label>Descripcion</label>
                    <textarea name="txtDescripcion" class="form-control"><?=$registro['descripcion']?></textarea>
                    
                    <label>Numero de ambiente</label>
                    <input type="number" name="txtNumeroAmbiente" value="<?=$registro['numeroAmbiente']?>" class="form-control">
                    <br>
                    <input type="hidden" value="2" name="opcion">
                    <input type="hidden" value="<?=$registro['idElemento']?>" name="txtIdElemento">
                    <input type="submit" value="Enviar">
                    <button><a href="<?=URL_VISTA?>menuAdmin.php">Regresar</a></button>
                </form>
            <?php } ?>
        </div>
    </div>
</body>
</html>