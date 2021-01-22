<?php 
$koneksi = mysqli_connect('localhost', 'root', '', 'toko_cupang');

    $batas = 5;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

$previous = $halaman - 1;
$next = $halaman + 1;

$data = mysqli_query($koneksi, "SELECT * FROM tb_customer");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);


$nomor = $halaman_awal+1;


// cari
if (isset($_POST['go'])) {
  $cari = $_POST['cari'];
  $siswa = mysqli_query($koneksi, "SELECT * FROM tb_customer WHERE nama LIKE '%".$cari."%'");
}else{
  $siswa = mysqli_query($koneksi, "SELECT * FROM tb_customer LIMIT $halaman_awal, $batas");
}


foreach ($siswa as $pro):
  ?>
    



<tr>
                              <td><?= $no++;  ?></td>
                              <td><?=  $pro['kduser'];?></td>
                              <td><?=  $pro['nama'];?></td>
                              <td><?=  $pro['kontak'];?></td>
                              <td><?=  $pro['alamat'];?></td>
                              
                              <td>
                                <?php 

                                if ($pro['foto'] == "") {
                                  echo gambar("default.png", "120");
                                }else{
                                  echo '<img src="../assets/images/customer/'.$pro['foto'].'" width="120">';
                                }

                                 ?>
                                  
                                </td>



                                                      
                   

                              </tr> 
                              <?php endforeach; ?>
