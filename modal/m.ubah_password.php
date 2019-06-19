<?php
include '../config.php';
$passlama = $_POST['passlama'];
$passbaru1 = $_POST['passbaru1'];
$passbaru2 = $_POST['passbaru2'];

if($passbaru1 == $passbaru2){
    $data_acc = $user->ganti_pass($passlama,$passbaru1);
    if($data_acc == true){
        echo "<script>alert('Passowrd Berhasil diubah');
        window.location = '../view/dashboard.php' </script>";
        // echo $data_acc;
    }else{
        echo "error";
    }
}else{
    echo "password tidak sama";
}
?>