<?php
include '../config.php'; 
// $id = $_POST['id'];
$username = $_POST['username'];
$password = $_POST['password'];

$data_acc = $login->login_user($username,$password);
if($data_acc == true){
    header('Location: ../view/dashboard.php');
    // echo $data_acc;
    // echo $_SESSION['user'];
    // echo $_SESSION['fullname'];
    // echo $_SESSION['jabatan'];
    // echo $_SESSION['level'];
    // echo $_SESSION['iduser'];
    // echo $_SESSION['nip'];
}else{
    echo  "<script>alert('Login Gagal Username dan Password Salah !!!');
    window.location = '../view/' </script>";
}
?>