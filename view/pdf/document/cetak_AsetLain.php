<?php
include '../../../config.php';
error_reporting(0);

//header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");


		$asetlain = $aset->tampilasetlain_pdf();
		$total = $aset->hargaAsetLain();
		//var_dump($duit);
		//exit();
		include 'document_AsetLain.php';

//header("Location:  $_SERVER['HTTP_REFERER']"); /* Redirect browser */
?>