<?php
include '../config.php'; 
$id_asetlain = $_GET['id_asetlain'];


$data_acc = $aset->hapusasetlain($id_asetlain);
if($data_acc == true){
    echo "<script>alert('Data berhasil dihapus!');
    window.location = '../view/aset_lain.php' </script>";
    // echo $data_acc;
}else{
    echo "error";
}
?>