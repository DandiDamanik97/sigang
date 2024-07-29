<?php include"header.php";?>

    <!-- Begin page content -->
    <div class="container">

<?php
$view = isset($_GET['view']) ? $_GET['view'] : null;
switch($view){
  default;
//untukpesa berhasil atau gagal proses
  if(isset($_GET['e']) && $_GET['e']=='sukses'){
?>
<div class="alert alert-success alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Selamat </strong> Proses Berhasil
</div>

<?php
  }elseif(isset($_GET['e']) && $_GET['e']=='gagal'){
  ?>
<div class="alert alert-danger alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <strong>Error!</strong> Proses Gagal
</div>

<?php
  }

?>
   <div class="panel panel-primary">
     <div class="panel-heading">
        <h3 class="panel-title">PURCHASING </h3>
      </div>
      <div class="panel-body">
        <a href="data_admin.php?view=tambah" class="btn btn-primary" style="margin-bottom: 10px;"> Tambah Data</a>
      </div>

<?php
  break;
  case "edit";
  $sqlEdit =mysqli_query($konek, " SELECT * FROM admin WHERE idadmin='$_GET[id]'");
  $e = mysqli_fetch_array($sqlEdit);
?>
 <div class="panel panel-primary">
     <div class="panel-heading">
        <h3 class="panel-title">Edit Data Administrator </h3>
      </div>
      <div class="panel-body">
        
      <form class="form-horizontal" method="POST" action="aksi_admin.php?act=update">
        <input type="hidden" name="idadmin" value="<?php echo $e['idadmin']; ?>">
        <div class="form-group">
          <label class="col-md-2"> Username</label>
          <div class="col-md-4">
            <input type="text" name="username" class="form-control" value="<?php echo $e['username']; ?>" required>
          </div>          
        </div>

        <div class="form-group">
          <label class="col-md-2"> Password</label>
          <div class="col-md-4">
            <input type="password" name="password" class="form-control" placeholder="Kosongkan Jika Tidak Diganti">
          </div>          
        </div>

        <div class="form-group">
          <label class="col-md-2"> Nama Lengkap</label>
          <div class="col-md-4">
            <input type="text" name="namalengkap" class="form-control" value="<?php echo $e['namalengkap']; ?>">
          </div>          
        </div>

        <div class="form-group">
          <label class="col-md-2"></label>
          <div class="col-md-4">
            <input type="submit" class=" btn btn-primary" value="Update Data">
            <a href="data_admin.php" class="btn btn-danger">Batal</a>

          </div>
          
        </div>
         
       </form>

    </div>
<?php
break;
}

?>
        </div>

<?php include"footer.php"; ?>