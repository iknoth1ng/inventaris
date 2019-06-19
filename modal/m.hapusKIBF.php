<?php
include '../config.php'; 
$id_kibF = $_GET['id_kibF'];


$data_acc = $kib->hapus_KIBF($id_kibF);
if($data_acc == true){
    echo "<script>alert('Data berhasil dihapus!');
    window.location = '../view/kibF.php' </script>";
    // echo $data_acc;
}else{
    echo "error";
}
?>