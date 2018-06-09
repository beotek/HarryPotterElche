<?php
require('./pdf/fpdf.php');
require('./clases/acceso.php');
require('./clases/usuarios.php');

class PDF extends FPDF
{
// Cabecera de p�gina
function Header()
{
	// Logo
	$this->SetDrawColor(0,0,0);
	$this->SetFillColor(0,0,0);
	$this->Cell(0,20,'',0,0,'',true);
	$this->Image('./img/logo.png',80,15,40);
	$this->Ln(10);
	$this->SetFont('Arial','',12);
	$this->Ln(4);

}

// Pie de p�gina
function Footer()
{
	// Posici�n: a 1,5 cm del final
	$this->SetY(-15);
	// Arial italic 8
	$this->SetFont('Arial','I',8);
	// N�mero de p�gina
	$this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
}
}

$alumnos=new Usuarios();
$alus=$alumnos->getBD_usuarioss();

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->SetFont('Times','',12);
$pdf->AddPage();
$pdf->SetDrawColor(10,10,10);
$pdf->SetFillColor(10,90,10);
$pdf->ln(10);
$pdf->cell(0,1,"LISTA DE USUARIOS HARRY POTTER ELCHE",0,0,"C");
$pdf->setX(30);
$pdf->Image("./img/slyroom.jpg",10,40,189);

if (sizeof($alus)>0){
	for ($i=0;$i<sizeof($alus);$i++){
		$pdf->AddPage();
		$pdf->ln(10);
		$pdf->SetFont('times','',16);
		$pdf->SetDrawColor(120,120,120);
    $pdf->SetFillColor(0,120,110);;
		$pdf->Cell(0,100,'',0,0,'C',true);
		$pdf->SetFillColor(120,120,120);
		$pdf->setTextColor(0,0,0);
		$aux = $alus[$i]['avatar'];
		$nomAlu=$alus[$i]['nombre']." ".$alus[$i]['puntos'];
		$pdf->setX(30);
		$pdf->Image("".$aux."",140,50,40);
		$pdf->Cell(40,20,"Email : ",0,0,"L");
		$pdf->Cell(20,20,$alus[$i]['email'],0,1,"L");
		$pdf->setX(30);
		$pdf->Cell(45,20,"Nombre: ",0,0,"L");
		$pdf->Cell(45,20,$nomAlu,0,1,"L");
		$pdf->setX(30);
		$pdf->Cell(45,20,"Casa: ",0,0,"L");
		$pdf->Cell(45,20,$alus[$i]['tipoUsr'],0,1,"L");
		$pdf->setX(30);
		$pdf->Cell(45,20,"Puntos: ",0,0,"L");
		$pdf->Cell(45,20,$alus[$i]['puntos'],0,1,"L");
		$pdf->ln(10);
		$pdf->cell(0,1,"hpotterelche.hol.es",0,0,"C");
		$pdf->setX(30);



	}
}
else{ //No hay usuarios
	$pdf->AddPage();
	$pdf->ln(20);
	$pdf->cell(0,1,"NO HAY USUARIOS",0,0,"C");
	$pdf->ln(10);
	$pdf->SetFillColor(180,180,180);
	$pdf->cell(0,1,"",0,0,"",true);
}
$pdf->Output();


?>
