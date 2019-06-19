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
    h3{
        text-align: center;
    }
    h5{
        text-align: left;
      }
    tr {
        text-align: center;
      }
      
  </style>

        <h3>LAPORAN REKAPITULASI INVENTARIS</h3>
        <h3>PER JANUARI 2019</h3>

        <h5>PROPINSI &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : KEPRI 
        <h5>KAB/KOTA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;         : BATAM</h5>
        <h5 class="text-gray-900"><div class="b">UNIT SATUAN KERJA : DINAS KOMUNIKASI DAN INFORMATIKA</h5>

<table border="1">
    <tbody>
        <tr>
          <th width="30">No</th>
          <th>Nama Barang</th>
          <th>Merk/Model</th>
          <th width="50">No.Seri Pabrik</th>
          <th width="50">Ukuran</th>
          <th width="80">Bahan</th>
          <th>Tahun Pembeliaan</th>
          <th>No.Kode Lokasi</th>
          <th width="90">No.Kode Barang</th>
          <th>Jumlah Barang</th>
          <th width="100">Harga Beli/ Perolehan</th>
          <th width="70">Keadaan Barang</th>
          <th>Keterangan</th>
          <th width="110">Ruangan</th>
        </tr>
        <tr>
          <th>1</th>
          <th>2</th>
          <th>3</th>
          <th>4</th>
          <th>5</th>
          <th>6</th>
          <th>7</th>
          <th>8</th>
          <th>9</th>
          <th>10</th>
          <th>11</th>
          <th>12</th>
          <th>13</th>
          <th>14</th>
        </tr>  

         $cetakRekapitulasi
      </tbody>

      <tfoot>
      <tr> 
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td> $total Unit</td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
      </tr>
     </tfoot> 



</table>


EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('KIBF.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+