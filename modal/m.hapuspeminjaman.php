<?php
include '../config.php'; 
$id_peminjam = $_GET['id_peminjam'];


$data_acc = $peminjaman->hapus_peminjaman($id_peminjam);
if($data_acc == true){
    echo "<script>alert('Data berhasil dihapus!');
    window.location = '../view/list_peminjaman.php' </script>";
    // echo $data_acc;
}else{
    echo "error";
}
?>