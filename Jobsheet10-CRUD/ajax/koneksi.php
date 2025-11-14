<?php
define('HOST', 'localhost');
define('USER', 'postgres');
define('PASS', '1234'); // Sesuaikan dengan password database Anda
define('DB1', 'prakwebdb');

$db1 = new PDO("pgsql:host=" . HOST . ";dbname=" . DB1, USER, PASS);
// Mengatur mode error agar PDO melempar exception saat ada error
$db1->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>