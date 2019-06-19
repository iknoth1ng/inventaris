<?php
include '../config.php'; 
// $id = $_POST['id'];
$pinjam = $_GET['id_pinjam'];
$barang = $_GET['id_barang'];
$opsistatus = $_GET['status'];

$jum_barang = $peminjaman->cetak_peminjaman('jumlah',$pinjam);
$cek_barang = $peminjaman->cetak_stok('jumlah',$barang);

if($cek_barang == 0){
    $peminjaman->update_pinjaman($pinjam,$barang,"Tolak");
    echo "<script type='text/javascript'>alert('Barang Kosong'); window.location.href = '../view/list_peminjaman.php';</script>";
}else if($jum_barang <= $cek_barang){
    if($opsistatus == "Terima" ){
        $cek_barang = ($cek_barang - $jum_barang);
        $opsi1 = $peminjaman->update_pinjaman($pinjam,$barang,"Terima");
        $opsi2 = $peminjaman->update_stok($cek_barang,$barang);
        if($opsi1 == true &&  $opsi2 == true){
            echo "<script type='text/javascript'>alert('Barang Berhasil di Pinjam'); window.location.href = '../view/list_peminjaman.php';</script>";
        }
    }else{
        $cek_barang = ($cek_barang + $jum_barang);
        $opsi1 = $peminjaman->update_pinjaman($pinjam,$barang,"Tolak");
        $opsi2 = $peminjaman->update_stok($cek_barang,$barang);
        if($opsi1 == true &&  $opsi2 == true){
            echo "<script type='text/javascript'>alert('Barang Berhasil di Tolak'); window.location.href = '../view/list_peminjaman.php';</script>";
        }
    }
    // echo "stok tinggal ".$cek_barang;
}else{
    if($opsistatus == "Tolak"){
        $cek_barang = ($cek_barang + $jum_barang);
        $opsi1 = $peminjaman->update_pinjaman($pinjam,$barang,"Tolak");
        $opsi2 = $peminjaman->update_stok($cek_barang,$barang);
        if($opsi1 == true &&  $opsi2 == true){
            echo "<script type='text/javascript'>alert('Barang Berhasil di Tolak'); window.location.href = '../view/list_peminjaman.php';</script>";
        }else{
            echo "<script type='text/javascript'>alert('Barang Gagal di Tolak'); window.location.href = '../view/list_peminjaman.php';</script>";
        }
    }else{
        $peminjaman->update_pinjaman($pinjam,$barang,"Tolak");
        echo "<script type='text/javascript'>alert('Barang melebihi Kouta'); window.location.href = '../view/list_peminjaman.php';</script>";
    }
}
?>