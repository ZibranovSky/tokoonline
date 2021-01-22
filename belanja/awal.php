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
                     <h2><strong class="black" id="product"> Happy</strong>  Shopping</h2>
                       
                  </div>
               </div>
            </div>
            <div class="row">
              <div class="col-md-5">
                <div class="jumbotron">
                  
                     <form action="" method="POST">
  <div class="form-row align-items-center">
    <div class="col-auto">
      <label class="sr-only" for="inlineFormInput">Name</label>
      <input type="text" class="form-control" name="cari" id="inlineFormInput" placeholder="contoh : cupang abc">
    </div>
<!--     <div class="col-auto">
      <label class="sr-only" for="inlineFormInputGroup">Username</label>
      <div class="input-group mb-2">
        <div class="input-group-prepend">
          <div class="input-group-text">@</div>
        </div>
        <input type="text" class="form-control" id="inlineFormInputGroup" placeholder="Username">
      </div>
    </div>
    <div class="col-auto">
      <div class="form-check mb-2">
        <input class="form-check-input" type="checkbox" id="autoSizingCheck">
        <label class="form-check-label" for="autoSizingCheck">
          Remember me
        </label>
      </div>
    </div> -->
    
      <button type="submit" name="go" class="btn btn-success"><i class="fa fa-search"></i></button>
  
  </div>
</form>
                      
                    
                </div>
              </div>
            </div> 
         </div>
      </div>
      					
                      <div class="clothes_main section ">
          <div class="container">   
            <div class="row">

              <?php 

                foreach (select__product() as $pro):

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