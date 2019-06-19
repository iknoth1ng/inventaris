<?php
include '../config.php'; 
$id_aset = $_GET['id_aset'];


$data_acc = $aset->hapus_asettakberwujud($id_aset);
if($data_acc == true){
    echo "<script>alert('Data berhasil dihapus!');
    window.location = '../view/aset_tak_berwujud.php' </script>";
    // echo $data_acc;
}else{
    echo "error";
}
?>