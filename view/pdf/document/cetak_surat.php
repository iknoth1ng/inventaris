<?php
include '../../../config.php';
// error_reporting(0);

//header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");

		$myid = $_GET['id_peminjam'];
		$mymerk = $peminjaman->cetak_peminjaman('merk_id',$_GET['id_peminjam']);
		// $peminjaman = $peminjaman->cetak_peminjaman('id_peminjam',$myid);
		$namapinjam = $peminjaman->cetak_peminjaman('nama_peminjam',$myid);
		$ruang = $peminjaman->cetak_peminjaman('ruangan',$myid);
		$nama_barang = $peminjaman->cetak_stok('nama_barang',$mymerk);
		$merk = $peminjaman->cetak_stok('merk',$mymerk);
		$tanggal = date('d-m-Y');
		$tanggal_peminjaman = $peminjaman->cetak_peminjaman('tanggal_peminjaman', $myid);
		$kondisi_awal = $peminjaman->cetak_peminjaman('kondisi_awal', $myid);
		$tanggal_pengembalian = $peminjaman->cetak_peminjaman('tanggal_pengembalian', $myid);
		$status = $peminjaman->cetak_peminjaman('status',$myid);
		//var_dump($duit);
		//exit();
		include 'document_surat.php';

//header("Location:  $_SERVER['HTTP_REFERER']"); /* Redirect browser */
?>