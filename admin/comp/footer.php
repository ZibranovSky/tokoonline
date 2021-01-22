<!-- Main Footer -->
  <footer class="main-footer">
    <strong>Copyright &copy; 2014-2020 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 3.1.0-rc
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?=url()?>plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="<?=url()?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?=url()?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?=url()?>dist/js/adminlte.js"></script>

<!-- PAGE <?=url()?>PLUGINS -->
<!-- jQuery Mapael -->
<script src="<?=url()?>plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?=url()?>plugins/raphael/raphael.min.js"></script>
<script src="<?=url()?>plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?=url()?>plugins/jquery-mapael/maps/usa_states.min.js"></script>
<!-- ChartJS -->
<script src="<?=url()?>plugins/chart.js/Chart.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?=url()?>dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?=url()?>dist/js/pages/dashboard2.js"></script>

 <script type="text/javascript">
    $(document).ready(function(){
      
      $(document).on('click', '#tb_produk', function (e) {
        document.getElementById("kdproduk").value = $(this).attr('data-kdproduk');
        document.getElementById("nm_produk").value = $(this).attr('data-nm_produk');
        document.getElementById("stok").value = $(this).attr('data-stok');
        
        $('#modalproduk').modal('hide');
      }); 
      
    });
    </script>
</body>
</html>
