<?php
// Modul 04 & 07: Memastikan form dikirim melalui method POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    echo "<h1>Hasil Pendaftaran Karyawan</h1>";
    echo "<hr>";
    
    // --- 1. Mengambil Data Teks (Modul 07) ---
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $posisi = $_POST['posisi'];
    
    // Untuk data checkbox, bisa jadi array atau kosong
    $keahlian_array = isset($_POST['keahlian']) ? $_POST['keahlian'] : [];
    $keahlian_str = implode(", ", $keahlian_array); // Gabungkan array keahlian menjadi string

    echo "<h3>Data Pribadi</h3>";
    echo "<p><strong>Nama:</strong> " . htmlspecialchars($nama) . "</p>";
    echo "<p><strong>Email:</strong> " . htmlspecialchars($email) . "</p>";
    echo "<p><strong>Posisi Dilamar:</strong> " . htmlspecialchars($posisi) . "</p>";
    echo "<p><strong>Keahlian:</strong> " . htmlspecialchars($keahlian_str) . "</p>";
    echo "<hr>";
    
    
    // --- 2. Pemrosesan File Upload (Modul 08) ---
    echo "<h3>Pemrosesan File CV</h3>";
    
    if (isset($_FILES["cv_file"]) && $_FILES["cv_file"]["error"] == 0) {
        
        $target_dir = "uploads/"; 
        $file_name = basename($_FILES["cv_file"]["name"]);
        $target_file = $target_dir . $file_name;
        
        // Coba pindahkan file yang diunggah dari lokasi temporer ke folder tujuan
        if (move_uploaded_file($_FILES["cv_file"]["tmp_name"], $target_file)) {
            echo "<p style='color: green;'> **SUKSES:** File CV bernama <strong>" . htmlspecialchars($file_name) . "</strong> berhasil diunggah!</p>";
            echo "<p>File disimpan di: <code>" . $target_file . "</code></p>";
        } else {
            echo "<p style='color: red;'> **GAGAL:** Terjadi error saat memindahkan file.</p>";
        }
        
    } else {
        echo "<p style='color: orange;'> **PERINGATAN:** Tidak ada file yang diunggah atau terjadi error.</p>";
        // Anda bisa cek error code lebih lanjut menggunakan $_FILES["cv_file"]["error"]
    }
    
    echo "<hr>";
    echo "<p>Terima kasih atas pendaftaran Anda. Kami akan segera menghubungi Anda!</p>";

} else {
    // Jika user mengakses process.php secara langsung
    echo "<p style='color: red;'>Akses ditolak. Harap isi formulir melalui halaman utama.</p>";
}
?>