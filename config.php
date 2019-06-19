<?php
ini_set('max_execution_time', 0);
ini_set('display_errors', 'on');
session_start();

$DB_host = "localhost";
$DB_user = "root";
$DB_pass = "";
$DB_name = "db_inventaris";

try
{
    $DB_con = new PDO("mysql:host={$DB_host};dbname={$DB_name}",$DB_user,$DB_pass);
    $DB_con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e)
{
    echo $e->getMessage();
}

include_once 'class.kib.php';
$kib = new kib($DB_con);
include_once 'class.master_data.php';
$master_data = new master_data ($DB_con);
include_once 'class.ekstrakom.php';
$ekstrakom = new ekstrakom ($DB_con);
include_once 'class.barang_pakai.php';
$barang_pakai = new barang_pakai ($DB_con);
include_once 'class.aset.php';
$aset = new aset($DB_con);
include_once 'class.user.php';
$user = new user($DB_con);
include_once 'class.peminjaman.php';
$peminjaman = new peminjaman($DB_con);
include_once 'class.login.php';
$login = new login($DB_con);
include_once 'class.rekapitulasi.php';
$rekapitulasi = new rekapitulasi($DB_con);
?>
