<?php 
require_once "../config.php";

class ElementoDAO
{
//atributos
	/*
	private $idElemento;
	private $placa;
	private $estado;
	private $categoria;
	private $serial;
	private $descripcion;
	private $numeroAmbiente;
	*/
	private $bd;
	private $consulta=array();
	
	//carga del constructor
	public function ElementoDAO(){
		try{
		}catch(Exception $e)
		{
			echo 'Excepción capturada: ',  $e->getMessage(); 
		}

	}

	//método ingresar elemento
	public function ingresarElemento($placa, $estado, $categoria, $serial, $descripcion, $numeroAmbiente){
		require_once "../util/datosconexion.php";
		$bd = $this->bd=Conexiona::Conexion();
		try {
			
			$sql="CALL paInsertarElemento(?,?,?,?,?,?)";
			$cns = $bd->prepare($sql);
			$cns->execute([$placa, $estado, $categoria, $serial, $descripcion, $numeroAmbiente]);
			return true;
		 $bd=null;	
		} catch (Exception $e) {
			echo 'Excepción capturada: ',$e->getMessage();
			return false;
		}
	}

	//metodo actualizar elemento
	public function actualizarElemento($idElemento,$placa, $estado, $categoria, $serial, $descripcion, $numeroAmbiente){
		require_once "../util/datosconexion.php";
		try {
			$bd =$this->bd=Conexiona::Conexion();
			$sql="CALL paActualizarElemento(?,?,?,?,?,?,?)";
			$cns= $bd->prepare($sql);
			$cns->execute([$placa,$estado,$categoria,$serial,$descripcion,$numeroAmbiente,$idElemento]);
			return true;
			$bd=null;
		} catch (Exception $e) {
			return false;
			echo 'Excepción capturada: ',$e->getMessage();
		}
	}

	//metodo consultar elemento 
	//NO ES USADA, NO LA TOMEN DE EJEMPLO USEN EL DE PLACA
	public function consultarElemento($idElemento){
		require_once "../util/datosconexion.php";
		try {
			$bd =$this->bd=Conexiona::Conexion();
			$sql="CALL paConsultarElementoId(?)";
			$cns = $bd->prepare($sql);
			$cns->execute([$idElemento]);
			return true;
			$bd=null;
		} catch (Exception $e) {
			echo 'Excepción capturada: ',$e->getMessage();
			return false;
		}
	}

    //metodo consultar elemento por placa
	public function consultarElementoPlaca($placa){
		require_once "../util/datosconexion.php";
		try {
			$bd =$this->bd=Conexiona::Conexion();
     		$sql="CALL paConsultarElementoPlaca('$placa')";
     		$cns= $bd->query($sql);
     		while($fila=$cns->fetch(PDO::FETCH_ASSOC)){
     			$this->consulta[]=$fila;
     		}
     		return $this->consulta;	
     		$bd=null;	
		} catch (Exception $e) {
			echo 'Excepción capturada: ',$e->getMessage();
			return null;
		}
		
	}

	//metodo eliminar elemento
	public function eliminarElemento($placa){
		require_once "../util/datosconexion.php";
		try {
			$bd =$this->bd=Conexiona::Conexion();
     		$sql="CALL paEliminarElemento(?)";
     		$cns= $bd->prepare($sql);
     		$cns->execute([$placa]);
     		$bd=null;
    		return true;
     		
		} catch (Exception $e) {
			echo 'Excepción capturada: ',$e->getMessage();
			return false;
		}
	}

	//metodo que lista los elementos por el numero del ambiente
	public function listarElementoAmbiente($numeroAmbiente){
		try {
			require_once "../util/datosconexion.php";
			$bd =$this->bd=Conexiona::Conexion();
     		$sql="CALL paListarElementoAmbiente('$numeroAmbiente')";
     		$cns= $bd->query($sql);
     		while($fila=$cns->fetch(PDO::FETCH_ASSOC)){
     			$this->consulta[]=$fila;
     		}
     		return $this->consulta;	
     		$bd=null;
		} catch (Exception $e) {
			echo 'Excepción capturada: ',$e->getMessage();
			return null;
		}
	}

	//metodo que lista los elementos por el estado
	public function listarElementoEstado($estado){
		require_once "../util/datosconexion.php";
		try {
			$bd =$this->bd=Conexiona::Conexion();
     		$sql="CALL paListarElementoEstado('$estado')";
     		$cns= $bd->query($sql);
     		while($fila=$cns->fetch(PDO::FETCH_ASSOC)){
     			$this->consulta[]=$fila;
     		}
     		return $this->consulta;	
     		$bd=null;
		} catch (Exception $e) {
			echo 'Excepción capturada: ',$e->getMessage();
			return null;
		}
	}

	//metodo que lista los elementos por el ambiente y el estado
	public function listarElementoAmbienteEstado($numeroAmbiente, $estado){
		$array=null;
		require_once "../util/datosconexion.php";
		try {
			$bd =$this->bd=Conexiona::Conexion();
     		$sql="CALL paListarElementoAmbienteEstado('$estado', $numeroAmbiente)";
     		$cns= $bd->query($sql);
     		while($fila=$cns->fetch(PDO::FETCH_ASSOC)){
     			$this->consulta[]=$fila;
     		}
     		return $this->consulta;	
     		$bd=null;
		} catch (Exception $e) {
			echo 'Excepción capturada: ',$e->getMessage();
			return null;
		}
	}

	//metodo que lista todos los elementos del ambiente
	public function listarElementos(){
		$array=null;
		require_once "../util/datosconexion.php";
		try {
			$bd =$this->bd=Conexiona::Conexion();
     		$sql="CALL paListarElementos()";
     		$cns= $bd->query($sql);
     		while($fila=$cns->fetch(PDO::FETCH_ASSOC)){
     			$this->consulta[]=$fila;
     		}
     		return $this->consulta;	
     		$bd=null;
		} catch (Exception $e) {
			echo 'Excepción capturada: ',$e->getMessage();
			return null;
		}
	}

	public function cargaMasiva($xlsx){
		require_once "../util/datosconexion.php";
		require_once("../Controlador/SimpleXLSX.php");
		try 
		{
			$bd =$this->bd=Conexiona::Conexion();
     		$sql="CALL paInsertarElemento(?,?,?,?,?,?)";	
			$bd->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $bd->prepare($sql);
   			$stmt->bindParam( 1, $placa);
    		$stmt->bindParam( 2, $estado);
    		$stmt->bindParam( 3, $categoria);
    		$stmt->bindParam( 4, $serial);
    		$stmt->bindParam( 5, $descripcion);
    		$stmt->bindParam( 6, $numeroAmbiente);

		    foreach ($xlsx->rows() as $fields)
		    {
		        $placa = $fields[0];
		        $eleDAO = new elementoDAO();
		        if($eleDAO->consultarElementoPlaca($placa)!=null){

		        } else {
		        $estado = $fields[1];
		        $categoria = $fields[2];
		        $serial = $fields[3];
		        $descripcion = $fields[4];
		        $numeroAmbiente = $fields[5];
		        $stmt->execute();
		        }
		    }
			return true;
			$bd=null;	
		} 
		catch (Exception $e) 
		{
			echo 'Excepción capturada: ',$e->getMessage();
			return false;
		}	
     		
	}
}
?>
 