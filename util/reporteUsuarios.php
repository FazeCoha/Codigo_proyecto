<?php 
include "../config.php";
require "../src/fpdf.php";

class PDF extends FPDF
{
	// Cabecera de página
	function Header()
	{
	    // Logo
	    $this->Image('../src/logoProyecto.png',10,8,33);
	    $this->Ln(10);
	    // Arial bold 15
	    $this->SetFont('Arial','B',15);
	    // Movernos a la derecha
	    $this->Cell(50);
	    // Título
	    $this->Cell(100,10,'Usuarios del sistema',1,0,'C');
	    // Salto de línea
	    $this->Ln(20);

	    $this->Cell(40,10,'Nombre',1,0,'C',0);
		$this->Cell(40,10,'Nick',1,0,'C',0);
		$this->Cell(40,10,'Rol',1,0,'C',0);
		$this->Cell(70,10,'Correo',1,1,'C',0);
	}

	// Pie de página
	function Footer()
	{
	    // Posición: a 1,5 cm del final
	    $this->SetY(-15);
	    // Arial italic 8
	    $this->SetFont('Arial','I',8);
	    // Número de página
	    $this->Cell(0,10, utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
	}
}

require "datosconexion.php";

$bd = Conexiona::Conexion();
$sql = "Call paListarUsuarios()";
$cns = $bd->query($sql);
$consulta = array();
while($fila=$cns->fetch(PDO::FETCH_ASSOC))
{
    $consulta[]=$fila;
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);

foreach($consulta as $fila)
{
	$pdf->Cell(40,10,$fila['nombre'],1,0,'C',0);
	$pdf->Cell(40,10,$fila['nick'],1,0,'C',0);
	$pdf->Cell(40,10,$fila['rol'],1,0,'C',0);
	$pdf->Cell(70,10,$fila['correo'],1,1,'C',0);

}


$pdf->Output();
?>
 ?>