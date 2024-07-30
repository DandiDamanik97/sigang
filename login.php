<?php

//session start,jika sudah login tidak perlu login ulang lagi
//contoh jika sudah berada di halmaan admin_depan.php ,tiak akan bisa masuk ke halmaan login.php
session_start();
if(isset($_SESSION['admin_username'])){
    header("location:admin_depan.php");
}

include("koneksi.php");

//default nya kosong
$username = '';
$password = '';
$err = '';

//melakukan pengecekan memastikan username dan password diisi
if(isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if($username == '' or $password == ''){
        $err .= "<li>Silahkan masukan username dan password </li>";
    }

    //setelah di cek jika mmeng tidka terjadi error
    if(empty($err)){
        $sql1 = "select * from admin where username = '$username'";
        $q1 = mysqli_query($koneksi, $sql1);
        $r1 = mysqli_fetch_array($q1);

    if($r1['password'] != md5($password)){
        $err .= "<li> Username dan Password Salah, Cek Kembali!</li>";
    }
    }
    //cek dlu apakah punya akses
    if(empty($err)){
        $id_login = $r1['id_login'];
        $sql1 ="select * from admin_akses where id_login = '$id_login'" ;
        $q1 = mysqli_query($koneksi, $sql1);

        while($r1 = mysqli_fetch_array($q1)){
            $akses[] = $r1['id_akses']; //keuangan, manager,absensi
        }
        //jika tidak punya akses
        if(empty($akses)){
            $err .= "<li> Anda tidak memiliki akses ke halaman ini</li>";        }
    }

    if(empty($err)){
        $_SESSION['admin_username'] = $username;
        $_SESSION['admin_akses'] = $akses; //jangan lupa tambahkan sessionnya
        header("location:admin_depan.php");
        exit();
    }
}

?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>LOGIN SIGANG</title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="assets/img/login.jpg" />
    <style>
        body{
          background: url(assets/img/mutu.jpg) no-repeat center fixed;
          -webkit-background-size :cover;
          -moz-background-size :cover;
          -o-background-size :cover;
          backgrond-size :cover;
        }
        .container{
          margin-top: 70px;       
        }
      </style>
</head>
<body>
<div class="container">
      <div class="col-md-4 col-md-offset-4">
        <div class="panel panel-primary">
          <div class="panel-heading">
            <h3 class="panel-title  text-center"><span class="glyphicon glyphicon-lock" ></span> LOGIN SIGANG </h3>
          </div>
            <div class="panel-body">
              <center>
                <img src="assets/img/login.jpg" class="img-circle" alt="logo" width="120px"> 
              </center>
              <hr>
        <?php
          if($err) {
              echo "<ul>$err</ul>";
          }
        ?>
      <form action="" method="post">
            <input type="text" value="<?php echo $username ?>" name="username" class="form-control" placeholder="Username"> <br>
            <input type="password" name="password" class="form-control" placeholder="Password"> <br>
            <input type="submit" name="login" value="LOGIN" class="btn btn-primary btn-lg btn-block">
      </form>
           </div>
        </div>
      </div>
  </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="assets/js/jquery.min.js" ></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="assets/js/bootstrap.min.js"></script>
 </body>
</html>