<?php
include '../config.php'; 
$id_kibA = $_GET['id_kibA'];

$data_acc = $kib->hapus_KIBA($id_kibA);
if($data_acc == true){
    echo "<script>alert('Data berhasil dihapus!');
    window.location = '../view/kibA.php' </script>";
    // echo $data_acc;
}else{
    echo "error";
}
?>