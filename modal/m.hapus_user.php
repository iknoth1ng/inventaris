<?php
include '../config.php'; 
$id_user = $_GET['id_user'];


$data_acc = $user->hapus_user($id_user);
if($data_acc == true){
    echo "<script>alert('Data berhasil dihapus!');
    window.location = '../view/user.php' </script>";
    // echo $data_acc;
}else{
    echo "error";
}
?>