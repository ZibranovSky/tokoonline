<?php include 'comp/header.php'; ?>
<?php 

if (isset($_POST['ubah'])) {
  ubah__status();
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
      	      	
      	      	<!-- end modal section -->

      	<table class="table table-striped ml-2 mr-5">
      		<thead class="thead-dark text-center">
      			<tr>
      				<th>No</th>
      				<th>Kode Pesanan</th>
      				<th>Nama Produk</th>
      				<th>Nama User</th>
      				<th>Alamat</th>
      				<th>Kontak</th>
      				<th>Qty</th>
      				<th>Total</th>
      				<th>Status</th>
      				<th>Foto</th>
              <th>Aksi</th>
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
                    <a class="page-link" <?php if($halaman > 1){ echo "href='?r=pesanan&halaman=$previous'"; } ?>>Previous</a>
                </li>
                <?php 
                for($x=1;$x<=$total_halaman;$x++){
                    ?> 
                    <li class="page-item"><a class="page-link" href="?r=pesanan&halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                    <?php
                }
                ?>              
                <li class="page-item">
                    <a  class="page-link" <?php if($halaman < $total_halaman) { echo "href='?r=pesanan&halaman=$next'"; } ?>>Next</a>
                </li>
            </ul>
              </center>  
      </section>


</div>
<?php include 'comp/footer.php'; ?>