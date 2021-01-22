<?php include 'comp/header.php'; ?>
<?php 

if (isset($_POST['confirm'])) {
  validasi__transaksi();
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

      <div id="plant" class="section product mt-5 mb-5" >
         <div class="container">
            <div class="row">
               
         </div>
      </div>
      					
                          <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <div class="row">
        	<div class="col-md-11 ml-5 mr-5">
        		<?php foreach (select__transaction() as $tra): ?>
        			
        		
        		<div class="jumbotron  mt-5">
        		<?php 

        		echo '<img src = "../assets/images/produk/'.$tra['foto'].'" width="128">';

        		 ?>

        	<h1><?=$tra['nm_produk'];?></h1>
        	<h3><?=rupiah($tra['total']);?></h3>
        	<h3>X <?=$tra['jml_beli'];?></h3>
        	<h3>
        		<?php 

        		if ($tra['status'] == "00") {
        			echo '<h3 style="color: orange;">Anda Harus Mengkonfirmasi Pesanan Terlebih Dahulu</h3>';
        		}else if($tra['status'] == "01"){
              echo '<h3 style="color: orange;">Pesanan Diterima Admin</h3>';
            }else if($tra['status'] == "10"){
              echo '<h3 style="color: green;">Pesanan Diantar</h3>';
            }else if($tra['status']=="11"){
              echo '<h3 style="color: green;">Pesanan Sampai</h3>';
            }
              
        		 ?>
        	</h3>
          <form action="" method="POST">
            <input type="hidden" value="<?=$tra['kdpesanan'];?>" hidden name="kdpesanan">
            <input type="hidden" value="<?=$tra['kduser'];?>" hidden name="kduser">
            <input type="hidden" hidden value="<?=$tra['kdproduk'];?>" name="kdproduk">
            <input type="hidden" hidden value="<?=$tra['jml_beli'];?>" name="jml_beli">


            <button class="btn mt-2" name="confirm" <?php 


            if ($tra['val'] == "1") {
              echo "disabled";
            }

             ?> style="color: white; background-color: orange;">Konfirmasi Pesanan</button>  
          </form>
          
        		 

        		</div> <?php endforeach ?> 	
        	</div>
        	


          

          </div>
        </div>

      
        <!-- /.row -->
        <!-- Main row -->
      
          </section>
           
      </div>
      <!-- end plant -->


      <!-- end Our  Clients -->
      <!-- start Contact Us-->

<?php include 'comp/footer.php'; ?>