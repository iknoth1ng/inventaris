<?php
include '../config.php'; 
$id_ekstrakom = $_GET['id_ekstrakom'];


$data_acc = $ekstrakom->hapusEkstrakom($id_ekstrakom);
if($data_acc == true){
    echo "<script>alert('Data berhasil dihapus!');
    window.location = '../view/ekstrakom.php' </script>";
    // echo $data_acc;
}else{
    echo "error";
}
?>