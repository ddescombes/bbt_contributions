<?php
//require(APPPATH.'libraries/fpdf/fpdf.php');

class PDF extends FPDF
{
// Page header
function Header()
{
    // Logo
    //$this->Image('logo.png',10,6,30);
    // Arial bold 15
    $this->SetFont('Arial','I',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'Bible Baptist Temple',0,0,'C');
    $this->Ln(7);
    $this->Cell(80);
    $this->Cell(30,10,'2601 Watson Blvd',0,0,'C');
    $this->Ln(7);
    $this->Cell(80);
    $this->Cell(30,10,'Warner Robins, GA 31093',0,0,'C');
    // Line break
    $this->Ln(5);
}

// Page footer
function Footer()
{
    // Position at 1.5 cm from bottom
    $this->SetY(-30);
    // Arial italic 8
    $this->SetFont('Arial','I',10);
    $this->Cell(0,10,'None of your giving was done to receive anything in return except what the government considers an',0,1);
    $this->Cell(0,0,'"intangible religious benefit.',0,1);
    $this->Cell(0,10,'Please retain this letter for your records if you intend to claim this contribution as a deduction on',0,1);
    $this->Cell(0,0,'Schedule A of your Federal Income Tax return. Thank you for your offerings to Bible Baptist Temple',0,1);
    
    // Page number
    $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'R');
}
}

// Instanciation of inherited class
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','I',10);
$pdf->Cell(0,10,date("m/d/y"),0,1);
$pdf->Cell(0,5,'Subject: '.date("Y").' Annual Contribution Record',0,1);
$pdf->Cell(0,15,'Dear Mr. DesCombes',0,1);
$pdf->Cell(0,5,'Our records indicate that you gave offerings totaling $1,000,000 to Bible Baptist Temple in 2017. Your',0,1);
$pdf->Cell(0,5,'contributions were recorded as follows (40 detail records):',0,1);
$pdf->Cell(0,20,'Envelope Number 4',0,1);

$pdf->SetFont('Times','',12);
for($i=1;$i<=40;$i++)
    $pdf->Cell(0,10,'Printing line number '.$i,0,1);
$pdf->Output();
?>