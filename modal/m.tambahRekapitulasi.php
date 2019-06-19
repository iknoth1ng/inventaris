<?php
include '../config.php';
// $id_barang = $_POST['id_barang'];
$nama_barang = $_POST['nama_barang'];
$merk = $_POST['merk'];
$no_seri = $_POST['no_seri'];
$ukuran = $_POST['ukuran'];
$bahan = $_POST['bahan'];
$tahun_pembelian = $_POST['tahun_pembelian'];
$kode_lokasi = $_POST['kode_lokasi'];
$kode_barang = $_POST['kode_barang'];
$jumlah_barang = $_POST['jumlah_barang'];
$harga = $_POST['harga'];
$keadaan = $_POST['keadaan'];
$keterangan = $_POST['keterangan'];
$ruangan = $_POST['ruangan'];

$data_acc = $rekapitulasi->tambah_rekapitulasi($nama_barang, $merk, $no_seri, $ukuran, $bahan, $tahun_pembelian, $kode_lokasi, $kode_barang, $jumlah_barang, $harga, $keadaan, $keterangan, $ruangan);
if($data_acc == true){
    header('Location: ../view/rekapitulasi.php');
    // echo $data_acc;
}else{
    echo "error";
}
?>