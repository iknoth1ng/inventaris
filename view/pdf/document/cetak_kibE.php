<?php
include '../../../config.php';
error_reporting(0);

//header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");


		$kibE = $kib->tampil_pdf_KIBE();
		$total = $kib->hargaKIBE();
		//var_dump($duit);
		//exit();
		include 'document_kibE.php';

//header("Location:  $_SERVER['HTTP_REFERER']"); /* Redirect browser */
?>