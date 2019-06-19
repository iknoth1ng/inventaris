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
    h3 {
      text-align:center;
    }
    th {
      text-align:center;
    }
    tr {
      text-align:center;
    }
  </style>

      <h3>KARTU INVENTARIS BARANG (KIB) A</h3>
      <h3>TANAH</h3>
      <h3>PER DESEMBER 2017</h3></h3>

      <h6 class="text-gray-900">SKPD: BADAN KOMUNIKASI DAN INFORMATIKA</h6>
<table border="2">

    <tbody>
          <tr>
            <th rowspan="3" width="30">No Urut</th>
            <th rowspan ="3" width="100">Jenis Barang / Nama Barang</th>
            <th colspan="2" width="120">Nomor</th>
            <th rowspan="3" width="40">Luas (m2)</th>
            <th rowspan="3" width="75">Tahun Pengadaan</th>
            <th rowspan="3" width="60">Letak / Alamat</th>
            <th colspan="3" width="220">Status Tanah</th>
            <th rowspan="3" width="80">Penggunaan</th>
            <th rowspan="3">Asal Usul</th>
            <th rowspan="3" width="119">Harga (Rp)</th>
            <th rowspan="3" width="75">Keterangan</th>
           </tr>

            <tr>                   
                  <th rowspan="2">Kode Barang</th>
                  <th rowspan="2">Register</th>
                  <th rowspan="2">Hak</th>
                  <th colspan="2">Sertifikat</th>
            </tr>

            <tr>
                  <th>Tanggal</th>
                  <th>Nomor</th>
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
            
                $tr2
            </tbody>    

            <tfoot>
                <tr> 
                <td colspan="12" align="center">Total </td>
                <td>Rp. $duit </td>
                <td></td>

                </tr>
            </tfoot>
    </table>
EOD;

// Print text using writeHTMLCell()
$pdf->writeHTMLCell(0, 0, '', '', $html, 0, 1, 0, true, '', true);

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('KIBA.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+