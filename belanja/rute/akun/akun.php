<?php include 'comp/header.php'; ?>
<?php 

if (isset($_POST['edit'])) {
  echo "<meta http-equiv='refresh' content='0'>";
  update__cust();
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

      <div id="plant" class="section  product mt-5" >
         <div class="container">
            <div class="row">
               <div class="col-md-12 ">
                  <div class="titlepage">
                     <h2><strong class="black" id="product"> Profil</strong> Akun</h2>
                    
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
        	<div class="col-sm-12">
        	<div class="table-responsive">
        		<table class="table table-borderless ml-5">
        			<tbody>
        				<tr>
        					<td>Nama : </td>
        					<td><?php echo $cust['nama']; ?></td>
        				</tr>
        			
        				<tr>
        					<td>Kontak : </td>
        					<td><?=$cust['kontak'];?></td>
        				</tr>
        				<tr>
        					<td>Alamat : </td>
        					<td><?=$cust['alamat'];?></td>
        				</tr>
        					<tr>
        						<td>Foto : </td>
        						<td>
        							           <?php 

							                if ($cust['foto'] != "") {
							                  echo '<img src="../assets/images/customer/'.$cust['foto'].'" width="128">';
							                }else{
							                   echo gambar("default.png", "64");
							                }




             							    ?>

        						</td>
        					</tr>
        					<tr>
        						<td>
        								<!-- Trigger modal edit -->
       				<div data-toggle="modal" data-target="#edit-profil<?= $cust['id'] ?>">
                  <button type="button" class="btn btn-info datapotensi" data-toggle="tooltip" title="Edit">
                    <i class="fa fa-edit"></i>
                  </button>
                </div>
                <!-- Modal edit -->
                          <div class="modal fade" id="edit-profil<?= $cust['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit-profil<?= $adm['id'] ?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <b><p class="modal-title">Edit Akun</p></b>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                 <form action="" method="POST" enctype="multipart/form-data">
                  <input type="hidden" value="<?= $cust['id'] ?>" name="id">

  <div class="form-group">
    <label>Username / Email</label>
    <input type="text" class="form-control" value="<?= $cust['username'];?>" id="exampleInputEmail1" name="username" aria-describedby="emailHelp" placeholder="Masukkan Username">
   
  </div>
    <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" id="exampleInputEmail1" name="password" aria-describedby="emailHelp" required placeholder="Masukkan password">
    
   
  </div>
    <div class="form-group">
    <label>Nama User</label>
    <input type="text" class="form-control" value="<?= $cust['nama'];?>" id="exampleInputEmail1" name="nama" aria-describedby="emailHelp" placeholder="Masukkan nama">
   
  </div>

      <div class="form-group">
    <label>Alamat User</label>
    <input type="text" class="form-control" value="<?= $cust['alamat'];?>" id="exampleInputEmail1" name="alamat" aria-describedby="emailHelp" placeholder="Masukkan nama">
   
  </div>

      <div class="form-group">
    <label>Kontak User</label>
    <input type="text" class="form-control" value="<?= $cust['kontak'];?>" id="exampleInputEmail1" name="kontak" aria-describedby="emailHelp" placeholder="Masukkan kontak">
   
  </div>


   <div class="form-group">
    <label>Foto User</label>
    <br>
<?php 

			 if ($cust['foto'] != "") {
					echo img_admin($cust['foto'], "128");
			}else{
					echo gambar("default.png", "64");
							         }




             							    ?>
   	 <input type="checkbox" name="ubahfoto" value="true">Klik jika ingin ubah foto <br>
  </div>

      <div class="form-group">
    <label>Masukkan Foto Baru</label>
    <input type="file" name="foto">
   
   
  </div>

  <div class="form-group">
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" name="edit" class="btn btn-primary">Save changes</button>
  </div>
  

      </div>
        </form>
                </div>
              </div>
            </div>
        						</td>
        					</tr>
        				</tr>
        			</tbody>
        		</table>
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

     

      

    
<?php include 'comp/footer.php'; ?>