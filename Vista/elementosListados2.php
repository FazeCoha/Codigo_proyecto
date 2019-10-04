<?php 
require_once "../Dao/elementoDAO.php";
$eleDAO = new ElementoDAO();
$elemento=$eleDAO->listarElementos();
 ?>
	<table id="tablaElementos2"class="table table-bordered table-hover table-sm">
        <thead class="thead-light">
        <tr>
            <td>Placa</td>
            <td>Estado</td>
            <td>Categoria</td>
            <td>Serial</td>
            <td>Descripcion</td>
            <td>Número Ambiente</td>
            <?php if($_SESSION['rol'] == "admin"){ ?>
            <td>Eliminar</td>
            <td>Actualizar</td>
        <?php } ?>
        </tr>
        </thead>
        <tbody>
        	<?php
            foreach($elemento as $registro){
                $a = $registro['placa'];
                echo"<tr>";
                echo"<td>".$registro['placa']."</td>";
                echo"<td>".$registro['estado']."</td>";
                echo"<td>".$registro['categoria']."</td>";
                echo"<td>".$registro['serial']."</td>";
                echo"<td>".$registro['descripcion']."</td>";
                echo"<td>".$registro['numeroAmbiente']."</td>";
                //para los dos formularios debe ir un if verificando el rol del usuario para saber si mostrar los 
                //botones o no
                if($_SESSION['rol'] == "admin")
                {
                ?>
                <td><form method="POST" action="../Controlador/elementoControlador.php">
                    <input type="hidden" name="txtPlaca" value="<?=$a?>">
                    <input type="hidden" name="opcion" value="3">
                    <input type="submit" value="Dar de baja">
                    </form></td>
                <td>
                    <form method="POST" action="../Controlador/elementoControlador.php">
                        <input type="hidden" name="txtPlaca" value="<?=$a?>">
                        <input type="hidden" name="opcion" value="8">
                        <input type="submit" value="Actualizar">
                    </form>
                </td>
                    <?php 
                }
                echo"</tr>";
                
            }
        			
        	?>
            </tbody>
    </table>

    <script>
        $(document).ready(function() {
        $('#tablaElementos2').dataTable();
        } );
    </script>

