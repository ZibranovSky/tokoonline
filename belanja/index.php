<?php 

session_start();
include_once 'fungsi/auth.php';
$nama_app = " | Queen Cupang";
$rute = (isset($_GET['r']))?$_GET['r']:"awal";

switch ($rute) {
	case 'awal': default: $judul = "Welcome $nama_app"; include 'awal.php'; break;
	case 'akun': $judul = "Akun $nama_app"; include 'rute/akun/akun.php'; break;
	case 'detail': include 'rute/detail/index.php'; break;
	case 'sukses': $judul = "Transaksi Sukses $nama_app"; include'rute/keterangan/sukses.php'; break;
	case 'partai': $judul = "Partai $nama_app"; include 'partai.php'; break;
	
}



 ?>