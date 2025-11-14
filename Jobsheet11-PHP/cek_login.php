<?php
if (session_status() === PHP_SESSION_NONE)
    session_start();

include "config/koneksi.php";
include "fungsi/pesan_kilat.php";

$username = $_POST['username'];
$password = $_POST['password'];

$query = "SELECT * FROM user WHERE username = '$username'";
$result = mysqli_query($koneksi, $query);

if (mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);

    $salt = $row['salt'];
    $hashed_password = $row['password'];

    if (password_verify($password . $salt, $hashed_password)) {

        $_SESSION['username'] = $row['username'];
        $_SESSION['level'] = $row['level'];

        pesan_sukses("Berhasil Login!");

        header("Location: index.php");
        exit();
    } else {
        pesan_gagal("Password salah!");
    }
} else {
    pesan_gagal("Username tidak ditemukan!");
}

header("Location: login.php");
exit();
