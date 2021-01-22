<?php 


$nama_app = " | Cupang Queen ";
$rute = (isset($_GET['s']))?$_GET['s']:"notif";
switch ($rute) {
	case 'notif': default: $judul = "Notifikasi $nama_app"; include 'notif.php'; break;
	case 'status': include 'status.php'; break;

}


 ?>