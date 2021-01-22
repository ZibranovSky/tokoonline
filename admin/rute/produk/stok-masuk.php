<?php include 'comp/header.php'; ?>

<?php 

	if (isset($_POST['simpan'])) {
		insert__stok();
	}

  if (isset($_POST['hapus'])) {
    hapus_all_stock();
  }
 ?>
<div class="content-wrapper">
	<div class="container-fluid ml-2 mb-5 mr-5">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h2 class="m-0 mt-5"><?=$judul;?></h2>
          </div><!-- /.col -->
          <div class="col-sm-6 mt-2">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->

      <section class="mr-4 ml-3 mt-2-3">
      	<div id="accordion">

  <div class="card">
    <div class="card-header">
      <a class="card-link" style="text-decoration: none;" data-toggle="collapse" href="#collapseOne">
        Tambah Data
      </a>
    </div>
    <div id="collapseOne" class="collapse" data-parent="#accordion">
      <div class="card-body">
        <form action="" method="POST">
        	<div class="form-group">
        		<label>No Inv</label>
        		<input type="number" name="noinv" class="form-control">

        	</div>
        	<div class="form-group">
        		<label>Kode Produk</label>
        		<input type="text" name="kdproduk" id="kdproduk" class="form-control">
        		  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalproduk">Cari Kode Produk</button>        		
        	</div>
        	<div class="form-group">
        		<label>Nama Produk</label>
        		<input type="text" name="nm_produk" id="nm_produk" class="form-control">
        		
        	</div>
        	<div class="form-group">
        		<label>Stok Produk</label>
        		<input type="text" name="stok" id="stok" class="form-control">
        		
        	</div>
        	<div class="form-group">
        		<label>Jumlah Masuk</label>
        		<input type="text" name="jml_masuk" class="form-control">
        		
        	</div>
        	<div class="form-group">
        		<label>Admin</label>
        		<input type="text" name="admin" value="<?=$adm['nama'];?>"  class="form-control">
        		
        	</div>

        	<div class="form-group">
        		<button type="submit" name="simpan" class="btn btn-success">Tambah Stok</button>
        	</div>
        
        </form>
      </div>
    </div>
  </div>

  <!-- modal cari kode produk -->

  	 <div id="modalproduk" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
     
        <div class="modal-header">
          <center>
          <h3 class="modal-title">Pilih Kode Produk</h3>
          </center>
        </div>
          <div class="modal-body">
            
            
            
            
              <table width="100%" class="table table-hover"  id="example">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Produk</th>
                                        <th>Nama Produk</th>
                                        <th>Stok</th>
                                      </tr>
                                </thead>
                                <tbody>
                    <?php
                      $no = 1;
                      $data = mysqli_query ($koneksi, " SELECT  *
                                            from 
                                            tb_produk
                                            order by id ASC");
                      foreach ($data as $sa):
                        
                      
                    ?>
                  <tr id="tb_produk" data-kdproduk="<?= $sa['kdproduk'];?>" data-nm_produk="<?= $sa['nm_produk'];?>" data-stok="<?= $sa['stok'];?>">
                    <td>
                      <?php echo $no++; ?>
                    </td>
                    <td>
                      <?php echo $sa['kdproduk']; ?>
                    </td>
                    <td>
                      <?php echo $sa['nm_produk']; ?>
                    </td>
                    <td>
                      <?php echo $sa['stok']; ?>
                    </td>
                    
                    
                  </tr>
                  <?php
                    endforeach;
                  ?>
                            </table>
            
            
          </div>  
          
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
          </div>
      </div>
    </div>
  </div>
  


  <!-- End Modal  -->

  <div class="card">
    <div class="card-header">
      <a class="collapsed card-link" style="text-decoration: none;" data-toggle="collapse" href="#collapseTwo">
        Tampil Data
      </a>
    </div>
    <div id="collapseTwo" class="collapse" data-parent="#accordion">
      <div class="card-body">
        <div class="table-responsive"> 
          <form action="" method="POST">
                 <button type="submit" onclick="return confirm('yakin ingin dihapus?')" name="hapus" class="btn btn-danger ml-2 mb-2">hapus</button>
          </form>
     
            <table class="table table-striped ml-2 mr-5">
                <thead class="thead-dark text-center">
                  <tr>
                    <th>No</th>
                    <th>No. inv</th>
                    <th>Kode Produk</th>
                    <th>Nama Produk</th>
                    <th>Stok</th>
                    <th>Jumlah Masuk</th>
                    <th>Waktu Masuk</th>
                    <th>Admin</th>

                  </tr>
                </thead>
                <tbody class="text-center">
                  <?php 
                  $no = 1;
                  include 'paging_jml_masuk.php';
                   ?>
                </tbody>
            </table>


        </div>
      </div>
    </div>
  </div>

</div>

      	</section>    

      
</div>
<?php include 'comp/footer.php'; ?>