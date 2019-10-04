<?php include "config.php"; ?>

<!DOCTYPE html>
<html>
<head>
	<?php include FOLDER_TEMPLATE."header.php"; ?>
	<title>SINOVA - Homescreen</title>
</head>
<body>
	<?php include FOLDER_TEMPLATE."topIndex.php"; ?>
	<br>
<div class="container">
	<div id="demo" class="carousel slide" data-ride="carousel" style="margin-bottom: 100px">

	<!-- Indicators -->
	<ul class="carousel-indicators">
		<li data-target="#demo" data-slide-to="0" class="active"></li>
		<li data-target="#demo" data-slide-to="1"></li>
		<li data-target="#demo" data-slide-to="2"></li>
	</ul>

	<!-- The slideshow -->
		<div class="carousel-inner">
			<div class="carousel-item active">
			<img src="<?=URL_SRC?>ambFor.jpg" alt="Los Angeles" style="width:100%;height:400px">
			</div>
			<div class="carousel-item">
			<img src="<?=URL_SRC?>1.jpg" alt="Chicago" style="width:100%;height:400px">
			</div>
			<div class="carousel-item">
			<img src="<?=URL_SRC?>fondoCarousel.png" alt="New York" style="width:100%;height:400px">
			</div>
		</div>

		<!-- Left and right controls -->
		<a class="carousel-control-prev" href="#demo" data-slide="prev">
			<span class="carousel-control-prev-icon"></span>
		</a>
		<a class="carousel-control-next" href="#demo" data-slide="next">
			<span class="carousel-control-next-icon"></span>
		</a>

	</div>
	<br>
	<a id="QueEsSinova">
	<h1 class="class text-center">¿Qué es sinova?</h1>
	<p class="w-50 mx-auto text-justify" style="margin-bottom: 100px"><font size="4">SINOVA es un sistema de información para la gestión de ambientes y novedades dessarrollado
	 para el Centro de Gestión de Mercados, Logística y TI. Fue desarrollado como Proyecto productivo
	 para presentarse como evidencia para la obtención del titulo como Tecnologo.</font></p>

	<br>
	<div class="row" style="margin-bottom: 100px">
		<div class="col-6">
		<h1 class="class text-left">¿Para que sirve sinova?</h1>
		<p class="text-left"><font size="4">SINOVA te puede ser util al momento de
		administrar los elementos presentes en un ambiente de formación. Te brindamos una forma de tener
		a la mano las novedades recientes de estos elementos y así, puedas estar enterado de los diferentes hecho que
		se lleven a cabo sin tu presencia.</font></p>
		</div>
		<div class="col-6">
			<img src="<?=URL_SRC?>logotipoProyecto.png" alt="Chicago" style="width:100%;height:70%" class="rounded-left rounded-right">
		</div>
	</div>

	<h1 class="class text-center" style="margin-bottom: 50px">Equipo de desarrollo</h1>
	<div class="row text-center">
		<div class="col-3">
			<img src="<?=URL_SRC?>persona.png" class="rounded-circle" style="width:100px;height:100px;margin-bottom: 25px">
			<p>Juan Esteban Puerto</p>
			
				<p>3219076251</p>
				<p>jepuerto2@misena.edu.co</p>
			
		</div>
		<div class="col-3">
			<img src="<?=URL_SRC?>persona.png" class="rounded-circle" style="width:100px;height:100px;margin-bottom: 25px">
			<p>Wilson Andrés Salinas</p>
			
				<p>3208860354</p>
				<p>wasalinas50@misena.edu.co</p>
			
		</div>
		<div class="col-3">
			<img src="<?=URL_SRC?>persona.png" class="rounded-circle" style="width:100px;height:100px;margin-bottom: 25px">
			<p>Luis Esteban Zamora</p>
			
				<p>3124096171</p>
				<p>lezamora9@misena.edu.co</p>
			
		</div>
		<div class="col-3">
			<img src="<?=URL_SRC?>persona.png" class="rounded-circle" style="width:100px;height:100px;margin-bottom: 25px">
			<p>Eberto Antonio Polo</p>
			
				<p>3106338649</p>
				<p>eapolo3@misena.edu.co</p>
			
		</div>
	</div>
</div>
</body>
</html>