<?php 
require_once "../../../Dao/novedadSPDAO.php";
$novSPDAO = new NovedadSPDAO();
$novedadSP=$novSPDAO->listarNovedadesSP();
?>
<table id="tablaNovedadSP" class="table table-bordered table-hover table-sm">
	<thead class="thead-light">
		<tr>
			<td>Descripcion</td>
			<td>Fecha</td>
			<td>Usuario</td>
			<td>ambiente</td>
		</tr>
	</thead>
	<tbody>
		<?php 
		foreach ($novedadSP as $registro) 
		 {
		 	echo "<tr>";
		 	echo "<td>".$registro['descripcion']."</td>";
		 	echo "<td>".$registro['fecha']."</td>";
		 	echo "<td>".$registro['nick']."</td>";
		 	echo "<td>".$registro['ambiente']."</td>";
		  ?>

		  <?php 
		  echo "</tr>";
		  } ?>

	</tbody>
</table>
<script>
        $(document).ready(function() {
        $('#tablaNovedadSP').dataTable();
        } );
    </script>