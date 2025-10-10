<?php
$nama = @$_GET['nama'];  // tanda @ supaya tidak muncul error jika key kosong
$usia = @$_GET['usia'];  // tanda @ supaya tidak muncul error jika key kosong

echo "Halo {$nama}! Apakah benar anda berusia {$usia} tahun?";
?>
