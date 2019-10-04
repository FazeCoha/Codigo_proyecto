<?php 


class NovedadSPDAO
{
	/*
	private $idNovedadSP;
	private $descripcion;
	private $fecha;
	private $usuario;
	*/
	private $bd;
	private $consulta = array();

	public function NovedadSPDAO()
	{
		try {
			
		} catch (Exception $e) {
			echo "Error!: ".$e->getMessage();
		}
	}

    public function agregarNovedadSP($descripcion,$usuario,$ambiente)
	{	require_once "../util/datosconexion.php";
		$bd = $this->bd=Conexiona::Conexion();
		try {
			$sql="CALL paInsertarNovedadSP(?,?,?)";
			$cns=$bd->prepare($sql);
			$cns->execute([$descripcion,$usuario,$ambiente]);
			return true;
			$bd=null;
		} catch (Exception $e) {
			echo "Error!: ".$e->getMessage();
			return false;		
		}
	}

	public function listarNovedadesSP(){
		require_once "../../../util/datosconexion.php";
		$array=null;
		try {
			$bd=$this->bd=Conexiona::Conexion();
			$sql="CALL paListarNovedadesSP()";
			$cns=$bd->query($sql);
			while ($fila=$cns->fetch(PDO::FETCH_ASSOC)){
				$this->consulta[]=$fila;
			}
			return $this->consulta;
			$bd=null;
		} catch (Exception $e) {
			echo "Error!: ".$e->getMessage();
			return null;
		}
	}

	public function listarNovedadesSPFecha($fecha){
		require_once "../util/datosconexion.php";
		try {
			$bd=$this->bd=Conexiona::Conexion();
			$sql="CALL paListarNovedadesSPFecha('$fecha')";
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

	public function consultarNovedadSPAmbiente($ambiente){
		require_once "../util/datosconexion.php";
		try {
			$bd=$this->bd=Conexiona::Conexion();
			$sql="CALL paConsultarNovedadSPAmbiente('$ambiente')";
			$cns=$bd->query($sql);
			while ($fila=$cns->fetch(PDO::FETCH_ASSOC)) 
			{
				$this->consulta[]=$fila;
			}
			return $this->consulta;
			$bd=null;
		} catch (Exception $e) {
			echo "Error!: ".$e->getMessage();
			return null;
		}
	}
	
	public function listarNovedadLeidaSP()
	{

		require_once "../../util/datosconexion.php";
		try
		{
			$bd = $this->bd = Conexiona::Conexion();
			$sql = "CALL paConsultarNovedadLeidaSP()";
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

	public function actualizarNovedadLeidaSP()
	{
		require_once "../../../util/datosconexion.php";
		$bd = $this->bd=Conexiona::Conexion();

		try
		{
			$sql = "CALL paActualizarNovedadLeidaSP()";
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