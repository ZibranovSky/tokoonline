<?php include 'fungsi/fungsi.php'; ?>
<?php 
if (isset($_POST['daftar'])) {
    daftar();
}



 ?>

<!------ Include the above in your HEAD tag ---------->

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">



        <link rel="icon" type="image/png" href="<?=url()?>images/icon/logo-blue.png">

    <!-- Title Page-->
    <title>DAFTAR | CUPANG QUEEN</title>

       <!-- Bootstrap CSS-->
    <link href="<?=url()?>vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light navbar-laravel">
    <div class="container">
    <a class="navbar-brand" href="#"><img src="<?=url()?>images/icon/logo-blue.png"></a>



    </div>
</nav>

<main class="my-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Daftar</div>
                        <div class="card-body">
                            <form name="my-form"  action="" method="POST">
                                <div class="form-group row">
                                    <label for="full_name" class="col-md-4 col-form-label text-md-right">Username / Email</label>
                                    <div class="col-md-6">
                                        <input type="text" id="full_name" class="form-control" name="username">
                                    </div>
                                </div>

                               <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">Password</label>
                                    <div class="col-md-6">
                                       <input name="password" required="" class="form-control" id="password" type="password" onkeyup='validasi();' />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">Ulangi Password</label>
                                    <div class="col-md-6">
                                       
                                        <input type="password" required=""  class="form-control" name="confirm_password" id="confirm_password"  onkeyup='validasi();' /> 
                                        <span id='message'></span>
                                    </div>
                                </div>

                               
                               
                               

    <script type="text/javascript">
       function validasi(){
            var password = document.getElementById('password');
            var confirm_password = document.getElementById('confirm_password');
            var span = document.getElementById('message');
            var btn =  document.getElementById("btn"); 

            if (password.value == confirm_password.value) {
                span.style.color = 'green';
                span.innerHTML = "password cocok";
                btn.disabled = false;
            }else if(password.value != confirm_password.value){
                 span.style.color = 'red';
                span.innerHTML = "password tidak cocok";
                btn.disabled = true;
            }
        }
    </script>

                                <div class="form-group row">
                                    <label for="phone_number" class="col-md-4 col-form-label text-md-right">Nama Lengkap</label>
                                    <div class="col-md-6">
                                        <input type="text" id="phone_number" name="nama" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="present_address" class="col-md-4 col-form-label text-md-right">No. Telepon</label>
                                    <div class="col-md-6">  
                                        <input type="text" id="present_address" name="kontak" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="permanent_address" class="col-md-4 col-form-label text-md-right">Alamat</label>
                                    <div class="col-md-6">
                                        <textarea name="alamat" class="form-control"></textarea>
                                    </div>
                                </div>

                         
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" name="daftar" id="btn" class="btn btn-primary">
                                        daftar
                                        </button>
                                    </div>
                                     </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>

</main>

<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>
</html>