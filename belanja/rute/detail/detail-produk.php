<?php include 'comp/header.php'; ?>
<?php 

if (isset($_POST['troli'])) {
  echo "<meta http-equiv='refresh' content='0'>";
  tambah_keranjang();
}

foreach (select__detail() as $row):

 ?>
<!-- body -->
   <body class="main-layout">
      <!-- loader  -->
    
      <!-- end header -->
      <section >
        
            </div>
          <!--   <a class="carousel-control-prev" href="#main_slider" role="button" data-slide="prev">
            <i class='fa fa-angle-left'></i></a>
            <a class="carousel-control-next" href="#main_slider" role="button" data-slide="next">
            <i class='fa fa-angle-right'></i>
            </a> -->
         </div>
      </section>

      <!--about -->
 

            <!-- plant -->
            <div class="mr-5 mt-5 ml-3 fixed">

            </div>

      <div id="plant" class="section  product mt-3" >
         <div class="container">
            <div class="row">
               <div class="col-md-12 mt-5">
                  <div class="titlepage">
                     
                    
                  </div>
               </div>
            </div>
         </div>
      </div>
      					
                          <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <div class="row">
        	<div class="col-md-5 ml-3 mb-2">
           <?php 

           echo '<img src="../assets/images/produk/'.$row['foto'].'" width="512">';

            ?> 
          </div>
          <div class="col-md-5">
            <h1 class="ml-3"><?=$row['nm_produk'];?></h1>
            
            <h2><strong class="ml-3" style="color: orange;"><?=rupiah($row['harga']);?></strong></h2>

            <?php 

              if ($row['jenis'] == "partai") {
              echo '<h2 class="text-success ml-3 mt-3">Partai</h2>';
             
            }else if($row['stok'] > 10) {
              echo '<h2 class="text-success ml-3 mt-3"> Stok Sisa '.$row['stok'].'</h2>';
            }else{
               echo '<h2 class="text-danger ml-3" mt-3> Stok Sisa '.$row['stok'].'</h2>';
            }

             ?>

          


             <?php 

             if ($row['jenis'] == "satuan") {
               echo '<h1 class="ml-3 mt-3" style="color: gray;">Satuan</h1>';
             }else if($row['jenis'] == "partai"){
              echo '<h1 class="ml-3 mt-3" style="color: gray;">
                  Untuk pembelian partai bisa nego, hubungi nomor admin di tombol hubungi kami terlebih dahulu
                </h1>';
             }

              ?>

            <h1 class="mt-5 ml-3">Deskripsi</h1>
            
            <p class="ml-3"><?=$row['deskripsi'];?></p>

            <form action="" method="POST">
              <input type="hidden" value="<?=$cust['kduser'];?>" name="kduser">
              <input type="hidden" value="<?=$row['kdproduk'];?>" name="kdproduk">
              <input type="hidden" value="<?=$row['nm_produk'];?>" name="nm_produk">
              <input type="hidden" value="<?=$row['harga'];?>" name="harga">
              <input type="hidden" value="<?=$row['jenis'];?>" name="jenis">

              <input type="hidden" value="<?=$row['foto'];?>" name="foto">
              <!-- Modal Checkout -->

                 <!-- End Modal Checkout -->
                  <button type="submit" name="troli"

                  <?php 

                  global $koneksi;
                  $kduser = $cust['kduser'];  
                  $kdproduk = $row['kdproduk'];

                  $select = mysqli_query($koneksi, "SELECT * FROM tb_keranjang WHERE kduser = '$kduser' AND kdproduk='$kdproduk'");
                  $cek = mysqli_num_rows($select);

                  if ($cek) {
                     echo 'disabled';
                   } 

                   ?>

                   class="btn btn-warning mb-5 ml-3">Tambah Ke Troli</button>
                   <button <?php if ($row['jenis']=="partai") {
                     echo "disabled";
                   } ?> type="button" class="btn btn-success mb-5 ml-3" data-toggle="modal" data-target="#exampleModal">
  Checkout
</button>
              </form>

              <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Checkout Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <form action="?r=detail&s=checkout&kduser=<?=$cust['kduser'];?>&kdproduk=<?=$row['kdproduk'];?>" method="POST">
         
          <label>Nama Produk : </label><br>
          <strong><?=$row['nm_produk'];?></strong>
          <input type="hidden" hidden="" value="<?= $row['kdproduk'];?>" name="kdproduk">
          <input type="hidden" hidden="" value="<?= $row['nm_produk'];?>" name="nm_produk">
          <input type="hidden" hidden value="<?=$cust['kduser'];?>" name="kduser">
          <input type="hidden" hidden="" value="<?= $cust['nama'];?>" name="nmuser">
          <input type="hidden" value="<?=$row['foto'];?>" name="foto">
          <input type="hidden" value="<?=$row['harga'];?>" name="harga">

     
          
          
        </div>
        <div class="form-group">
          
          <label>Harga Produk : </label><br>
          <strong><?= rupiah($row['harga']);?></strong>
          
         
        </div>

        <div class="form-group">
          <label>Kuantitas : </label>
          <input type="number" class="form-control" name="jml_beli">
        </div>

        <div class="form-group">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" name="lanjut" class="btn btn-success">Lanjut Ke Pembayaran</button>
        </div>   
          </form>


      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>


          </div>
        </div>

      </div> 
        <!-- /.row -->
        <!-- Main row -->
      
          </section>
           
      </div>
      <!-- end plant -->


      </div>
      <!-- end about -->
      <!--Our  Clients -->


         </div>
      </div>
   </div>
      <!-- end Our  Clients -->
      <!-- start Contact Us-->

     
<?php endforeach;  ?>

<?php include 'comp/footer.php'; ?>