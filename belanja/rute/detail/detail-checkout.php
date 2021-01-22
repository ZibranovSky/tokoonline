<?php include 'comp/header.php'; ?>
<?php 




if (isset($_POST['lanjut'])) {
  
  
  insert__checkout();
}


foreach (select__checkout() as $check):
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
        	               <div class="col-md-6 mt-5 ml-3">
        		<div class="jumbotron mb-5">
        			<h1>Pesanan Anda</h1>
        			<hr class="my-4">
        			<?php echo '<img src="../assets/images/produk/'.$check['foto'].'" width="128">'; ?>

        			<strong class="ml-3"><?=$check['nm_produk'];?></strong>
        		</div>

            </div>
            <div class="col-md-4 mr-3 mt-5">
            	<div class="jumbotron">
                
                  <button class="btn" data-toggle="modal" data-target="#exampleModal" style="background-color: orange; width: 100%;">Buat Pesanan</button>  

                  <!-- Modal Section -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
          <form action="?r=sukses&total=<?=$check['total'];?>&ongkir=6000" method="POST">
         
          <label><h1><strong>Konfirmasi</strong></h1></label><br>
         
          <input type="hidden" hidden value="<?=$check['kdpesanan'];?>" name="kdpesanan">
          <input type="hidden" hidden value="<?=$check['kdproduk'];?>" name="kdproduk">
          <input type="hidden" hidden value="<?=$check['nm_produk'];?>" name="nm_produk">
          <input type="hidden" hidden value="<?=$check['kduser'];?>" name="kduser">
          <input type="hidden" hidden value="<?=$check['nmuser'];?>" name="nmuser">
          <input type="hidden" hidden value="<?=$cust['alamat'];?>" name="alamat">
          <input type="hidden" hidden value="<?=$cust['kontak'];?>" name="kontak">
          <input type="hidden" hidden value="<?=$check['jml_beli'];?>" name="jml_beli">
          <input type="hidden" hidden value="<?=$check['total'];?>" name="total">
          <input type="hidden" hidden value="6000" name="ongkir"> 
           <input type="hidden" hidden value="<?=$check['foto'];?>" name="foto">

     
          <hr width="500">
          
        </div>
        <div class="form-group"> 
          <h1>Jawab Pertanyaan Ini : </h1>
          <h3>Ada Berapa Sila Dalam Pancasila ? </h3>
        </div>

          <div class="form-group"> 
          <input type="number" id="jawab" required="" class="form-control" name="jawab">
        </div>

        <div>
          <span id="message"></span>
        </div>


        <div>
          <script type="text/javascript">
            var jawab = document.getElementById("jawab");
            var message = document.getElementById("message");
            var btn = document.getElementById("lanjut");
            var jawaban = "5";

            jawab.addEventListener('keyup', function(){
              if (jawab.value != jawaban) {
                lanjut.disabled = true;
                message.style.color = "red";
                message.textContent = "Jawaban Anda salah";
                
              }else if (jawab.value == jawaban){
                 lanjut.disabled = false;
                 message.style.color = "green";
                message.textContent = "Jawaban Anda Benar";
               
              }
            })


          </script>


          
        </div>
        <div class="form-group">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        <button type="submit" name="simpan"  id="lanjut"  class="btn btn-success">Lanjut Ke Pembayaran</button>
        </div>   
          </form>


      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>
                  <!-- End Modal Section -->
            
            		
            		<hr class="my-4">
            		<i class="fa fa fa-map-marker"><b class="ml-2"><?=$check['nmuser'];?></b></i>
                <?php 

                global $koneksi;
                $kduser = $_GET['kduser'];

                $select = mysqli_query($koneksi, "SELECT * FROM tb_customer WHERE kduser='$kduser'");
                $r = mysqli_fetch_array($select);
                echo '<p>'.$r['alamat'].'</p>';
                 ?>
            		
                <i class="fa fa-phone mt-2"><b class="ml-2"><?=$cust['kontak'];?></b></i>
                <b class="ml-3"><a href="?r=akun">Ubah Detail?</a></b><br>
            		 <hr class="my-4">
            		 <h1>Rangkuman Pesanan</h1> 
                 <strong>Kode Pesanan : <?=$check['kdpesanan'];?></strong><br>
                 <strong>Jumlah Beli : <?=$check['jml_beli'];?></strong><br>
                 <strong>Total Bayar : <?='<strong style="color: orange;">'.rupiah($check['total']).'</strong>';?></strong><br>
                 <strong style="color: orange;">Ongkos Kirim : <?=rupiah(6000);?></strong>


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


<?php endforeach; ?>
<?php include 'comp/footer.php'; ?>