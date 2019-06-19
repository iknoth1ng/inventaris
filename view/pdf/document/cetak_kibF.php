<?php
include '../../../config.php';
error_reporting(0);

//header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");


		$kibF = $kib->tampil_pdf_KIBF();
		$total = $kib->hargaKIBF();
		//var_dump($duit);
		//exit();
		include 'document_kibF.php';

//header("Location:  $_SERVER['HTTP_REFERER']"); /* Redirect browser */
?>