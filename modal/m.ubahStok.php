<?php
include '../config.php'; 
$id_stok = $_POST['id_stok'];
$jumlah = $_POST['jumlah'];
$nama_barang = $_POST['nama_barang'];
$merk = $_POST['merk'];
$kondisi = $_POST['kondisi'];

$data_acc = $peminjaman->edit_stok($id_stok,$jumlah,$nama_barang,$merk,$kondisi);
if($data_acc == true){
    header('Location: ../view/stok_barang.php');
    // echo $data_acc;
}else{
    echo "error";
}
?>