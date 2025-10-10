<html>
<body>

<form action="global_post.php" method="post">
Nama: <input type="text" name="nama"><br>
Usia: <input type="text" name="usia"><br>
<input type="submit">
</form>

<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $usia = $_POST['usia'];
    if (empty($nama) || empty($usia)) {
        echo "Nama dan usia harus diisi";
    } else {
        echo "Selamat datang $nama! Usia Anda adalah $usia tahun.";
    }
}
?>

</body>
</html>