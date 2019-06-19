<?php
include '../../../config.php';
error_reporting(0);

//header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");


		$BarangPakai = $barang_pakai->tampilBarangPakai_pdf();
		$total = $barang_pakai->hargaBarang();
		//var_dump($duit);
		//exit();
		include 'document_barang.php';

//header("Location:  $_SERVER['HTTP_REFERER']"); /* Redirect browser */
?>