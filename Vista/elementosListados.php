<!DOCTYPE html>
<html>
<head>
	<title>Elementos listados</title>
</head>
<body>
    <div class="col-lg-8">
	<table id="tablaElementos"class="table table-bordered table-hover table-sm">
        <thead class="thead-light">
        <tr>
            <td>Placa</td>
            <td>estado</td>
            <td>categoria</td>
            <td>serial</td>
            <td>descripcion</td>
            <td>numeroAmbiente</td>
        </tr>
        </thead>
        <tbody>
        	<?php
            foreach($elemento as $registro){
                echo"<tr>";
                echo"<td>".$registro['placa']."</td>";
                echo"<td>".$registro['estado']."</td>";
                echo"<td>".$registro['categoria']."</td>";
                echo"<td>".$registro['serial']."</td>";
                echo"<td>".$registro['descripcion']."</td>";
                echo"<td>".$registro['numeroAmbiente']."</td>";
                echo"</tr>";

            }
        			
        	?>
        </tbody>
    </table>
</div>
    <script>
        $(document).ready(function() {
        $('#tablaElementos').dataTable();
        } );
    </script>
</body>
</html>
