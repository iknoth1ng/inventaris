<?php
include '../config.php'; 
$id_barang = $_GET['id_barang'];


$data_acc = $barang_pakai->hapusBarang($id_barang);
if($data_acc == true){
    echo "<script>alert('Data berhasil dihapus!');
    window.location = '../view/barang_pakai_habis.php' </script>";
    // echo $data_acc;
}else{
    echo "error";
}
?>