<?php include 'comp/header.php'; ?>
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

      <div id="plant" class="section  product mt-5" >
         <div class="container">
            <div class="row">
               <div class="col-md-12 ">
                  <div class="titlepage">
                     <h2><strong class="black" id="product"> Pembelian</strong>  Partai</h2>
                       
                  </div>
               </div>
            </div>
            <div class="row">
              <div class="col-md-5">
                
              </div>
            </div> 
         </div>
      </div>
      					
                      <div class="clothes_main section ">
          <div class="container">   
            <div class="row">

              <?php 

                foreach (select__product_partai() as $pro):

                 ?>
               <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12">
                  <div class="sport_product">
                 
                     <figure><?= '<img src="../assets/images/produk/'.$pro['foto'].'">';?></figure>
                    <h3><strong class="price_text"><?= rupiah($pro['harga']);?></strong></h3>
                     <h4><?=$pro['nm_produk']?></h4>
                     <a href="?r=detail&pid=<?=$pro['kdproduk'];?>"><button class="btn btn-primary mt-2">Beli</button></a>
                  </div>
               </div><?php endforeach; ?>
              
             </div>
            </div>
           </div>
           
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