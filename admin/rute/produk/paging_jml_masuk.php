<?php 
$koneksi = mysqli_connect('localhost', 'root', '', 'toko_cupang');

    $batas = 5;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

$previous = $halaman - 1;
$next = $halaman + 1;

$data = mysqli_query($koneksi, "SELECT * FROM tb_produk_masuk");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);


$nomor = $halaman_awal+1;


// cari
if (isset($_POST['go'])) {
  $cari = $_POST['cari'];
  $data = mysqli_query($koneksi, "SELECT * FROM tb_produk_masuk WHERE nama LIKE '%".$cari."%'");
}else{
  $data = mysqli_query($koneksi, "SELECT * FROM tb_produk_masuk LIMIT $halaman_awal, $batas");
}


foreach ($data as $pro):
  ?>
    



<tr>
                              <td><?= $no++;  ?></td>
                              <td><?=  $pro['noinv'];?></td>
                              <td><?=  $pro['kdproduk'];?></td>
                              <td><?=  $pro['nm_produk'];?></td>
                              <td><?=  $pro['stok'];?></td>
                              <td><?=  $pro['jml_masuk'];?></td>
                              <td><?=  $pro['tstamp'];?></td>
                              <td><?=  $pro['admin'];?></td>

                             



                                                      <!-- hapus-0------------------------------------------------------------- -->
                            

                              </tr> 
                              <?php endforeach; ?>
