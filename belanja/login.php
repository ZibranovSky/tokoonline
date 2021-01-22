<?php require 'fungsi/fungsi.php'; ?>

<?php 


login("username", "password");

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <link rel="icon" type="image/png" href="<?=url()?>images/icon/logo-blue.png">

    <!-- Title Page-->
    <title>LOGIN | CUPANG QUEEN</title>

    <!-- Fontfaces CSS-->
    <link href="<?=url()?>css/font-face.css" rel="stylesheet" media="all">
    <link href="<?=url()?>vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="<?=url()?>vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="<?=url()?>vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="<?=url()?>vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">


    <!-- Main CSS-->
    <link href="<?=url()?>css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                           <h2 style="color: #11698e;">Silahkan</h2> <h2> Masuk</h2>
                        </div>
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Username / Email</label>
                                    <input class="au-input au-input--full" required="" value="<?php if(isset($_COOKIE['user_login'])){
                                        echo $_COOKIE['user_login'];
                                    }?>" type="text" name="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" id="password-field" required="" value="<?php if(isset($_COOKIE['pass_login'])){
                                        echo $_COOKIE['pass_login'];
                                    }?>" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="login-checkbox">
                                    
                                    <label>
                                        <a href="#" target="_BLANK">Lupa Password?</a><br>
                                         <input type="checkbox" <?php if (isset($_COOKIE['user_login'])) { echo 'checked'; } ?> name="ingat">Ingat Saya
                                    </label><br>
                                     <label>
                                       
                                    </label>
                                    <label>
                                        <a href="daftar-baru.php" target="_BLANK">Belum Punya Akun?</a>
                                    </label>
                                </div>
                                <button name="submit" class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                              
                            </form>
                         <!-- Login -->
                         <!-- <?php $pro->login("username", "password", "submit"); ?> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>


<!--     <div class="container">
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-5">
                    <h1></h1>                    
                </div>
                <div class="col-md-7">
                    <h1></h1>
                </div>

            </div>
        </div>
    </div> -->

    <!-- Jquery JS-->
    <script src="<?=url()?>vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="<?=url()?>vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="<?=url()?>vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- <?=url()?>Vendor JS       -->
    <script src="<?=url()?>vendor/slick/slick.min.js">
    </script>
    <script src="<?=url()?>vendor/wow/wow.min.js"></script>
    <script src="<?=url()?>vendor/animsition/animsition.min.js"></script>
    <script src="<?=url()?>vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="<?=url()?>vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="<?=url()?>vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="<?=url()?>vendor/circle-progress/circle-progress.min.js"></script>
    <script src="<?=url()?>vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="<?=url()?>vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="<?=url()?>vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="<?url()?>js/main.js"></script>

</body>

</html>
<!-- end document-->
