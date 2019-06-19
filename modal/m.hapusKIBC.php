<?php
include '../config.php'; 
$id_kibC = $_GET['id_kibC'];


$data_acc = $kib->hapus_KIBC($id_kibC);
if($data_acc == true){
    echo "<script>alert('Data berhasil dihapus!');
    window.location = '../view/kibC.php' </script>";
    // echo $data_acc;
}else{
    echo "error";
}
?>