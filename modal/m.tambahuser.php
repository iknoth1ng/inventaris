<?php
include '../config.php';

$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];

$data_acc = $user->tambah_user($username, $password, $level);
if($data_acc == true){
    header('Location: ../view/user.php');
    // echo $data_acc;
}else{
    echo "error";
}
?>