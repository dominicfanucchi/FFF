<?php
  
require('fpdf.php');
include_once('config.php');
  
class PDF extends FPDF {
  
    // Page header
    function Header() {
        $this->Image('images/fourth_logo_round.png',10,8,33); 
        $this->SetFont('Arial','B',20);
        $this->Cell(80);
        $this->Cell(75,10,'Previous Adoptions',1,0,'C');
        $this->Ln(30);
    }
  
    // Page footer
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial','I', 8);
        $this->Cell(0,10,'Page ' . 
            $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}
  
$pdf = new PDF();
  
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
  
$db = get_connection();
$tableQuery = "SELECT * FROM user_adoptions";
$result = mysqli_query($db, $tableQuery);

$rows = mysqli_fetch_assoc($result);
$pdf->Cell(30,10, "UserID");
$pdf->Cell(30,10, "First Name");
$pdf->Cell(30,10, "Last Name");
$pdf->Cell(30,10, "AnimalID");
$pdf->Cell(40,10, "Animal Name");
$pdf->Cell(30,10, "Adoption Date" );
$pdf->Ln();
$pdf->Cell(30,10, "35719524");
$pdf->Cell(30,10, "Cameron");
$pdf->Cell(30,10, "Ward");
$pdf->Cell(30,10, "19896914");
$pdf->Cell(40,10, "Cain");
$pdf->Cell(30,10, "04-30-22");
$pdf->Ln();
$pdf->Cell(30,10, "82397200");
$pdf->Cell(30,10, "Illiana");
$pdf->Cell(30,10, "Hoffman");
$pdf->Cell(30,10, "37638527");
$pdf->Cell(40,10, "Herrod");
$pdf->Cell(30,10, "10-04-22");
$pdf->Ln();
$pdf->Cell(30,10, "52189142");
$pdf->Cell(30,10, "Victor");
$pdf->Cell(30,10, "Berry");
$pdf->Cell(30,10, "39893820");
$pdf->Cell(40,10, "Kameko");
$pdf->Cell(30,10, "06-01-22");
$pdf->Ln();
$pdf->Cell(30,10, "66738670");
$pdf->Cell(30,10, "Angelica");
$pdf->Cell(30,10, "Martin");
$pdf->Cell(30,10, "54466414");
$pdf->Cell(40,10, "Uriah");
$pdf->Cell(30,10, "12-30-20");
$pdf->Ln();
$pdf->Cell(30,10, "39833215");
$pdf->Cell(30,10, "Brock");
$pdf->Cell(30,10, "Guthrie");
$pdf->Cell(30,10, "55406676");
$pdf->Cell(40,10, "Herman");
$pdf->Cell(30,10, "13-20-21");
$pdf->Ln();
$pdf->Cell(30,10, "26295320");
$pdf->Cell(30,10, "Aidan");
$pdf->Cell(30,10, "Vang");
$pdf->Cell(30,10, "58718146");
$pdf->Cell(40,10, "MacKenzie");
$pdf->Cell(30,10, "12-30-21");
$pdf->Ln();
$pdf->Cell(30,10, "81055912");
$pdf->Cell(30,10, "Kyla");
$pdf->Cell(30,10, "Woodard");
$pdf->Cell(30,10, "63766495");
$pdf->Cell(40,10, "Sheila");
$pdf->Cell(30,10, "02-04-22");
$pdf->Ln();
$pdf->Cell(30,10, "65464795");
$pdf->Cell(30,10, "Clayton");
$pdf->Cell(30,10, "Hicks");
$pdf->Cell(30,10, "71478450");
$pdf->Cell(40,10, "Keane");
$pdf->Cell(30,10, "11-11-20");
$pdf->Ln();
$pdf->Cell(30,10, "41043706");
$pdf->Cell(30,10, "Gabriel");
$pdf->Cell(30,10, "Galloway");
$pdf->Cell(30,10, "92267692");
$pdf->Cell(40,10, "Vladimir");
$pdf->Cell(30,10, "08-25-21");
$pdf->Ln();
$pdf->Cell(30,10, "86201347");
$pdf->Cell(30,10, "Ella");
$pdf->Cell(30,10, "Henry");
$pdf->Cell(30,10, "95052478");
$pdf->Cell(40,10, "Ruby");
$pdf->Cell(30,10, "09-04-21");

$pdf->Output();
  
?>