<?php
include '../config.php';
$id_user = $_SESSION['iduser'];
$fullname = $_POST['fullname'];
$username = $_POST['username'];
$nip = $_POST['nip'];
$jabatan = $_POST['jabatan'];
// $foto = $_POST['foto'];

$gambar = ""; //folder tempat menyimpan file
if (!empty($_FILES["foto"]["tmp_name"]))
{
    $jenis_gambar=$_FILES['foto']['type'];
    if($jenis_gambar=="image/jpeg" || $jenis_gambar=="image/jpg" || $jenis_gambar=="image/gif" || $jenis_gambar=="image/png")
    {           
        $gambar = "../view/img/gambar/".$_FILES['foto']['name'];       
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $gambar)) {
            // echo "Gambar berhasil dikirim ".$gambar;
            $gambar = $_FILES['foto']['name'];
        } else {
        //    echo "Gambar gagal dikirim";
        $gambar = "";
        }
   } else {
        // echo "Jenis gambar yang anda kirim salah. Harus .jpg .gif .png";
        $gambar = "";
   }
} else {
    // echo "Anda belum memilih gambar";
    $gambar = "";
}


$data_acc = $user->edit_profile($id_user, $fullname, $username, $nip, $jabatan, $gambar);
if($data_acc == true){
    header('Location: ../view/profile.php');
    // echo $data_acc;
}else{
    // echo $data_acc;
    echo "error";
}
?>