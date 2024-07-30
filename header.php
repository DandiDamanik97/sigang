<?php
// session_start();
// if(!isset($_SESSION['login'])){
//   header('Location:login.php');
// }

// cek terlebih dahulu apakah sudah login atau belum,jika belum maka akan di arahkan ke menu login
session_start();
include("koneksi.php");
if(!isset($_SESSION['admin_username'])){
    header("location:login.php");
}

// include "koneksi.php";
// include "fungsi.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <!-- CSS -->
    <link href="assets/style.css" rel="stylesheet">
    <title>SIGANG</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href='assets/img/login.jpg' rel='shortcut icon' />
    
  </head>

  <body>

    <!-- Fixed navbar -->
     <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="./">SIGANG</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
            <li class="active"><a href="./">Home</a></li>
            <?php if(in_array("purchasing",$_SESSION['admin_akses'])){?>
                    <li><a href="purchasing.php">PURCHASING</a></li>
            <?php } ?>
            <?php if(in_array("qc",$_SESSION['admin_akses'])){?>
                    <li><a href="qc.php">QC</a></li>
            <?php } ?>
            <?php if(in_array("solvent",$_SESSION['admin_akses'])){?>
                    <li><a href="solvent.php">SOLVENT</a></li>
            <?php } ?>
            <?php if(in_array("waterbased",$_SESSION['admin_akses'])){?>
                    <li><a href="waterbased.php">WATERBASED</a></li>
            <?php } ?>
            </ul>
            <ul class="nav navbar-nav navbar-right">
        <li><a href="Logout.php">Logout</a></li>
          </ul>
        </div>
  </nav>