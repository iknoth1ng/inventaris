<?php
include '../config.php'; 
$id_kibF = $_POST['id_kibF'];
$jenis_barang = $_POST['jenis_barang'];
$bangunan = $_POST['bangunan'];
$bertingkat = $_POST['bertingkat'];
$beton = $_POST['beton'];
$luas = $_POST['luas'];
$letak = $_POST['letak'];
$tanggal = $_POST['tanggal'];
$nomor = $_POST['nomor'];
$tahun_mulai = $_POST['tahun_mulai'];
$status_tanah = $_POST['status_tanah'];
$nomor_kodetanah = $_POST['nomor_kodetanah'];
$asal_usul = $_POST['asal_usul'];
$nilai_kontrak = $_POST['nilai_kontrak'];
$keterangan = $_POST['keterangan'];

$data_acc = $kib->ubah_KIBF($id_kibF,$jenis_barang,$bangunan,$bertingkat,$beton,$luas,$letak,$tanggal,$nomor,$tahun_mulai,$status_tanah,$nomor_kodetanah,$asal_usul,$nilai_kontrak,$keterangan);
if($data_acc == true){
    header('Location: ../view/kibF.php');
    // echo $data_acc;
}else{
    echo "error";
}
?>