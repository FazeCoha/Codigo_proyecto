<?php  

require "../config.php";
require "../Dao/novedadDAO.php";
require "../Dao/elementoDAO.php";
require "../Dao/novedadSPDAO.php";


$opcion = $_POST["Nopcion"];

$descripcion = "";
$estado = "";
$fecha = "";
$usuario = "";
$placa = "";
$ambiente = 0;

switch ($opcion) {
	case 1:
		$placa = $_POST["txtPlaca"];
		$eleDAO = new ElementoDAO(); 
		$datosNovedad = $eleDAO->consultarElementoPlaca($placa);
		if ($datosNovedad != null) {
			$_SESSION['datosNovedad'] = $datosNovedad;
			header("Location: ". URL_VISTA. "novedades/conPlaca/registrarNovedad.php");
		}
		else
		{
			$_SESSION['tipoResult'] = false;
			$_SESSION['msjResult'] = "No se ha podido registrar la novedad.";
		   	header("Location: ".URL_VISTA."novedades/conPlaca/gestionarNovedades.php");
		}		
		break;
	case 2:
		$ambiente = $_POST["cmbAmb"];
		$novSPDAO = new	NovedadSPDAO();
		
		$datosNovedadSP = $novSPDAO->consultarNovedadSPAmbiente($ambiente);

		if ($datosNovedadSP != null) {
			$_SESSION['datosNovedadSP'] = $datosNovedadSP;
			header("Location: ". URL_VISTA. "novedades/sinPlaca/registrarNovedadSP.php");
		}
		else 
		{
			$_SESSION['tipoResult'] = false;
			$_SESSION['msjResult'] = "No se ha podido consultar la novedad.";
		   	header("Location: ".URL_VISTA."novedades/sinPlaca/gestionarNovedades.php");
		}
		break;
	case 3:
		$descripcion = $_POST['txtDesc'];
		$estado = $_POST['cmbEst'];
		$usuario = $_POST['txtusu'];
		$placa = $_POST['txtpla'];
		$novDAO = new NovedadDAO();
		if($novDAO->agregarNovedad($descripcion,$estado,$usuario,$placa))
		{
			$_SESSION['tipoResult'] = true;
			$_SESSION['msjResult'] = "La novedad ha sido registrada exitosamente.";
		   	header("Location: ".URL_VISTA."novedades/conPlaca/registrarNovedad.php");
		}
		else
		{
			$_SESSION['tipoResult'] = false;
			$_SESSION['msjResult'] = "No se ha podido registrar la novedad.";
		   	header("Location: ".URL_VISTA."novedades/conPlaca/registrarNovedad.php");
		}	
		break;
	case 4:
		$descripcion = $_POST['txtDescSP'];
		$usuario = $_POST['txtusuSP'];
		$ambiente = $_POST['cmbAmb'];
		$novSPDAO = new NovedadSPDAO();
		if($novSPDAO->agregarNovedadSP($descripcion,$usuario,$ambiente))
		{
			$_SESSION['tipoResult'] = true;
			$_SESSION['msjResult'] = "La novedad ha sido registrada exitosamente.";
		   	header("Location: ".URL_VISTA."novedades/sinPlaca/registrarNovedadSP.php");
		}
		else
		{
				$_SESSION['tipoResult'] = false;
				$_SESSION['msjResult'] = "No se ha podido registrar la novedad.";
		   		header("Location: ".URL_VISTA."novedades/sinPlaca/registrarNovedadSP.php");
		}	
		break;		
	

	
}

?>