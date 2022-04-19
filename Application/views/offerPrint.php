<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "fpdf.php";

class letterHead extends fpdf {
  const DPI = 96;
  const MM_IN_INCH = 25.4;
  const A4_HEIGHT = 297;
  const A4_WIDTH = 210;
  // tweak these values (in pixels)
  const MAX_WIDTH = 800;
  const MAX_HEIGHT = 500;

  function pixelsToMM($val) {
      return $val * self::MM_IN_INCH / self::DPI;
  }

  function resizeToFit($imgFilename) {
      list($width, $height) = getimagesize($imgFilename);

      $widthScale = self::MAX_WIDTH / $width;
      $heightScale = self::MAX_HEIGHT / $height;

      $scale = min($widthScale, $heightScale);

      return array(
          round($this->pixelsToMM($scale * $width)),
          round($this->pixelsToMM($scale * $height))
      );
  }

  function topImg($img) {
    list($width, $height) = $this->resizeToFit($img);

    // you will probably want to swap the width/height
    // around depending on the page's orientation
    $this->Image(
        $img, 0,0,
        $width,
        $height
    );
}
function bottomImg($img) {
  list($width, $height) = $this->resizeToFit($img);

  // you will probably want to swap the width/height
  // around depending on the page's orientation
  $this->Image(
      $img, 0, 274,
      $width,
      $height
  );
}
function Header()
  {
    // Logo
    $this->topImg(IMG_PATH."/antedli_ust.jpg",0,0,0);
    $this->SetY(50);
    // Arial bold 15
/*     $this->SetFont('Arial','B',15);
    // Move to the right
    $this->Cell(80);
    // Title
    $this->Cell(30,10,'Title',1,0,'C');
    // Line break
    $this->Ln(20);
 */  }
  
  // Page footer
  function Footer()
  {
      // Position at 2.37 cm from bottom
      $this->SetY(-23.7);
      $this->bottomImg(IMG_PATH."/antedli_alt.jpg");
      // Arial italic 8
      $this->SetFont('Arial','I',8);
      // Page number
      $this->Cell(0,40,'Page '.$this->PageNo().'/{nb}',0,0,'C');
  }
}

$pdf = new letterHead();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','',12);
for($i=1;$i<=40;$i++)
    $pdf->Cell(0,10,'Printing line number '.$i,0,1);
$pdf->Output();