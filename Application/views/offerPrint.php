<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require "Classess/tcpdf.php";

class MYPDF extends TCPDF {

    //Page header
    public function Header() {
        // Logo
        $image_file = IMG_PATH.'/antetli_ust.jpg';
        $this->Image($image_file, 0, 0, 210, 0, 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
    }

    // Page footer
    public function Footer() {
        $image_file = IMG_PATH.'/antetli_alt.jpg';
        $this->Image($image_file, 0, 274.42, 210, 0, 'JPG', '', 'T', false, 300, '', false, false, 0, false, false, false);
        // Position at 15 mm from bottom
        $this->SetY(-4);
        // Set font
        $this->SetFont('helvetica', 'I', 8);
        // Page number
        $this->Cell(0, 0, 'Sayfa '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
    }

    public function SetPageDesc($text, $startY, $startX ) {
        $this->SetFont('arial', '', 12);
        $this->SetY($startY);
        $this->SetX($startX);
        $this->StartTransform();
        $this->Rotate(90);
        $this->Cell(215,5,$text,1,1,'C',0,'');
        $this->StopTransform();
    }
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'utf-8', false);
// $fontname = TCPDF_FONTS::addTTFfont('./Classess/fonts/ARIALBD.TTF', 'TrueTypeUnicode', '', 96);
// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Celalettin Binal');
$pdf->SetTitle('Sekizli - Fiyat Teklif Formu');
$pdf->SetSubject('Sekizli Makine ve Vinç A.Ş. - Fiyat Teklif Formu');
$pdf->SetKeywords('Vinç, Fiyat Teklifi, Köprü Tipi Vinç, Portal Vinç, Pergel Vinç');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
    require_once(dirname(__FILE__).'/lang/eng.php');
    $pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
$pdf->SetFont('arialbd', '', 16);

// add a page
$pdf->AddPage();

$pdf->SetY(50);

// set some text to print
$txt = <<<EOD
FİYAT TEKLİFİ
EOD;

// print a block of text using Write()
$pdf->Write(0, $txt, '', 0, 'C', true, 0, false, false, 0);

$pdf->ImageSVG($file=TIMG_PATH.'/ckkv.svg', $x=45, $y=65, $w=120, $h='', $link='', $align='', $palign='', $border=0, $fitonpage=false);
// ---------------------------------------------------------
$pdf->SetFont('arial', '', 12);
$pdf->SetY(165);
$fields = [
    "reference_no"=> "Referans No",
    "created_date"=> "Oluşturulma Tarihi",
    "firm_name"=> "Firma Adı",
    "city_name"=> "Şehir",
    "address"=> "Adres",
    "country"=> "Ülke",
    "phone_number"=> "Telefon Numarası",
    "fax_number"=> "Faks Numarası",
    "gsm_number"=> "Mobil Telefon Numarası",
    "email"=> "E-Posta",
    "tax_office"=> "Vergi Dairesi",
    "tax_number"=> "Vergi No.",
    "auth_person"=> "Yetkili Kişi",
    "subject"=> "Konu",
    "revision_no"=> "Revizyon Numarası",
    "quantity"=> "Adet",
    "product_id"=> "Ürün Adı"
];
$tbl = <<<EOD
<table cellspacing="0" cellpadding="1" border="0">
EOD;
foreach($params["heads"][0] as $key=>$value) {
    if(array_key_exists($key, $fields)){
        $tbl .= <<<EOD
        <tr>
            <th style="width:30%; text-align:right;font-weight:bold;"><b>{$fields[$key]}</b> : </th>
            <td style="width:70%;color:#555;">{$value}</td>
        </tr>
        EOD;
    }
}

$tbl .= <<<EOD
</table>
EOD;
$pdf->writeHTML($tbl, true, false, false, false, '');
$pdf->SetPageDesc('Teklif Üst Bilgileri',266,5);
//============================ Yeni Sayfa ================================+

$pageID = 0;
foreach($params["features"] as $item) {
    // echo json_encode($item);
    if($pageID != $item["feature_group_id"]) {
        $pdf->AddPage();
        $pageID = $item["feature_group_id"];
        $pdf->SetFont('arialbd', '', 16);
        $pdf->SetY(50);
        $pdf->Write(0, $item["feature_group_name"], '', 0, 'C', true, 0, false, false, 0);
        $pdf->ImageSVG($file=TIMG_PATH.'/'.$item["vector_file"].'.svg', $x=45, $y=65, $w=120, $h='', $link='', $align='', $palign='', $border=0, $fitonpage=false);

        $pdf->SetPageDesc('Teknik Detaylar',266,5);
        $pdf->SetY(175);
    }
    $pdf->MultiCell(80, 0, $item["feature_name"], 0, 'L', 0, 0, 15, '', true);
    $pdf->MultiCell(55, 0, $item["value"], 0, 'L', 0, 0, 100, '', true);
    $pdf->MultiCell(55, 0, $item["description"], 0, 'L', 0, 0, 160, '', true);
    $pdf->ln(6);

}

$pdf->Output('offer-'.$params['heads'][0]['reference_no'].'-'.$params['heads'][0]['revision_no'].'.pdf', 'I');
//============================================================+
// END OF FILE
//============================================================+