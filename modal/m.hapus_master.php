<?php
include '../config.php'; 
$id_master = $_GET['id_master'];


$data_acc = $master_data->hapusMaster($id_master);
if($data_acc == true){
    echo "<script>alert('Data berhasil dihapus!');
    window.location = '../view/master_data.php' </script>";
    // echo $data_acc;
}else{
    echo "error";
}
?>