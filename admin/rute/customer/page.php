<?php include 'comp/header.php'; ?>
<?php 

if (isset($_POST['hapus'])) {
	
}

 ?>
<div class="content-wrapper">
	<div class="container-fluid ml-2 mb-5 mr-5">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 mt-5"><?=$judul;?></h1>
          </div><!-- /.col -->
          <div class="col-sm-6 mt-2">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active"><?=$judul;?></li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->

      <section class="mr-5 ml-2 mt-2-3">
      	      <div class="table-responsive">
      	      	<!-- modal section -->
      	      <!-- 	<button class="btn btn-primary mb-2 ml-2" data-toggle="modal" data-target="#modaltambah">Tambah Data</button> -->

      	      

				<!-- Modal -->
				<!-- <div class="modal fade" id="modaltambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
				  <div class="modal-dialog" role="document">
				    <div class="modal-content">
				      <div class="modal-header">
				        <h5 class="modal-title" id="exampleModalLabel">Tambah Data Produk</h5>
				        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
				          <span aria-hidden="true">&times;</span>
				        </button>
				      </div>
				      <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                  <label>Kode Produk : </label>
                  <input type="text" class="form-control" name="kdproduk">
                </div>

            <div class="form-group">
                  <label>Nama Produk : </label>
                  <input type="text" class="form-control" name="nm_produk">
                </div>
                <div class="form-group">
                  <label>Stok : </label>
                  <input type="text" class="form-control" name="stok">
                </div>
                <div class="form-group">
                  <label>Harga : </label>
                  <input type="text" class="form-control" name="harga">
                </div>
                <div class="form-group">
                  <label>Deskripsi : </label>
                  <textarea name="deskripsi" class="form-control"></textarea>
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
				</div> -->

      	      	<!-- end modal section -->

      	<table class="table table-striped ml-2 mr-5">
      		<thead class="thead-dark text-center">
      			<tr>
      				<th>No</th>
      				<th>Kode User</th>
      				<th>Nama Customer</th>
      				<th>Kontak</th>
      				<th>Alamat</th>
      				<th>Foto</th>
      				
             
              
      			</tr>
      		</thead>
      		<tbody class="text-center">
      			<?php 
      			$no = 1;
      			include 'paging.php';

      			 ?>
      			
      		</tbody>
      	</table>
      </div>
          <center><ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php if($halaman > 1){ echo "href='?r=customer&halaman=$previous'"; } ?>>Previous</a>
                </li>
                <?php 
                for($x=1;$x<=$total_halaman;$x++){
                    ?> 
                    <li class="page-item"><a class="page-link" href="?r=customer&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                    <?php
                }
                ?>              
                <li class="page-item">
                    <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?r=customer&halaman=$next'"; } ?>>Next</a>
                </li>
            </ul>
              </center>   
      </section>


</div>
<?php include 'comp/footer.php'; ?>
