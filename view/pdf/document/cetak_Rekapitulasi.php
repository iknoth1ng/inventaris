<?php
include '../../../config.php';
error_reporting(0);

//header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");


		$cetakRekapitulasi = $rekapitulasi->cetak_rekapitulasipdf();
		$total = $rekapitulasi->total_unit();
		// var_dump($cetakRekapitulasi);
		//exit();
		include 'document_Rekapitulasi.php';

//header("Location:  $_SERVER['HTTP_REFERER']"); /* Redirect browser */
?>