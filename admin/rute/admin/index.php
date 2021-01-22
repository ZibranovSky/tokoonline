<?php 


$nama_app = " | Queen Cupang";
$rute = (isset($_GET['s']))?$_GET['s']:"admin";

switch ($rute) {
	case 'admin': default: $judul =  "Admin $nama_app"; include 'admin.php'; break;
	
	
		
}


 ?>