<?php
include '../config.php'; 
$id_stok = $_GET['id_stok'];


$data_acc = $peminjaman->hapus_stok($id_stok);
if($data_acc == true){
    echo "<script>alert('Data berhasil dihapus!');
    window.location = '../view/stok_barang.php' </script>";
    // echo $data_acc;
}else{
    echo "error";
}
?>