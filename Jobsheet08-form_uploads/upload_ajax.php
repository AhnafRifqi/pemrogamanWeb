<?php

// Pastikan direktori 'documents/' ada sebelum memindahkan file
$target_dir = "documents/";
if (!is_dir($target_dir)) {
    // Buat direktori jika belum ada (mode 0777 untuk izin penuh)
    mkdir($target_dir, 0777, true);
}

if (isset($_FILES['file'])) {
    $errors = array();
    $file_name = $_FILES['file']['name'];
    $file_size = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    
    // Perbaikan 1: Menggunakan pathinfo() untuk mendapatkan ekstensi dengan aman
    $file_ext = strtolower(pathinfo($file_name, PATHINFO_EXTENSION));
    
    $extensions = array("pdf", "doc", "docx", "txt");
    $extensions = array("jpg", "jpeg", "png", "gif"); 
    

    // Batasan ukuran 2 MB (2097152 bytes)
    $max_size = 2097152;
    $max_size = 5 * 1024 * 1024;

    // --- Validasi ---

    if (!in_array($file_ext, $extensions)) {
        $errors[] = "Ekstensi file yang diizinkan adalah PDF, DOC, DOCX, atau TXT.";
    }

    if ($file_size > $max_size) {
        $errors[] = 'Ukuran file tidak boleh lebih dari 2 MB.';
    }

    // --- Pemrosesan File ---

    if (empty($errors)) {
        // Tentukan path lengkap file tujuan
        $target_file = $target_dir . $file_name;

        // Pindahkan file yang diunggah
        if (move_uploaded_file($file_tmp, $target_file)) {
            echo "File berhasil diunggah.";
        } else {
            // Tangani error jika move_uploaded_file gagal (izin, dll.)
            echo "Gagal mengunggah file. Mungkin karena masalah izin direktori.";
        }
    } else {
        // Perbaikan 2: Menggunakan <br> atau pemisah yang jelas untuk menampilkan banyak error
        echo implode("<br>", $errors); 
    }
}
?>