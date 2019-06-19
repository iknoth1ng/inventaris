<?php
include '../config.php'; 
session_start();
$data_acc = $login->logout();
if($data_acc == false){
    header('Location: ../view/index.php');
    // echo $data_acc;
}else{
    echo "error";
    // echo $data_acc;
}
session_destroy();
?>