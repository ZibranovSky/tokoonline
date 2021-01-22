<?php 
$koneksi = mysqli_connect('localhost', 'root', '', 'toko_cupang');

    $batas = 5;
$halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
$halaman_awal = ($halaman>1) ? ($halaman * $batas) - $batas : 0;

$previous = $halaman - 1;
$next = $halaman + 1;

$data = mysqli_query($koneksi, "SELECT * FROM tb_produk");
$jumlah_data = mysqli_num_rows($data);
$total_halaman = ceil($jumlah_data / $batas);


$nomor = $halaman_awal+1;


// cari
if (isset($_POST['go'])) {
  $cari = $_POST['cari'];
  $siswa = mysqli_query($koneksi, "SELECT * FROM tb_produk WHERE nama LIKE '%".$cari."%'");
}else{
  $siswa = mysqli_query($koneksi, "SELECT * FROM tb_produk LIMIT $halaman_awal, $batas");
}


foreach ($siswa as $pro):
  ?>
    



<tr>
                              <td><?= $no++;  ?></td>
                              <td><?=  $pro['kdproduk'];?></td>
                              <td><?=  $pro['nm_produk'];?></td>
                              <td><?=  $pro['stok'];?></td>
                              <td><?=  $pro['harga'];?></td>
                              <td><?=  $pro['deskripsi'];?></td>
                              <td><?=  $pro['jenis'];?></td>
                              <td>
                                <?=  '<img src="../assets/images/produk/'.$pro['foto'].'" width="128">';?>
                                  
                                </td>



                                                      <!-- hapus-0------------------------------------------------------------- -->
                             
                                                        <td><button class="btn btn-danger" data-toggle="modal" data-target="#hapus<?=$pro['id'];?>"><i class="fa fa-trash"></i></button>
                                      <div class="modal fade" id="hapus<?=$pro['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Apakah anda yakin?</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                            <div class="modal-body">
                                             <form action="" method="POST" enctype="multipart/form-data">
                                              <input type="hidden" name="id" value="<?=$pro['id'];?>" hidden>

                                               <label>Kode Produk : </label>
                                               <b><?=$pro['kdproduk'];?></b><br>
                                             
                                             <label>Nama Produk : </label>
                                               <b><?=$pro['nm_produk'];?></b><br>

                                               <label>Stok : </label>
                                               <b><?=$pro['stok'];?></b><br>

                                               <label>Harga : </label>
                                               <b><?=$pro['harga'];?></b><br>

                                               <label>Deskripsi : </label>
                                               <b><?=$pro['deskripsi'];?></b><br>

                                               <label>Foto : </label>
                                               <b>   <?=  '<img src="../assets/images/produk/'.$pro['foto'].'" width="128">';?></b><br>
                                              

                                              <div class="modal-footer mt-2">
                                              <button type="submit" name="hapus" class="btn btn-danger">Hapus</button>
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            </div>
                                             </form>
                                            </div>
                                          
                                          </div>
                                        </div>
                                      </div>

                                    </td>

                            <!-- EDIT------------------------------------------------------------------------------------ -->

                    <!-- Button trigger modal -->
                    <td>
            <button type="button" class="btn btn-success ml-2" data-toggle="modal" data-target="#edit<?=$pro['id'];?>">
            <i class="fa fa-paper-plane" aria-hidden="true"></i>
            </button>

        <!-- Modal -->
            <div class="modal fade" id="edit<?=$pro['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Data Kelas</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                      <input type="hidden" hidden name="id" value="<?=$pro['id'];?>">
                            <div class="form-group">
                  <label>Kode Produk : </label>
                  <input type="text" class="form-control" value="<?=$pro['kdproduk'];?>" name="kdproduk">
                </div>

            <div class="form-group">
                  <label>Nama Produk : </label>
                  <input type="text" class="form-control" value="<?=$pro['nm_produk'];?>" name="nm_produk">
                </div>
                <div class="form-group">
                  <label>Stok : </label>
                  <input type="text" class="form-control" value="<?=$pro['stok'];?>" name="stok">
                </div>
                <div class="form-group">
                  <label>Harga : </label>
                  <input type="text" class="form-control" value="<?=$pro['harga'];?>" name="harga">
                </div>
                <div class="form-group">
                  <label>Deskripsi : </label>
                  <input type="text"  value="<?=$pro['deskripsi'];?>" name="deskripsi" class="form-control">
                </div>
                <div class="form-group">
                  <label>Jenis : </label>
                  <select name="jenis" class="form-control">
                    <option value="satuan">satuan</option>
                    <option value="partai">partai</option>

                  </select>
                </div>


                  <?=  '<img src="../assets/images/produk/'.$pro['foto'].'" width="128">';?><br>

                <input type="checkbox" name="ubahfoto" value="true">Klik jika ingin ubah foto <br>
                <div class="form-group">
                  <label>Foto : </label>
                  <input type="file" name="foto">
                </div>


                  
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="edit" class="btn btn-primary">Save changes</button>
                  </div>
                    </form>
            
                </div>
              </div>
            </div>

      

                          </td>

                              </tr> 
                              <?php endforeach; ?>
