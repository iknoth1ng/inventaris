<?php
include '../config.php'; 
$id_kibD = $_GET['id_kibD'];


$data_acc = $kib->hapus_KIBD($id_kibD);
if($data_acc == true){
    echo "<script>alert('Data berhasil dihapus!');
    window.location = '../view/kibD.php' </script>";
    // echo $data_acc;
}else{
    echo "error";
}
?>