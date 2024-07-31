<?php
if(isset($_GET['file'])){
    $file = urldecode($_GET['file']);
    $filepath = "uploads/" . $file;

    if(file_exists($filepath)) {
        if(unlink($filepath)) {
            echo "File $file Telah dihapus.";
        } else {
            echo "Maaf, Error saat menghapus file.";
        }
    } else {
        echo "File tidak tersedia.";
    }
} else {
    echo "Tidak ada File Spesifik.";
}
?>

<p><a href="purchasing.php">Kembali ke Halaman Utama</a></p>
