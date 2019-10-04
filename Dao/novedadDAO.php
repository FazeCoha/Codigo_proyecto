<?php 


class NovedadDAO
{
	/*
	private $idNovedad;
	private $descripcion;
	private $estado;
	private $fecha;
	private $usuario;
	private $placa;
	*/
	private $bd;
	private $consulta = array();

	public function NovedadDAO()
	{
		try {
			
		} catch (Exception $e) {
			echo "Error!: ".$e->getMessage();
		}
	}

	public function agregarNovedad($descripcion,$estado,$usuario,$placa){
		require_once "../util/datosconexion.php";
		$bd = $this->bd=Conexiona::Conexion();
		try {
			$sql="CALL paInsertarNovedad(?,?,?,?)";
			$cns =$bd->prepare($sql);
			$cns->execute([$descripcion,$estado,$usuario,$placa]);
			return true;
			$bd=null;
		} catch (Exception $e) {
			echo "Error!: ".$e->getMessage();
			return false;
		}
	}

	public function listarNovedades(){
		require_once "../../../util/datosconexion.php";
		$array=null;
		try {
			$bd=$this->bd=Conexiona::Conexion();
			$sql="CALL paListarNovedades()";
			$cns= $bd->query($sql);
			while ($fila=$cns->fetch(PDO::FETCH_ASSOC)) {
				$this->consulta[]=$fila;
			}
			return $this->consulta;
			$bd=null;
		} catch (Exception $e) {
			echo "Error!: ".$e->getMessage();
			return null;
		}
	}

	public function listarNovedadFecha($fecha){
		require_once "../util/datosconexion.php";
		try {
			$bd=$this->bd=Conexiona::Conexion();
			$sql="CALL paListarNovedadesFecha('$fecha')";
			$cns=$bd->query($sql);
			while ($fila=$cns->fetch(PDO::FETCH_ASSOC)) {
				$this->consulta[]=$fila;
			}
			return $this->consulta;
			$bd=null;
		} catch (Exception $e) {
			echo "Error!: ".$e->getMessage();
			return null;
		}
	}

	public function listarNovedadPlaca($placa){
		require_once "../util/datosconexion.php";
		try {
			$bd=$this->bd=Conexiona::Conexion();
			$sql="CALL paListarNovedadesFecha('$placa')";
			$cns=$bd->query($sql);
			while ($fila=$cns->fetch(PDO::FETCH_ASSOC)) {
				$this->consulta[]=$fila;
			}
			return $this->consulta;
			$bd=null;
		} catch (Exception $e) {
			echo "Error!: ".$e->getMessage();
			return null;
		}
	}
	
	public function listarNovedadLeida()
	{

		require_once "../../util/datosconexion.php";
		try
		{
			$bd = $this->bd = Conexiona::Conexion();
			$sql = "CALL paConsultarNovedadLeida()";
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

	public function actualizarNovedadLeida()
	{
		require_once "../../../util/datosconexion.php";
		$bd = $this->bd=Conexiona::Conexion();

		try
		{
			$sql = "CALL paActualizarNovedadLeida()";
			$bd->query($sql);
			
			return true;
			$bd = null;
		}
		catch(Exeption $e)
		{
			echo 'Excepción capturada: '. $e->getMessage();
			return false;
		}
	}

}

?>