<?php
include '../../../config.php';


//header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");


		$kibD = $kib->tampil_pdf_KIBD();
		$total = $kib->hargaKIBD();
		// var_dump($kibD);
		//exit();
		include 'document_kibD.php';

//header("Location:  $_SERVER['HTTP_REFERER']"); /* Redirect browser */
?>