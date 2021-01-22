<?php 
$koneksi = mysqli_connect('localhost', 'root', '', 'toko_cupang');

    $batas = 5;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

$previous = $halaman - 1;
$next = $halaman + 1;

$data = mysqli_query($koneksi, "SELECT * FROM tb_transaksi");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);


$nomor = $halaman_awal+1;


// cari
if (isset($_POST['go'])) {
  $cari = $_POST['cari'];
  $siswa = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE nama LIKE '%".$cari."%'");
}else{
  $siswa = mysqli_query($koneksi, "SELECT * FROM tb_transaksi WHERE val='1' LIMIT $halaman_awal, $batas");
}


foreach ($siswa as $pro):
  ?>
    



<tr>
                              <td><?= $no++;  ?></td>
                              <td><?=  $pro['kdpesanan'];?></td>
                              <td><?=  $pro['nm_produk'];?></td>
                              <td><?=  $pro['nmuser'];?></td>
                              <td><?=  $pro['alamat'];?></td>
                              <td><?=  $pro['kontak'];?></td>
                              <td><?=  $pro['jml_beli'];?></td>
                              <td><?=  $pro['total'];?></td>
                              <td>
                                <form action="" method="POST">
                                  <input type="hidden" hidden name="kdpesanan" value="<?=$pro['kdpesanan'];?>">
                                  <select name="status">
                                  
                                  <option>
                                    <?php 
                                      if ($pro['status']=="01") {
                                        echo 'Pesanan Masuk';
                                      }else if($pro['status'] == "10"){
                                        echo 'Diantar';
                                      }else if($pro['status'] == "11")
                                        echo 'diterima';
                                     ?>
                                  </option>
                                  <option value="10">Diantar</option>
                                  <option value="11">Diterima</option>

                                </select>
                                <button type="submit" name="ubah" class="btn btn-success mt-2">ubah</button>  
                                </form>
                                
                                
                              </td>
                              <td>
                                <?=  '<img src="../assets/images/produk/'.$pro['foto'].'" width="128">';?>
                                  
                                </td>



                                                      <!-- hapus-0------------------------------------------------------------- -->
                            

                              </tr> 
                              <?php endforeach; ?>
