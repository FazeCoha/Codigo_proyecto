<?php 
require_once "../../../Dao/novedadDAO.php";
$novDAO = new NovedadDAO();
$novedad=$novDAO->listarNovedades();
?>
<br>
<table id="tablaNovedad" class="table table-bordered table-hover table-sm">
	<thead class="thead-light">
		<tr>
			<td>Descripcion</td>
			<td>Estado</td>
			<td>Fecha</td>
			<td>Usuario</td>
			<td>Placa</td>
		</tr>
	</thead>
	<tbody>
		<?php 
		foreach ($novedad as $registro) {
		 	echo "<tr>";
		 	echo "<td>".$registro['descripcion']."</td>";
		 	echo "<td>".$registro['estado']."</td>";
		 	echo "<td>".$registro['fecha']."</td>";
		 	echo "<td>".$registro['nick']."</td>";
		 	echo "<td>".$registro['placa']."</td>";
		  ?>
		  
		  		
		  	
		  <?php 
		  echo "</tr>";
		  } ?>
	</tbody>
</table>
<script>
        $(document).ready(function() {
        $('#tablaNovedad').dataTable();
        } );
    </script>