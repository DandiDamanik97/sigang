<?php include"header.php";

// agar tidak bisa lompat ke url lain
if(!in_array("purchasing",$_SESSION['admin_akses'])){
  echo "Anda tidak memiliki akses ke halaman ini";
  include("footer.php");
  exit();
}

?>

    <!-- Begin page content -->
    <div class="container">
      <div class="panel" style="background-color: #33ffeb; color: black;">
        <div class="panel-heading">
          <h3 class="panel-title" style="text-align: right;" >PURCHASING</h3>
               </div>
  </div>

<?php include"footer.php"; ?>