<?php require 'fungsi/fungsi.php'; ?>
<?php 

$goto = (isset($_GET['m']));

switch ($goto) {
   case 'admin': header("location: admin/login.php"); break;
   
  
}

foreach (select__cust() as $cust):
 ?>


<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title><?=$judul;?></title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" href="<?=url()?>css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="<?=url()?>css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="<?=url()?>css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="<?=url()?>images/icon/logo-blue.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="<?=url()?>css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- owl stylesheets --> 
      <link rel="stylesheet" href="<?=url()?>css/owl.carousel.min.css">
      <link rel="stylesheet" href="<?=url()?>css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <style type="text/css">
         .fixed{
            position: fixed;
         }
      </style>
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
    <script src="https://apps.elfsight.com/p/platform.js" defer></script>
<div class="elfsight-app-6da98786-fc12-48f7-95b8-9993e6cdb75d"></div>
     <div class="loader_bg">
         <div class="loader"><img src="<?=url()?>images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header class="section">
         <!-- header inner -->
         <div class="header">
            <div class="container">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                              
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9 mt-2">
                     <div class="menu-area">
                        <div class="limit-box">
                           <nav class="main-menu">
                              <ul class="menu-area-main">
                                 <li> <a class="text-dark" href="index.php">Home</a> </li>
                                 <li><a class="text-dark" href="?r=partai">Partai</a></li>
                                 <li>

                                    <a class="text-dark" href="?r=detail&s=troli">troli
                                      <?php 

                                      global $koneksi;
                                      $kduser = $_SESSION['kduser2'];
                                      $select = mysqli_query($koneksi, "SELECT count(id) AS jtroli FROM tb_keranjang WHERE kduser='$kduser'");
                                      $r = mysqli_fetch_array($select);
                                      echo '<span class="badge badge-pill badge-danger">'.$r['jtroli'].'</span>';


                                       ?>
                                    </a></li>

                                     <li>

                                    <a class="text-dark" href="?r=detail&s=status">Status
                                      <?php 

                                      global $koneksi;
                                      $kduser = $_SESSION['kduser2'];
                                      $select = mysqli_query($koneksi, "SELECT count(id) AS jstatus FROM tb_transaksi WHERE kduser='$kduser'");
                                      $r = mysqli_fetch_array($select);
                                      echo '<span class="badge badge-pill badge-danger">'.$r['jstatus'].'</span>';


                                       ?>
                                    </a></li>

                                 <li class="mr-2">
                                    <div class="dropdown show">
                                       <a class="text-dark" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$cust['nama'];?>

                                          
                                            <?php 

                          if ($cust['foto'] != "") {
                                       echo '<img src="../assets/images/customer/'.$cust['foto'].'" width="64">';
                                     }else{
                                        echo gambar("default.png", "32");
                                     }






                                     ?>
                                     
                                       </a>

                                         <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                           <a class="dropdown-item" href="?r=akun">Akun</a>
                                           <a class="dropdown-item" href="fungsi/logout.php">Logout</a>

                                          
                                         </div> 
                                    </div>
                                    

                            

                                </li>

                                  
                               
                                
                              </ul>
                           </nav>
                        </div>
                     </div>
                  </div>
              
               </div>
            </div>
         </div>
         <!-- end header inner -->
      </header><?php endforeach;?>