<?php include 'comp/header.php'; ?>
<?php 

	if (isset($_POST['simpan'])) {
		make__transaksi();
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
        		<div class="jumbotron 100 mt-5">
        		<center><h1>Terima Kasih! Mohon untuk mengecek menu status untuk konfirmasi pesanan </h1><br>
        			<h1>Mohon Sediakan Uang : </h1><br>
        			<?php 

        			$total = $_GET['total'];
              $ongkir = $_GET['ongkir'];

              // total setelah ongkir

              $total_baru = $total + $ongkir;
        			 ?>

        			 <h1 style="color: green;"><?=rupiah($total_baru);?></h1><br>
        			 <h1>Saat Barang Sampai</h1>
        		</center>
        	</div>  	
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