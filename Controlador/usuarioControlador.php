 <?php 

require "../config.php";
require "../Dao/usuarioDAO.php";


$usuDAO = new UsuarioDAO();
$opcion = $_POST["hdOpcion"];

$nick = $_POST["txtNick"];
$clave = $_POST["txtClave"];
$confClave = $_POST["txtConfirmarClave"];
$rol = $_POST["cmbRol"];
$nombre = $_POST["txtNombre"];
$correo = $_POST["txtCorreo"];


switch($opcion)
{
	case 1:
		$usuDAO->iniciarSesion($nick,$clave);
		$rol = $_SESSION['rol'];

		if($rol != null)
		{
			switch($rol)
			{
				case "admin":
					header ("Location: ".URL_VISTA."usuario/menuAdmin.php");
					break;
				case "cuentadante":
					header ("Location: ".URL_VISTA."usuario/menuGeneral.php");
					break;
				case "colaborador":
					header ("Location: ".URL_VISTA."usuario/menuGeneral.php");
					break;
			}
		}
		else
		{
			$_SESSION['tipoResult'] = false;
			$_SESSION['msjResult'] = "Usuario y/ contraseña incorrectos.";
		   	header("Location: ".URL_VISTA."usuario/login.php");
		}
		break;

	//registrar usuario
	case 2:
		if($nick == "" || $clave == "" ||$confClave == "" ||$rol == "" ||$nombre == "" ||$correo == "")
		{
			$_SESSION['tipoResult'] = false;
		   	$_SESSION['msjResult'] = "No puedes dejar campos vacios.";
		   	header("Location: ".URL_VISTA."usuario/registrarUsuario.php");
		}
		else
		{
			if($clave == $confClave)
			{
				if($usuDAO->consultarPorNick($nick)!=null)
				{
					$_SESSION['tipoResult'] = false;
					$_SESSION['msjResult'] = "El nick ya se encuentra registrado.";
					header("Location: ".URL_VISTA."usuario/registrarUsuario.php");
				}
				else
				{
					if($usuDAO->registrarUsuario($nick,$clave,$rol,$nombre,$correo))
					{
						$_SESSION['tipoResult'] = true;
						$_SESSION['msjResult'] = "El usuario fue registrado exitosamente.";
						header("Location: ".URL_VISTA."usuario/registrarUsuario.php");
					}
					else
					{
						$_SESSION['tipoResult'] = false;
						$_SESSION['msjResult'] = "No se ha podido realizar el registro.";
						header("Location: ".URL_VISTA."usuario/registrarUsuario.php");
					}
				}
			}
			else
			{
				$_SESSION['tipoResult'] = false;
				$_SESSION['msjResult'] = "Las claves no coinciden.";
				header("Location: ".URL_VISTA."usuario/registrarUsuario.php");
			}
		}
		break;

	case 3:
		if($nick == "")
		{
			$_SESSION['tipoResult'] = false;
			$_SESSION['msjResult'] = "Tienes que ingresar un nick.";
			header("Location: ".URL_VISTA."usuario/consultarUsuario.php");
		}
		else
		{
			$datosUsuario = $usuDAO->consultarPorNick($nick);

			if($datosUsuario != null)
			{
				$_SESSION['datosUsuario'] = $datosUsuario;
				header("Location: ". URL_VISTA. "usuario/actualizarUsuario.php");
			}
			else
			{
				$_SESSION['tipoResult'] = false;
				$_SESSION['msjResult'] = "No se ha podido realizar la consulta.";
				header("Location: ".URL_VISTA."usuario/consultarUsuario.php");
			}
		}
		break;

	case 4:
		if($nick == "" || $clave == "" ||$confClave == "" ||$rol == "" ||$nombre == "" ||$correo == "")
		{
			$_SESSION['tipoResult'] = false;
			$_SESSION['msjResult'] = "No pueden haber campos vacios.";
			header("Location: ".URL_VISTA."usuario/actualizarUsuario.php");
		}
		else
		{
			if($clave == $confClave)
			{
				if($usuDAO->actualizarUsuario($nick,$clave,$rol,$nombre,$correo))
				{
					$_SESSION['tipoResult'] = true;
					$_SESSION['msjResult'] = "El usuario fue actualizado exitosamente.";
					header("Location: ".URL_VISTA."usuario/consultarUsuario.php");
				}
				else
				{
					$_SESSION['tipoResult'] = false;
					$_SESSION['msjResult'] = "No se ha podido actualizar el usuario";
					header("Location: ".URL_VISTA."usuario/actualizarUsuario.php");
				}
			}
			else
			{
				$_SESSION['tipoResult'] = false;
				$_SESSION['msjResult'] = "Las contraseñas no coinciden.";
				header("Location: ".URL_VISTA."usuario/actualizarUsuario.php");
			}
		}
		break;

	case 5:
		if($nick == "")
		{
			$_SESSION['tipoResult'] = false;
			$_SESSION['msjResult'] = "Tienes que ingresar un  nick.";
			header("Location: ".URL_VISTA."usuario/eliminarUsuario.php");
		}
		else
		{
			if($usuDAO->eliminarUsuario($nick))
			{
				$_SESSION['tipoResult'] = true;
				$_SESSION['msjResult'] = "Se ha eliminado el usuario correctamente.";
				header("Location: ".URL_VISTA."usuario/eliminarUsuario.php");
			}
			else
			{
			 	$_SESSION['tipoResult'] = false;
				$_SESSION['msjResult'] = "No se ha podido eliminar el usuario.";
				header("Location: ".URL_VISTA."usuario/eliminarUsuario.php");
			}
		}
		break;
}

 ?>