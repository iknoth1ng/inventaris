<?php
include '../config.php'; 
$id_KibC = $_POST['id_kibC'];
$jenis_barang = $_POST['jenis_barang'];
$kode_barang = $_POST['kode_barang'];
$nomor_register = $_POST['nomor_register'];
$kondisi_bangunan = $_POST['kondisi_bangunan'];
$bertingkat = $_POST['bertingkat'];
$beton = $_POST['beton'];
$luas_lantai = $_POST['luas_lantai'];
$letak = $_POST['letak'];
$tanggal = $_POST['tanggal'];
$nomor = $_POST['nomor'];
$luas = $_POST['luas'];
$status_tanah = $_POST['status_tanah'];
$nomor_tanah = $_POST['nomor_tanah'];
$asal_usul = $_POST['asal_usul'];
$harga = $_POST['harga'];
$keterangan = $_POST['keterangan'];

$data_acc = $kib->ubah_KIBC($id_KibC,$jenis_barang,$kode_barang,$nomor_register,$kondisi_bangunan,$bertingkat,$beton,$luas_lantai,$letak,$tanggal,$nomor,$luas,$status_tanah,$nomor_tanah,$asal_usul,$harga,$keterangan);
if($data_acc == true){
    header('Location: ../view/kibC.php');
    // echo $data_acc;
}else{
    echo "error";
}
?>