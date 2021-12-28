<?php

$no_ficha_ = $_GET['no_ficha_'];

require_once ('application/models/admin_sql/conn.php');
require ('application/views/admin/printpdf/fpdf/fpdf.php');

function zero_fill ($valor, $long = 0)
{
	return str_pad($valor, $long, '0', STR_PAD_LEFT);
}


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

$id = 0;
$code = 0;

$sql_sol = "SELECT MAX(id) id FROM solicitud";

$count = 0;


if ($conn->query($sql_sol)->num_rows > 0) {
	$id = $conn->query($sql_sol)->fetch_assoc()['id'] + 1;
	$code = $date_current.'-'.str_pad($id, 6, "0", STR_PAD_LEFT);
	$sql_soli_ = "INSERT INTO solicitud (id, fecha, code, no_ficha) values ('$id', '$date_current', '$code', '$no_ficha_')";
	$conn->query($sql_soli_);
}else{
	$id = 1;
	$code = $date_current.'-'.str_pad($id, 6, "0", STR_PAD_LEFT);
	$sql_soli_ = "INSERT INTO solicitud (id, fecha, code, no_ficha) values ('$id', '$date_current', '$code', '$no_ficha_')";
	$conn->query($sql_soli_);
}

if ($result = $conn->query("SELECT *FROM solicitud WHERE no_ficha = '$no_ficha_'")) {
	$count = $result->num_rows;
}


$sql_cs = "SELECT h.no_ficha, c.cse FROM hogar AS h INNER JOIN cse AS c ON h.cse = c.id_cse WHERE h.no_ficha = '$no_ficha_'";
$cse_cse = $conn->query($sql_cs)->fetch_assoc()['cse'];

$sql_cs = "SELECT h.no_ficha, c.ciudad FROM hogar AS h INNER JOIN ciudad AS c ON h.ciudad = c.id_ciudad WHERE h.no_ficha = '$no_ficha_'";
$ciudad = $conn->query($sql_cs)->fetch_assoc()['ciudad'];

$sql_cs = "SELECT h.no_ficha, b.barrio FROM hogar AS h INNER JOIN barrio AS b ON h.barrio = b.id_barrio WHERE h.no_ficha = '$no_ficha_'";
$barrio = $conn->query($sql_cs)->fetch_assoc()['barrio'];


$sql_c = "SELECT *FROM hogar";

$resulthogar = $conn->query($sql_c);
$hogar = $resulthogar->fetch_assoc();


$sql_direc = "SELECT d.id_direccion, d.direccion, b.barrio, c.ciudad, d.fecha_registro, d.no_ficha 
									FROM direccion AS d 
									INNER JOIN barrio AS b
										ON d.barrio = b.id_barrio 
									INNER JOIN ciudad AS c
										ON d.ciudad = c.id_ciudad
									WHERE d.no_ficha = '$no_ficha_'";

$resultdirec = $conn->query($sql_direc);


$sqlpersona = "SELECT p.dni, p.nombres, p.ape_pat, p.ape_mat, p.fech_naci, s.sexo, n.nucleo_fam, p.celular, p.observations  
                            FROM persona AS p 
                            INNER JOIN sexo AS s 
                            	ON p.sexo = s.id_sexo 
							INNER JOIN nucleo_fam AS n 
                            	ON p.nucleo_fam = n.id_nucleofam
							WHERE p.no_ficha = '$no_ficha_'";

$resultadoPersona = $conn->query($sqlpersona);

$sqlp = "SELECT *FROM persona WHERE no_ficha = '$no_ficha_'";
$resultp = $conn->query($sqlp);

$pdf = new PDF('P', 'mm', 'A4'); //'P','mm', array(210, 297)
$pdf->AddPage(); //'P', 'A4', 0
$pdf->AliasNbPages();
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(40,12, utf8_decode('    REGISTRO N° : '), 0,0,'L');
$pdf->SetFont('Arial', 'i', 12);
$pdf->Cell(55,12, utf8_decode($code), 0,0,'L');
$pdf->Cell(90,12, utf8_decode($count), 0,1,'R');

$pdf->SetFont('Arial', '', 16);
$pdf->Cell(2,12, '', 0,0,'C');
$pdf->Cell(100, 12, utf8_decode('N° FICHA: ').$no_ficha_, 0, 0, 'L');
$pdf->Cell(86, 12, 'CSE: '.$cse_cse, 0, 1, 'R');

$pdf->Cell(190,-12, '', 1,1,'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Ln(12);

$pdf->Cell(190, 8, '  DATOS DEL HOGAR', 1, 1, 'l');
$pdf->Cell(190,25, '', 1,1,'C');

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(20,0, '', 0,0,'C');
$pdf->Cell(35, -40, utf8_decode('Dirección'), 0, 0, 'l');
$pdf->Cell(10, -40, utf8_decode(':'), 0, 0, 'l');
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(50, -40, isset($hogar['direccion']) ? utf8_decode($hogar['direccion']) :
	utf8_decode("No registra dirección aún"), 0, 1, 'l');

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(20,0, '', 0,0,'C');
$pdf->Cell(35, 50, utf8_decode('Barrio'), 0, 0, 'l');
$pdf->Cell(10, 50, utf8_decode(':'), 0, 0, 'l');
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(50, 50, isset($barrio) ? utf8_decode($barrio) :
	utf8_decode("No registra barrio "), 0, 1, 'l');

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(20,0, '', 0,0,'C');
$pdf->Cell(35, -40, utf8_decode('Ciudad'), 0, 0, 'l');
$pdf->Cell(10, -40, utf8_decode(':'), 0, 0, 'l');
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(50, -40, isset($ciudad) ? utf8_decode($ciudad) :
	utf8_decode("No registra ciudad "), 0, 1, 'l');

$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(20,0, '', 0,0,'C');
$pdf->Cell(35, 50, utf8_decode('Fecha de registro'), 0, 0, 'l');
$pdf->Cell(10, 50, utf8_decode(':'), 0, 0, 'l');
$pdf->SetFont('Arial', '', 11);
$pdf->Cell(50, 50, empty($hogar['fecha_registro']) ?	utf8_decode("No registra fecha_registro ") : utf8_decode($hogar['fecha_registro']), 0, 1, 'l');


$pdf->Cell(190,-10, '', 0,1,'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(190, -10, '  MIEMBROS DE HOGAR', 1, 1, 'l');
$pdf->Ln(10);
$pdf->Cell(190,5, '', 1,1,'C');


$pdf->Cell(190,0, '', 0,1,'C');

$pdf->SetFillColor(28, 132, 198);
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFont('Arial', '', 7.5);
$pdf->Cell(20, 5, 'DNI', 1, 0, 'C', 1);
$pdf->Cell(40, 5, 'NOMBRES', 1, 0, 'C', 1);
$pdf->Cell(25, 5, 'APE PATERNO', 1, 0, 'C', 1);
$pdf->Cell(25, 5, 'APE MATERNO', 1, 0, 'C', 1);
$pdf->Cell(20, 5, 'FECHA NAC.', 1, 0, 'C', 1);
$pdf->Cell(20, 5, 'SEXO', 1, 0, 'C', 1);
$pdf->Cell(20, 5, 'NUCLEO', 1, 0, 'C', 1);
$pdf->Cell(20, 5, 'CELULAR', 1, 1, 'C', 1);
//$pdf->Cell(56, 5, 'OBSERVACIONES', 1, 1, 'C', 1);

$pdf->SetFont('Arial', '', 7.5);

$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);

if ($resultadoPersona->num_rows > 0) {

	while ($row = $resultadoPersona->fetch_assoc()) {
		$pdf->Cell(20, 5, utf8_decode($row['dni']), 1, 0, 'C', 1);
		$pdf->Cell(40, 5, utf8_decode($row['nombres']), 1, 0, 'L', 1);
		$pdf->Cell(25, 5, utf8_decode($row['ape_pat']), 1, 0, 'L', 1);
		$pdf->Cell(25, 5, utf8_decode($row['ape_mat']), 1, 0, 'L', 1);
		$pdf->Cell(20, 5, utf8_decode($row['fech_naci']), 1, 0, 'L', 1);
		$pdf->Cell(20, 5, utf8_decode($row['sexo']), 1, 0, 'L', 1);
		$pdf->Cell(20, 5, utf8_decode($row['nucleo_fam']), 1, 0, 'L', 1);
		$pdf->Cell(20, 5, utf8_decode($row['celular']), 1, 1, 'L', 1);
		//$pdf->Cell(56, 5, $row['observations'], 1, 1, 'L', 1);
	}
}
$pdf->Cell(190,5, '', 1,1,'C');

$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(190, 10, '  OBSERVACIONES', 1, 1, 'l');
//$pdf->Ln(10);

$pdf->Cell(190,4*($resultp->num_rows + 2), '', 1,1,'C');
$pdf->Cell(190,-4*($resultp->num_rows + 1), '', 0,1,'C');

if ($resultp->num_rows > 0) {
	while ($row = $resultp->fetch_assoc()) {
		$pdf->SetFont('Arial', 'B', 7.5);
		$pdf->Cell(5, 4, "", 0, 0, 'C', 1);
		$pdf->Cell(12, 4, $row['dni'], 0, 0, 'C', 1);
		$pdf->SetFont('Arial', '', 6);
		$pdf->Cell(5, 4, "", 0, 0, 'L', 1);
		$pdf->Cell(160, 4, empty($row['observations']) ? utf8_decode("No registra observaciones") : utf8_decode($row['observations']), 0, 1, 'L', 1);
	}
}


$pdf->Cell(190,4, '',0 ,1,'C');
$pdf->SetFont('Arial', 'B', 12);
$pdf->Cell(190, 10, '  MAS DATOS DE DOMICILIO', 1, 1, 'l');
$pdf->Ln(10);
$pdf->Cell(190,-10, '',0 ,1,'C');
$pdf->Cell(190,5, '', 1,1,'C');

$pdf->Cell(190,0, '', 0,1,'C');

$pdf->SetFillColor(28, 132, 198);
$pdf->SetTextColor(255, 255, 255);
$pdf->SetFont('Arial', '', 8);
$pdf->Cell(10, 5, 'NRO', 1, 0, 'C', 1);
$pdf->Cell(60, 5, utf8_decode('DIRECCIÓN'), 1, 0, 'C', 1);
$pdf->Cell(40, 5, 'BARRIO', 1, 0, 'C', 1);
$pdf->Cell(30, 5, 'CIUDAD', 1, 0, 'C', 1);
$pdf->Cell(30, 5, 'FECH REGIS', 1, 0, 'C', 1);
$pdf->Cell(20, 5, 'NRO FICHA', 1, 1, 'C', 1);

$pdf->SetFillColor(255, 255, 255);
$pdf->SetTextColor(0, 0, 0);

$i = 0;
if ($resultdirec->num_rows > 0){
		while ($row = $resultdirec->fetch_assoc()) {
			$i++;
			$pdf->Cell(10, 5, $i, 1, 0, 'C', 1);
			$pdf->Cell(60, 5, utf8_decode($row['direccion']), 1, 0, 'L', 1);
			$pdf->Cell(40, 5, utf8_decode($row['barrio']), 1, 0, 'L', 1);
			$pdf->Cell(30, 5, utf8_decode($row['ciudad']), 1, 0, 'L', 1);
			$pdf->Cell(30, 5, utf8_decode($row['fecha_registro']), 1, 0, 'L', 1);
			$pdf->Cell(20, 5, utf8_decode($row['no_ficha']), 1, 1, 'L', 1);
			//$pdf->Cell(56, 5, $row['observations'], 1, 1, 'L', 1);
		}

}else{
	$pdf->Cell(190, 5, utf8_decode("No hay más domicilios registrados"), 1, 1, 'C', 1);
}

$pdf->Cell(190,5, '', 1,1,'C');

$pdf->Output();
