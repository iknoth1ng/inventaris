<?php
//============================================================+
// File name   : example_002.php
// Begin       : 2008-03-04
// Last Update : 2013-05-14
//
// Description : Example 002 for TCPDF class
//               Removing Header and Footer
//
// Author: Nicola Asuni
//
// (c) Copyright:
//               Nicola Asuni
//               Tecnick.com LTD
//               www.tecnick.com
//               info@tecnick.com
//============================================================+

/**
 * Creates an example PDF TEST document using TCPDF
 * @package com.tecnick.tcpdf
 * @abstract TCPDF - Example: Removing Header and Footer
 * @author Nicola Asuni
 * @since 2008-03-04
 */

// Include the main TCPDF library (search for installation path).
require_once('tcpdf_include.php');

// create new PDF document
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// // set document information
// $pdf->SetCreator(PDF_CREATOR);
// $pdf->SetAuthor('Nicola Asuni');
// $pdf->SetTitle('TCPDF Example 002');
// $pdf->SetSubject('TCPDF Tutorial');
// $pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);

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
$pdf->SetFont('helvetica','',11,'','default',true);

// add a page
$pdf->AddPage();

// set some text to print
$html = <<<EOD
<style>
    th {
      text-align: center;
    }
    tr {
      text-align: center;
    }
    h3{
      text-align: center;
    }
  </style>

<h3>PEMERINTAH KOTA BATAM</h3>
<h3>BADAN KOMUNIKASI DAN INFORMATIKA</h3>
<h3>ASET TAK BERWUJUD</h3>
<h3>PER DESEMBER 2016</h3>

<table border="2">
            
  <tbody>
    <tr>
      <th width="30">No</th>
      <th width="48">Kode Barang</th>
      <th width="90">Nama Barang / Jenis Barang</th>
      <th>Tahun Pembeliaan</th>
      <th width="90">Asal Usul / Cara Perolehan</th>
      <th width="100">Harga</th>
      <th width="100">Amortisasi / Tahun</th>
      <th width="100">Akm. Amortisasi s.d 2016</th>
      <th width="100">Beban Amortisasi 2017</th>
      <th width="100">Akm. Amortisasi s.d 2017</th>
      <th width="100">Nilai Buku</th>
      <th width="35">Ket</th>
  </tr>

  <tr>
    <th>1</th>
    <th>2</th>
    <th>3</th>
    <th>4</th>
    <th>5</th>
    <th>6</th>
    <th>7=(6:4tahun)</th>
    <th>8</th>
    <th>9</th>
    <th>10=8+9</th>
    <th>11=6-10</th>
    <th>12</th>
  
  </tr>
      $asettakberwujud
  </tbody>    


  <tfoot>
      <tr> 
           <td colspan="5" align="center">Total </td>
           <td>Rp. $harga </td>
           <td>Rp. $amortisasi</td>
           <td>Rp. $amortisasi_2016 </td>
           <td>Rp. $beban_amortisasi </td>
           <td>Rp. $amortisasi_2017 </td>
           <td>Rp. $nilai_buku </td>
           <td></td>
           <td colspan="2"></td>
      </tr>
  </tfoot>
</table>
EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('AsetTakBerwujud.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+