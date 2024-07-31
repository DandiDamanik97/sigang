<?php include"header.php";

// agar tidak bisa lompat ke url lain
if(!in_array("purchasing",$_SESSION['admin_akses'])){
  echo "Anda tidak memiliki akses ke halaman ini";
  include("footer.php");
  exit();
}

?>

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

    <!-- halaman content -->
    <div class="container">
    <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title">PURCHASING</h3>
    </div>
    <div class="panel-body">
      <a href="purchasing.php?view=tambah" class="btn btn-primary" style="margin-bottom: 10px;"> Tambah Data</a>
      <ul>
        <?php
        $dir = "uploads/";
        if (is_dir($dir)){
            if ($dh = opendir($dir)){
                while (($file = readdir($dh)) !== false){
                    if ($file != '.' && $file != '..') {
                        echo "<li>$file <a href='download.php?file=" . urlencode($file) . "'>Download</a> | <a href='delete.php?file=" . urlencode($file) . "' onclick='return confirm(\"Are you sure?\")'>Delete</a></li>";
                    }
                }
                closedir($dh);
            }
        }
        ?>
    </ul>
    </div>

  <?php
    break;
    case "tambah";
  ?>
<div class="container">
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Unggah File</h3>
        </div>
        <div class="panel-body">
            <?php
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $target_dir = __DIR__ . "/uploads/";
                $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                $uploadOk = 1;
                $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

                // Check if file already exists
                if (file_exists($target_file)) {
                    echo "<div class='alert alert-danger'>Sorry, file already exists.</div>";
                    $uploadOk = 0;
                }

                // Check file size
                if ($_FILES["fileToUpload"]["size"] > 8000000) { // Mengubah batas menjadi 8MB
                    echo "<div class='alert alert-danger'>Sorry, your file is too large.</div>";
                    $uploadOk = 0;
                }

                // Allow certain file formats
                $allowed_types = array("jpg", "png", "jpeg", "gif", "pdf", "doc", "docx", "txt");
                if (!in_array($fileType, $allowed_types)) {
                    echo "<div class='alert alert-danger'>Sorry, only JPG, JPEG, PNG, GIF, PDF, DOC, DOCX & TXT files are allowed.</div>";
                    $uploadOk = 0;
                }

                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "<div class='alert alert-danger'>Sorry, your file was not uploaded.</div>";
                // if everything is ok, try to upload file
                } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        echo "<div class='alert alert-success'>The file ". basename($_FILES["fileToUpload"]["name"]). " has been uploaded.</div>";
                        // Redirect to purchasing.php after successful upload
                        header("Location: purchasing.php");
                        exit();
                    } else {
                        echo "<div class='alert alert-danger'>Sorry, there was an error uploading your file.</div>";
                    }
                }
            }
            ?>
            
            <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="col-md-2 control-label">Select file to upload:</label>
                    <div class="col-md-10">
                        <input type="file" name="fileToUpload" id="fileToUpload" class="form-control" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-offset-2 col-md-10">
                        <input type="submit" value="Upload File" name="submit" class="btn btn-primary">
                    </div>
                </div>
            </form>
            
            <p><a href="purchasing.php" class="btn btn-default">Kembali ke Halaman Utama</a></p>
        </div>
    </div>
</div>
<?php
break;
}

?>
    
<?php include"footer.php"; ?>