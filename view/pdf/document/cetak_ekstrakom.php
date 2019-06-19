<?php
include '../../../config.php';
// error_reporting(0);

//header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");


		$Ekstrakom = $ekstrakom->cetak_Ekstrakom_pdf();
		$total = $ekstrakom->hargaEkstrakom();
		// var_dump($Ekstrakom);
		//exit();
		include 'document_ekstrakom.php';

//header("Location:  $_SERVER['HTTP_REFERER']"); /* Redirect browser */
?>