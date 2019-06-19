<?php
include '../config.php'; 
$id_rekapitulasi = $_GET['id_rekapitulasi'];


$data_acc = $rekapitulasi->hapus_rekapitulasi($id_rekapitulasi);
if($data_acc == true){
    echo "<script>alert('Data berhasil dihapus!');
    window.location = '../view/rekapitulasi.php' </script>";
    // echo $data_acc;
}else{
    echo "error";
}
?>