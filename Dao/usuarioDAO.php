<?php 

class UsuarioDAO
{
	private $bd;
	private $consulta = array();

	public function UsuarioDAO()
	{
		try
		{

		}
		catch(Exception $e)
		{
			echo "Excepción capturada: ". $e->getMessage();
		}
	}

	public function iniciarSesion($nick,$clave)
	{
		require_once "../util/datosconexion.php";
		$bd = $this->bd=Conexiona::Conexion();

		try
		{
			$sql = "CALL paValidarAcceso('$nick','$clave')";
			$cns = $bd->query($sql);

			while($fila = $cns->fetch(PDO::FETCH_ASSOC))
			{
				$this->consulta[] = $fila;
			}

			foreach($this->consulta as $registro)
			{
				$_SESSION['idUsuario'] = $registro['idUsuario'];
				$_SESSION['nick'] = $registro['nick'];
				$_SESSION['rol'] = $registro['rol'];
				$_SESSION['tipoResult'] = null;
				$_SESSION['msjResult'] = null;
			}	
			
			$bd = null;
		}
		catch(Exception $e)
		{
			echo 'Excepción capturada: '. $e->getMessage();
		}
	}

	public function registrarUsuario($nick,$clave,$rol,$nombre,$correo)
	{
		require_once "../util/datosconexion.php";
		$bd = $this->bd=Conexiona::Conexion();

		try
		{
			$sql = "CALL paInsertarUsuario(?,?,?,?,?)";
			$cns = $bd->prepare($sql);
			$cns->execute([$nick, $clave, $rol, $nombre, $correo]);
			return true;
			$bd = null;
		}
		catch(Exeption $e)
		{
			echo 'Excepción capturada: '. $e->getMessage();
			return false;
		}
	}

	public function consultarPorNick($nick)
	{
		require_once "../util/datosconexion.php";
		try
		{
			$bd =$this->bd=Conexiona::Conexion();
			$sql = "CALL paConsultarPorNick('$nick')";
			$cns = $bd->query($sql);

			while($fila=$cns->fetch(PDO::FETCH_ASSOC))
			{
     			$this->consulta[]=$fila;
     		}
     		return $this->consulta;
     		$bd = null;
		}
		catch(Exception $e)
		{
			echo 'Excepción capturada: '. $e->getMessage();
			return null;
		}
	}

	public function actualizarUsuario($nick,$clave,$rol,$nombre,$correo)
	{
		require_once "../util/datosconexion.php";
		$bd = $this->bd=Conexiona::Conexion();

		try
		{
			$sql = "CALL paActualizarUsuario(?,?,?,?,?)";
			$cns = $bd->prepare($sql);
			$cns->execute([$nick, $clave, $rol, $nombre, $correo]);
			return true;
			$bd = null;
		}
		catch(Exeption $e)
		{
			echo 'Excepción capturada: '. $e->getMessage();
			return false;
		}
	}

	public function eliminarUsuario($nick)
	{
		require_once "../util/datosconexion.php";
		try
		{
			$bd =$this->bd=Conexiona::Conexion();
			$sql = "CALL paEliminarUsuario('$nick')";
			$bd->query($sql);

     		return true;
     		$bd = null;
		}
		catch(PDOException $e)
		{
			echo 'Excepción capturada: '. $e->getMessage();
			return null;
		}
	}

	public function listarUsuarios()
	{

		require_once "../../util/datosconexion.php";
		try
		{
			$bd = $this->bd = Conexiona::Conexion();
			$sql = "CALL paListarUsuarios()";
			$cns = $bd->query($sql);

			while($fila=$cns->fetch(PDO::FETCH_ASSOC))
			{
     			$this->consulta[]=$fila;
     		}
     		return $this->consulta;
     		$bd = null;
		}
		catch(Exception $e)
		{
			echo 'Excepción capturada: '. $e->getMessage();
			return null;
		}
	}

	public function contarListado()
	{
		require_once "../../util/datosconexion.php";
		try
		{
			$bd = $this->bd = Conexiona::Conexion();
			$sql = "CALL paListarUsuarios()";
			$cns = $bd->query($sql);

			while($fila=$cns->fetch(PDO::FETCH_ASSOC))
			{
     			$this->consulta[]=$fila;
     		}
     		return $this->consulta;
     		$bd = null;
		}
		catch(Exception $e)
		{
			echo 'Excepción capturada: '. $e->getMessage();
			return null;
		}
	}
}

 ?>