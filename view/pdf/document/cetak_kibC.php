<?php
include '../../../config.php';
error_reporting(0);

//header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");


		$tampil = $kib->tampil_pdf_KIBC();
		$total = $kib->hargaKIBC();
		//var_dump($duit);
		//exit();
		include 'document_kibC.php';

//header("Location:  $_SERVER['HTTP_REFERER']"); /* Redirect browser */
?>