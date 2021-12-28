<?php
require_once ('application/models/admin_sql/conn.php');
require ('application/views/admin/printpdf/fpdf/fpdf.php');


date_default_timezone_set('America/Lima');

$date_current = date("Y-m-d");

class PDF extends FPDF
{
	function Header()
	{
		$this->AddLink();
		$this->Cell(190,0, '', 1,1,'C');
		$this->Image( 'accets/img/Escudo_de_Macusani.png', 10, 12, 15, 0, '' );
		$this->Image( 'accets/img/Escudo_de_Macusani.png', 185, 12, 15, 0, '' );
		$this->SetFont('Arial', '', 18);
		$this->Cell(80);
		$this->Cell(30, 12, 'MUNICIPALIDAD PROVINCIAL DE CARABAYA', 0, 1, 'C');
		$this->SetFont('Arial', '', 14);
		$this->Cell(80);
		$this->Cell(30, 10, 'OFICINA ULE-SISFOH-MACUSANI', 0, 1, 'C');
		$this->SetY(32);
		$this->Cell(190,0, '', 1,1,'C');
		$this->Ln(1);
	}

	function Footer()
	{
		$this->SetY(-18);
		$this->SetFont('Arial', 'I', 12);
		$this->AddLink();
		//$this->Cell(5, 10, 'www.onelcn.com', 0, 0, 'L');
		$this->SetFont('Arial', 'I', 10);
		$this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . ' de {nb}', 0, 0, 'C');
		//$this->Cell(0, 10, utf8_decode($date_current), 0, 0, 'L');
	}
}

$sql_hogar = "SELECT h.no_ficha, h.direccion, b.barrio, c.ciudad, h.fecha_registro, s.cse 
									FROM hogar AS h 
									INNER JOIN barrio AS b
										ON h.barrio = b.id_barrio 
									INNER JOIN ciudad AS c
										ON h.ciudad = c.id_ciudad
									INNER JOIN cse AS s
										ON h.cse = s.id_cse
									";

$resulthogar = $conn->query($sql_hogar);

//$sql_hogar = "SELECT *FROM hogar";
//$resulthogar = $conn->query($sql_hogar);



$pdf = new PDF('P', 'mm', 'A4'); //'P','mm', array(210, 297)

$pdf->AddPage(); //'P', 'A4', 0
$pdf->AliasNbPages();
$pdf->SetFont('Arial', 'B', 12);

//$pdf->SetFillColor(28, 132, 198);
$pdf->Cell(190, 5, '', 0, 1, 'C');
$pdf->SetTextColor(0, 0, 0);
$pdf->SetFont('Arial', '', 16);
$pdf->Cell(190, 5, 'HOGAR', 0, 1, 'C');
$pdf->Cell(190, 5, '', 0, 1, 'C');

$pdf->SetFillColor(28, 132, 198);
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(20, 5, 'NRO FICHA', 1, 0, 'C', 1);
$pdf->Cell(55, 5, utf8_decode('DIRECCIÓN'), 1, 0, 'C', 1);
$pdf->Cell(40, 5, 'BARRIO', 1, 0, 'C', 1);
$pdf->Cell(30, 5, 'CIUDAD', 1, 0, 'C', 1);
$pdf->Cell(25, 5, 'FECH REGIS', 1, 0, 'C', 1);
$pdf->Cell(20, 5, 'CSE', 1, 1, 'C', 1);

$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);

if ($resulthogar->num_rows > 0) {
	while ($row = $resulthogar->fetch_assoc()) {
		$pdf->Cell(20, 5, utf8_decode($row['no_ficha']), 1, 0, 'C', 1);
		$pdf->Cell(55, 5, utf8_decode($row['direccion']), 1, 0, 'L', 1);
		$pdf->Cell(40, 5, utf8_decode($row['barrio']), 1, 0, 'L', 1);
		$pdf->Cell(30, 5, utf8_decode($row['ciudad']), 1, 0, 'L', 1);
		$pdf->Cell(25, 5, utf8_decode($row['fecha_registro']), 1, 0, 'R', 1);
		$pdf->Cell(20, 5, utf8_decode($row['cse']), 1, 1, 'C', 1);
	}
}

$pdf->Output();

