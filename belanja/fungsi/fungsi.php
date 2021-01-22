<?php 
// ------------------------------------------------------KONEKSI-----------------------------------------------------------
$koneksi = mysqli_connect('localhost','root','','toko_cupang');


// ------------------------------------------------Daftar Baru---------------------------------------------------------------

function daftar()
{
	global $koneksi;
	// uniq_id

	$kduser = uniqid();
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$nama = $_POST['nama'];
	$kontak = $_POST['kontak'];
	$alamat = $_POST['alamat'];

		// tstamps
	 date_default_timezone_set("Asia/Jakarta");
	 $tstamp = date("d-m-Y h:i a");

	$daftar = mysqli_query($koneksi, "INSERT INTO tb_customer SET kduser='$kduser', username='$username', password='$password', nama='$nama', kontak='$kontak', alamat='$alamat', foto='', tstamp='$tstamp'");
	if ($daftar) {
		echo '<script>alert("Akun Anda Sudah Dibuat Silahkan Login")</script>';

	}else{
		echo '<script>alert("Akun Anda Gagal Dibuat")</script>';

	}
}

// --------------------------------------------CUSTOMER SECTION--------------------------------------------------------------------------

function select__cust()
{
	global $koneksi;
	$id = $_SESSION['idtoko2'];
	return mysqli_query($koneksi, "SELECT * FROM tb_customer WHERE id='$id'");
}


function update__cust()
{
	
	global $koneksi;
	$id = $_POST['id'];
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$nama = $_POST['nama'];
	$alamat = $_POST['alamat'];
	$kontak = $_POST['kontak'];
	$foto = $_FILES['foto']['name'];


	// tstamps
	 date_default_timezone_set("Asia/Jakarta");
	 $tstamp = date("d-m-Y h:i a");

	 // unlink
	$unlink = mysqli_query($koneksi, "SELECT * FROM tb_customer WHERE id='$id'");
	$row = mysqli_fetch_array($unlink);

	$hapus_foto = $row['foto'];

	 if (isset($_POST['ubahfoto'])) {
	 		if ($row['foto']=="") 
				{
					if ($foto != "") {
					$allowed_ext = array('png','jpg', 'jpeg');
					$x = explode(".", $foto);
					$ekstensi = strtolower(end($x));
					$file_tmp = $_FILES['foto']['tmp_name'];
					$angka_acak = rand(1,999);
			   		$nama_file_baru = $angka_acak.'-'.$foto;
			   		    if (in_array($ekstensi, $allowed_ext) === true) {
			      			move_uploaded_file($file_tmp, '../assets/images/customer/'.$nama_file_baru);
			      			$result =  mysqli_query($koneksi, "UPDATE tb_customer SET username='$username', password='$password', nama='$nama', kontak='$kontak', alamat='$alamat', foto='$nama_file_baru' WHERE id='$id'");
			      			
			      			
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
		      			move_uploaded_file($file_tmp, '../assets/images/customer/'.$nama_file_baru);
		      			$result =  mysqli_query($koneksi, "UPDATE tb_customer SET username='$username', password='$password', nama='$nama', kontak='$kontak', alamat='$alamat', foto='$nama_file_baru' WHERE id='$id'");
		      			if ($result) {
		      				unlink("../assets/images/customer/$hapus_foto");
		      			}

		      			
		    }



			}
		}
	 }

	 if (empty($_POST['foto'])) {
	 	return mysqli_query($koneksi, "UPDATE tb_customer SET username='$username', password='$password', nama='$nama', kontak='$kontak', alamat='$alamat' WHERE id='$id'");
	 }


}



// ------------------------------------------------PRODUCT SECTION------------------------------------------------------------------------
function select__product()
{
	global $koneksi;

	if (isset($_POST['go'])) {
		$cari = $_POST['cari'];
		return mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE nm_produk LIKE '%".$cari."%'");
	}else{
		return mysqli_query($koneksi, "SELECT * FROM tb_produk");


	}

}


function select__product_partai()
{
	global $koneksi;
	return mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE jenis='partai'");



}

	



function select__detail()
{
	global $koneksi;
	$pid = $_GET['pid'];

	return mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE kdproduk='$pid'");

}

function tambah_keranjang()
{
	global $koneksi;
	$kduser = $_POST['kduser'];
    $kdproduk = $_POST['kdproduk'];
    $nm_produk = $_POST['nm_produk'];
    $jenis = $_POST['jenis'];
    $harga = $_POST['harga'];
    $foto = $_POST['foto'];

    // tstamps
	 date_default_timezone_set("Asia/Jakarta");
	 $tstamp = date("d-m-Y h:i a");

	 $select = mysqli_query($koneksi, "SELECT * FROM tb_keranjang WHERE kdproduk='$kdproduk' AND kduser='$kduser'");
	 $row = mysqli_num_rows($select);

	 if ($row) {
	 	echo '<script>alert("Produk sudah ada di troli")</script> ';
	 }else{
	 	$save = mysqli_query($koneksi, "INSERT INTO tb_keranjang SET kduser='$kduser', kdproduk='$kdproduk', nm_produk='$nm_produk', jenis='$jenis', harga='$harga', foto='$foto', tstamp='$tstamp'");
	 	if ($save) {
	 	echo '<script>alert("Sukses menambahkan ke troli")</script> ';
	 		
	 	}
	 }
}



// ------------------------------------------------------TRANSACTION SECTION------------------------------------------------------

function make__transaksi()
{
	global $koneksi;
	 $kdpesanan = $_POST['kdpesanan'];
 $kdproduk = $_POST['kdproduk'];
 $nm_produk = $_POST['nm_produk'];
 $kduser = $_POST['kduser'];
 $nmuser = $_POST['nmuser'];
 $alamat = $_POST['alamat'];
 $kontak =  $_POST['kontak'];
 $jml_beli = $_POST['jml_beli'];
 $total = $_POST['total'];

 // onkir

 $ongkir = $_POST['ongkir'];

 // total setelah ongkir

 $total_baru = $total + $ongkir;

 // Status

 $status = "00";

// validasi
 $val = '0';
 // foto

 $foto = $_POST['foto'];

 // tstamps
	 date_default_timezone_set("Asia/Jakarta");
	 $tstamp = date("d-m-Y h:i a");


	 // validasi barang
	 $select = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE kdproduk = '$kdproduk' AND kduser='$kduser'");
	 $row = mysqli_num_rows($select);

	 if ($row) {
	 	echo '<script>alert("Barang dengan Nama '.$nm_produk.' sudah ada dalam pesanan anda")</script>';
	 }else{

	 	// delete checkout

	 	$delete = mysqli_query($koneksi, "DELETE FROM tb_checkout WHERE kdproduk='$kdproduk' AND kduser='$kduser'");

	 	 // save
 $save = mysqli_query($koneksi, "INSERT INTO tb_transaksi SET kdpesanan='$kdpesanan', kdproduk='$kdproduk', nm_produk='$nm_produk', kduser='$kduser', nmuser='$nmuser', alamat='$alamat', kontak='$kontak', jml_beli='$jml_beli', total='$total_baru', status='$status', val = '$val', foto='$foto', tstamp='$tstamp'");
 if ($save) {
 	echo '<script>alert("transaksi sukses")</script>';
 }else{
 	echo '<script>alert("transaksi gagal")</script>';

 }
	 }


}

function validasi__transaksi()
{
	global $koneksi;
	$kdproduk = $_POST['kdproduk'];
	$jml_beli = $_POST['jml_beli'];
	$status = "01";
	$val = "1";
	$kdpesanan = $_POST['kdpesanan'];

	$kduser = $_POST['kduser'];

	//select 

	$select_pro = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE kdproduk='$kdproduk'");
	$row = mysqli_fetch_array($select_pro);
	$stok = $row['stok'];

	// kurangi stok

	$kurang_stok = $stok - $jml_beli;

	// proses kurang stok
	$kurangi = mysqli_query($koneksi, "UPDATE tb_produk SET stok='$kurang_stok' WHERE kdproduk='$kdproduk'");

	$validasi =  mysqli_query($koneksi, "UPDATE tb_transaksi SET status='$status', val='$val' WHERE kdpesanan='$kdpesanan' AND kduser='$kduser'");
}


// ------------------------------------------------------END TRANSACTION SECTION------------------------------------------------------



function select__troli()
{
	global $koneksi;
	$kduser2 = $_SESSION['kduser2'];
	return mysqli_query($koneksi, "SELECT * FROM tb_keranjang WHERE kduser='$kduser2'");
}

function delete__troli()
{
	global $koneksi;
	$kduser = $_POST['kduser'];
    $kdproduk = $_POST['kdproduk'];
    return mysqli_query($koneksi, "DELETE FROM tb_keranjang WHERE kduser='$kduser' AND kdproduk='$kdproduk'");
}




// keep it below


// function gambar2($img, $size)
// {
// 	return '<img src="//localhost/tokoCupang/assets/images/'.$img.'"  width='.$size.'>';
// }





function insert__checkout()
{
	global $koneksi;

	// proses pengkodean pesanan

	$kdpesanan = uniqid();

	$kdproduk = $_POST['kdproduk'];
	$nm_produk = $_POST['nm_produk'];
	$kduser = $_POST['kduser'];
	$nmuser = $_POST['nmuser'];
	$harga = $_POST['harga'];
	$jml_beli = $_POST['jml_beli'];

	// total bayar

	$total = $jml_beli * $harga;

	// foto

	$foto = $_POST['foto'];

	//    // tstamps
	 date_default_timezone_set("Asia/Jakarta");
	 $tstamp = date("d-m-Y h:i a");

	

	

	// delete check out
	 $select = mysqli_query($koneksi, "SELECT * FROM tb_checkout WHERE kduser = '$kduser' AND kdproduk='$kdproduk'");
	 $row = mysqli_num_rows($select);

	// delete troli 
	$select = mysqli_query($koneksi, "SELECT * FROM tb_keranjang WHERE kduser='$kduser' AND kdproduk='$kdproduk'");
	$cek = mysqli_num_rows($select);

	if ($cek) {
		$delete =  mysqli_query($koneksi, "DELETE FROM tb_keranjang WHERE kduser='$kduser' AND kdproduk='$kdproduk'");
		$save = mysqli_query($koneksi, "INSERT INTO tb_checkout SET kdpesanan='$kdpesanan', kdproduk='$kdproduk', nm_produk='$nm_produk',kduser='$kduser', nmuser='$nmuser', jml_beli='$jml_beli', total='$total', foto='$foto', tstamp='$tstamp'");
		if ($save) {
			echo '<script>alert("produk sudah ditambahkan ke check out")</script>';
		}
	}else if ($row) {
		$delete = mysqli_query($koneksi, "DELETE FROM tb_checkout WHERE kduser='$kduser' AND kdproduk='$kdproduk'");
		$save = mysqli_query($koneksi, "INSERT INTO tb_checkout SET kdpesanan='$kdpesanan', kdproduk='$kdproduk', nm_produk='$nm_produk',kduser='$kduser', nmuser='$nmuser', jml_beli='$jml_beli', total='$total', foto='$foto', tstamp='$tstamp'");
		if ($save) {
			echo '<script>alert("produk sudah ditambahkan ke check out")</script>';
		}
	} else{
		$save = mysqli_query($koneksi, "INSERT INTO tb_checkout SET kdpesanan='$kdpesanan', kdproduk='$kdproduk', nm_produk='$nm_produk',kduser='$kduser', nmuser='$nmuser', jml_beli='$jml_beli', total='$total', foto='$foto', tstamp='$tstamp'");
		if ($save) {
			echo '<script>alert("produk sudah ditambahkan ke check out")</script>';
		}
	}
}

function select__checkout()
{
	global $koneksi;
	$kduser = $_GET['kduser'];
	$kdproduk = $_GET['kdproduk'];
	return mysqli_query($koneksi, "SELECT * FROM tb_checkout WHERE kduser='$kduser' AND kdproduk='$kdproduk'");
}


// ---------------------------------------------------------SELECT TRANSACTION--------------------------------------------------------

function select__transaction()
{
	global $koneksi;
	$kduser = $_SESSION['kduser2'];
	return mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE kduser='$kduser'");
}



// KEEEP IT BELOW

// function login

function login($user, $pass)
{
	global $koneksi;
	if (isset($_POST['submit'])) {
		$x = $_POST[$user];
		$y = md5($_POST[$pass]);
		$z = $_POST[$pass];

		// select_kode


		$select = mysqli_query($koneksi, "SELECT * FROM tb_customer WHERE username = '$x' AND password='$y'");
		$cek = mysqli_num_rows($select);
		$r = mysqli_fetch_array($select);

		if ($cek>0) {
			session_start();
			$_SESSION['idtoko2'] = $r['id'];
			$_SESSION['kduser2'] = $r['kduser'];
			$_SESSION['usertoko2'] = $r['username'];

			if (!empty($_POST['ingat'])) {
				setcookie("user_login", $x, time() + (10 * 365 * 24 * 60 * 60));
				setcookie("pass_login", $z, time() + (10 * 365 * 24 * 60 * 60));
			}else{
				if (isset($_COOKIE['user_login'])) {
					setcookie("user_login", "");
				}
				if (isset($_COOKIE['pass_login'])) {
					setcookie("pass_login", "");
				}
			}
			

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


function rupiah($angka){
	$hasil = "Rp. ". number_format($angka,2,',','.');
	return $hasil;
}

 ?>