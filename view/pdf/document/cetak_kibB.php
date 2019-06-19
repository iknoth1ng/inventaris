<?php
include '../../../config.php';
// error_reporting(0);

//header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");


		$tampil1 = $kib->cetak_pdf_KIBB();
		$total = $kib->hargaKIBB();
		// echo $tampil1;
		// exit();
		include 'document_kibB.php';

//header("Location:  $_SERVER['HTTP_REFERER']"); /* Redirect browser */
?>