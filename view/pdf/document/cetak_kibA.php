<?php
include '../../../config.php';
error_reporting(0);

//header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");


		$tr2 = $kib->tampil_pdf_KIBA();
		$duit = $kib->hargaKIBA();
		//var_dump($duit);
		//exit();
		include 'document_kibA.php';

//header("Location:  $_SERVER['HTTP_REFERER']"); /* Redirect browser */
?>