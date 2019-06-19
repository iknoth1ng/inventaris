<?php
include '../../../config.php';
error_reporting(0);

//header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");


		$peminjamanAdmin = $peminjaman->cetak_peminjamanAdmin();
		//var_dump($duit);
		//exit();
		include 'document_peminjamanAdmin.php';

//header("Location:  $_SERVER['HTTP_REFERER']"); /* Redirect browser */
?>