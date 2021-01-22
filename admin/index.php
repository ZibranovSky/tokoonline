<?php 

session_start();
require 'fungsi/auth.php';
$nama_app = " | Queen Cupang";
$rute = (isset($_GET['r']))?$_GET['r']:"awal";
switch ($rute) {
	case 'awal': default: $judul = "Beranda $nama_app"; include 'awal.php'; break;
	case 'admin': $judul = "Admin $nama_app"; include 'rute/admin/index.php';
	case 'akun': $judul = "Akun $nama_app"; include 'rute/admin/akun.php'; break;
	case 'produk': include 'rute/produk/index.php'; break;
	case 'customer': include 'rute/customer/index.php'; break;
	case 'keterangan': include 'rute/keterangan/index.php'; break;
	case 'pesanan': $judul = "Pesanan $nama_app"; include 'rute/pesanan/pesanan.php'; break;
	
	
		
}



 ?>