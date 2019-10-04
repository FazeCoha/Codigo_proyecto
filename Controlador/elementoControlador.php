<?php 
/*
Todos los atributos que se usan y de donde vienen
	$idElemento = $_POST['txtIdElemento'];
	$placa = $_POST['txtPlaca'];
	$estado= $_POST['txtEstado'];
	$categoria = $_POST['txtCategoria'];
	$serial = $_POST['txtSerial'];
	$descripcion = $_POST['txtDescripcion'];
	$numeroAmbiente = $_POST['txtNumeroAmbiente'];
	$opcion = $_POST['opcion'];
*/
require_once "../config.php";
require_once "../Dao/elementoDAO.php";
    //recojo la opcion para el switch

	$opcion = $_POST['opcion'];

			$idElemento = 0;
			$placa = "";
			$estado= "";
			$categoria = "";
			$serial = "";
			$descripcion = "";
			$numeroAmbiente = 0;
	switch ($opcion) {
		//registrar
		case 1:
			$placa = $_POST['txtPlaca'];
			$estado= $_POST['cmbEstado'];
			$categoria = $_POST['txtCategoria'];
			$serial = $_POST['txtSerial'];
			$descripcion = $_POST['txtDescripcion'];
			$numeroAmbiente = $_POST['cmbNumeroAmbiente'];
			$eleDAO = new ElementoDAO();
			//valido que el elemento no exista
			if($eleDAO->consultarElementoPlaca($placa)!=null){
				$_SESSION['tipoResult'] = false;
				$_SESSION['msjResult'] = "El elemento ya se encuentra registrado.";
		   		header("Location: ".URL_VISTA."menuAdmin.php");
			} else {
				if($eleDAO->ingresarElemento($placa,$estado,$categoria,$serial,$descripcion,$numeroAmbiente)){
					$_SESSION['tipoResult'] = true;
					$_SESSION['msjResult'] = "El elemento fue registrado correctamente.";
		   			header("Location: ".URL_VISTA."menuAdmin.php");
				} else {
					echo "<script>
               		alert('No se ha podido registrar el elemento.');
                	window.location= '../Vista/menuAdmin.php'
    				</script>";
				}
			}
			break;
		//actualizar
		case 2:
				$idElemento = $_POST['txtIdElemento'];
				$placa = $_POST['txtPlaca'];
				$estado= $_POST['cmbEstado'];
				$categoria = $_POST['txtCategoria'];
				$serial = $_POST['txtSerial'];
				$descripcion = $_POST['txtDescripcion'];
				$numeroAmbiente = $_POST['cmbNumeroAmbiente'];
				$eleDAO = new ElementoDAO();
				if($eleDAO->actualizarElemento($idElemento,$placa,$estado,$categoria,$serial,$descripcion,$numeroAmbiente)){
					echo "<script>
                	alert('El elemento fue actualizado correctamente');
                	window.location= '../Vista/menuAdmin.php'
    				</script>";
				} else {
					echo "<script>
                	alert('El elemento no fue actualizado correctamente');
                	window.location= '../Vista/menuAdmin.php'
    				</script>";
				}
			
			break;
		//eliminar
		case 3:
			    $placa = $_POST['txtPlaca'];
				$eleDAO = new ElementoDAO();
				if($eleDAO->eliminarElemento($placa)){
					echo "<script>
                	alert('El elemento fue eliminado correctamente');
                	window.location= '../Vista/menuAdmin.php'
    				</script>";
				} else {
					echo "<script>
                	alert('El elemento no fue eliminado correctamente');
                	window.location= '../Vista/menuAdmin.php'
    				</script>";
				}
			break;
			//Inicio casos para listar
		case 4:
			$numeroAmbiente = $_POST['cmbNumeroAmbiente'];
			$eleDAO = new ElementoDAO();
			$elemento=$eleDAO->listarElementoAmbiente($numeroAmbiente);
			include("../Vista/elementosListados.php");
			break;
		case 5:
			$estado = $_POST['cmbEstado'];
			$eleDAO = new ElementoDAO();
			$elemento=$eleDAO->listarElementoEstado($estado);
			include("../Vista/elementosListados.php");
			break;
		case 6:
			$numeroAmbiente = $_POST['cmbNumeroAmbiente'];
			$estado = $_POST['cmbEstado'];
			$eleDAO = new ElementoDAO();
			$elemento=$eleDAO->listarElementoAmbienteEstado($numeroAmbiente,$estado);
			include("../Vista/elementosListados.php");
			break;
		case 7:	
		//este no se usa
		//al irse a este caso, lista todos los elementos(tabla inicial)	
			$eleDAO = new ElementoDAO();
			$elemento=$eleDAO->listarElementos();
			include("../Vista/elementosListados.php");
			break;
		//Fin casos para listar
		//caso que rellena los campos del update
		case 8:
			$placa = $_POST['txtPlaca'];
			$eleDAO = new ElementoDAO();
			$elemento=$eleDAO->consultarElementoPlaca($placa);
			include "../Vista/actualizarElemento.php";
			break;

		case 9:
			require_once "SimpleXLSX.php";
			$fileTmpPath = $_FILES['subir']['tmp_name'];
			$fileName = $_FILES['subir']['name'];
			$fileSize = $_FILES['subir']['size'];
			$fileType = $_FILES['subir']['type'];
			$fileNameCmps = explode(".", $fileName);
			$fileExtension = strtolower(end($fileNameCmps));
			//limpiar nombre	

			move_uploaded_file($_FILES['subir']['tmp_name'],"./Controladorarchivo");

			//limpiar nombre


    		$xlsx = SimpleXLSX::parse('Controladorarchivo');
    		
    		$eleDAO = new ElementoDAO();
    		if($eleDAO->cargaMasiva($xlsx))
    		{
    			echo "<script>
                	alert('Elementos registrados correctamente');
                	window.location= '../vista/menuAdmin.php'
    				</script>";
			} 
    		
    		break;
		default:
			echo'<h1>¿Que haces aquí Fred?</h1>';
			break;


	}
 ?>