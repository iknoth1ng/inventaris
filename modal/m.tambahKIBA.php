<?php
include '../config.php'; 
// $id = $_POST['id'];
$jenis_barang = $_POST['jenis_barang'];
$kode_barang = $_POST['kode_barang'];
$nomor_register = $_POST['nomor_register'];
$luas = $_POST['luas'];
$tahun_pengadaan = $_POST['tahun_pengadaan'];
$letak = $_POST['letak'];
$hak = $_POST['hak'];
$tanggal = $_POST['tanggal'];
$nomor = $_POST['nomor'];
$penggunaan = $_POST['penggunaan'];
$asal_usul = $_POST['asal_usul'];
$harga = $_POST['harga'];
$keterangan = $_POST['keterangan'];

$data_acc = $kib->tambah_kibA($jenis_barang,$kode_barang,$nomor_register,$luas,$tahun_pengadaan,$letak,$hak,$tanggal,$nomor,$penggunaan,$asal_usul,$harga,$keterangan);
if($data_acc == true){
    header('Location: ../view/kibA.php');
    // echo $data_acc;
}else{
    echo "error";
}
?>