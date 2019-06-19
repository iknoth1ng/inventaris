<?php
include '../config.php';

$golongan = $_POST['golongan'];
$bidang = $_POST['bidang'];
$kelompok = $_POST['kelompok'];
$sub_kelompok = $_POST['sub_kelompok'];
$sub_sub_kelompok = $_POST['sub_sub_kelompok'];
$kode_barang = $_POST['kode_barang'];
$uraian = $_POST['uraian'];
$masa_manfaat = $_POST['masa_manfaat'];
$nilai_penyusutan = $_POST['nilai_penyusutan'];
$tahun = $_POST['tahun'];

$data_acc = $master_data->tambah_masterData($golongan, $bidang, $kelompok, $sub_kelompok, $sub_sub_kelompok, $kode_barang, $uraian, $masa_manfaat, $nilai_penyusutan, $tahun);
if($data_acc == true){
    header('Location: ../view/master_data.php');
    // echo $data_acc;
}else{
    echo "error";
}
?>