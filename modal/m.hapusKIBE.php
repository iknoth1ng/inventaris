<?php
include '../config.php'; 
$id_kibE = $_GET['id_kibE'];


$data_acc = $kib->hapus_KIBE($id_kibE);
if($data_acc == true){
    echo "<script>alert('Data berhasil dihapus!');
    window.location = '../view/kibE.php' </script>";
    // echo $data_acc;
}else{
    echo "error";
}
?>