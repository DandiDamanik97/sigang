<?php include"header.php";

// agar tidak bisa lompat ke url lain
if(!in_array("solvent",$_SESSION['admin_akses'])){
  echo "Anda tidak memiliki akses ke halaman ini";
  include("footer.php");
  exit();
}

?>

    <!-- Begin page content -->
    <div class="container">
      <div class="panel" style="background-color: #ffbe33; color: black;">
        <div class="panel-heading">
          <h3 class="panel-title" style="text-align: right;" >SOLVENT</h3>
               </div>
  </div>

<?php include"footer.php"; ?>