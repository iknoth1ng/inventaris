<?php
include '../config.php'; 
header("Content-Type: application/json; charset=UTF-8");

$parameter = $_GET['char'];
$data_acc = $master_data->cetak_json('kode_barang',$parameter);
echo $data_acc;
?>