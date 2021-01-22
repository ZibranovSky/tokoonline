<?php include 'comp/header.php'; ?>

<?php 

if (isset($_POST['simpan'])) {
  insert__adm();
}

if (isset($_POST['hapus'])) {
  hapus__adm();
}

 ?>
<div class="content-wrapper">
	<div class="container-fluid ml-2 mb-5 mr-5">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 mt-5">Admin</h1>
          </div><!-- /.col -->
          <div class="col-sm-6 mt-2">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->

      <section class="mr-5 ml-2 mt-2-3">
      	      <div class="table-responsive">
      	      	<!-- modal section -->
      	      	<button class="btn btn-primary mb-2 ml-2" data-toggle="modal" data-target="#modaltambah">Tambah Data</button>

      	      

				<!-- Modal -->
				<div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Admin</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                  <label>Username : </label>
                  <input type="text" class="form-control" name="username">
                </div>

            <div class="form-group">
                  <label>Password : </label>
                  <input type="text" class="form-control" name="password">
                </div>
                <div class="form-group">
                  <label>Nama : </label>
                  <input type="text" class="form-control" name="nama">
                </div>
                <div class="form-group">
                  <label>Kontak : </label>
                  <input type="text" class="form-control" name="kontak">
                </div>
                <div class="form-group">
                  <label>Foto : </label>
                  <input type="file" name="foto">
                </div>
                
				        

				      </div>
				      <div class="modal-footer">
				        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				        <button type="submit" name="simpan" class="btn btn-primary">Save changes</button>
                </form>
				      </div>
				    </div>
				  </div>
				</div>

      	      	<!-- end modal section -->

      	<table class="table table-striped ml-2 mr-5">
      		<thead class="thead-dark text-center">
      			<tr>
      				<th>No</th>
      				<th>Nama Admin</th>
      				<th>Kontak</th>
      				<th>Foto</th>
              <th>Aksi</th>
      			</tr>
      		</thead>
      		<tbody class="text-center">
      			<?php 
      			$no = 1;
      			foreach (select__admin2() as $key):

      			 ?>
      			<tr>
      				<td><?=$no++;?></td>
      				<td><?=$key['nama'];?></td>
      				<td><?=$key['kontak'];?></td>
      				<td>
                <?php 

                if ($key['foto'] != "") {
                  echo img_admin($key['foto'], "128");
                }else{
                   echo gambar("default.png", "64");
                }




                 ?>
                
              </td>
              <td>
<button class="btn btn-danger mb-2 ml-2" data-toggle="modal" data-target="#modalhapus<?=$key['id'];?>"><i class="fa fa-trash"></i></button>

              

        <!-- Modal -->
        <div class="modal fade" id="modalhapus<?=$key['id'];?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                  
                  <input type="text"  name="id" value="<?=$key['id'];?>">
          
                <div class="form-group">
                  <label>Nama : </label>
                 <?=$key['nama'];?>
                </div>
                <div class="form-group">
                  <label>Kontak : </label>
                  <?=$key['kontak']?>
                </div>
                <div class="form-group">
                  <label>Foto : </label>
                    <?php 

                if ($key['foto'] != "") {
                  echo img_admin($key['foto'], "128");
                }else{
                   echo gambar("default.png", "64");
                }




                 ?>
                </div>
                
                

              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="hapus" class="btn btn-danger">Hapus</button>
                </form>
              </div>
            </div>
          </div>
        </div>

              </td>

      			</tr><?php endforeach; ?>
      		</tbody>
      	</table>
      </div>  
      </section>

</div>


<?php include 'comp/footer.php'; ?>