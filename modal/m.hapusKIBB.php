<?php
include '../config.php'; 
$id_kibB = $_GET['id_kibB'];


$data_acc = $kib->hapus_KIBB($id_kibB);
if($data_acc == true){
    echo "<script>alert('Data berhasil dihapus!');
    window.location = '../view/kibB.php' </script>";
    // echo $data_acc;
}else{
    echo "error";
}
?>