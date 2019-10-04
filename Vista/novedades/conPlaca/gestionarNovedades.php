<?php 
include "../../../Dao/novedadDAO.php";
include "../../../Dao/novedadSPDAO.php";
include "../../../config.php";
sessionValidate();
?>

<!DOCTYPE html>
<html>
<?php include FOLDER_TEMPLATE."header.php"; ?>
<body onload="cargarAlerta()">
<?php include FOLDER_TEMPLATE."topIn.php"; ?>
<?php
     $novDAO = new NovedadDAO();
     $novSPDAO = new NovedadSPDAO();
     $novDAO->actualizarNovedadLeida();
     $novSPDAO->actualizarNovedadLeidaSP();
    
 ?>

<div class="row">
<?php include FOLDER_TEMPLATE."leftMenuNovedades.php"; ?>
	<div class="col-10">
		<div class="row">		
			<div class="col-5">
				<br>
				<form action="../../../Controlador/novedadControlador.php" method="post" <?=include FOLDER_TEMPLATE."frmStyle.php"?>>	
					<h1>Registrar Novedad</h1>
					<label>Placa elemento:</label>
					<input type="text" name="txtPlaca" class="form-control" required=""><br>

					<button>Consultar</button><br>
					<input type="hidden" name="Nopcion" value="1">
				</form>
			</div>
			<div class="col-7">
				<br>
				<?php
				include "novedadesListadas.php";
				?>
			</div>
		</div>
		<div class="row">
			<div class="col-5">
					<form action="../../../Controlador/novedadControlador.php" method="post" <?=include FOLDER_TEMPLATE."frmStyle.php"?>>	
					<h1>Registrar Novedad sin Placa</h1>
					<label>Ambiente:</label>
					<select name="cmbAmb" class="form-control" required="">
						<option value="">Seleccionar</option>
						<option value="101">101</option>
						<!--<option value="102">102</option>
						<option value="103">103</option>
						<option value="104">104</option>
						<option value="105">105</option>
						<option value="106">106</option>
						<option value="107">107</option>
						<option value="108">108</option>
						<option value="109">109</option>
						<option value="110">110</option>-->
						<option value="201">201</option>
						<!--<option value="202">202</option>
						<option value="203">203</option>
						<option value="204">204</option>
						<option value="205">205</option>
						<option value="206">206</option>
						<option value="207">207</option>
						<option value="208">208</option>
						<option value="209">209</option>
						<option value="210">210</option>-->
						<option value="301">301</option>
						<!--<option value="302">302</option>
						<option value="303">303</option>
						<option value="304">304</option>
						<option value="305">305</option>
						<option value="306">306</option>
						<option value="307">307</option>
						<option value="308">308</option>
						<option value="309">309</option>
						<option value="310">310</option>
						<option value="401">401</option>
						<!--<option value="402">402</option>
						<option value="403">403</option>
						<option value="404">404</option>
						<option value="405">405</option>
						<option value="406">406</option>
						<option value="407">407</option>
						<option value="408">408</option>
						<option value="409">409</option>
						<option value="410">410</option>-->
						<option value="501">501</option>
						<!--<option value="502">502</option>
						<option value="503">503</option>
						<option value="504">504</option>
						<option value="505">505</option>
						<option value="506">506</option>
						<option value="507">507</option>
						<option value="508">508</option>
						<option value="509">509</option>
						<option value="510">510</option>-->
						<option value="601">601</option>
						<!--<option value="602">602</option>
						<option value="603">603</option>
						<option value="604">604</option>
						<option value="605">605</option>
						<option value="606">606</option>
						<option value="607">607</option>
						<option value="608">608</option>
						<option value="609">609</option>
						<option value="610">610</option>-->
						

					</select>
					<br>
					<button>Consultar</button><br>
					<input type="hidden" name="Nopcion" value="2">
				</form>
			</div>
			<div class="col-7">
				<?php 
					include "../sinPlaca/novedadesSPListadas.php";
				?>
			</div>
		</div>>	
    </div>
</div>
<?php include FOLDER_TEMPLATE."alerta.php";?>
</body>
</html>