<?php


$nama_app = " | Queen Cupang";
$rute = (isset($_GET['s']))?$_GET['s']:"detail";
switch ($rute) {
	case 'detail': default: $judul = "Detail Barang $nama_app"; include 'detail-produk.php'; break;
	case 'troli': $judul = "Troli $nama_app"; include 'detail-troli.php'; break;
	case 'checkout': $judul = "Checkout $nama_app"; include 'detail-checkout.php'; break;
	case 'status': $judul = "Status Pengiriman $nama_app"; include 'detail-status.php'; break;

	

	
	
		
}

 ?>