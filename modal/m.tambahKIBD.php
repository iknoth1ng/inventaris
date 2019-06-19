<?php
include '../config.php'; 
// $id = $_POST['id'];
$jenis_barang = $_POST['jenis_barang'];
$kode_barang = $_POST['kode_barang'];
$nomor_register = $_POST['nomor_register'];
$konstruksi = $_POST['konstruksi'];
$panjang = $_POST['panjang'];
$lebar = $_POST['lebar'];
$luas = $_POST['luas'];
$letak = $_POST['letak'];
$tanggal = $_POST['tanggal'];
$nomor = $_POST['nomor'];
$status_tanah = $_POST['status_tanah'];
$nomor_kodetanah = $_POST['nomor_kodetanah'];
$asal_usul = $_POST['asal_usul'];
$harga = $_POST['harga'];
$keterangan = $_POST['keterangan'];

$data_acc = $kib->tambah_kibD($jenis_barang,$kode_barang,$nomor_register,$konstruksi,$panjang,$lebar,$luas,$letak,$tanggal,$nomor,$status_tanah,$nomor_kodetanah,$asal_usul,$harga,$keterangan);
if($data_acc == true){
    header('Location: ../view/kibD.php');
    // echo $data_acc;
}else{
    echo "error";
}
?>