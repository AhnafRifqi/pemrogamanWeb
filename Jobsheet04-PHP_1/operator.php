<?php
$a = 10;
$b = 5;

$hasilTambah = $a + $b;
$hasilKurang = $a - $b;
$hasilKali = $a * $b;
$hasilBagi = $a / $b;
$sisaBagi = $a % $b;
$pangkat = $a ** $b;

echo "hasil tambah: {$hasilTambah} <br>";
echo "hasil kurang: {$hasilKurang} <br>";
echo "hasil kali: {$hasilKali} <br>";
echo "hasil bagi: {$hasilBagi} <br>";
echo "sisa bagi: {$sisaBagi} <br>";
echo "pangkat: {$pangkat} <br>";

echo"<br>";

$hasilSama = $a == $b;
$hasilTidakSama = $a != $b;
$hasilLebihKecil = $a < $b;
$hasilLebihBesar = $a > $b;
$hasilLebihKecilSama = $a <= $b;
$hasilLebihBesarSama = $a >= $b;

echo "hasilSama: {$hasilSama} <br>";
echo "hasi Tidak Sama: {$hasilTidakSama} <br>";
echo "hasil Lebih Kecil: {$hasilLebihKecil} <br>";
echo "hasil Lebih Besar: {$hasilLebihBesar} <br>";
echo "hasil Lebih Kecil Sama: {$hasilLebihKecilSama} <br>";
echo "hasil Lebih Besar Sama: {$hasilLebihBesarSama} <br>";

echo"<br>";

$hasilAnd = $a && $b;
$hasilOr = $a || $b;
$hasilNotA = !$a;
$hasilNotB = !$b;

echo "hasil and: {$hasilAnd} <br>";
echo "hasi or: {$hasilOr} <br>";
echo "hasil bukan a: {$hasilNotA} <br>";
echo "hasil bukan b: {$hasilNotB} <br>";

$a += $b;
$a -= $b;
$a *= $b;
$a /= $b;
$a %= $b;

echo"<br>";
echo "hasil a: {$a} <br>";

echo"<br>";

$hasilIdentik = $a == $b;
$hasilTidakIdentik = $a !== $b;

echo "hasil Identik: {$hasilIdentik} <br>";
echo "hasil Tidak Identik: {$hasilTidakIdentik} <br>";


?>