<?php
include '../../../config.php';
error_reporting(0);

//header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");


		$asettakberwujud = $aset->tampil_asettakberwujud_pdf();
        $harga = $aset->harga();
        $amortisasi = $aset->amortisasi();
        $amortisasi_2016 = $aset->amortisasi_2016();
        $beban_amortisasi = $aset->beban_amortisasi();
        $amortisasi_2017 = $aset->amortisasi_2017();
        $nilai_buku = $aset->nilai_buku();
		//var_dump($duit);
		//exit();
		include 'document_AsetTakBerwujud.php';

//header("Location:  $_SERVER['HTTP_REFERER']"); /* Redirect browser */
?>