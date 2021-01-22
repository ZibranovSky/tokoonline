<?php 

$nama_app = " | Queen Cupang";
$rute = (isset($_GET['s']))?$_GET['s']:"page";

switch ($rute) {
	case 'page': default: $judul="Produk $nama_app"; include 'page.php'; break;
	case 'stok': $judul = "Tambah Stok $nama_app"; include 'stok-masuk.php'; break;
		
		
}



 ?>