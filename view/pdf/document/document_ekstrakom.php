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
    tr {
      text-align: center;
    }

  </style>

      <h3>KARTU INVENTARIS BARANG (KIB) B</h3>
      <h3>EKSTRAKOM</h3>
      <h3>PER DESEMBER 2016</h3>

<table border="2">

        <tbody>
        <tr>
            <th rowspan="2" width="30">No</th>
            <th rowspan="2" width="70">Kode Barang</th>
            <th rowspan="2" width="85">Nama Barang / Jenis Barang</th>
            <th rowspan="2">Nomor Register</th>
            <th rowspan="2">Merk / Type</th>
            <th rowspan="2">Ukuran CC</th>
            <th rowspan="2">Bahan</th>
            <th rowspan="2">Tahun Pembeliaan</th>
            <th colspan="5">Nomor</th>
            <th rowspan="2">Asal Usul Cara</th>
            <th rowspan="2">Kondisi</th>
            <th rowspan="2">Ruangan</th>
            <th rowspan="2">Harga</th>
            <th rowspan="2" width="70">Keterangan</th>
        </tr>
              
          <tr>
            <th>Pabrik</th>
            <th>Rangka</th>
            <th>Mesin</th>
            <th>Polisi</th>
            <th>BPKB</th>
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
            <th>15</th>
            <th>16</th>
            <th>17</th>
            <th>18</th>
          </tr>   
                $Ekstrakom
            </tbody>

            <tfoot>
                <tr> 
                     <td colspan="16" align="center">Total </td>
                     <td>Rp. $total </td>
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
$pdf->Output('Ekstrakom.pdf', 'I');

//============================================================+
// END OF FILE
//============================================================+