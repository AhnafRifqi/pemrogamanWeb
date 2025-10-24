<?php
// Mengecek apakah cookie 'user' sudah tersedia
if (isset($_COOKIE['user'])) {
    echo "Isi cookie: " . $_COOKIE['user'];
} else {
    echo "Cookie belum tersedia atau sudah kedaluwarsa.";
}
?>
