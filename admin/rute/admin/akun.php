<?php include 'comp/header.php'; ?>
<?php 

if (isset($_POST['edit'])) {
		echo "<meta http-equiv='refresh' content='0'>";

		update__user();
}

 ?>
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Detail <?= $adm['nama']; ?></h1><br>

          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Detail <?= $adm['nama'];?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->

        <div class="row">
        	<div class="col-sm-12">
        	<div class="table-responsive">
        		<table class="table table-borderless">
        			<tbody>
        				<tr>
        					<td>Nama : </td>
        					<td><?php echo $adm['nama']; ?></td>
        				</tr>
        			
        				<tr>
        					<td>Kontak : </td>
        					<td><?=$adm['kontak'];?></td>
        				</tr>
        					<tr>
        						<td>Foto : </td>
        						<td>
        							           <?php 

							                if ($adm['foto'] != "") {
							                  echo img_admin($adm['foto'], "128");
							                }else{
							                   echo gambar("default.png", "64");
							                }




             							    ?>

        						</td>
        					</tr>
        					<tr>
        						<td>
        								<!-- Trigger modal edit -->
       				<div data-toggle="modal" data-target="#edit-profil<?= $adm['id'] ?>">
                  <button type="button" class="btn btn-info datapotensi" data-toggle="tooltip" title="Edit">
                    <i class="fa fa-edit"></i>
                  </button>
                </div>
                <!-- Modal edit -->
                          <div class="modal fade" id="edit-profil<?= $adm['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit-profil<?= $adm['id'] ?>" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                  <b><p class="modal-title" id="edit-profil<?= $adm['id'] ?>" style="text-align: center; font-size: 18px;">Edit Data Admin</p></b>
                </div>
                <!-- Modal Body -->
                <div class="modal-body">
                 <form action="" method="POST" enctype="multipart/form-data">
                  <input type="hidden" value="<?= $adm['id'] ?>" name="id">

  <div class="form-group">
    <label>Username</label>
    <input type="text" class="form-control" value="<?= $adm['username'];?>" id="exampleInputEmail1" name="username" aria-describedby="emailHelp" placeholder="Masukkan Username">
   
  </div>
    <div class="form-group">
    <label>Password</label>
    <input type="password" class="form-control" id="exampleInputEmail1" name="password" aria-describedby="emailHelp" required placeholder="Masukkan password">
    
   
  </div>
    <div class="form-group">
    <label>Nama User</label>
    <input type="text" class="form-control" value="<?= $adm['nama'];?>" id="exampleInputEmail1" name="nama" aria-describedby="emailHelp" placeholder="Masukkan nama">
   
  </div>

      <div class="form-group">
    <label>Kontak User</label>
    <input type="text" class="form-control" value="<?= $adm['kontak'];?>" id="exampleInputEmail1" name="kontak" aria-describedby="emailHelp" placeholder="Masukkan kontak">
   
  </div>


   <div class="form-group">
    <label>Foto User</label>
    <br>
<?php 

			 if ($adm['foto'] != "") {
					echo img_admin($adm['foto'], "128");
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
        				</tr>
        			</tbody>
        		</table>
        	</div>
        </div>

      </div> 
        <!-- /.row -->
        <!-- Main row -->
      
          </section>
              <!-- /.card-body -->
              
            <!-- /.card -->

            <!-- solid sales graph -->
           </div>



<?php include 'comp/footer.php'; ?>