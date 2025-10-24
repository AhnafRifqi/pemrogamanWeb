<?php
// Lokasi penyimpanan file yang diunggah
$targetDirectory = "uploads/";

// Buat folder jika belum ada
if (!file_exists($targetDirectory)) {
    mkdir($targetDirectory, 0777, true);
}

// Periksa apakah ada file diunggah
if (!empty($_FILES['files']['name'][0])) {
    $allowedExtensions = array("jpg", "jpeg", "png", "gif");
    $totalFiles = count($_FILES['files']['name']);

    for ($i = 0; $i < $totalFiles; $i++) {
        $fileName = $_FILES['files']['name'][$i];
        $fileTmp = $_FILES['files']['tmp_name'][$i];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $targetFile = $targetDirectory . $fileName;

        if (in_array($fileExt, $allowedExtensions)) {
            if (move_uploaded_file($fileTmp, $targetFile)) {
                echo "✅ File $fileName berhasil diunggah.<br>";
            } else {
                echo "❌ Gagal mengunggah file $fileName.<br>";
            }
        } else {
            echo "⚠️ File $fileName ditolak (bukan format gambar).<br>";
        }
    }
} else {
    echo "Tidak ada file yang diunggah.";
}
?>
