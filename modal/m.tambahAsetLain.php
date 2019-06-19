<?php
include '../config.php'; 
// $id = $_POST['id'];
$kode_barang = $_POST['kode_barang'];
$nama_barang = $_POST['nama_barang'];
$nomor_register = $_POST['nomor_register'];
$merk = $_POST['merk'];
$ukuran = $_POST['ukuran'];
$bahan = $_POST['bahan'];
$tahun_pembelian = $_POST['tahun_pembelian'];
$pabrik = $_POST['pabrik'];
$rangka = $_POST['rangka'];
$mesin = $_POST['mesin'];
$polisi = $_POST['polisi'];
$bpkb = $_POST['bpkb'];
$asal_usul = $_POST['asal_usul'];
$kondisi = $_POST['kondisi'];
$ruangan = $_POST['ruangan'];
$harga = $_POST['harga'];
$keterangan = $_POST['keterangan'];

$data_acc = $aset->tambah_asetlain($kode_barang,$nama_barang,$nomor_register,$merk,$ukuran,$bahan,$tahun_pembelian,$pabrik,$rangka,$mesin,$polisi,$bpkb,$asal_usul,$kondisi,$ruangan,$harga,$keterangan);
if($data_acc == true){
    header('Location: ../view/aset_lain.php');
    // echo $data_acc;
}else{
    echo "error";
}
?>