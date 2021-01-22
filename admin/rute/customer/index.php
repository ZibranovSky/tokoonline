<?php 

$nama_app = " | Queen Cupang";
$rute = (isset($_GET['s']))?$_GET['s']:"page";
switch ($rute) {
	case 'page': default: $judul = "Data Customer $nama_app"; include'page.php'; break;
}


 ?>