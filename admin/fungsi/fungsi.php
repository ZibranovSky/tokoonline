<?php 
// ---------------------------------------------KONEKSI_SECTION---------------------------------------------

$koneksi = mysqli_connect('localhost','root','','toko_cupang');


// ------------------------------------------ADMIN SECTION---------------------------------------------

function select__admin()
{
	global $koneksi;
	$id = $_SESSION['idtoko'];

	return mysqli_query($koneksi, "SELECT * FROM admin WHERE id='$id'");
}

function select__admin2()
{
	global $koneksi;
	

	return mysqli_query($koneksi, "SELECT * FROM admin");
}

function insert__adm()
{
	global $koneksi;
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$nama = $_POST['nama'];
	$kontak = $_POST['kontak'];
	$foto = $_FILES['foto']['name'];

	if ($foto != "") {
		$allowed_ext = array('png','jpg');
		$x = explode(".", $foto);
		$ekstensi = strtolower(end($x));
		$file_tmp = $_FILES['foto']['tmp_name'];
		$angka_acak = rand(1,999);
   		$nama_file_baru = $angka_acak.'-'.$foto;
   		    if (in_array($ekstensi, $allowed_ext) 	=== true) {
      			move_uploaded_file($file_tmp, '../assets/images/admin/'.$nama_file_baru);
      			$result = mysqli_query($koneksi, "INSERT INTO admin SET username='$username', password='$password', nama='$nama', kontak='$kontak', foto='$nama_file_baru'");
	}
}else if($foto == ""){
	return mysqli_query($koneksi, "INSERT INTO admin SET username='$username', password='$password', nama='$nama', kontak='$kontak'");
}

}

// update user
function update__user()
{
	
	global $koneksi;
	$id = $_POST['id'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$nama = $_POST['nama'];
	$kontak = $_POST['kontak'];
	$foto = $_FILES['foto']['name'];

	// unlink
	$unlink = mysqli_query($koneksi, "SELECT * FROM admin WHERE id='$id'");
	$row = mysqli_fetch_array($unlink);

	$hapus_foto = $row['foto'];
	
	

	// update

	if(isset($_POST['ubahfoto']))
	{
		if ($row['foto']=="") 
		{
					if ($foto != "") {
					$allowed_ext = array('png','jpg');
					$x = explode(".", $foto);
					$ekstensi = strtolower(end($x));
					$file_tmp = $_FILES['foto']['tmp_name'];
					$angka_acak = rand(1,999);
			   		$nama_file_baru = $angka_acak.'-'.$foto;
			   		    if (in_array($ekstensi, $allowed_ext) === true) {
			      			move_uploaded_file($file_tmp, '../assets/images/admin/'.$nama_file_baru);
			      			$result =  mysqli_query($koneksi, "UPDATE admin SET username='$username', password='$password', nama='$nama', kontak='$kontak', foto='$nama_file_baru' WHERE id='$id'");
			      			
			      			
			    }



			}
		}else if ($row['foto']!="") {
			if ($foto != "") {
				$allowed_ext = array('png','jpg');
				$x = explode(".", $foto);
				$ekstensi = strtolower(end($x));
				$file_tmp = $_FILES['foto']['tmp_name'];
				$angka_acak = rand(1,999);
		   		$nama_file_baru = $angka_acak.'-'.$foto;
		   		    if (in_array($ekstensi, $allowed_ext) === true) {
		      			move_uploaded_file($file_tmp, '../assets/images/admin/'.$nama_file_baru);
		      			$result =  mysqli_query($koneksi, "UPDATE admin SET username='$username', password='$password', nama='$nama', kontak='$kontak', foto='$nama_file_baru' WHERE id='$id'");
		      			if ($result) {
		      				unlink("../assets/images/admin/$hapus_foto");
		      			}

		      			
		    }



			}
		}	
	}

	if (empty($_POST['foto'])) {
		return  mysqli_query($koneksi, "UPDATE admin SET username='$username', password='$password', nama='$nama', kontak='$kontak' WHERE id='$id'");
	}

}


function hapus__adm()
{
	global $koneksi;

	$id = $_POST['id'];

	$select = mysqli_query($koneksi, "SELECT * FROM admin WHERE id='$id'");
	$r = mysqli_fetch_array($select);

	$hapus_foto = $r['foto'];

	if ($r['foto'] == "") {
		return mysqli_query($koneksi, "DELETE FROM admin WHERE id='$id'");

	}else{
		unlink("../assets/images/admin/$hapus_foto");
		$hapus =  mysqli_query($koneksi, "DELETE FROM admin WHERE id='$id'");

	}

}

// END ADMIN SECTION---------------------------------------------------------------------------------------------------------------

// --------------------------------------------------PRODUCT SECTION------------------------------------------------------------

function insert__produk()
{
	global $koneksi;
	$kdproduk = $_POST['kdproduk'];
	$nm_produk = $_POST['nm_produk'];
	$stok = $_POST['stok'];
	$harga = $_POST['harga'];
	$deskripsi = $_POST['deskripsi'];
	$jenis = $_POST['jenis'];
	$foto = $_FILES['foto']['name'];

	// tstamps
	 date_default_timezone_set("Asia/Jakarta");
	 $tstamp = date("d-m-Y h:i a");

	//validasi produk 
	$select = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE kdproduk='$kdproduk'");
	$cek = mysqli_num_rows($select);

	if ($cek) {
		echo '<script>alert("data dengan kode produk '.$kdproduk.' sudah ada!")</script>';
	}else if ($foto!="") {
		$allowed_ext = array('png','jpg','jpeg');
					$x = explode(".", $foto);
					$ekstensi = strtolower(end($x));
					$file_tmp = $_FILES['foto']['tmp_name'];
					$angka_acak = rand(1,999);
			   		$nama_file_baru = $angka_acak.'-'.$foto;
			   		    if (in_array($ekstensi, $allowed_ext) === true) {
			      			move_uploaded_file($file_tmp, '../assets/images/produk/'.$nama_file_baru);
			      			$result =  mysqli_query($koneksi, "INSERT INTO tb_produk SET kdproduk='$kdproduk', nm_produk='$nm_produk', stok='$stok', harga='$harga', deskripsi='$deskripsi', jenis='$jenis', foto='$nama_file_baru', tstamp='$tstamp'");
			      			
			      			
			    }
	}



	
}



function hapus__produk()
{
	global $koneksi;
	$id = $_POST['id'];

	$select = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE id='$id'");
	$r = mysqli_fetch_array($select);
	$hapus_foto = $r['foto'];

	unlink("../assets/images/produk/$hapus_foto");
	return mysqli_query($koneksi, "DELETE FROM tb_produk WHERE id='$id'"); 
}


function edit__produk()
{
	error_reporting(0);
	global $koneksi;
	$id = $_POST['id'];
	$kdproduk = $_POST['kdproduk'];
	$nm_produk = $_POST['nm_produk'];
	$stok = $_POST['stok'];
	$harga = $_POST['harga'];
	$deskripsi = $_POST['deskripsi'];
	$jenis = $_POST['jenis'];
	$foto = $_FILES['foto']['name'];

	// tstamps
	 date_default_timezone_set("Asia/Jakarta");
	 $tstamp = date("d-m-Y h:i a");

	 $select = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE kdproduk='$kdproduk'");
	 $r = mysqli_num_rows($select);
	 $cek = mysqli_num_rows($select);

	 $hapus_foto = $r['foto'];

	if(isset($_POST['ubahfoto'])){
		if ($foto != "") {
					$allowed_ext = array('png','jpg','jpeg');
					$x = explode(".", $foto);
					$ekstensi = strtolower(end($x));
					$file_tmp = $_FILES['foto']['tmp_name'];
					$angka_acak = rand(1,999);
			   		$nama_file_baru = $angka_acak.'-'.$foto;
			   		    if (in_array($ekstensi, $allowed_ext) === true) {
			      			move_uploaded_file($file_tmp, '../assets/images/produk/'.$nama_file_baru);
			      			unlink("../assets/images/produk/$hapus_foto");
			      			$result =  mysqli_query($koneksi, "UPDATE tb_produk SET kdproduk='$kdproduk', nm_produk='$nm_produk', stok='$stok', harga='$harga', deskripsi='$deskripsi', jenis='$jenis', foto='$nama_file_baru', tstamp='$tstamp' WHERE id='$id'");
			      			
			      			
			    }
		}
	}else{
		return mysqli_query($koneksi, "UPDATE tb_produk SET kdproduk='$kdproduk', nm_produk='$nm_produk', stok='$stok', harga='$harga', deskripsi='$deskripsi', jenis='$jenis', tstamp='$tstamp' WHERE id='$id'");
	}
}


function insert__stok()
{
	global $koneksi;
	$noinv = $_POST['noinv'];
	$kdproduk = $_POST['kdproduk'];
	$nm_produk = $_POST['nm_produk'];
	$stok = $_POST['stok'];
	$jml_masuk = $_POST['jml_masuk'];

	// tstamps
	 date_default_timezone_set("Asia/Jakarta");
	 $tstamp = date("d-m-Y h:i a");
	
	// Admin
	$admin = $_POST['admin'];


	// Tambah Stok

	$stokbaru = $stok + $jml_masuk;
	$update = mysqli_query($koneksi, "UPDATE tb_produk SET stok='$stokbaru' WHERE kdproduk='$kdproduk'");

	// Insert Data

	$save = mysqli_query($koneksi, "INSERT INTO tb_produk_masuk SET noinv='$noinv', kdproduk='$kdproduk', nm_produk='$nm_produk', stok='$stok', jml_masuk='$jml_masuk', tstamp='$tstamp'");
	if ($save) {
		echo '<script>alert("Stok Berhasil Ditambahkan")</script>';
	}


}


function hapus_all_stock()
{
	global $koneksi;
	$hapus = mysqli_query($koneksi, "DELETE FROM tb_produk_masuk");
}


// ------------------------------------------------------END PRODUCT SECTION---------------------------------------------------------------


//----------------------------------------------------STATISTIC SECTION------------------------------------------------------------------
function count__admin()
{
	global $koneksi;
	$select = mysqli_query($koneksi, "SELECT count(id) AS jadmin FROM admin");
	$row = mysqli_fetch_array($select);
	echo $row['jadmin'];
}

function count__produk()
{
	global $koneksi;
	$select = mysqli_query($koneksi, "SELECT count(id) AS jproduk FROM tb_produk");
	$row = mysqli_fetch_array($select);
	echo $row['jproduk'];
}

function count__cust()
{
	global $koneksi;
	$select = mysqli_query($koneksi, "SELECT count(kduser) AS juser FROM tb_customer");
	$row = mysqli_fetch_array($select);
	echo $row['juser'];
}


function count__transaction()
{
	global $koneksi;
	$select = mysqli_query($koneksi, "SELECT count(kdpesanan) AS jpesanan FROM tb_transaksi WHERE val='1'");
	$row = mysqli_fetch_array($select);
	echo $row['jpesanan'];
}



//---------------------------------------------------- END STATISTIC SECTION------------------------------------------------------------------





// ---------------------------------------------------ORDER SECTION------------------------------------------------------------------------

function ubah__status()
{
	global $koneksi;
	$kdpesanan = $_POST['kdpesanan'];
	$status = $_POST['status'];


	return mysqli_query($koneksi, "UPDATE tb_transaksi SET status = '$status' WHERE kdpesanan='$kdpesanan'");
}


// ---------------------------------------------END ORDER SECTION---------------------------------------------------------------------------


// keep it below


// function gambar2($img, $size)
// {
// 	return '<img src="//localhost/tokoCupang/assets/images/'.$img.'"  width='.$size.'>';
// }

function login($user, $pass)
{
	global $koneksi;
	if (isset($_POST['submit'])) {
		$x = $_POST[$user];
		$y = md5($_POST[$pass]);

		$select = mysqli_query($koneksi, "SELECT * FROM admin WHERE username = '$x' AND password='$y'");
		$cek = mysqli_num_rows($select);
		$r = mysqli_fetch_array($select);

		if ($cek>0) {
			session_start();
			$_SESSION['idtoko'] = $r['id'];
			$_SESSION['usertoko'] = $r['username'];
			header("location: index.php?r=awal");
		}else{
			echo'<script>alert("anda gagal login")</script>';
		}
	}
}

function gambar($img, $size)
{
	return '<img src="//localhost/tokoonline-master/assets/images/'.$img.'"  width='.$size.'>';
}

function img_admin($img, $size)
{
	return '<img src="//localhost/tokoonline-master/assets/images/admin/'.$img.'"  width='.$size.'>';
}

function url()
{
	return $url = "//localhost/tokoonline-master/assets/";
}


 ?>