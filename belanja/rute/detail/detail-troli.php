<?php include 'comp/header.php'; ?>
<?php 



if (isset($_POST['hapus'])) {
	echo "<meta http-equiv='refresh' content='0'>";
	delete__troli();
}


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
        <?php foreach (select__troli() as $row): ?>
        <div class="row">
        	<div class="col-md-5 ml-3 mb-2">
           <?php 

           echo '<img src="../assets/images/produk/'.$row['foto'].'" width="512">';

            ?> 
          </div>
          <div class="col-md-5">
            <h1 class="ml-3"><?=$row['nm_produk'];?></h1>
            <hr width="500">
            <h2><strong class="ml-3" style="color: orange;"><?=rupiah($row['harga']);?></strong></h2>
			

            <form action="" method="POST">

              <!-- Hapus_section -->
              <input type="hidden" value="<?=$row['kduser'];?>" name="kduser">
              <input type="hidden" value="<?=$row['kdproduk'];?>" name="kdproduk">
              <!-- <input type="hidden" value="<?=$row['nm_produk'];?>" name="nm_produk">
              <input type="hidden" value="<?=$row['foto'];?>" name="foto"> -->
              
                 <button type="button" <?php if ($row['jenis']=="partai") {
                   echo "disabled";
                 } ?> class="btn btn-success mb-5 ml-3" data-toggle="modal" data-target="#exampleModal<?=$row['kdproduk'];?>">
                Checkout
              </button>
                  <button type="submit" name="hapus" class="btn btn-danger mb-5 ml-3">Hapus Dari Troli</button>
                <!-- end hapus section -->
              </form>

              <!-- Modal -->
<div class="modal fade" id="exampleModal<?=$row['kdproduk'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        </div><?php endforeach;  ?>


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

     


<?php include 'comp/footer.php'; ?>