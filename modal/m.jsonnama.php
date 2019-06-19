<?php
include '../config.php'; 
header("Content-Type: application/json; charset=UTF-8");

$parameter = $_GET['char'];
$data_acc = $master_data->cetak_json('uraian',$parameter);
echo $data_acc;
?>