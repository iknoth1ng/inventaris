<?php
include '../config.php'; 
// $id = $_POST['id'];
$kode_barang = $_POST['kode_barang'];
$nama_barang = $_POST['nama_barang'];
$tahun_pembelian = $_POST['tahun_pembelian'];
$asal_usul = $_POST['asal_usul'];
$harga = $_POST['harga'];
$amortisasi = $_POST['amortisasi'];
$akm_amortisasi_2016 = $_POST['akm_amortisasi_2016'];
$beban_amortisasi = $_POST['beban_amortisasi'];
$akm_amortisasi_2017 = $_POST['akm_amortisasi_2017'];
$nilai_buku = $_POST['nilai_buku'];
$keterangan = $_POST['keterangan'];

$data_acc = $aset->tambah_asettakberwujud($kode_barang,$nama_barang,$tahun_pembelian,$asal_usul,$harga,$amortisasi,$akm_amortisasi_2016,$beban_amortisasi,$akm_amortisasi_2017,$nilai_buku,$keterangan);
if($data_acc == true){
    header('Location: ../view/aset_tak_berwujud.php');
    // echo $data_acc;
}else{
    echo "error";
}
?>