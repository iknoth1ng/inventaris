<?php
include '../config.php';
$id_peminjam = $_POST['id_peminjam'];
$nama_peminjam = $_POST['nama_peminjam'];
$merk_id = $_POST['nama_barang'];
// $merk = $_POST['merk'];
$ruangan = $_POST['ruangan'];
$tanggal_peminjaman = $_POST['tanggal_peminjaman'];
$kondisi_awal = $_POST['kondisi_awal'];
$tanggal_pengembalian = $_POST['tanggal_pengembalian'];
$jumlah = $_POST['jumlah'];
$keterangan = $_POST['keterangan'];

$data_acc = $peminjaman->edit_peminjaman($id_peminjam,$nama_peminjam, $merk_id, $ruangan, $tanggal_peminjaman, $kondisi_awal, $tanggal_pengembalian, $jumlah, $keterangan);
if($data_acc == true){
    header('Location: ../view/list_peminjaman.php');
    // echo $data_acc;
}else{
    echo "error";
}
?>