<?php 

session_start();
unset($_SESSION['idtoko2']);
unset($_SESSION['kduser2']);
unset($_SESSION['usertoko2']);
setcookie('cookielogin[user]','');
header("location: ../../")


 ?>