<?php
include '../config.php'; 
$id_kibE = $_POST['id_kibE'];
$nama_barang = $_POST['nama_barang'];
$kode_barang = $_POST['kode_barang'];
$nomor_register = $_POST['nomor_register'];
$judul = $_POST['judul'];
$spesifikasi = $_POST['spesifikasi'];
$asal_daerah = $_POST['asal_daerah'];
$pencipta = $_POST['pencipta'];
$bahan = $_POST['bahan'];
$jenis = $_POST['jenis'];
$ukuran = $_POST['ukuran'];
$jumlah = $_POST['jumlah'];
$tahun_cetak = $_POST['tahun_cetak'];
$asal_usul = $_POST['asal_usul'];
$harga = $_POST['harga'];
$keterangan = $_POST['keterangan'];

$data_acc = $kib->ubah_KIBE($id_kibE,$nama_barang,$kode_barang,$nomor_register,$judul,$spesifikasi,$asal_daerah,$pencipta,$bahan,$jenis,$ukuran,$jumlah,$tahun_cetak,$asal_usul,$harga,$keterangan);
if($data_acc == true){
    header('Location: ../view/kibE.php');
    // echo $data_acc;
}else{
    echo "error";
}
?>